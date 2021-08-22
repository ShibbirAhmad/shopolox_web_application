@extends('frontend.layouts.app')

@section('title', 'login with otp')

@section('content')
    @parent

    <div class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>OTP Login</li>
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
                    {{-- login form start --}}
                     <form method="POST" id="user_otp_login_form"  action="{{ route('send_otp') }}">
                        <div class="form_inside">
                            <div class="ps-form__content">
                                <h5>Submit your Number</h5>
                                <div class="form-group">
                                    <input maxlength="11" class="form-control" name="phone" required type="text" placeholder="01xxxxxxxxx">
                                </div>
                                <div class="form-group submtit">
                                    <button  class="ps-btn ps-btn--fullwidth">Submit</button>
                                </div>
                            </div>
                            <div class="ps-form__footer">
                                 <a href="{{ route('login') }}">Login with password</a>
                            </div>
                        </div>
                     </form>
                    {{-- login form end --}}


                     {{-- register form start  --}}
                     <form method="POST" id="user_otp_validation_form" class="form_display_toggle" action="{{ route('verify_otp') }}">
                        <div class="form_inside">
                            <div class="ps-form__content">
                                <h5>Verirfy OTP Code</h5>
                                <div class="form-group">
                                    <input maxlength="4" class="form-control" name="code" required type="text" placeholder="xxxx">
                                </div>
                                <div class="form-group submtit">
                                    <button  class="ps-btn ps-btn--fullwidth">Verify</button>
                                </div>
                            </div>
                            <div class="ps-form__footer">
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

  
    


</script>

@endpush
