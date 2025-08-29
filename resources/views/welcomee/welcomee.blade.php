<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>MEDSITE</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/welcomee/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/welcomee/css/main.css') }}" />
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/welcomee/css/noscript.css') }}" />
    </noscript>
    <style>
        /* Scroll to Top Button */
        .scroll-to-top {
            position: fixed;
            visibility: hidden;
            opacity: 0;
            right: 15px;
            bottom: 15px;
            z-index: 99999;
            width: 40px;
            height: 40px;
            border-radius: 4px;
            transition: all 0.4s;
            background-color: #15616D;
            color: white;
            display: flex;
            /* Add this */
            align-items: center;
            /* Add this - vertical centering */
            justify-content: center;
            /* Add this - horizontal centering */
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .scroll-to-top:hover {
            background-color: #0d4550;
            transform: translateY(-3px);
        }

        .scroll-to-top.visible {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>

<body class="is-preload landing">
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header">
            <h1 id="logo"><a href="#">MEDSITE</a></h1>
            <nav id="nav">
                <ul>
                    <!-- <li><a href="{{ route('register') }}" class="button primary">Sign Up</a></li>
                    <li><a href="{{ route('login') }}" class="button primary">Login</a></li> -->

                    <li><a href="{{ url('/login-register?form=register') }}" class="button primary">Sign Up</a></li>
                    <li><a href="{{ url('/login-register?form=login') }}" class="button primary">Login</a></li>

                </ul>
            </nav>
        </header>

        <!-- Banner -->
        <section id="banner">
            <div class="content">
                <header>
                    <h2>Your Safe Medication Companion</h2>
                    <p>Check drug interactions, track your meds, and stay informed — all in one place.</p>
                </header>
                <span class="image"><img src="{{ asset('assets/welcomee/images/banner2.jpg') }}" alt="" /></span>
            </div>
            <a href="#one" class="goto-next scrolly">Next</a>
        </section>

        <!-- One -->
        <section id="one" class="spotlight style1 bottom">
            <span class="image fit main"><img src="{{ asset('assets/welcomee/images/section1.jpg') }}" alt="" /></span>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-4 col-12-medium">
                            <header>
                                <h2>Why MEDSITE?</h2>
                                <p>Quickly check safe combinations and avoid harmful interactions</p>
                            </header>
                        </div>
                        <div class="col-4 col-12-medium">
                            <p>Track all your medications in one convenient place. Get timely reminders, dosage
                                guidelines, and more.</p>
                        </div>
                        <div class="col-4 col-12-medium">
                            <p>Review possible side effects, warnings, and health tips personalized to your medical
                                profile.</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#two" class="goto-next scrolly">Next</a>
        </section>

        <!-- Two -->
        <!-- <section id="two" class="spotlight style2 right">
            <span class="image fit main"><img src="{{ asset('assets/welcomee/images/section2.jpg') }}" alt="" /></span>
            <div class="content">
                <header>
                    <h2>Interaction Checker</h2>
                    <p>Instantly identify harmful drug combinations</p>
                </header>
                <p>Input multiple medications and quickly discover any potential risks, severity levels, and special warnings tailored for age, allergies, and health conditions.</p>
            </div>
            <a href="#three" class="goto-next scrolly">Next</a>
        </section>  -->

        <section id="two" class="spotlight style2 right">
            <span class="image fit main"><img src="{{ asset('assets/welcomee/images/section2.jpg') }}" alt="" /></span>
            <div class="content">
                <header>
                    <h2>Interaction Checker</h2>
                    <p>Instantly identify harmful drug combinations</p>
                </header>
                <p>With the Interaction Checker, you can input multiple medications and instantly discover any potential
                    risks or harmful drug combinations. The system evaluates and provides you with clear, comprehensive
                    information about how the drugs interact with each other, helping you avoid dangerous side effects
                    or ineffective treatments.</p>
                <ul>
                    <li><strong>Comprehensive Risk Analysis.</strong>
                    <li><strong>Severity Levels.</strong>
                    <li><strong>Personalized Warnings.</strong>
                    <li><strong>Real-Time Information.</strong>
                </ul>
                <p>Use the Interaction Checker to make safer medication choices and improve treatment effectiveness.</p>
            </div>
            <a href="#three" class="goto-next scrolly">Next</a>
        </section>

        <!-- Three -->
        <section id="three" class="spotlight style3 left">
            <span class="image fit main bottom"><img src="{{ asset('assets/welcomee/images/section3.jpg') }}"
                    alt="" /></span>
            <div class="content">
                <header>
                    <h2>Medication Tracker</h2>
                    <p>Stay organized with your personal medication schedule</p>
                </header>
                <p>With the Medication Tracker, you can maintain a simple, easy-to-follow medication calendar, track
                    dosage times, set refill reminders, and record personal medical history to keep you on top of your
                    health routine.</p>
                <ul>
                    <li><strong>Medication Calendar.</strong>
                    <li><strong>Refill Alerts.</strong>
                    <li><strong>Personal Medical History Logs.</strong>
                </ul>
                <p>Stay organized and ensure you never miss a dose with the Medication Tracker, improving medication
                    adherence and overall health management.</p>
            </div>
            <a href="#four" class="goto-next scrolly">Next</a>
        </section>

        <!-- Four -->
        <section id="four" class="wrapper style1 special fade-up">
            <div class="container">
                <header class="major">
                    <h2>Our Features</h2>
                    <p>Everything you need to safely manage your medications</p>
                </header>
                <div class="box alt">
                    <div class="row gtr-uniform">
                        <section class="col-4 col-6-medium col-12-xsmall">
                            <span class="icon solid alt major fa-notes-medical"></span>
                            <h3>Drug Facts</h3>
                        </section>
                        <section class="col-4 col-6-medium col-12-xsmall">
                            <span class="icon solid alt major fa-search"></span>
                            <h3>Interaction Checker</h3>

                        </section>
                        <section class="col-4 col-6-medium col-12-xsmall">
                            <span class="icon solid alt major fa-calendar-alt"></span>
                            <h3>Medication Calendar</h3>

                        </section>
                        <section class="col-4 col-6-medium col-12-xsmall">
                            <span class="icon solid alt major fa-heartbeat"></span>
                            <h3>Personal Health Profile</h3>

                        </section>
                        <section class="col-4 col-6-medium col-12-xsmall">
                            <span class="icon solid alt major fa-bell"></span>
                            <h3>Alerts</h3>

                        </section>
                        <section class="col-4 col-6-medium col-12-xsmall">
                            <span class="icon solid alt major fa-shield-alt"></span>
                            <h3>Privacy & Security</h3>

                        </section>
                    </div>
                </div>
            </div>
        </section>

        <!-- Five -->
        <section id="five" class="wrapper style2 special fade">
            <div class="container">
                <header>
                    <h2>Get Started With MEDSITE</h2>
                    <p>Try Our Medical Reports Simplifier!!</p>
                    <p>Upload your medical report and get clear explanations immediately</p>
                </header>
                <form method="post" action="#" class="cta">
                    <div class="row gtr-uniform gtr-50">
                        <div class="col-12" style="text-align: center;">
                            <!-- <a href="{{ route('register') }}" class="button primary">Sign Up</a> -->
                            <a href="{{ url('/upload') }}" class="button primary">See How It Works</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <footer id="footer">
            <ul class="icons">
                <li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
                <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
                <li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
            </ul>
            <ul class="copyright">
                <li>&copy; MEDSITE. All rights reserved.</li>
                </li>
            </ul>
        </footer>

    </div>
    <a href="#" id="scroll-to-top" class="scroll-to-top" title="Go to top">
        <span class="icon solid fa-arrow-up"></span>
    </a>

    <!-- Scripts -->
    <script src="{{asset('assets/welcomee/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/welcomee/js/jquery.scrolly.min.js')}}"></script>
    <script src="{{asset('assets/welcomee/js/jquery.dropotron.min.js')}}"></script>
    <script src="{{asset('assets/welcomee/js/jquery.scrollex.min.js')}}"></script>
    <script src="{{asset('assets/welcomee/js/browser.min.js')}}"></script>
    <script src="{{asset('assets/welcomee/js/breakpoints.min.js')}}"></script>
    <script src="{{asset('assets/welcomee/js/util.js')}}"></script>
    <script src="{{asset('assets/welcomee/js/main.js')}}"></script>
    <script>
        // Scroll to Top Button
        $(document).ready(function () {
            var scrollTopBtn = $('#scroll-to-top');

            // Show/hide button based on scroll position
            $(window).scroll(function () {
                if ($(this).scrollTop() > 300) { // Show after 300px of scrolling
                    scrollTopBtn.addClass('visible');
                } else {
                    scrollTopBtn.removeClass('visible');
                }
            });

            // Smooth scroll to top when clicked
            scrollTopBtn.click(function (e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: 0 }, '800');
            });
        });
    </script>


</body>

</html>