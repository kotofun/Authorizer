<?php

namespace App\Http\Controllers;

use App\Services\Tokenizer;
use App\User;
use Illuminate\Support\Facades\Cookie;

/**
 * Class UserController.
 *
 * @author Dmitry Basavin <basavind@gmail.com>
 */
class UserController extends Controller
{
    /** @var  \App\User */
    private $user;

    public function __construct(Tokenizer $tokenizer)
    {
        // FIXME: it should be in auth guard
        $this->user = $tokenizer->userFrom(Cookie::get('token'));
    }

    /**
     * List users with social accounts.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        // FIXME: it should be in gate
        if ( ! in_array('admin', $this->user->roles()->pluck('name')->toArray())) {
            abort(404);
        }

        $users = User::with(['socialAccounts', 'info'])->get();

        return view('user.index', compact('users'));
    }
}
