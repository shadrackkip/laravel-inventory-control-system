<?php

namespace App\Http\Controllers\auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    function index(){
        return view('pages.auth.login');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'   => 'required|email',
            'password' => 'required|min:6',
        ]);

    }
    public function adminLogin(Request $request)
    {

        $this->validator([
            'email' => $request->email,
            'password' => $request->password]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin');
        }
        toastr()->error('User does not exists or wrong credentials!');
        return back()->withInput($request->only('email', 'remember'));
    }
    public function adminLogout(Request $request)
    {

        auth('admin')->logout();
        toastr()->success('Logged out successfully!');
        return redirect('/');

    }
}
