@extends('frontend.layouts.app')

@section('title', 'Authentication')

@section('content')
    @parent

    <div class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </div>
        <div class="ps-my-account">
            <div class="container">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="ps-form--account ps-tab-root user_authentication">
                    <ul class="login_tabs">
                        <li onclick="displayLoginForm()" id="login_tab" class="login_border">Login</li>
                        <li onclick="displayRegisterForm()" id="register_tab" >Register</li>
                    </ul>
                    {{-- login form start --}}
                     <form method="POST" id="user_login_form"  action="{{ route('login') }}">
                        <div class="form_inside">
                            <div class="ps-form__content">
                                <h5>Log In Your Account</h5>
                                <div class="form-group">
                                    <input class="form-control" maxlength="11" name="phone" required type="text" placeholder="01xxxxxxxxx">
                                </div>
                                <div class="form-group form-forgot">
                                    <input class="form-control" required name="password" type="password" ><a href="">Forgot?</a>
                                </div>
                                <div class="form-group submtit">
                                    <button  class="ps-btn ps-btn--fullwidth">Login</button>
                                </div>
                            </div>
                            <div class="ps-form__footer">
                                <p>Connect with:</p>
                                <ul class="ps-list--social">
                                    <li><a class="facebook" href="{{ url('/login/facebook') }}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="google" href="{{ url('/auth/google') }}"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                     </form>
                    {{-- login form end --}}


                     {{-- register form start  --}}
                     <form method="POST" id="user_register_form" class="form_display_toggle" action="{{ route('user_registration') }}">
                        <div class="form_inside">
                            <div class="ps-form__content">
                                <h5>Register An Account</h5>
                                <div class="form-group">
                                    <input class="form-control" required name="name" type="text" placeholder="Ex: Mohammad">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required name="phone" maxlength="11" type="text" placeholder="01xxxxxxxxx">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required name="password" type="password">
                                </div>
                                <div class="form-group submtit">
                                    <button class="ps-btn ps-btn--fullwidth">Register</button>
                                </div>
                            </div>
                            <div class="ps-form__footer">
                                <p>Connect with:</p>
                                <ul class="ps-list--social">
                                    <li><a class="facebook" href="{{ url('/login/facebook') }}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="google" href="{{ url('/auth/google') }}"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                     </form>   
                     {{-- register form end --}}
                </div>
            </div>
        </div>
    </div>

@endsection


@push('extra_js')

<script>

    function displayRegisterForm(){

        document.getElementById('user_login_form').classList.toggle('form_display_toggle');
        document.getElementById('login_tab').classList.remove('login_border');
        
        document.getElementById('user_register_form').classList.toggle('form_display_toggle');
        document.getElementById('register_tab').classList.add('login_border');
    }


    
    function displayLoginForm(){   

        document.getElementById('user_register_form').classList.toggle('form_display_toggle');
        document.getElementById('register_tab').classList.remove('login_border');

        document.getElementById('user_login_form').classList.toggle('form_display_toggle');
        document.getElementById('login_tab').classList.add('login_border');
     
    }


</script>

@endpush
