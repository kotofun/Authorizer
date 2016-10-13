<?php

namespace App\Http\Controllers;

use App\User;

/**
 * Class UserController.
 *
 * @author Dmitry Basavin <basavind@gmail.com>
 */
class UserController extends Controller
{
    /**
     * List users with social accounts.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        $users = User::with(['socialAccounts'])->get();

        return $users;
    }
}
