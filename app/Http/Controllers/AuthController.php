<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninFormRequest;
use App\Http\Requests\SignupFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// AuthController handles authentication-related actions such as signing up and signing in.
class AuthController extends Controller
{
    // Displays the signup form to the user.
    public function signupGet()
    {
        // Returns the "auth.signup" view where the signup form is located.
        return view("auth.signup");
    }

    // Handles the signup form submission.
    public function signupPost(SignupFormRequest $request)
    {
        // Logic for processing signup form data will go here.
        $data = $request->validated();
        // hash user raw password
        $data["password"] = Hash::make($data["password"]);
        // create a new user
        $user = User::create($data);
        // authenticate the newly created user
        Auth::login($user,true);

        return redirect()->intended(route("blogs.index"))->with("success","Account Created Successfully!!!");

    }

    // Displays the signin (login) form to the user.
    public function signinGet()
    {
        // Returns the "auth.signin" view where the signin form is located.
        return view("auth.signin");
    }


    // Handles the signin form submission.
    public function signinPost(SigninFormRequest $request)
    {
        // Logic for processing login form data will go here.
        $data = $request->validated();
        $remember = $data->remember;
        // remove remember me value from cre
        unset($data["remember"]);

        if (Auth::attempt($data,$remember)){

            $request->session()->regenerate();

            return redirect()->intended(route("blogs.index"))->with("success","Successfully Logged In");
        }

        return back();
    }

    public function signout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route("blogs.index")->withSuccess("Successfully Logged Out");
    }
}

