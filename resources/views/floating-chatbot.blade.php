@extends('layouts.app')

@section('content')
    <!-- Floating Button -->
    <div class="chatbot-toggle" onclick="toggleChatbot()">
        <i class="fas fa-comment-dots"></i>
    </div>

    <!-- Chat Window (Hidden by Default) -->
    <div class="chatbot-window" id="chatbotWindow" style="display: none;">
        <div class="chatbot-header">
            <h5>💊 MEDSITE BOT</h5>
            <div class="chatbot-actions">
                <button class="btn btn-sm btn-outline-secondary" onclick="expandChatbot()">
                    <i class="fas fa-expand"></i> Expand
                </button>
                <button class="btn btn-sm btn-outline-danger" onclick="toggleChatbot()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="chatbot-body" id="floating-chat-box">
            <!-- Messages appear here -->
        </div>
        <div class="chatbot-footer">
            <form id="floating-chat-form">
                @csrf
                <div class="input-group">
                    <input type="text" id="floating-user-message" class="form-control"
                        placeholder="Ask about medications...">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .chatbot-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #0d6efd;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
        }

        .chatbot-window {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 350px;
            height: 450px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            z-index: 1000;
        }

        .chatbot-header {
            background-color: #f8f9fa;
            padding: 12px 16px;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chatbot-body {
            flex: 1;
            padding: 16px;
            overflow-y: auto;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .chatbot-footer {
            padding: 12px;
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }

        .chat-bubble {
            max-width: 80%;
            padding: 10px 14px;
            border-radius: 18px;
            font-size: 0.9rem;
            line-height: 1.4;
            word-break: break-word;
        }

        .user-msg {
            background-color: #d1e7dd;
            align-self: flex-end;
            border-bottom-right-radius: 4px;
        }

        .bot-msg {
            background-color: #f8d7da;
            align-self: flex-start;
            border-bottom-left-radius: 4px;
        }
    </style>

    <script>
        // Toggle chat window
        function toggleChatbot() {
            const chatWindow = document.getElementById('chatbotWindow');
            chatWindow.style.display = chatWindow.style.display === 'none' ? 'flex' : 'none';
        }

        // Redirect to full-page chat
        function expandChatbot() {
            window.location.href = "{{ route('chatbot') }}";
        }

        // Handle floating chat form submission
        document.getElementById('floating-chat-form')?.addEventListener('submit', async function (e) {
            e.preventDefault();
            const input = document.getElementById('floating-user-message').value.trim();
            if (!input) return;

            const chatBox = document.getElementById('floating-chat-box');

            // Add user message
            const userBubble = document.createElement('div');
            userBubble.className = 'chat-bubble user-msg';
            userBubble.innerHTML = `<strong>You:</strong><br>${input}`;
            chatBox.appendChild(userBubble);

            document.getElementById('floating-user-message').value = '';
            chatBox.scrollTop = chatBox.scrollHeight;

            // Get bot response
            try {
                const response = await fetch("{{ route('chatbot.send') }}", {
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
                botBubble.className = 'chat-bubble bot-msg';
                botBubble.innerHTML = `<strong>MediAssist:</strong><br>${data.reply}`;
                chatBox.appendChild(botBubble);

                chatBox.scrollTop = chatBox.scrollHeight;
            } catch (error) {
                console.error('Error:', error);
            }
        });
    </script>
@endsection