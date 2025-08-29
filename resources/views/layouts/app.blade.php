{{--
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    MEDSITE - MIT
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
--}}



<!-- Navbar -->
<!-- <nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img id="MDB-logo" draggable="false" height="30" />MEDSITE</a>
            <button class="navbar-toggler" type="button" data-mdb-collapse-init
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#!"><i class="fas fa-plus-circle pe-2"></i>Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#!"><i class="fas fa-bell pe-2"></i>Alerts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#!"><i class="fas fa-heart pe-2"></i>Trips</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="btn btn-dark btn-rounded" href="#!">Sign in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->
<!-- Navbar -->


<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

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

            .btn-dark {
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
            <a class="navbar-brand" href="{{ url('/home') }}">
                <img id="MDB-logo" draggable="false" height="30">MEDSITE
            </a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto align-items-center">


                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item ms-3">
                                <a class="btn btn-dark btn-rounded" href="{{ url('/login-register?form=login') }}">Login</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item ms-2">
                                <a class="btn btn-dark btn-rounded"
                                    href="{{ url('/login-register?form=register') }}">Register</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="{{ url('/medication-checker') }}">
                                <i class="bi bi-capsule"></i> Drug Safety
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="{{ url('/drug-interaction-checker') }}"><i
                                    class="bi bi-heart-pulse"></i> Drugs Interaction</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="{{ url('/medication-plan') }}"><i
                                    class="bi bi-calendar-event"></i> Tracker</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="{{ url('/upload') }}"><i class="bi bi-file-earmark-text"></i>
                                Reports Reader</a>
                        </li>
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                                role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <span class="me-2">{{ Auth::user()->name }}</span>
                                <i class="fas fa-user-circle"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i
                                            class="fas fa-user me-2"></i>Profile</a></li>
                                <!-- <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li> -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- <div class="chatbot-toggle" onclick="toggleChatbot()">
        <i class="fas fa-comment-dots"></i>
    </div> -->

    <div class="chatbot-toggle" onclick="toggleChatbot()">
        <i class="fas fa-comment-dots"></i>
    </div>

    <div class="chatbot-window" id="chatbotWindow">
        <div class="chatbot-header">
            <h5 style="color: white;"><i class="fas fa-pills" style="color: white;"></i>MEDSITE Assistant</h5>
            <div class="chatbot-actions">
                <button class="btn btn-sm btn-outline-secondary" onclick="expandToFullPageChat()">
                    <i class="fas fa-expand"></i>
                </button>
                <button class="btn btn-sm btn-outline-danger" onclick="clearAndCloseChat()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="chatbot-body" id="floating-chat-box">
            <!-- Messages appear here -->
        </div>
        <div class="chatbot-footer">
            <form id="floating-chat-form" style="margin: 10px;">
                @csrf
                <div class="input-group">
                    <input type="text" id="floating-user-message" class="form-control"
                        placeholder="Ask about medications..." autocomplete="off" style="border-color: #15616D;">
                    <button type="submit" class="btn px-3"
                        style="background-color: #15616D; border-color: #15616D; color:white;">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


    <style>
        /* Chatbot Toggle Button */
        .chatbot-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #15616D;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            transition: all 0.3s ease;
            border: none;
        }

        .chatbot-toggle:hover {
            background-color: #0d4b57;
            transform: scale(1.05);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        .chatbot-toggle:active {
            transform: scale(0.95);
        }

        /* Chatbot Window */
        .chatbot-window {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 350px;
            max-height: 0;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px #15616D;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            z-index: 1000;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .chatbot-window.active {
            max-height: 500px;
            height: 450px;
            opacity: 1;
            transform: translateY(0);
        }

        /* Header */
        .chatbot-header {
            background-color: #15616D;
            padding: 12px 16px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chatbot-header h5 {
            margin: 0;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .chatbot-actions {
            display: flex;
            gap: 6px;
        }

        .chatbot-actions .btn {
            padding: 4px 8px;
            color: white;
            border-color: rgba(255, 255, 255, 0.3);
        }

        .chatbot-actions .btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Body - Updated with tighter spacing */
        .chatbot-body {
            flex: 1;
            padding: 12px;
            overflow-y: auto;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .welcome-message {
            background-color: rgba(188, 207, 226, 0.72);
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 0.85rem;
            color: rgb(46, 49, 53);
            text-align: center;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        /* Footer */
        .chatbot-footer {
            padding: 10px;
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        .chatbot-footer .input-group {
            border-radius: 10px;
            overflow: hidden;
        }

        .chatbot-footer .form-control {
            border-radius: 20px 0 0 20px;
            border-right: none;
            padding: 8px 12px;
            font-size: 0.85rem;
        }

        .chatbot-footer .btn {
            border-radius: 0 20px 20px 0;
            padding: 8px 12px;
        }

        /* Chat Bubbles - Fixed spacing */
        .chat-bubble {
            max-width: 85%;
            padding: 8px 12px;
            border-radius: 12px;
            line-height: 1.3;
            word-break: break-word;
            font-size: 0.85rem;
            box-sizing: border-box;
            animation: fadeIn 0.3s ease;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            overflow-wrap: break-word;
            margin: 2px 0;
        }

        .chat-bubble strong {
            display: block;
            margin-bottom: 2px;
            font-size: 0.9em;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .user-msg {
            background-color: rgb(39, 129, 143);
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 4px;
        }

        .bot-msg {
            background-color: #f1f3f5;
            color: rgb(58, 61, 65);
            align-self: flex-start;
            border-bottom-left-radius: 4px;
        }

        /* Scrollbar styling */
        .chatbot-body::-webkit-scrollbar {
            width: 5px;
        }

        .chatbot-body::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .chatbot-body::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        .chatbot-body::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Responsive adjustments */
        @media (max-width: 400px) {
            .chatbot-window {
                width: 300px;
                height: 400px;
            }

            .chat-bubble {
                padding: 6px 10px;
                font-size: 0.8rem;
                max-width: 90%;
            }

            .chatbot-body {
                gap: 6px;
                padding: 10px;
            }
        }

        @media (min-width: 500px) {
            .chatbot-window {
                width: 380px;
                height: 500px;
            }
        }

        @media (max-height: 600px) {
            .chatbot-body {
                gap: 6px;
                padding: 10px;
            }
        }
    </style>


    <script>
        const CHAT_STORAGE_KEY = 'medsite_chat_history';

        // Initialize floating chat
        document.addEventListener('DOMContentLoaded', function () {
            loadConversation();

            // Check if returning from full page chat
            if (sessionStorage.getItem('chatbotMinimized') === 'true') {
                sessionStorage.removeItem('chatbotMinimized');
                document.getElementById('chatbotWindow').classList.add('active');
                updateToggleButton(true);
            }
        });

        // Load conversation from storage
        function loadConversation() {
            const chatBox = document.getElementById('floating-chat-box');
            const conversation = sessionStorage.getItem(CHAT_STORAGE_KEY);

            if (conversation) {
                chatBox.innerHTML = conversation;
                chatBox.scrollTop = chatBox.scrollHeight;
            } else {
                // Add welcome message if new chat
                const welcomeMsg = `<div class="chat-bubble bot-msg">
                <strong>MEDSITE Assistant:</strong><br>Hello! I'm your MedSite assistant. How can I help you today?
            </div>`;
                chatBox.innerHTML = welcomeMsg;
                saveConversation();
            }
        }

        // Save conversation to storage
        function saveConversation() {
            const chatContent = document.getElementById('floating-chat-box').innerHTML;
            sessionStorage.setItem(CHAT_STORAGE_KEY, chatContent);
        }

        // Clear conversation and close chat
        function clearAndCloseChat() {
            const chatBox = document.getElementById('floating-chat-box');
            chatBox.innerHTML = '';
            sessionStorage.removeItem(CHAT_STORAGE_KEY);

            // Add fresh welcome message
            const welcomeMsg = `<div class="chat-bubble bot-msg">
            <strong>MEDSITE Assistant:</strong><br>Hello! I'm your MEDSITE Assistant. How can I help you today?
        </div>`;
            chatBox.innerHTML = welcomeMsg;
            saveConversation();

            // Close the chat window
            document.getElementById('chatbotWindow').classList.remove('active');
            updateToggleButton(false);
        }

        // Toggle chat window (without clearing)
        function toggleChatbot() {
            const chatWindow = document.getElementById('chatbotWindow');
            const isActive = chatWindow.classList.toggle('active');
            updateToggleButton(isActive);

            // Focus input when opening
            if (isActive) {
                setTimeout(() => {
                    document.getElementById('floating-user-message').focus();
                }, 300);
            }
        }

        // Update toggle button appearance
        function updateToggleButton(isActive) {
            const toggleBtn = document.querySelector('.chatbot-toggle');
            if (isActive) {
                toggleBtn.innerHTML = '<i class="fas fa-times"></i>';
                toggleBtn.style.backgroundColor = '#dc3545';
            } else {
                toggleBtn.innerHTML = '<i class="fas fa-comment-dots"></i>';
                toggleBtn.style.backgroundColor = '#15616D';
            }
        }

        // Expand to full page chat
        function expandToFullPageChat() {
            saveConversation();
            sessionStorage.setItem('fromFloatingChat', 'true');
            window.location.href = "{{ route('chatbot') }}";
        }

        // Handle floating chat form submission
        document.getElementById('floating-chat-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const inputField = document.getElementById('floating-user-message');
            const input = inputField.value.trim();
            if (!input) return;

            const chatBox = document.getElementById('floating-chat-box');

            // Add user message
            const userBubble = document.createElement('div');
            userBubble.classList.add('chat-bubble', 'user-msg');
            userBubble.innerHTML = `<strong>You:</strong><br>${input}`;
            chatBox.appendChild(userBubble);

            inputField.value = '';
            chatBox.scrollTop = chatBox.scrollHeight;
            saveConversation();

            // Get bot response
            try {
                const response = await fetch("/chatbot", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message: input })
                });

                const data = await response.json();

                // Add bot response
                const botBubble = document.createElement('div');
                botBubble.classList.add('chat-bubble', 'bot-msg');
                botBubble.innerHTML = `<strong>MEDSITE Assistant:</strong><br>${data.reply}`;
                chatBox.appendChild(botBubble);

                chatBox.scrollTop = chatBox.scrollHeight;
                saveConversation();
            } catch (error) {
                console.error('Error:', error);

                // Show error message to user
                const errorBubble = document.createElement('div');
                errorBubble.classList.add('chat-bubble', 'bot-msg');
                errorBubble.innerHTML = `<strong>MEDSITE Assistant:</strong><br>Sorry, I'm having trouble connecting. Please try again later.`;
                chatBox.appendChild(errorBubble);
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        });

        // Auto-resize messages when window resizes
        window.addEventListener('resize', adjustMessageSizes);

        function adjustMessageSizes() {
            const bubbles = document.querySelectorAll('.chat-bubble');
            const chatWindow = document.getElementById('chatbotWindow');
            const windowWidth = chatWindow.clientWidth;

            bubbles.forEach(bubble => {
                if (windowWidth < 400) {
                    bubble.style.maxWidth = '90%';
                    bubble.style.padding = '8px 12px';
                    bubble.style.fontSize = '0.85rem';
                } else {
                    bubble.style.maxWidth = '80%';
                    bubble.style.padding = '10px 14px';
                    bubble.style.fontSize = '0.95rem';
                }
            });
        }
    </script>
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