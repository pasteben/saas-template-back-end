<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'min:6'],
            'email' => ['required', 'email', 'unique:users']
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        //TODO save the new data

        return $request;
    }
}
