<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDSITE</title>
    <link rel="stylesheet" href="{{asset('assets/drug-interaction-inline/plugins/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/drug-interaction-inline/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/drug-interaction-inline/plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/drug-interaction-inline/plugins/slick/slick-theme.css')}}">
    <link rel="stylesheet"
        href="{{asset('assets/drug-interaction-inline/plugins/themefisher-fonts/css/themefisher-fonts.min.css')}}">

    <!-- Theme Stylesheet -->
    <link rel="stylesheet" href="#" id="color-changer">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/drug-interaction-inline/css/style.css')}}">
</head>

<body><!-- set class="dark" on body tag for DARK-THEME -->

    <!-- <div class="preloader">
        <div class="loading-mask"></div>
        <div class="loading-mask"></div>
        <div class="loading-mask"></div>
        <div class="loading-mask"></div>
        <div class="loading-mask"></div>
    </div> -->

    <!-- <div class="preview-wrapper">
        <div class="switcher-head">
            <span>Style Switcher</span>
            <div class="switcher-trigger tf-tools"></div>
        </div>

        <div class="switcher-body">
            <h4>Choose Color:</h4>
            <ul class="color-options list-none">
                <li class="c0" data-color="red" title="Default">Default</li>
                <li class="c1" data-color="blue" title="Blue">Blue</li>
                <li class="c2" data-color="green" title="Green">Green</li>
                <li class="c3" data-color="yellow" title="Yellow">Yellow</li>
            </ul>
        </div>
    </div> -->

    <main class="site-wrapper">
        <div class="pt-table">
            <div class="pt-tablecell page-home relative" style="background-image: url('images/medical-banner.jpg');">
                <div class="overlay"></div>

                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                            <div class="page-title home text-center">

                                <h1>
                                    <p>Your trusted medication safety platform providing drug interaction checks and
                                        pharmaceutical guidance for safer healthcare decisions.</p>
                                </h1>
                            </div>

                            <div class="hexagon-menu clear">
                                <div class="hexagon-item">
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <a href="{{ url('/drug-interaction-checker') }}" class="hex-content">
                                        <span class="hex-content-inner">
                                            <span class="icon">
                                                <i class="tf-dial"></i>
                                            </span>
                                            <span class="title">Interaction Checker</span>
                                        </span>
                                        <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                                fill="#1e2530"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="hexagon-item">
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <a href="medication-guide.html" class="hex-content">
                                        <span class="hex-content-inner">
                                            <span class="icon">
                                                <i class="tf-profile-male"></i>
                                            </span>
                                            <span class="title">Medication Guide</span>
                                        </span>
                                        <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                                fill="#1e2530"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="hexagon-item">
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <a href="side-effects.html" class="hex-content">
                                        <span class="hex-content-inner">
                                            <span class="icon">
                                                <i class="tf-tools-2"></i>
                                            </span>
                                            <span class="title">Side Effects</span>
                                        </span>
                                        <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                                fill="#1e2530"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="hexagon-item">
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <a href="dosage-calculator.html" class="hex-content">
                                        <span class="hex-content-inner">
                                            <span class="icon">
                                                <i class="tf-tools"></i>
                                            </span>
                                            <span class="title">Dosage Calculator</span>
                                        </span>
                                        <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                                fill="#1e2530"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="hexagon-item">
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <a href="pharmacy-resources.html" class="hex-content">
                                        <span class="hex-content-inner">
                                            <span class="icon">
                                                <i class="tf-briefcase2"></i>
                                            </span>
                                            <span class="title">Pharmacy Resources</span>
                                        </span>
                                        <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                                fill="#1e2530"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="hexagon-item">
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <a href="patient-stories.html" class="hex-content">
                                        <span class="hex-content-inner">
                                            <span class="icon">
                                                <i class="tf-chat"></i>
                                            </span>
                                            <span class="title">Patient Stories</span>
                                        </span>
                                        <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                                fill="#1e2530"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="hexagon-item">
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <div class="hex-item">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <a href="contact-pharmacist.html" class="hex-content">
                                        <span class="hex-content-inner">
                                            <span class="icon">
                                                <i class="tf-envelope2"></i>
                                            </span>
                                            <span class="title">Contact Pharmacist</span>
                                        </span>
                                        <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                                fill="#1e2530"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div> <!-- /.hexagon-menu -->

                        </div> <!-- /.col-xs-12 -->

                    </div> <!-- /.row -->
                </div> <!-- /.container -->

            </div> <!-- /.pt-tablecell -->
        </div> <!-- /.pt-table -->
    </main> <!-- /.site-wrapper -->

    <script src="{{asset('assets/drug-interaction-inline/plugins/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('assets/drug-interaction-inline/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/drug-interaction-inline/plugins/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('assets/drug-interaction-inline/plugins/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/drug-interaction-inline/plugins/slick/slick.min.js')}}"></script>
    <script src="{{asset('assets/drug-interaction-inline/js/script.js')}}"></script>


</body>

</html>