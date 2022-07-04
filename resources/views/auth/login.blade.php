@extends('layouts.auth-layout')

@section('content')
    @php
    $setting = App\Models\Setting::find(1);
    @endphp
    <br>
     
    <section>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('/front/assets/images') }}/{{ $setting->app_logo }}" alt="" srcset="">
                    </div>
                    <div class="login-card">
                        <form class="theme-form login-form" method="POST" action="{{ route('login_check') }}">
                            @csrf
                            <h4>Login</h4>
                            <h6>Welcome back! Log in to your account.</h6>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group"><span class="input-group-text"><i
                                            class="icon-email"></i></span>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Test@gmail.com">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group"><span class="input-group-text"><i
                                            class="icon-lock"></i></span>
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="*********">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">Remember password</label>
                                </div><a class="link" href="{{ route('password.request') }}">Forgot
                                    password?</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                            </div>
                            <div class="login-social-title">
                                <h5>Sign in with</h5>
                            </div>
                            <div class="form-group">
                               
                                    <div class="col-12">
                                       <a href="{{route('login.google')}}" class="btn btn-default btn-block"><img src="{{asset('/front/assets/images/google.png')}}" alt="" srcset=""style="width: 21px;"> Login with Google</a>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <button class="btn btn-lg btn-facebook btn-block" type="submit"><i class="fab fa-facebook-f mr-2"></i> Login with Facebook</button>
                                    </div>
                             </div>
                            <p>Don't have account?<a class="ms-2" href="/register">Create Account</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
