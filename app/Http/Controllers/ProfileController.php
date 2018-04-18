<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index(Request $request, User $user)
    {
        $articles = $user->articles()->latest()->paginate(5);

        return view('user.profile', compact('user','articles'));
    }
}
