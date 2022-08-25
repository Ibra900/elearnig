<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // session(['url.intended' => url()->previous()]);
        // $this->redirectTo = session()->get('url.intended');

        $this->middleware('guest')->except('logout');
    }
    protected function redirectTo () {
        if (Auth::user()->roles->pluck('name')->contains('admin')) {
            return '/admin/dashboard';
        }
        elseif (Auth::user()->roles->pluck('name')->contains('apprenant')) {
            // // dd($id);
            // if(isset($id))
            // {
            //     $formation = Formation::findOrfail($id);
            //     return view('lecture-formation', compact('formation'));
            // }
            return 'formations';
            // return Redirect::to(URL::previous());
        }
        else{
            return 'index';
        }
    }
}
