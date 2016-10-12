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

    public function index(Request $request)
    {
        $token = Cookie::get('token');
        $user = $this->tryGetUserFrom($token);
        $helpAccepted = false;

        if ( ! is_null($user)) {
            if (count($user->info)) {

                $helpAccepted = true;
            } else if ($request->method() === 'POST') {
                $helpAccepted = $this->acceptHelp($request, $user);
            }
        }

        if ($helpAccepted) {
            return view('help.thanks');
        }

        return $this->showHelpForm($user);
    }

    /**
     * @param $token
     *
     * @return mixed
     */
    private function tryGetUserFrom($token)
    {
        try {
            $user = $this->tokenizer->userFrom($token);
        } catch (InvalidTokenException $e) {
            return;
        }

        return $user;
    }

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
     * @param \App\User|null $user
     *
     * @return \Illuminate\View\View
     */
    private function showHelpForm(User $user = null)
    {
        return view('help.show', compact('user'));
    }
}
