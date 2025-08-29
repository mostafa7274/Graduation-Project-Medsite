<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('assets/welcome/images/favicon.png') }}">
    <title>MEDSITE</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,400,600" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            font-family: "Montserrat", sans-serif;
            background: #1c1d26;
        }

        .container {
            max-width: 900px;
        }

        a {
            display: inline-block;
            text-decoration: none;
        }

        input {
            outline: none !important;
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 40px;
            font-weight: 700;
        }

        section#formHolder {
            padding: 50px 0;
            padding-top: 125px;
        }

        .brand {
            padding: 20px;
            background: url(https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-1.2.1&w=1920&q=80);
            background-size: cover;
            background-position: center center;
            color: #fff;
            min-height: 540px;
            position: relative;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.6s cubic-bezier(1, -0.375, 0.285, 0.995);
            z-index: 9999;
        }

        .brand.active {
            width: 100%;
        }

        .brand::before {
            content: "";
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.85);
            z-index: -1;
        }

        .brand a.logo {
            color: #15616D;
            font-size: 20px;
            font-weight: 700;
            text-decoration: none;
            line-height: 1em;
        }

        .brand a.logo span {
            font-size: 30px;
            color: #fff;
            transform: translateX(-5px);
            display: inline-block;
        }

        .brand .heading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            transition: all 0.6s;
        }

        .brand .heading.active {
            top: 100px;
            left: 100px;
            transform: translate(0);
        }

        .brand .heading h2 {
            font-size: 70px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 0;
        }

        .brand .heading p {
            font-size: 15px;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 2px;
            white-space: 4px;
            font-family: "Raleway", sans-serif;
        }

        .brand .success-msg {
            width: 100%;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin-top: 60px;
            display: none;
        }

        .brand .success-msg p {
            font-size: 25px;
            font-weight: 400;
            font-family: "Raleway", sans-serif;
        }

        .brand .success-msg a {
            font-size: 12px;
            text-transform: uppercase;
            padding: 8px 30px;
            background: #15616D;
            text-decoration: none;
            color: #fff;
            border-radius: 30px;
        }

        .brand .success-msg p,
        .brand .success-msg a {
            transition: all 0.9s;
            transform: translateY(20px);
            opacity: 0;
        }

        .brand .success-msg p.active,
        .brand .success-msg a.active {
            transform: translateY(0);
            opacity: 1;
        }

        .form {
            position: relative;
        }

        .form .form-peice {
            background: #fff;
            min-height: 480px;
            margin-top: 30px;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
            color: #bbbbbb;
            padding: 30px 0 60px;
            transition: all 0.9s cubic-bezier(1, -0.375, 0.285, 0.995);
            position: absolute;
            top: 0;
            left: -30%;
            width: 130%;
            overflow: hidden;
        }

        .form .form-peice.switched {
            transform: translateX(-100%);
            width: 100%;
            left: 0;
        }

        .form form {
            padding: 0 40px;
            margin: 0;
            width: 70%;
            position: absolute;
            top: 50%;
            left: 60%;
            transform: translate(-50%, -50%);
        }

        .form form .form-group {
            margin-bottom: 5px;
            position: relative;
        }

        .form form .form-group.hasError input {
            border-color: #15616D !important;
        }

        .form form .form-group.hasError label {
            color: #15616D !important;
        }

        .form form label {
            font-size: 12px;
            font-weight: 400;
            text-transform: uppercase;
            font-family: "Montserrat", sans-serif;
            transform: translateY(40px);
            transition: all 0.4s;
            cursor: text;
            z-index: -1;
        }

        .form form label.active {
            transform: translateY(10px);
            font-size: 10px;
        }

        .form form label.fontSwitch {
            font-family: "Raleway", sans-serif !important;
            font-weight: 600;
        }

        .form form input:not([type=submit]) {
            background: none;
            outline: none;
            border: none;
            display: block;
            padding: 10px 0;
            width: 100%;
            border-bottom: 1px solid #eee;
            color: #444;
            font-size: 15px;
            font-family: "Montserrat", sans-serif;
            z-index: 1;
        }

        .form form input:not([type=submit]).hasError {
            border-color: #15616D;
        }

        .form form span.error {
            color: #15616D;
            font-family: "Montserrat", sans-serif;
            font-size: 12px;
            position: absolute;
            bottom: -20px;
            right: 0;
            display: none;
        }

        .form form input[type=password] {
            color: #15616D;
        }

        .form form .CTA {
            margin-top: 30px;
        }

        .form form .CTA input {
            font-size: 12px;
            text-transform: uppercase;
            padding: 5px 30px;
            background: #15616D;
            color: #fff;
            border-radius: 30px;
            margin-right: 20px;
            border: none;
            font-family: "Montserrat", sans-serif;
        }

        .form form .CTA a.switch {
            font-size: 13px;
            font-weight: 400;
            font-family: "Montserrat", sans-serif;
            color: #bbbbbb;
            text-decoration: underline;
            transition: all 0.3s;
        }

        .form form .CTA a.switch:hover {
            color: #15616D;
        }

        /* Additional Options Styling */
        .additional-options {
            margin-top: 20px;
            font-family: "Montserrat", sans-serif;
        }

        .option-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .remember-me {
            position: relative;
            display: inline-flex;
            align-items: center;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #555;
            height: 14px;
        }

        .remember-me label {
            display: flex;
            align-items: center;
            margin: 0;
            cursor: pointer;
            height: 100%;
        }

        .remember-checkbox {
            margin-right: 8px;
            width: 14px;
            height: 14px;
            appearance: none;
            -webkit-appearance: none;
            border: 1px solid #bbb;
            border-radius: 2px;
            cursor: pointer;
            flex-shrink: 0;
            position: relative;
            top: 0;
            left: 0;
            margin: 0 8px 0 0;
            padding: 0;
        }

        .remember-checkbox:checked {
            background-color: #15616D;
            border-color: #15616D;
        }

        .remember-checkbox:checked::after {
            content: "";
            display: block;
            position: absolute;
            left: 4px;
            top: 1px;
            width: 4px;
            height: 8px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .remember-me span {
            display: inline-block;
            position: relative;
            top: 0;
            left: 0;
            line-height: 1;
        }

        .forgot-password {
            font-size: 13px;
            color: #777;
            text-decoration: none;
            transition: color 0.3s;
        }

        .forgot-password:hover {
            color: #15616D;
        }

        .admin-login {
            display: block;
            width: 100%;
            padding: 8px 0;
            text-align: center;
            border: 1px solid #ddd;
            color: #555;
            text-decoration: none;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .admin-login:hover {
            background-color: #f8f9fa;
            color: #333;
        }

        footer {
            text-align: center;
        }

        footer p {
            color: #777;
        }

        footer p a,
        footer p a:focus {
            color: #b8b09f;
            transition: all 0.3s;
            text-decoration: none !important;
        }

        footer p a:hover,
        footer p a:focus:hover {
            color: #15616D;
        }

        @media (max-width: 768px) {
            .container {
                overflow: hidden;
            }

            section#formHolder {
                padding: 0;
            }

            section#formHolder div.brand {
                min-height: 200px !important;
            }

            section#formHolder div.brand.active {
                min-height: 100vh !important;
            }

            section#formHolder div.brand .heading.active {
                top: 200px;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            section#formHolder div.brand .success-msg p {
                font-size: 16px;
            }

            section#formHolder div.brand .success-msg a {
                padding: 5px 30px;
                font-size: 10px;
            }

            section#formHolder .form {
                width: 80vw;
                min-height: 500px;
                margin-left: 10vw;
            }

            section#formHolder .form .form-peice {
                margin: 0;
                top: 0;
                left: 0;
                width: 100% !important;
                transition: all 0.5s ease-in-out;
            }

            section#formHolder .form .form-peice.switched {
                transform: translateY(-100%);
                width: 100%;
                left: 0;
            }

            section#formHolder .form .form-peice>form {
                width: 100% !important;
                padding: 60px;
                left: 50%;
            }

            .additional-options {
                margin-top: 15px;
            }
        }

        @media (max-width: 480px) {
            section#formHolder .form {
                width: 100vw;
                margin-left: 0;
            }

            h2 {
                font-size: 50px !important;
            }

            .brand .heading h2 {
                font-size: 40px !important;
            }

            .option-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .forgot-password {
                margin-top: 10px;
            }
        }

        /* Button hover effects */
        .CTA input[type="submit"]:hover,
        .CTA input[type="submit"]:focus,
        .success-msg a:hover,
        .success-msg a:focus,
        .admin-login:hover,
        .admin-login:focus {
            box-shadow: inset 0 0 0 1px #15616D;
            color: #15616D !important;
        }

        /* Active state */
        .CTA input[type="submit"]:active,
        .success-msg a:active,
        .admin-login:active {
            background-color: rgba(228, 76, 101, 0.15);
        }

        /* Primary button hover effect */
        .CTA input[type="submit"]:hover,
        .CTA input[type="submit"]:focus,
        .success-msg a:hover,
        .success-msg a:focus {
            background-color: #99b6bb;
            color: #fff !important;
        }

        /* Transitions */
        .CTA input[type="submit"],
        .success-msg a,
        .admin-login {
            transition: all 0.2s ease-in-out;
        }

        /* Brand section animation */
        .brand {
            transition: all 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            transform-origin: left center;
        }

        .brand.active {
            transform: scaleX(1.1);
            transition: all 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        /* Success message animation */
        .success-msg {
            opacity: 0;
            height: 0;
            overflow: hidden;
            transition: all 0.6s ease-out;
        }

        .success-msg.show {
            opacity: 1;
            height: auto;
            transition: all 0.6s ease-out;
        }

        .success-msg p,
        .success-msg a {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .success-msg p.active {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.4s;
        }

        .success-msg a.active {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.8s;
        }
    </style>
</head>

<body>
    <div class="container">
        <section id="formHolder">
            <div class="row">
                <!-- Brand Box -->
                <div class="col-sm-6 brand">
                    <a href="#" class="logo"> <span></span></a>
                    <div class="heading">
                        <h2>MEDSITE</h2>
                        <p>Your Personal Medication Safety Companion.</p>
                    </div>
                    <div class="success-msg">
                        <p>Great! You are one of our members now</p>
                        <a href="{{ url('/home') }}" class="profile">Your Profile</a>
                    </div>
                </div>

                <!-- Form Box -->
                <div class="col-sm-6 form">
                    <!-- Login Form -->
                    <div
                        class="login form-peice @if($errors->has('email') || $errors->has('auth_failed') || !$errors->any()) switched @endif">
                        <form class="login-form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- General authentication error message -->
                            @if($errors->has('auth_failed'))
                                <div class="form-group hasError" style="margin-bottom: 25px;">
                                    <span class="error"
                                        style="display: block; position: static; color: #15616D; font-size: 13px;">
                                        The email or password you entered is incorrect.
                                    </span>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="loginemail">{{ __('Email Address') }}</label>
                                <input id="loginemail" type="email" class="@error('email') hasError @enderror"
                                    name="email" value="{{ session('login_email') ?? old('email') }}" required
                                    autocomplete="email" autofocus>
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="loginPassword">{{ __('Password') }}</label>
                                <input id="loginPassword" type="password" class="@error('password') hasError @enderror"
                                    name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="CTA">
                                <input type="submit" value="{{ __('Login') }}">
                                <a href="#" class="switch">{{ __("I'm New") }}</a>
                            </div>

                            <!-- Additional options -->
                            <div class="additional-options">
                                <div class="option-row">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forgot-password">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <br>
                                <a href="{{ route('auth.google') }}" class="admin-login">
                                    <i class="fab fa-google me-2"></i>{{ __('Login with Google') }}
                                </a>
                                <a href="{{ url('admin/dashboard/register') }}" class="admin-login">
                                    {{ __('ADMIN') }}
                                </a>
                            </div>
                        </form>
                    </div>
                    <!-- End Login Form -->

                    <!-- Register Form -->

                    <!-- <div class="signup form-peice @if($errors->has('name')) switched @endif">
                        <form class="signup-form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{ __('Full Name') }}</label>
                                <input id="name" type="text" class="name @error('name') hasError @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="email @error('email') hasError @enderror"
                                    name="email" value="{{ $errors->has('name') ? old('email') : '' }}" required
                                    autocomplete="email">
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="pass @error('password') hasError @enderror"
                                    name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="passConfirm"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="CTA">
                                <input type="submit" value="{{ __('Register') }}" id="submit">
                                <a href="#" class="switch">{{ __('I have an account') }}</a>
                            </div>
                        </form>
                    </div> -->
                    <!-- End Signup Form -->
                    <!-- Register Form -->
                    <div class="signup form-peice @if($errors->has('name')) switched @endif">
                        <form class="signup-form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- General registration error message -->
                            <!-- @if($errors->any() && !$errors->has('auth_failed'))
                                <div class="form-group hasError" style="margin-bottom: 25px;">
                                    <span class="error"
                                        style="display: block; position: static; color: #15616D; font-size: 13px;">
                                        @if($errors->has('name'))
                                            Please check your registration details
                                        @elseif($errors->has('email'))
                                            There was a problem with your email
                                        @elseif($errors->has('password'))
                                            Password requirements not met
                                        @else
                                            Please correct the errors below
                                        @endif
                                    </span>
                                </div>
                            @endif -->
                            <div class="form-error-message" style="display: none; margin-bottom: 25px;">
                                <span class="error"
                                    style="display: block; position: static; color: #15616D; font-size: 13px;"></span>
                            </div>

                            <div class="form-group">
                                <label for="name">{{ __('Full Name') }}</label>
                                <input id="name" type="text" class="name @error('name') hasError @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="error"
                                        style="display: block; position: static; color: #15616D; font-size: 13px;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="email @error('email') hasError @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="error"
                                        style="display: block; position: static; color: #15616D; font-size: 13px;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="pass @error('password') hasError @enderror"
                                    name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="error"
                                        style="display: block; position: static; color: #15616D; font-size: 13px;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="passConfirm"
                                    name="password_confirmation" required autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="error"
                                        style="display: block; position: static; color: #15616D; font-size: 13px;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="CTA">
                                <input type="submit" value="{{ __('Register') }}" id="submit">
                                <a href="#" class="switch">{{ __('I have an account') }}</a>
                            </div>
                        </form>
                    </div>
                    <!-- End Signup Form -->

                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function () {
            'use strict';

            var formHasErrors = false;

            // Detect browser for css purpose
            if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
                $('.form form label').addClass('fontSwitch');
            }

            // Initialize label positions based on existing values
            $('input').each(function () {
                if ($(this).val().length > 0) {
                    $(this).siblings('label').addClass('active');
                }
            });

            // Label effect
            $('input').focus(function () {
                $(this).siblings('label').addClass('active');
            }).blur(function () {
                if ($(this).val().length === 0) {
                    $(this).siblings('label').removeClass('active');
                }
                validateField($(this));
            });

            // Handle URL parameter to switch forms
            const urlParams = new URLSearchParams(window.location.search);
            const formParam = urlParams.get('form');

            if (formParam === 'register') {
                // Switch to register form
                $('.login').addClass('switched');
                $('.signup').removeClass('switched');
            } else if (formParam === 'login') {
                // Switch to login form (default)
                $('.login').removeClass('switched');
                $('.signup').addClass('switched');
            }

            // Form validation
            function validateField(field) {
                const value = field.val().trim();
                const fieldClass = field.attr('class');
                const formGroup = field.closest('.form-group');

                // Clear individual field errors
                formGroup.removeClass('hasError');

                // Validate based on field class
                if (fieldClass.includes('name')) {
                    if (value.length === 0) {
                        setFormError('Full name is required');
                        formGroup.addClass('hasError');
                    } else if (value.length <= 6) {
                        setFormError('Name must be at least 6 characters');
                        formGroup.addClass('hasError');
                    }
                }
                else if (fieldClass.includes('email')) {
                    if (value.length === 0) {
                        setFormError('Email address is required');
                        formGroup.addClass('hasError');
                    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                        setFormError('Please enter a valid email address');
                        formGroup.addClass('hasError');
                    }
                }
                else if (fieldClass.includes('pass') && !fieldClass.includes('passConfirm')) {
                    if (value.length < 8) {
                        setFormError('Password must be at least 8 characters');
                        formGroup.addClass('hasError');
                    }
                }
                else if (fieldClass.includes('passConfirm')) {
                    const password = $('.pass').val();
                    if (value !== password) {
                        setFormError('Passwords do not match');
                        formGroup.addClass('hasError');
                    }
                }

                // If no errors found after validating all fields
                if ($('.hasError').length === 0) {
                    clearFormError();
                }
            }

            function setFormError(message) {
                formHasErrors = true;
                $('.form-error-message').text(message).show();
            }

            function clearFormError() {
                formHasErrors = false;
                $('.form-error-message').hide();
            }

            // Form switch
            $('a.switch').click(function (e) {
                e.preventDefault();
                clearFormError();
                $(this).toggleClass('active');

                if ($(this).hasClass('active')) {
                    $(this).parents('.form-peice').addClass('switched')
                        .siblings('.form-peice').removeClass('switched');
                } else {
                    $(this).parents('.form-peice').removeClass('switched')
                        .siblings('.form-peice').addClass('switched');
                }
            });

            // Form submit - for both login and register forms
            $('form.login-form, form.signup-form').submit(function (event) {
                // For register form, validate all fields before submit
                if ($(this).hasClass('signup-form')) {
                    $('.name, .email, .pass, .passConfirm').trigger('blur');
                }

                if (formHasErrors) {
                    event.preventDefault();
                } else {
                    // Show success message and animate brand section
                    $('.success-msg').show();
                    $('.form').hide();
                    $('.brand').addClass('active');

                    // Extended animation sequence
                    setTimeout(function () {
                        $('.success-msg p').addClass('active');
                    }, 4000); // Message appears after 400ms

                    setTimeout(function () {
                        $('.success-msg a').addClass('active');
                    }, 4000); // Button appears after 800ms

                    // Keep the stretched state visible for 3 seconds total
                    setTimeout(function () {
                        // Optional: Add redirect logic here
                        // window.location.href = "/profile";
                    }, 4000);
                }
            });

            // Auto-switch forms based on Laravel validation errors
            @if($errors->has('name'))
                setFormError('{{ $errors->first('name') }}');
                $('.login-form').parents('.form-peice').addClass('switched');
                $('.signup-form').parents('.form-peice').removeClass('switched');
            @elseif($errors->has('email'))
                setFormError('{{ $errors->first('email') }}');
                $('.login-form').parents('.form-peice').addClass('switched');
                $('.signup-form').parents('.form-peice').removeClass('switched');
            @elseif($errors->has('password'))
                setFormError('{{ $errors->first('password') }}');
                $('.login-form').parents('.form-peice').addClass('switched');
                $('.signup-form').parents('.form-peice').removeClass('switched');
            @elseif($errors->has('auth_failed'))
                $('.login-form').parents('.form-peice').removeClass('switched');
                $('.signup-form').parents('.form-peice').addClass('switched');
                $('.signup-form input.email').val('');
            @endif

            // Show success message after registration/login if no errors
            @if(session('status') && $errors->count() == 0)
                $('.success-msg').show();
                $('.form').hide();
                $('.brand').addClass('active');

                setTimeout(function () {
                    $('.success-msg p').addClass('active');
                }, 4000);

                setTimeout(function () {
                    $('.success-msg a').addClass('active');
                }, 4000);
            @endif
});
    </script>
</body>