<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/welcome/images/favicon.png') }}">
    <title>@yield('title', 'MEDSITE')</title>

    <!-- MDBootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <style>
        body {
            background-color: #e5e6eb !important;
            min-height: 100vh;
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Navbar Styles */
        .navbar {
            transition: all 0.4s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 0;
            background-color: #1c1d26 !important;
        }

        .navbar-brand {
            transition: all 0.3s ease;
            color: #e5e6eb !important;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .nav-link {
            position: relative;
            font-weight: 500;
            color: #e5e6eb !important;
            margin: 0 0.5rem;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
        }

        .nav-link i {
            transition: transform 0.3s ease;
        }

        .nav-link:hover {
            color: #ffffff !important;
        }

        .nav-link:hover i {
            transform: translateY(-2px);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 50%;
            width: 0;
            height: 2px;
            background: #e5e6eb;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 60%;
        }

        .btn-dark {
            background-color: #15616D !important;
            border: none;
            border-radius: 50px !important;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            color: white !important;
        }

        .btn-outline-success {
            border-radius: 50px !important;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-dark:hover {
            background-color: #0d4752 !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        /* Mobile Styles */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                padding: 1rem 0;
                background: #1c1d26 !important;
                border-radius: 0.5rem;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                margin-top: 0.5rem;
            }

            .nav-item {
                margin: 0.3rem 0;
            }

            .btn-dark,
            .btn-outline-success {
                margin-top: 0.5rem;
                width: 100%;
                text-align: center;
            }
        }

        /* Toggler Styles */
        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler i {
            font-size: 1.5rem;
            color: #e5e6eb !important;
            transition: transform 0.3s ease;
        }

        .navbar-toggler[aria-expanded="true"] i {
            transform: rotate(90deg);
        }

        /* Scrolled State */
        .navbar.scrolled {
            padding: 0.4rem 0 !important;
            background-color: rgba(28, 29, 38, 0.7) !important;
            backdrop-filter: blur(8px);
        }

        .navbar.scrolled .navbar-brand {
            font-size: 0.9em;
        }

        .navbar.scrolled .nav-link {
            padding: 0.4rem 0.8rem !important;
            font-size: 0.9em;
        }

        .navbar.scrolled .btn-dark {
            padding: 0.4rem 1.2rem !important;
            font-size: 0.9em;
        }

        /* Content Padding */
        main {
            padding-top: 80px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/admin/dashboard/home') }}">
                <img id="MDB-logo" draggable="false" height="30">MEDSITE
            </a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    @guest('admin')
                        <!-- @if (Route::has('login'))
                                                                                                                    <li class="nav-item">
                                                                                                                        <a class="nav-link mx-2" href="{{ route('login') }}">
                                                                                                                            <i class="fas fa-sign-in-alt pe-2"></i>{{ __('User Login') }}
                                                                                                                        </a>
                                                                                                                    </li>
                                                                                                                @endif -->

                        <!-- @if (Route::has('register'))
                                                                                                                    <li class="nav-item ms-3">
                                                                                                                        <a class="btn btn-dark btn-rounded" href="{{ url('admin/dashboard/register') }}">
                                                                                                                            <i class="fas fa-user-plus pe-2"></i>{{ __('Register') }}
                                                                                                                        </a>
                                                                                                                    </li>
                                                                                                                @endif -->
                    @else
                        <!-- View Analytics Button (only when admin logged in) -->

                        <style>
                            .btn:hover {
                                background-color: rgb(136, 173, 181);
                                border-color: #0e4c5a;
                                transform: translateY(-1px);
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
                            }
                        </style>
                        <li class="nav-item me-2">
                            <a class="btn " style="background-color: #15616D ; color: white;"
                                href="{{ route('analytics.index') }}">
                                <i class="fas fa-chart-bar pe-2"></i>View Analytics
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="{{ route('send-sms.send-sms') }}" class="btn btn-sms">
                                Send SMS
                            </a>
                        </li>
                        <style>
                            .btn-sms {
                                background-color: #15616D;
                                color: white;
                            }
                        </style>

                        <li class="nav-item dropdown ms-2">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                                role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <span class="me-2">{{ Auth::guard('admin')->user()->name }}</span>
                                <i class="fas fa-user-shield"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard.logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <form id="logout-form" action="{{ route('admin.dashboard.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- MDBootstrap JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navbar = document.querySelector('.navbar');

            // Initialize dropdowns
            const dropdownElements = document.querySelectorAll('[data-mdb-toggle="dropdown"]');
            dropdownElements.forEach(function (dropdownElement) {
                new mdb.Dropdown(dropdownElement);
            });

            // Initialize collapse for mobile menu
            const collapseElement = document.querySelector('[data-mdb-toggle="collapse"]');
            if (collapseElement) {
                new mdb.Collapse(document.getElementById('navbarSupportedContent'), {
                    toggle: false
                });
            }

            // Scroll effect
            window.addEventListener('scroll', function () {
                if (window.scrollY > 30) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>
</body>

</html>
