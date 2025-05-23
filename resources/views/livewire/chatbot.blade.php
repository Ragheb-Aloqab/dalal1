<div>
    <div>
        <div id="chat-icon"
            class="fixed z-40 p-4 text-white transition-all duration-300 transform bg-blue-600 rounded-full shadow-lg cursor-pointer bottom-10 right-10 hover:bg-blue-700 hover:scale-110"
            wire:click="toggleChat">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div id="chat-container"
            class="fixed flex flex-col transition-all duration-500 transform bg-white rounded-lg shadow-lg bottom-20 right-10 w-96 @if (!$isChatVisible) chat-hidden @endif z-50">
            <div class="flex items-center justify-between p-4 font-bold text-white bg-blue-600 rounded-t-lg">
                المساعد الذكي
                <span id="close-chat" class="cursor-pointer" wire:click="toggleChat">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
            <div id="messages" class="flex flex-col flex-1 p-4 space-y-2 overflow-y-auto bg-gray-100">
                @foreach ($messages as $message)
                    @if ($message['sender'] === 'user')
                        <div
                            class="flex items-center self-end px-2 py-2 text-white bg-blue-600 rounded-md slide-in-right">
                            <span class="ml-2">{{ $message['content'] }}</span>
                            @auth
                                <x-avatar :avatar="auth()->user()->avatar" :name="auth()->user()->name" width="6" height="6" />

                            @endauth
                            @guest
                                <x-avatar :avatar="null" :name="null" width="10" height="10" />
                            @endguest
                        </div>
                    @else
                        <div
                            class="flex items-center self-start px-2 py-2 text-gray-800 bg-gray-200 rounded-md bg-gray-2 00 slide-in-left">
                            <img src="https://via.placeholder.com/40" class="w-6 h-6 ml-2 rounded-full" alt="Bot">
                            <span>{{ $message['content'] }}</span>
                        </div>
                    @endif
                @endforeach
                <!-- Loading Spinner -->
                <div wire:loading class="flex items-center justify-center mb-4">
                    <div class="loader"></div>
                </div>

            </div>
            <div class="flex p-4 bg-gray-100">
                <input type="text" wire:model="userInput" placeholder="اكتب رسالتك..."
                    class="w-full p-2 text-gray-800 transition-all bg-white border rounded-r-md focus:ring-blue-500 focus:border-blue-500">
                <button wire:click="sendMessage"
                    class="p-2 text-white transition-colors duration-300 bg-blue-600 rounded-l-md hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <style>
        .chat-hidden {
            display: none;
        }

        .fade-in {
            animation: fadeIn 0.5s forwards;
        }

        .fade-out {
            animation: fadeOut 0.5s forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: scale(1);
            }

            to {
                opacity: 0;
                transform: scale(0.9);
            }
        }

        /* Spinner styles */
        .loader,
        .loader:before,
        .loader:after {
            border-radius: 50%;
            width: 2em;
            height: 2em;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            -webkit-animation: load7 1.8s infinite ease-in-out;
            animation: load7 1.8s infinite ease-in-out;
        }

        .loader {
            color: #9E04C9FF;
            font-size: 8px;
            margin: 0px auto;
            position: relative;
            text-indent: -9999em;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-animation-delay: -0.16s;
            animation-delay: -0.16s;
        }

        .loader:before,
        .loader:after {
            content: '';
            position: absolute;
            top: 0;
        }

        .loader:before {
            left: -3.5em;
            -webkit-animation-delay: -0.32s;
            animation-delay: -0.32s;
        }

        .loader:after {
            left: 3.5em;
        }

        @-webkit-keyframes load7 {

            0%,
            80%,
            100% {
                box-shadow: 0 2.5em 0 -1.3em;
            }

            40% {
                box-shadow: 0 2.5em 0 0;
            }
        }

        @keyframes load7 {

            0%,
            80%,
            100% {
                box-shadow: 0 2.5em 0 -1.3em;
            }

            40% {
                box-shadow: 0 2.5em 0 0;
            }
        }
    </style>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatIcon = document.getElementById('chat-icon');
        const chatContainer = document.getElementById('chat-container');
        const closeButton = document.getElementById('close-chat');

        chatIcon.addEventListener('click', () => {
            if (chatContainer.classList.contains('chat-hidden')) {
                chatContainer.classList.remove('chat-hidden', 'fade-out');
                chatContainer.classList.add('fade-in');
            } else {
                chatContainer.classList.remove('fade-in');
                chatContainer.classList.add('fade-out');
                setTimeout(() => chatContainer.classList.add('chat-hidden'), 500);
            }
        });

        closeButton.addEventListener('click', () => {
            chatContainer.classList.add('fade-out');
            setTimeout(() => chatContainer.classList.add('chat-hidden'), 500);
        });
    });
</script>
