<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function edit()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('frontend.pages.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {



        $valid = Validator::make($request->all(), [
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:1000',
            'name'=>'required|between:2, 50',
    		'email'=>'required|between:8, 50|email|unique:users,email,'.Auth::user()->id,
    		'password'=>'nullable|min:8',
    		'repassword'=>'nullable|same:password|required_with:password',
        ]);

        if ($valid->fails()) {
    		return redirect()->route('profile.edit')
    				->withErrors($valid)
    				->withInput()
    				->with('status', 'error');
    	}


        $colom = [
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $request->avatar,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'address' => $request->address
        ];

        // if ($request->avatar) {
        //     $colom['avatar'] =  $request->file('avatar')->store('img/avatar', 'public');
        // }

        if (!empty($request->password) || $request->password != null || $request->password !='') {
    		$colom['password'] = bcrypt($request->password);
    	}

    	$result = User::where('id', Auth::user()->id)
    						->update($colom);

        if ($result) {
            return back()->with('success', 'Update Successfully');
        } else {
            return back()->with('error', 'Update Failed');
        }

    }
}
