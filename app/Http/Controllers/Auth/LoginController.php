<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Queue\SerializesModels;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;


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
    use SerializesModels;
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
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login_check(Request $request){
      $input = $request->all();
      try {
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))){
          // dd(Auth::user());
          if(Auth::user()->role == 'end-user'){
            return redirect('/user/dashboard');
          }else{
            return redirect('/admin/dashboard');
          }
        }else{
            toast('Email or password was incorrect.','error');
            return redirect()->back();
        }
      } catch (\Catch $th) {
         return redirect()->back()->with('error',$th);
      }
    }
}
