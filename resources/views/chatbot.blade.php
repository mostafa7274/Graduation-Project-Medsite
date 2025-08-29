@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <!-- Main Chat Container -->
        <div class="medsite-chat-container" style="height: 75vh; display: flex; flex-direction: column;">
            <!-- Floating Chat Style Header -->
            <div class="medsite-chat-header">
                <h2 style="color: white; margin: 0;">
                    <i class="fas fa-pills" style="color: white;"></i> MEDSITE Assistant
                </h2>
                <button class="btn btn-sm btn" style="color: white; border: 1px solid white;" onclick="minimizeChat()">
                    <i class="fas fa-compress"></i> Minimize
                </button>
            </div>

            <!-- Scrollable Chat Body -->
            <div class="medsite-chat-body" id="chat-box" style="flex: 1; overflow-y: auto;">
                <!-- Messages will appear here -->
            </div>

            <!-- Input Area -->
            <div class="medsite-chat-footer">
                <form id="chat-form">
                    <div class="input-group input-group-lg" style="border-radius: 8px;">
                        <input type="text" id="user-message" class="form-control rounded-start-pill"
                            placeholder="Ask about drug interactions, side effects..." autocomplete="off">
                        <button type="submit" class="btn px-3"
                            style="background-color: #15616D; border-color: #15616D; color:white;">
                            <i class="fas fa-paper-plane me-1"></i> Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Main Container - Fixed height with internal scroll */
        .medsite-chat-container {
            width: 100%;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(21, 97, 109, 0.3);
            overflow: hidden;
        }

        /* Header - Matching Floating Chat */
        .medsite-chat-header {
            background-color: #15616D;
            padding: 12px 16px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        /* Chat Body - Scrollable Area */
        .medsite-chat-body {
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            background-color: #fff;
        }

        /* Message Bubbles */
        .chat-bubble {
            max-width: 80%;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.95rem;
            line-height: 1.4;
            animation: fadeIn 0.3s ease;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
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

        /* Footer - Input Area */
        .medsite-chat-footer {
            padding: 16px;
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        .medsite-chat-footer .input-group {
            border-radius: 20px;
            overflow: hidden;
        }

        .medsite-chat-footer .form-control {
            border: 1px solid #15616D;
            padding: 12px 16px;
        }

        .btn-send {
            background-color: #15616D;
            color: white;
            border: 1px solid #15616D;
            padding: 0 20px;
        }

        /* Scrollbar Styling */
        .medsite-chat-body::-webkit-scrollbar {
            width: 6px;
        }

        .medsite-chat-body::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
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
    </style>

    <script>
        const CHAT_STORAGE_KEY = 'medsite_chat_history';
        let isMinimizing = false;

        // Initialize chat
        document.addEventListener('DOMContentLoaded', function () {
            loadConversation();
            hideFloatingToggle();

            // Check if coming from floating chat
            if (sessionStorage.getItem('fromFloatingChat') === 'true') {
                sessionStorage.removeItem('fromFloatingChat');
            }
        });

        // Load conversation from storage
        function loadConversation() {
            const chatBox = document.getElementById('chat-box');
            const conversation = sessionStorage.getItem(CHAT_STORAGE_KEY);

            if (conversation) {
                chatBox.innerHTML = conversation;
                chatBox.scrollTop = chatBox.scrollHeight;
            } else {
                // Add welcome message if new chat
                const welcomeMsg = `<div class="chat-bubble bot-msg">
                            <strong>MEDSITE Assistant:</strong><br>Hello! I'm your MEDSITE Assistant. How can I help you today?
                        </div>`;
                chatBox.innerHTML = welcomeMsg;
                saveConversation();
            }
        }

        // Save conversation to storage and sync with floating chat
        function saveConversation() {
            const chatContent = document.getElementById('chat-box').innerHTML;
            sessionStorage.setItem(CHAT_STORAGE_KEY, chatContent);
            updateFloatingChat(chatContent);
        }

        // Handle form submission
        document.getElementById("chat-form").addEventListener("submit", async function (e) {
            e.preventDefault();
            const inputField = document.getElementById("user-message");
            const input = inputField.value.trim();
            if (!input) return;

            const chatBox = document.getElementById("chat-box");

            // Add user message
            const userBubble = document.createElement("div");
            userBubble.classList.add("chat-bubble", "user-msg");
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
                const botBubble = document.createElement("div");
                botBubble.classList.add("chat-bubble", "bot-msg");
                botBubble.innerHTML = `<strong>MEDSITE Assistant:</strong><br>${data.reply}`;
                chatBox.appendChild(botBubble);

                chatBox.scrollTop = chatBox.scrollHeight;
                saveConversation();
            } catch (error) {
                console.error('Error:', error);
            }
        });

        // Minimize to floating chat
        function minimizeChat() {
            isMinimizing = true;
            saveConversation();
            sessionStorage.setItem('chatbotMinimized', 'true');
            showFloatingToggle();
            window.location.href = "{{ url('/home') }}"; // Redirect to home or previous page
        }

        // Hide floating toggle (when in main chat)
        function hideFloatingToggle() {
            const floatingToggle = window.parent.document.querySelector('.chatbot-toggle');
            const floatingWindow = window.parent.document.getElementById('chatbotWindow');

            if (floatingToggle) floatingToggle.style.display = 'none';
            if (floatingWindow) floatingWindow.style.display = 'none';
        }

        // Show floating toggle (when minimizing)
        function showFloatingToggle() {
            const floatingToggle = window.parent.document.querySelector('.chatbot-toggle');
            if (floatingToggle) {
                floatingToggle.style.display = 'flex';
                // Open the chat window automatically
                const floatingWindow = window.parent.document.getElementById('chatbotWindow');
                if (floatingWindow) {
                    floatingWindow.classList.add('active');
                }
            }
        }

        // Update floating chat content
        function updateFloatingChat(content) {
            const floatingChatBox = window.parent.document.getElementById('floating-chat-box');
            if (floatingChatBox) {
                floatingChatBox.innerHTML = content;
                floatingChatBox.scrollTop = floatingChatBox.scrollHeight;
            }
        }

        // Save conversation when leaving page
        window.addEventListener('beforeunload', function () {
            if (!isMinimizing) {
                saveConversation();
            }
        });
    </script>
@endsection