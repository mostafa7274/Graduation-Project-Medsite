
<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>MEDSITE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="icon" type="image/png" href="{{ asset('assets/welcome/images/favicon.png') }}">
		<link rel="stylesheet" href="{{ asset('assets/welcome/css/main.css') }}" />
		<noscript><link rel="stylesheet" href="{{ asset('assets/welcome/css/noscript.css') }}" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="#">MEDSITE</a></h1>
						<!-- <nav>
							<a href="#menu">Menu</a>
						</nav> -->
					</header>

				<!-- Menu -->
				<!--	<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a href="index.html">Home</a></li>
								<li><a href="generic.html">Generic</a></li>
								<li><a href="elements.html">Elements</a></li>
								<li><a href="#">Log In</a></li>
								<li><a href="#">Sign Up</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav> -->

				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<div class="logo"><span class="fas fa-medkit fa-3x"></span></div>
							<h2>Welcome to MEDSITE</h2>
							<p>Your personal guide to safe medication management.</p>
                            <p>Protect your health. <br>
                             avoid harmful drug combinations. <br>
                             stay informed. <br>
                             anytime & anywhere.</p>
						</div>
					</section>

				<!-- Wrapper -->
					<section id="wrapper">

						<!-- One -->
							<section id="one" class="wrapper spotlight style1">
								<div class="inner">
									<a href="#" class="image"><img src="{{ asset('assets/welcome/images/pic01.jpg') }}" alt="" /></a>
									<div class="content">
                                    <h2 class="major">Why Medication Safety Matters</h2>
                                    <p>Every year, medication errors harm millions worldwide.</p>
                                    <p>MEDSITE helps you track your prescriptions, monitor possible drug interactions, and stay ahead of potential health risks with reliable, easy-to-understand alerts and advices.</p>
                                    <!--<a href="#" class="special">Get Started</a> -->
									</div>
								</div>
							</section>

						<!-- Two -->
							<section id="two" class="wrapper alt spotlight style2">
								<div class="inner">
									<a href="#" class="image"><img src="{{ asset('assets/welcome/images/pic02.jpg') }}" alt="" /></a>
									<div class="content">
                                    <h2 class="major">Check for Drug Interactions Instantly</h2>
                                    <p>Use our advanced interaction checker to instantly assess the safety of combining two medications together. </p>
                                    <p>View severity levels, health warnings, and alternative recommendations — tailored to your medical history and personal conditions.</p>
									<!--<a href="#" class="special">Learn more</a> -->
									</div>
								</div>
							</section>

						<!-- Three -->
							<section id="three" class="wrapper spotlight style3">
								<div class="inner">
									<a href="#" class="image"><img src="{{ asset('assets/welcome/images/pic03.jpg') }}" alt="" /></a>
									<div class="content">
                                    <h2 class="major">Personalized Health Profile</h2>
                                    <p>Sign up and create a detailed medical profile with your allergies, chronic illnesses, pregnancy status, and more.</p>
                                    <p>MEDSITE uses this information to deliver customized medication safety alerts tailored just for you.</p>
                                    <!-- <a href="#" class="special">Create Your Profile</a> -->
									</div>
								</div>
							</section>

						<!-- Four -->
							<section id="four" class="wrapper alt style1">
                            <div class="inner">
                                <h2 class="major">Key Features You’ll Love</h2>
                                <p>Designed to support your health and well-being, MEDSITE is packed with tools to help you safely manage your medications and stay informed about potential risks.</p>
                                <section class="features">
                                    <article>
                                        <a href="#" class="image"><img src="{{ asset('assets/welcome/images/pic04.jpg') }}" alt="Drug Tracker" /></a>
                                        <h3 class="major">Drug Tracker & Calendar</h3>
                                        <p>Keep track of your daily medications, set reminders, and review your treatment history with our interactive calendar view.</p>
                                        <!-- <a href="#" class="special">View Tracker</a> -->
                                    </article>
                                    <article>
                                        <a href="#" class="image"><img src="{{ asset('assets/welcome/images/pic05.jpg') }}" alt="Interaction Warnings" /></a>
                                        <h3 class="major">Interaction Severity Alerts</h3>
                                        <p>Receive color-coded risk notifications based on drug combinations and personal health data, including allergies and pregnancy status.</p>
                                        <!-- <a href="#" class="special">Check Interactions</a> -->
                                    </article>
                                    <article>
                                        <a href="#" class="image"><img src="{{ asset('assets/welcome/images/pic06.jpg') }}" alt="Medical History" /></a>
                                        <h3 class="major">Complete Medical History</h3>
                                        <p>Record chronic conditions, known allergies, and previous adverse drug reactions — so your interaction checks are always accurate and personalized.</p>
                                        <!-- <a href="#" class="special">Add History</a> -->
                                    </article>
                                    <article>
                                        <a href="#" class="image"><img src="{{ asset('assets/welcome/images/pic07.jpg') }}" alt="FAQs & Tips" /></a>
                                        <h3 class="major">Medication Facts & FAQs</h3>
                                        <p>Stay educated with up-to-date facts about common medications, safe practices, and frequently asked questions, all in one place.</p>
                                        <!-- <a href="#" class="special">Explore Now</a> -->
                                    </article>
                                </section>
									<ul class="actions">
										<li><a href="{{ route('register') }}" class="button">Get Started</a></li>
									</ul>
								</div>
							</section>

					</section>

				<!-- Footer -->
                    <section id="footer">
						<div class="inner">
							<h2 class="major">Get in Touch</h2>
							<p>Have a question, feature request, or feedback? We’d love to hear from you. Connect with our support team and let’s make medication management safer together.</p>
							<form method="post" action="#">
								<div class="fields">
									<div class="field">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" />
									</div>
									<div class="field">
										<label for="email">Email</label>
										<input type="email" name="email" id="email" />
									</div>
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="4"></textarea>
									</div>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Send Message" /></li>
								</ul>
							</form>
							<ul class="contact">
								<li class="icon solid fa-home">
									MEDSITE,<br />
									Helwan University, Computer Science and Artificial Intelligence<br />
									Cairo, Egypt
								</li>
								<li class="icon solid fa-envelope"><a href="#">contact@medsite.com</a></li>
							</ul>
							<ul class="copyright">
								<li>&copy; MEDSITE. All rights reserved.</li>
							</ul>
						</div>
					</section>

			</div>

		<!-- Scripts -->
        <script src="{{ asset('assets/welcome/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/welcome/js/jquery.scrollex.min.js') }}"></script>
		<script src="{{ asset('assets/welcome/js/browser.min.js') }}"></script>
		<script src="{{ asset('assets/welcome/js/breakpoints.min.js') }}"></script>
		<script src="{{ asset('assets/welcome/js/util.js') }}"></script>
		<script src="{{ asset('assets/welcome/js/main.js') }}"></script>

	</body>
</html>
