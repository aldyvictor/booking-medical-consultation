<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function edit()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('frontend.pages.profile.edit', compact('user'));
    }
}
