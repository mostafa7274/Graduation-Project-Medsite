<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('assets/welcome/images/favicon.png') }}">
    <title>MEDSITE - Reset Password</title>

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

        .login-link {
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

        .login-link:hover {
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
        }

        /* Button hover effects */
        .CTA input[type="submit"]:hover,
        .CTA input[type="submit"]:focus,
        .success-msg a:hover,
        .success-msg a:focus,
        .login-link:hover,
        .login-link:focus {
            box-shadow: inset 0 0 0 1px #15616D;
            color: #15616D !important;
        }

        /* Active state */
        .CTA input[type="submit"]:active,
        .success-msg a:active,
        .login-link:active {
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
        .login-link {
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
                        <p>Reset Your Password</p>
                    </div>
                    <div class="success-msg">
                        <p>Password reset link sent!</p>
                        <p>Check your email for instructions.</p>
                        <a href="{{ route('login') }}" class="profile">Return to Login</a>
                    </div>
                </div>

                <!-- Form Box -->
                <div class="col-sm-6 form">
                    <!-- Reset Form -->
                    <div class="reset form-peice">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            @if (session('status'))
                                <div class="form-group" style="margin-bottom: 25px;">
                                    <span style="display: block; position: static; color: #15616D; font-size: 13px;">
                                        {{ session('status') }}
                                    </span>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="form-group hasError" style="margin-bottom: 25px;">
                                    <span class="error"
                                        style="display: block; position: static; color: #15616D; font-size: 13px;">
                                        @if($errors->has('email'))
                                            {{ $errors->first('email') }}
                                        @else
                                            Please enter a valid email address
                                        @endif
                                    </span>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="@error('email') hasError @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="CTA">
                                <input type="submit" value="{{ __('Send Reset Link') }}">
                            </div>

                            <div class="additional-options">
                                <a href="{{ route('login-register') }}" class="login-link">
                                    {{ __('Back to Login') }}
                                </a>
                            </div>
                        </form>
                    </div>
                    <!-- End Reset Form -->
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function () {
            'use strict';

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
            });

            // Form submit
            $('form').submit(function (event) {
                // If form is valid, show success animation
                if ($(this).find('.hasError').length === 0) {
                    // Show success message and animate brand section
                    $('.success-msg').show();
                    $('.form').hide();
                    $('.brand').addClass('active');

                    // Extended animation sequence
                    setTimeout(function () {
                        $('.success-msg p').addClass('active');
                    }, 400); // Message appears after 400ms

                    setTimeout(function () {
                        $('.success-msg a').addClass('active');
                    }, 800); // Button appears after 800ms
                }
            });

            // Auto-focus email field if there's an error
            @if($errors->any())
                $('#email').focus();
            @endif

            // If there's a status message, show success animation
            @if(session('status'))
                $('.success-msg').show();
                $('.form').hide();
                $('.brand').addClass('active');

                setTimeout(function () {
                    $('.success-msg p').addClass('active');
                }, 400);

                setTimeout(function () {
                    $('.success-msg a').addClass('active');
                }, 800);
            @endif
        });
    </script>
</body>

</html>