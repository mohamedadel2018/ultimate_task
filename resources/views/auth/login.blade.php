
 <!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link href="https://fonts.googleapis.com/css?family=Cairo:300,400&display=swap" rel="stylesheet">

     <link rel="stylesheet" href="{{asset('loginform/fonts/icomoon/style.css')}}">

     <link rel="stylesheet" href="{{asset('loginform/css/owl.carousel.min.css')}}">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="{{asset('loginform/css/bootstrap.min.css')}}">

     <!-- Style -->
     <link rel="stylesheet" href="{{asset('loginform/css/style.css')}}">

     <title> ultimate Task</title>
   </head>
    <body>

   <div class="content">
     <div class="container">

       <div class="row mt-4">
         <div class="col-md-6 hidden-xs">
         </div>
         <div class="col-md-6 contents">
           <div class="row justify-content-center">
             <div class="col-md-8 mt-4">
               <div class="mb-4 mt-4">
               <h3 class="text-center"> @lang('app.login') </h3>
               {{-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> --}}
             </div>
             <form method="POST" action="{{ route('login') }}">
                @csrf
               <div class="form-group first">
                 <label for="username">@lang('app.Username')</label>
                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                 @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
                </div>
               <div class="form-group last mb-4">
                 <label for="password">@lang('app.Password')</label>
                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
               </div>

               <div class="d-flex mb-5 align-items-center">

                    <label class="control control--checkbox mb-0"><span class="caption">   @lang('app.Remember_Me') </span>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                       <div class="control__indicator"></div>
                     </label>

                     <span class="ml-auto"> @if (Route::has('password.request'))
                            {{-- <a class="forgot-pass" href="{{ route('password.request') }}">
                                    @lang('app.Forgot_Your_Password')
                            </a> --}}
                        @endif
                    </span>

               </div>


               <button type="submit" class="btn  btn-block btn-primary">
                    @lang('app.Login_btton')
                </button>

               {{-- <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>

               <div class="social-login">
                 <a href="#" class="facebook">
                   <span class="icon-facebook mr-3"></span>
                 </a>
                 <a href="#" class="twitter">
                   <span class="icon-twitter mr-3"></span>
                 </a>
                 <a href="#" class="google">
                   <span class="icon-google mr-3"></span>
                 </a>
               </div> --}}
             </form>
             </div>
           </div>

         </div>

       </div>
     </div>
   </div>


     <script src="{{asset('loginform/js/jquery-3.3.1.min.js')}}"></script>
     <script src="{{asset('loginform/js/popper.min.js')}}"></script>
     <script src="{{asset('loginform/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('loginform/js/main.js')}}"></script>
   </body>
 </html>



{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}
