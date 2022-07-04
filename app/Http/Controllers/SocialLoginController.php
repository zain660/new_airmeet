<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
// use RealRashid\SweetAlert\Facades\Alert;

// use SerializesModels;

class SocialLoginController extends Controller
{
          // Google login
          public function redirectToGoogle(){
              return Socialite::driver('google')->redirect();
          }
          // Google callback
          public function handleGoogleCallback(){
            try {
                $user = Socialite::driver('google')->user();
                $this->registerOrLoginUser($user);
                // Return home after login
                if(Auth::user()->role == 'end-user'){
                    return redirect('/user/dashboard');
                  }else{
                    return redirect('/admin/dashboard');
                  }
            } catch (\Throwable $th) {
                //throw $th;
                return redirect()->back()->with('error',$th);
            }
          }

        //   Facebook login
            public function facebookRedirect(){
                return Socialite::driver('facebook')->redirect();
            }
            // Facebook Callback
            public function handleFacebookCallback(){
                try{
                    $user = Socialite::driver('facebook')->user();
                    $this->registerOrLoginUser($user);
                    // Return home after login
                    if(Auth::user()->role == 'end-user'){
                        return redirect('/user/dashboard');
                      }else{
                        return redirect('/admin/dashboard');
                      }
                }catch (\Throwable $th) {
                    //throw error;
                    return redirect()->back()->with('error',$th);
                }
            }
          protected function registerOrLoginUser($data){
              try {
                //   dd($data);
                $user = User::where('email', $data->email)->first();
                if ($user == null) {
                    $user = new User();
                    $user->name = $data->name;
                    $user->email = $data->email;
                    $user->is_social_avatar = 1;
                    $user->avatar = $data->avatar;
                    $user->invitation_team = 0;
                    $user->role = 'end-user';
                    $user->save();
                    Auth::login($user);
                }else{
                    // dd('dd');
                    Auth::login($user);
                }
                // Auth::login($user);
              } catch (\Throwable $th) {
                 return redirect()->back()->with('error',$th);
              }
          }
}
