<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidTokenException;
use App\Services\Tokenizer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

/**
 * Class HelpController.
 *
 * @author Dmitry Basavin <basavind@gmail.com>
 */
class HelpController extends Controller
{
    /* @var \App\Services\Tokenizer */
    private $tokenizer;

    public function __construct(Tokenizer $tokenizer)
    {
        $this->tokenizer = $tokenizer;
    }

    /**
     * Index controller's action.
     *
     * It checks if user is authenticated and gets him if he is.
     * If user is authenticated and exists it checks if user has
     * already filled out help form and shows then thanks or help form.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = $this->getUserFromCookie();

        if ( ! is_null($user) && $this->isHelpAccepted($request, $user)) {
            return $this->showThanks();
        }

        return $this->showHelpForm($user);
    }

    /**
     * Try to get user from cookie.
     *
     * Since Lumen is stateless and sessionless framework it's not recommended
     * to store user in sessions, that's why it uses cookie files to hold info
     * about authenticated users.
     *
     * @return User|null
     */
    private function getUserFromCookie()
    {
        $token = Cookie::get('token');
        $user = $this->tryExtractUserFrom($token);

        return $user;
    }

    /**
     * Try get user from jwt token.
     *
     * @param string|null $token
     *
     * @return \App\User|null
     */
    private function tryExtractUserFrom($token)
    {
        try {
            $user = $this->tokenizer->userFrom($token);
        } catch (InvalidTokenException $e) {
            return;
        }

        return $user;
    }

    /**
     * Check if users help is already accepted.
     *
     * We should not allow user to help twice right now,
     * later it can be changed in personal page.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User                $user
     *
     * @return bool
     */
    private function isHelpAccepted(Request $request, User $user)
    {
        $helpAccepted = false;

        if ( ! is_null($user)) {
            if (count($user->info)) {
                $helpAccepted = true;
            } elseif ($request->method() === 'POST') {
                $helpAccepted = $this->acceptHelp($request, $user);
            }
        }

        return $helpAccepted;
    }

    /**
     * Create UserInfo record from request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User                $user
     *
     * @return bool
     */
    private function acceptHelp(Request $request, User $user)
    {
        $user->info()->create([
            'helps' => array_merge($request->only(['help_type', 'help_value'])),
            'contact_type' => $request->get('additional_type'),
            'contact_value' => $request->get('additional_value'),
            'comment' => $request->get('comment'),
        ]);

        return true;
    }

    /**
     * Show thanks view.
     *
     * @return \Illuminate\View\View
     */
    private function showThanks()
    {
        return view('help.thanks');
    }

    /**
     * Show help form for user.
     *
     * Some fields of help form should be visible only
     * for existed and authored users.
     *
     * @param \App\User|null $user
     *
     * @return \Illuminate\View\View
     */
    private function showHelpForm(User $user = null)
    {
        return view('help.show', compact('user'));
    }
}
