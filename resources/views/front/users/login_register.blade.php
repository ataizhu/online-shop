{{-- This page is accessed from Customer Login tab in the dropdown menu in the header (in front/layout/header.blade.php)
--}}
@extends('front.layout.layout')


@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>{{ __('site.account') }}</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">{{ __('site.home') }}</a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html">{{ __('site.account') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Account-Page -->
    <div class="page-account u-s-p-t-80">
        <div class="container">



            {{-- Displaying The Validation Errors:
            https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors AND
            https://laravel.com/docs/9.x/blade#validation-errors --}}
            {{-- Determining If An Item Exists In The Session (using has() method):
            https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
            {{-- Displaying Success Message --}}
            @if (Session::has('success_message')) <!-- Check userRegister() method in Front/UserController.php -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ __('site.success') }}:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Displaying Error Messages --}}
            @if (Session::has('error_message')) <!-- Check userRegister() method in Front/UserController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ __('site.error') }}:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Displaying Error Messages --}}
            @if ($errors->any()) <!-- Check userRegister() method in Front/UserController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ __('site.error') }}:</strong> @php echo implode('', $errors->all('<div>:message</div>')); @endphp
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



            <div class="row">
                <!-- Login -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">{{ __('site.login') }}</h2>
                        <h6 class="account-h6 u-s-m-b-30">{{ __('site.welcome_back') }}</h6>




                        {{-- Note: To show the form's Validation Error Messages (Laravel's Validation Error Messages) from
                        the AJAX call response from the server (backend), we create a <p> tag after every <input> field --}}
                            {{-- We structure and use a certain pattern so that the
                        <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the
                            jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input>
                            with the name='mobile' HTML attribute must have a
                        <p> with an id HTML attribute id="delivery-mobile" ) so that when the vaildation errors array is
                            sent as a response from backend/server (check $validator->messages() inside the method inside
                            the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery
                            $.each() loop. Check front/js/custom.js) --}}
                        <p id="login-error"></p> {{-- if the Validation passes / is okay but the login credentials provided
                        by the user are incorrect, this'll be used by jQuery to show a generic 'Wrong Credentials!' message.
                        Or to show a message when the user's account is inactive/disabled/deactivated --}}
                        <form id="loginForm" action="javascript:;" method="post"> {{-- We need to deactivate the 'action'
                            HTML attribute (using 'javascript:;' ) as we'r going to submit using an AJAX call. Check
                            front/js/custom.js --}}
                            @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests
                            --}}


                            <div class="u-s-m-b-30">
                                <label for="user-email">{{ __('site.email') }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="users-email" class="text-field"
                                    placeholder="{{ __('site.user_email') }}" name="email">
                                <p id="login-email"></p> {{-- this will be used by jQuery to show the Validation Error
                                Messages (Laravel's Validation Error Messages) from the AJAX call response from the server
                                (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile,
                                register-email, ... in order for the jQuery loop to work. And x must be identical to the
                                'name' HTML attributes (e.g. the <input> with the name='mobile' HTML attribute must have a
                                <p> with an id HTML attribute id="register-mobile" ) so that when the vaildation errors
                                    array is sent as a response from backend/server (check $validator->messages() inside the
                                    method inside the controller) to the AJAX request, they could conveniently/easily be
                                    handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-password">{{ __('site.password') }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" name="password" id="users-password" class="text-field"
                                    placeholder="{{ __('site.user_password') }}" name="password">
                                <p id="login-password"></p> {{-- this will be used by jQuery to show the Validation Error
                                Messages (Laravel's Validation Error Messages) from the AJAX call response from the server
                                (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile,
                                register-email, ... in order for the jQuery loop to work. And x must be identical to the
                                'name' HTML attributes (e.g. the <input> with the name='mobile' HTML attribute must have a
                                <p> with an id HTML attribute id="register-mobile" ) so that when the vaildation errors
                                    array is sent as a response from backend/server (check $validator->messages() inside the
                                    method inside the controller) to the AJAX request, they could conveniently/easily be
                                    handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                            </div>



                            <div class="group-inline u-s-m-b-30">

                                {{-- Remember Me Functionality --}}
                                {{-- <div class="group-1">
                                    <input type="checkbox" class="check-box" id="remember-me-token">
                                    <label class="label-text" for="remember-me-token">Remember me</label>
                                </div> --}}


                                {{-- Forgot Password Functionality --}}
                                <div class="group-2 text-right">
                                    <div class="page-anchor">
                                        <a href="{{ url('user/forgot-password') }}">
                                            <i class="fas fa-circle-o-notch u-s-m-r-9"></i>{{ __('site.lost_password') }}
                                        </a>
                                    </div>
                                </div>
                            </div>



                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100">{{ __('site.login') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login /- -->



                <!-- Register -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">{{ __('site.register') }}</h2>
                        <h6 class="account-h6 u-s-m-b-30">{{ __('site.register_text') }}</h6>



                        {{-- Registration Success Message using jQuery. Check front/js/custom.js --}}
                        {{-- <p id="register-success" style="color: green"></p> --}}
                        <p id="register-success"></p>




                        <form id="registerForm" action="javascript:;" method="post"> {{-- We need to deactivate the 'action'
                            HTML attribute (using 'javascript:;' ) as we'r going to submit using an AJAX call. Check
                            front/js/custom.js --}}
                            @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests
                            --}}


                            <div class="u-s-m-b-30">
                                <label for="username">{{ __('site.name') }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-name" class="text-field"
                                    placeholder="{{ __('site.user_name') }}" name="name">
                                {{-- <p id="register-name" style="color: red"></p> --}} {{-- this will be used by jQuery to
                                show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call
                                response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g.
                                register-mobile, register-email, ... in order for the jQuery loop to work. And x must be
                                identical to the 'name' HTML attributes (e.g. the <input> with the name='mobile' HTML
                                attribute must have a <p> with an id HTML attribute id="register-mobile" ) so that when the
                                    vaildation errors array is sent as a response from backend/server (check
                                    $validator->messages() inside the method inside the controller) to the AJAX request,
                                    they could conveniently/easily be handled by the jQuery $.each() loop. Check
                                    front/js/custom.js) --}} {{-- The pattern must be like: register-x (e.g.
                                    register-mobile, register-email, ... in order for the jQuery loop to work. And x must be
                                    identical to the 'name' HTML attributes (e.g. the <input> with the name='mobile' HTML
                                    attribute must have a
                                <p> with an id HTML attribute id="register-mobile" ) so that when the vaildation errors
                                    array is sent as a response from backend/server (check $validator->messages() inside the
                                    method inside the controller) to the AJAX request, they could conveniently/easily be
                                    handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                                <p id="register-name"></p> {{-- this will be used by jQuery to show the Validation Error
                                Messages (Laravel's Validation Error Messages) from the AJAX call response from the server
                                (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile,
                                register-email, ... in order for the jQuery loop to work. And x must be identical to the
                                'name' HTML attributes (e.g. the <input> with the name='mobile' HTML attribute must have a
                                <p> with an id HTML attribute id="register-mobile" ) so that when the vaildation errors
                                    array is sent as a response from backend/server (check $validator->messages() inside the
                                    method inside the controller) to the AJAX request, they could conveniently/easily be
                                    handled by the jQuery $.each() loop. Check front/js/custom.js) --}} {{-- The pattern
                                    must be like: register-x (e.g. register-mobile, register-email, ... in order for the
                                    jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the
                                    <input> with the name='mobile' HTML attribute must have a
                                <p> with an id HTML attribute id="register-mobile" ) so that when the vaildation errors
                                    array is sent as a response from backend/server (check $validator->messages() inside the
                                    method inside the controller) to the AJAX request, they could conveniently/easily be
                                    handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="usermobile">Mobile
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-mobile" class="text-field"
                                    placeholder="{{ __('site.user_mobile') }}" name="mobile">
                                {{-- <p id="register-mobile" style="color: red"></p> --}} {{-- this will be used by jQuery
                                to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX
                                call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g.
                                register-mobile, register-email, ... in order for the jQuery loop to work. And x must be
                                identical to the 'name' HTML attributes (e.g. the <input> with the name='mobile' HTML
                                attribute must have a <p> with an id HTML attribute id="register-mobile" ) so that when the
                                    vaildation errors array is sent as a response from backend/server (check
                                    $validator->messages() inside the method inside the controller) to the AJAX request,
                                    they could conveniently/easily be handled by the jQuery $.each() loop. Check
                                    front/js/custom.js) --}}
                                <p id="register-mobile"></p> {{-- this will be used by jQuery to show the Validation Error
                                Messages (Laravel's Validation Error Messages) from the AJAX call response from the server
                                (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile,
                                register-email, ... in order for the jQuery loop to work. And x must be identical to the
                                'name' HTML attributes (e.g. the <input> with the name='mobile' HTML attribute must have a
                                <p> with an id HTML attribute id="register-mobile" ) so that when the vaildation errors
                                    array is sent as a response from backend/server (check $validator->messages() inside the
                                    method inside the controller) to the AJAX request, they could conveniently/easily be
                                    handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="useremail">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="user-email" class="text-field" placeholder="User Email"
                                    name="email">
                                {{-- <p id="register-email" style="color: red"></p> --}} {{-- this will be used by jQuery to
                                show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call
                                response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g.
                                register-mobile, register-email, ... in order for the jQuery loop to work. And x must be
                                identical to the 'name' HTML attributes (e.g. the <input> with the name='mobile' HTML
                                attribute must have a <p> with an id HTML attribute id="register-mobile" ) so that when the
                                    vaildation errors array is sent as a response from backend/server (check
                                    $validator->messages() inside the method inside the controller) to the AJAX request,
                                    they could conveniently/easily be handled by the jQuery $.each() loop. Check
                                    front/js/custom.js) --}}
                                <p id="register-email"></p> {{-- this will be used by jQuery to show the Validation Error
                                Messages (Laravel's Validation Error Messages) from the AJAX call response from the server
                                (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile,
                                register-email, ... in order for the jQuery loop to work. And x must be identical to the
                                'name' HTML attributes (e.g. the <input> with the name='mobile' HTML attribute must have a
                                <p> with an id HTML attribute id="register-mobile" ) so that when the vaildation errors
                                    array is sent as a response from backend/server (check $validator->messages() inside the
                                    method inside the controller) to the AJAX request, they could conveniently/easily be
                                    handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="userpassword">Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="user-password" class="text-field" placeholder="User Password"
                                    name="password">
                                {{-- <p id="register-password" style="color: red"></p> --}} {{-- this will be used by jQuery
                                to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX
                                call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g.
                                register-mobile, register-email, ... in order for the jQuery loop to work. And x must be
                                identical to the 'name' HTML attributes (e.g. the <input> with the name='mobile' HTML
                                attribute must have a <p> with an id HTML attribute id="register-mobile" ) so that when the
                                    vaildation errors array is sent as a response from backend/server (check
                                    $validator->messages() inside the method inside the controller) to the AJAX request,
                                    they could conveniently/easily be handled by the jQuery $.each() loop. Check
                                    front/js/custom.js) --}}
                                <p id="register-password"></p> {{-- this will be used by jQuery to show the Validation Error
                                Messages (Laravel's Validation Error Messages) from the AJAX call response from the server
                                (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile,
                                register-email, ... in order for the jQuery loop to work. And x must be identical to the
                                'name' HTML attributes (e.g. the <input> with the name='mobile' HTML attribute must have a
                                <p> with an id HTML attribute id="register-mobile" ) so that when the vaildation errors
                                    array is sent as a response from backend/server (check $validator->messages() inside the
                                    method inside the controller) to the AJAX request, they could conveniently/easily be
                                    handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                            </div>
                            <div class="u-s-m-b-30"> {{-- "I've read and accept the terms & conditions" Checkbox --}}
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                <label class="label-text no-color" for="accept">{{ __('site.read_accept_terms') }}
                                    <a href="terms-and-conditions.html"
                                        class="u-c-brand">{{ __('site.terms_and_conditions') }}</a>
                                </label>
                                {{-- <p id="register-accept" style="color: red"></p> --}} {{-- this will be used by jQuery
                                to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX
                                call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g.
                                register-mobile, register-email, ... in order for the jQuery loop to work. And x must be
                                identical to the 'name' HTML attributes (e.g. the <input> with the name='mobile' HTML
                                attribute must have a <p> with an id HTML attribute id="register-mobile" ) so that when the
                                    vaildation errors array is sent as a response from backend/server (check
                                    $validator->messages() inside the method inside the controller) to the AJAX request,
                                    they could conveniently/easily be handled by the jQuery $.each() loop. Check
                                    front/js/custom.js) --}}
                                <p id="register-accept"></p> {{-- this will be used by jQuery to show the Validation Error
                                Messages (Laravel's Validation Error Messages) from the AJAX call response from the server
                                (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile,
                                register-email, ... in order for the jQuery loop to work. And x must be identical to the
                                'name' HTML attributes (e.g. the <input> with the name='mobile' HTML attribute must have a
                                <p> with an id HTML attribute id="register-mobile" ) so that when the vaildation errors
                                    array is sent as a response from backend/server (check $validator->messages() inside the
                                    method inside the controller) to the AJAX request, they could conveniently/easily be
                                    handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                            </div>

                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">{{ __('site.register') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register /- -->
            </div>
        </div>
    </div>
    <!-- Account-Page /- -->
@endsection