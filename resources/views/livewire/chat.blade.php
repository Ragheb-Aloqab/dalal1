{{-- <div class="flex items-center justify-center h-screen overflow-hidden">

    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Cairo', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #e0e7ff;
        }

        ::-webkit-scrollbar-thumb {
            background: #6366f1;
            border-radius: 8px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #4f46e5;
        }

        .hidden-md {
            display: none;
        }

        @media (min-width: 768px) {
            .hidden-md {
                display: block;
            }
        }
    </style>
    <div id="app" class="flex flex-col w-full max-w-5xl bg-white rounded-lg shadow-2xl h-5/6 md:flex-row md:h-auto">
        <!-- Sidebar -->
        <div id="sidebar"
            class="w-full p-4 overflow-y-auto text-white bg-gradient-to-b from-indigo-500 to-indigo-700 md:w-1/3 hidden-md">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-3xl font-bold">جهات الاتصال</h2>
                <button
                    class="px-3 py-2 transition duration-300 ease-in-out bg-indigo-600 rounded-full hover:bg-indigo-500">دردشة
                    جديدة</button>
            </div>
            <div class="mb-4">
                <input type="text" placeholder="بحث..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>
            <ul class="overflow-y-auto max-h-80">
                @foreach ($conversations as $conversation)
                    <li wire:click="selectConversation({{ $conversation['conversation_id'] }})"
                        class="flex items-center p-4 transition duration-300 ease-in-out rounded-lg cursor-pointer hover:bg-indigo-500">
                        <div
                            class="flex items-center justify-center w-12 h-12 font-bold text-white bg-indigo-400 rounded-full">
                            {{ substr($conversation['other_user_name'], 0, 2) }}</div>
                        <div class="mr-4">
                            <p class="font-semibold">{{ $conversation['other_user_name'] }}</p>
                            <p class="text-sm text-gray-300">{{ $conversation['last_message'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Chat Box -->
        <div class="flex flex-col w-full h-full {{ $selectedConversationId ? '' : 'hidden' }}" id="chatBox">
            <!-- Chat Header -->
            <div class="flex items-center justify-between p-4 border-b bg-gradient-to-r from-indigo-100 to-indigo-200">
                <div class="flex items-center">
                    <button id="toggleSidebar"
                        class="p-2 ml-4 transition duration-300 ease-in-out bg-indigo-300 rounded-full md:hidden hover:bg-indigo-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12h18M3 6h18M3 18h18" />
                        </svg>
                    </button>
                    @if ($selectedConversationId)
                        <div
                            class="flex items-center justify-center w-12 h-12 font-bold text-white bg-indigo-400 rounded-full">
                            {{ substr($conversations->where('conversation_id', $selectedConversationId)->first()['other_user_name'], 0, 2) }}
                        </div>
                        <div class="mr-4">
                            <p class="text-xl font-semibold">
                                {{ $conversations->where('conversation_id', $selectedConversationId)->first()['other_user_name'] }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Messages -->
            <div class="flex-grow p-4 overflow-y-auto bg-gray-50 max-h-80">
                <div class="flex flex-col space-y-6">
                    @foreach ($messages as $message)
                        @if ($message->sender_id === Auth::id())
                            <div class="flex items-end justify-end">
                                <div class="max-w-xs p-2 mr-4 text-white bg-indigo-500 rounded-lg shadow-md">
                                    <p class="text-sm">{{ $message->content }}</p>
                                    <div class="flex items-center justify-between mt-2">
                                        <span
                                            class="text-xs text-gray-200">{{ $message->created_at->format('h:i A') }}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="flex items-start">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 font-bold text-white bg-indigo-400 rounded-full">
                                    {{ substr($message->sender->name, 0, 2) }}</div>
                                <div class="max-w-xs p-2 mr-4 bg-white rounded-lg shadow-md">
                                    <p class="text-sm">{{ $message->content }}</p>
                                    <div class="flex items-center justify-between mt-2">
                                        <span
                                            class="text-xs text-gray-500">{{ $message->created_at->format('h:i A') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Message Input -->
            <div class="flex items-center p-4 border-t bg-gradient-to-r from-indigo-100 to-indigo-200">
                <label for="imageUpload"
                    class="p-2 ml-2 transition duration-300 ease-in-out bg-indigo-300 rounded-full cursor-pointer hover:bg-indigo-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 16v1a2 2 0 002 2h14a2 2 0 002-2v-1M4 16l4-4a3 3 0 014 0l4-4a3 3 0 014 0l2 2" />
                    </svg>
                </label>
                <input type="file" wire:model="image" id="imageUpload" class="hidden">
                <input type="text" wire:model="newMessage" placeholder="اكتب رسالة..."
                    class="w-full px-4 py-3 ml-4 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-400">
                <button wire:click="sendMessage"
                    class="p-3 ml-2 text-white transition duration-300 ease-in-out bg-indigo-500 rounded-full hover:bg-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div> --}}
{{-- <script src="https://cdn.tailwindcss.com"></script> --}}

<div class="flex items-center justify-center h-screen overflow-hidden">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Cairo', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #e0e7ff;
        }

        ::-webkit-scrollbar-thumb {
            background: #6366f1;
            border-radius: 8px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #4f46e5;
        }

        .hidden-md {
            display: none;
        }

        @media (min-width: 768px) {
            .hidden-md {
                display: block;
            }
        }
    </style>
    <div id="app" class="flex flex-col w-full max-w-5xl bg-white rounded-lg shadow-2xl h-5/6 md:flex-row md:h-100">
        <!-- الشريط الجانبي -->
        <div id="sidebar"
            class="w-full p-4 overflow-y-auto text-white bg-gradient-to-b from-indigo-500 to-indigo-700 md:w-1/3 hidden-md">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-3xl font-bold">جهات الاتصال</h2>
                <button
                    class="px-3 py-2 transition duration-300 ease-in-out bg-indigo-600 rounded-full hover:bg-indigo-500">دردشة
                    جديدة</button>
            </div>
            <div class="mb-4">
                <input type="text" placeholder="بحث..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>
            <ul class="overflow-y-auto max-h-80">
                @foreach ($conversations as $conversation)
                    <li class="p-2 transition duration-300 ease-in-out bg-indigo-600 rounded-lg cursor-pointer hover:bg-indigo-500"
                        wire:click="selectConversation({{ $conversation['conversation_id'] }})">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <x-avatar :avatar="$conversation['other_user_image']" :name="$conversation['other_user_name']" width="10" height="10" />
                            </div>
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $conversation['other_user_name'] }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $conversation['last_message'] }}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-sm text-gray-500">
                                {{ $conversation['last_message_date'] }}
                            </div>
                        </div>
                    </li>
                @endforeach

                <!-- المزيد من جهات الاتصال هنا -->
            </ul>
        </div>

        <!-- صندوق الدردشة -->
        <div class="flex flex-col w-full h-full bg-red-500" id="chatBox">
            <!-- رأس الدردشة -->
            <div class="flex items-center justify-between p-4 border-b bg-gradient-to-r from-indigo-100 to-indigo-200">
                <div class="flex items-center">
                    <button id="toggleSidebar"
                        class="p-2 ml-4 transition duration-300 ease-in-out bg-indigo-300 rounded-full md:hidden hover:bg-indigo-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12h18M3 6h18M3 18h18" />
                        </svg>
                    </button>
                    <div
                        class="flex items-center justify-center w-12 h-12 font-bold text-white bg-indigo-400 rounded-full">
                        JD</div>
                    <div class="mr-4">
                        <p class="text-xl font-semibold">جون دو</p>
                        <p class="text-sm text-gray-600">متصل</p>
                    </div>
                </div>
            </div>
            <div class="p-4 overflow-y-auto grow bg-gray-50 ">
                <!-- الرسائل -->
                <div id="messages" class="flex flex-col space-y-6">
                    @foreach ($messages as $message)
                        @if ($message->sender_id != Auth::user()->id)
                            <div class="flex items-start">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 font-bold rounded-full">
                                    <x-avatar :avatar="$message->sender->avatar" :name="$message->sender->name" width="10" height="10" />

                                </div>
                                <div class="max-w-xs p-2 mr-4 bg-white rounded-lg shadow-md">
                                    <p class="text-sm">{{ $message->content }}</p>
                                    <div class="flex items-center justify-between mt-2">
                                        <span
                                            class="text-xs text-gray-500">{{ $message->created_at->format('H:i') }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M16.707 7.707a1 1 0 00-1.414-1.414L9 12.586 6.707 10.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="flex items-end justify-end">
                                <div class="max-w-xs p-2 mr-4 text-white bg-indigo-500 rounded-lg shadow-md">
                                    <p class="text-sm">{{ $message->content }}</p>
                                    <div class="flex items-center justify-between mt-2">
                                        <span class="text-xs text-gray-200">
                                            {{ $message->created_at->format('H:i') }}
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-200"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M16.707 7.707a1 1 0 00-1.414-1.414L9 12.586 6.707 10.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{-- <div class="flex items-start">
                        <div
                            class="flex items-center justify-center flex-shrink-0 w-10 h-10 font-bold text-white bg-indigo-400 rounded-full">
                            JD</div>
                        <div class="max-w-xs p-2 mr-4 bg-white rounded-lg shadow-md">
                            <p class="text-sm">هل أنت متاح لإجراء مكالمة لاحقًا اليوم؟</p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-xs text-gray-500">10:15 صباحًا</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M16.707 7.707a1 1 0 00-1.414-1.414L9 12.586 6.707 10.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-end justify-end">
                        <div class="max-w-xs p-2 mr-4 text-white bg-indigo-500 rounded-lg shadow-md">
                            <p class="text-sm">نعم، أنا متاح. لنقم بذلك في الساعة 3 مساءً.</p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-xs text-gray-200">10:17 صباحًا</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-200"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M16.707 7.707a1 1 0 00-1.414-1.414L9 12.586 6.707 10.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7z" />
                                </svg>
                            </div>
                        </div>
                    </div> --}}
                    <!-- رسالة صورة -->
                    {{-- <div class="flex items-start">
                        <div
                            class="flex items-center justify-center flex-shrink-0 w-10 h-10 font-bold text-white bg-indigo-400 rounded-full">
                            JD</div>
                        <div class="max-w-xs p-2 mr-4 bg-white rounded-lg shadow-md">
                            <img src="https://via.placeholder.com/150" alt="صورة" class="mb-2 rounded-lg">
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-gray-500">10:20 صباحًا</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M16.707 7.707a1 1 0 00-1.414-1.414L9 12.586 6.707 10.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7z" />
                                </svg>
                            </div>
                        </div>
                    </div> --}}
                    <!-- المزيد من الرسائل هنا -->
                </div>
            </div>
            <div class="grow-0">
                <form wire:submit.prevent="sendMessage" class="w-full bg-white border-t border-gray-300 ">
                    <div class="flex p-4 border-t bg-gradient-to-r from-indigo-100 to-indigo-200">
                        <label for="imageUpload"
                            class="flex items-center justify-center ml-2 text-lg transition-transform transform rounded-lg cursor-pointer hover:scale-105">

                            <i class="mb-3 text-4xl ti ti-message-circle text-primary-500"></i>
                        </label>
                        <input type="file" id="imageUpload" class="hidden">
                        <input type="text" id="messageInput" wire:model="newMessage" placeholder="اكتب رسالة..."
                            class="flex-grow px-4 py-3 ml-4 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-400">
                        <button id="sendMessage"
                            class="p-3 ml-2 text-white transition duration-300 ease-in-out bg-indigo-500 rounded-full hover:bg-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </button>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <script>
        // JavaScript لإرسال الرسائل
        document.getElementById('sendMessage').addEventListener('click', sendMessage);
        document.getElementById('messageInput').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                //sendMessage();

            }
        });

        // function sendMessage() {
        //     const messageInput = document.getElementById('messageInput');
        //     const messageText = messageInput.value.trim();
        //     if (messageText !== '') {
        //         const messageContainer = document.createElement('div');
        //         messageContainer.className = 'flex items-end justify-end';
        //         messageContainer.innerHTML = `
    //             <div class="max-w-xs p-2 mr-4 text-white bg-indigo-500 rounded-lg shadow-md">
    //                 <p class="text-sm">${messageText}</p>
    //                 <div class="flex items-center justify-between mt-2">
    //                     <span class="text-xs text-gray-200">${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</span>
    //                     <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
    //                         <path d="M16.707 7.707a1 1 0 00-1.414-1.414L9 12.586 6.707 10.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7z" />
    //                     </svg>
    //                 </div>
    //             </div>
    //         `;
        //         document.querySelector('#messages').appendChild(messageContainer);
        //         messageInput.value = '';
        //         document.querySelector('#messages').scrollTop = document.querySelector('#messages').scrollHeight;
        //     }
        // }

        // إظهار أو إخفاء الشريط الجانبي على الشاشات الصغيرة
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const chatBox = document.getElementById('chatBox');
            if (sidebar.classList.contains('hidden-md')) {
                sidebar.classList.remove('hidden-md');
                chatBox.classList.add('hidden');
            } else {
                sidebar.classList.add('hidden-md');
                chatBox.classList.remove('hidden');
            }
        });

        // عند النقر على جهة اتصال في الشريط الجانبي، إخفاء الشريط وإظهار الدردشة على الشاشات الصغيرة
        document.querySelectorAll('#sidebar ul li').forEach(contact => {
            contact.addEventListener('click', () => {
                document.getElementById('sidebar').classList.add('hidden-md');
                document.getElementById('chatBox').classList.remove('hidden');
            });
        });
    </script>
</div>
