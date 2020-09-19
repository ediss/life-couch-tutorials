<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
use URL;


class CustomLoginController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {

        // Validate the form data

        $hash = $request->input('device_id');

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            if(Auth::user()->role_id == 1) {
                return redirect()->intended(route('admin.courses'));
            }

            elseif(Auth::user()->role_id == 2){

                if($hash == Auth::user()->device_id || $hash == Auth::user()->device_id_2) {
                    return redirect()->intended(route('homepage'));
                }else {
                    if( Auth::user()->device_id_2 == null ) {
                        $user = User::find(Auth::user()->id);

                        $user->device_id_2 = $hash;

                        $user->save();

                        return redirect()->intended(route('homepage'));
                    }
                    // else {
                    //     Auth::logout();

                    //     $url = URL::route('access.not.allowed') . '#scroll-section';
                    //     return redirect()->to($url);

                    // }



                }

            }
        }

        //  if unsuccessful then redirect back to login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }

}
