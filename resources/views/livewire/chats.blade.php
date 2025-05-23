{{-- <div class="flex h-screen bg-gray-50">
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>


    <!-- Conversations List -->
    <div class="w-full overflow-y-auto border-r border-gray-300 md:w-1/3 lg:w-1/4 custom-scrollbar">
        <div class="flow-root p-1">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($conversations as $conversation)
                    <li class="py-3 sm:py-4" wire:click="selectConversation({{ $conversation['conversation_id'] }})">
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
            </ul>
        </div>
    </div>

    <!-- Messages Section -->
    <div class="flex flex-col flex-1">
        <div class="flex-1 p-4 overflow-y-auto custom-scrollbar">
            <div class="h-screen p-4 overflow-y-auto pb-36">
                @foreach ($messages as $message)
                    <div class="flex items-start {{ $message->sender_id == Auth::id() ? 'justify-end' : '' }} mb-4">
                    @if ($message->sender_id != Auth::id())
                        <img src="{{ asset('storage/' . $message->sender->image) }}" alt="Sender Image"
                            class="w-8 h-8 mr-2 rounded-full shadow-lg">
                    @endif
                    <div
                        class="max-w-xs p-3 rounded-lg shadow {{ $message->sender_id == Auth::id() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800' }}">
                        <p>{{ $message->content }}</p>
                        @if ($message->image)
                            <img src="{{ asset('storage/' . $message->image) }}" alt="Image"
                                class="max-w-xs mt-2 rounded shadow-md">
                        @endif
                        <div class="mt-2 text-xs text-gray-500">{{ $message->created_at->format('H:i') }}</div>
                    </div>
                    @if ($message->sender_id == Auth::id())
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Sender Image"
                            class="w-8 h-8 ml-2 rounded-full shadow-lg">
                    @endif
                </div>

                @endforeach
            </div>
        </div>

        <!-- Message Input -->
        <form wire:submit.prevent="sendMessage" class="flex items-center p-4 bg-white border-t border-gray-300">
            <input type="text" wire:model="newMessage" placeholder="Type your message..."
                class="flex-1 p-2 mr-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input type="file" wire:model="image" accept="image/*" class="hidden" id="image-upload">
            <label for="image-upload"
                class="p-2 mr-2 transition-transform transform bg-gray-200 rounded-lg cursor-pointer hover:scale-105">📷</label>
            <button type="submit"
                class="p-2 text-white transition-transform transform bg-blue-500 rounded-lg shadow-lg hover:scale-105">Send</button>
        </form>
    </div>
</div>
<!-- component --> --}}
<div class="overflow-hidden card chat-application">
    <div class="flex items-center justify-between gap-3 m-3 lg:hidden">
        <button class="flex btn btn-primary" type="button" data-hs-overlay="#chat-sidebar" aria-controls="chat-sidebar"
            aria-label="Toggle navigation">
            <i class="ti ti-menu-2 fs-5"></i>
        </button>
        <form class="relative w-full">
            <input type="text" class="py-2 form-control search-chat ps-10" id="text-srh"
                placeholder="Search Contact">
            <i class="ti ti-search absolute top-1.5 start-0 translate-middle-y text-lg text-dark ms-3"></i>
        </form>
    </div>
    <div class="flex">
        <div
            class="left-part border-e border-border dark:border-darkborder w-[30%] flex-shrink-0 hidden lg:block user-chat-box">
            <div class="py-3">
                <div class="flex items-center justify-between px-5 mb-3">
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            {{-- <img src="../assets/images/profile/user-1.jpg" alt="user1" width="54" height="54"
                                class="rounded-full" /> --}}
                            {{-- <x-avatar :src="{{ auth()->user()->avatar }}" :width="54" :height="54" /> --}}
                            <x-avatar :avatar="auth()->user()->avatar" :name="auth()->user()->name" :w="54" :h="54" />

                            <span class="absolute right-0 bottom-0.5 p-1 rounded-full bg-success">
                            </span>
                        </div>
                        <div class="">
                            <h6 class="mb-2 text-sm font-semibold text-dark dark:text-white">
                                {{ auth()->user()->name }}</h6>
                            <p class="text-xs text-bodytext dark:text-darklink ">Marketing Director</p>
                        </div>
                    </div>
                    <div class="relative inline-flex hs-dropdown ">
                        <button id="hs-dropdown-custom-icon-trigger"
                            class="items-center justify-center w-10 h-10 rounded-full hs-dropdown-toggle text-bodytext dark:text-darklink hover:text-primary light-dark-hoverbg">
                            <i class="text-lg ti ti-dots-vertical"></i>
                        </button>

                        <div class="hs-dropdown-menu z-[1] transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-40"
                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                            <div class="flex flex-col">
                                <div class="px-4 py-2 border-b light-dark-hoverbg border-border dark:border-darkborder">
                                    <a class="flex items-center gap-2 leading-none card-subtitle"
                                        href="javascript:void(0)">
                                        <i class="text-base ti ti-settings"></i>Setting </a>
                                </div>
                                <div class="px-4 py-2 light-dark-hoverbg ">
                                    <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                        <i class="text-base ti ti-help"></i>Help
                                        and feadbacks
                                    </a>
                                </div>
                                <div class="px-4 py-2 light-dark-hoverbg ">
                                    <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                        <i class="text-base ti ti-layout-board-split"></i>Enable
                                        split View mode
                                    </a>
                                </div>
                                <div class="px-4 py-2 light-dark-hoverbg ">
                                    <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                        <i class="text-base ti ti-table-shortcut"></i>Keyboard
                                        shortcut
                                    </a>
                                </div>
                                <div class="px-4 py-2 border-t light-dark-hoverbg border-border dark:border-darkborder">
                                    <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                        <i class="text-base ti ti-login"></i>Sign
                                        Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-5">
                    <form class="relative w-full mt-4 mb-5 ">
                        <input type="text" class="py-2 form-control search-chat ps-10" id="text-srh"
                            placeholder="Search Contact">
                        <i class="ti ti-search absolute top-1.5 start-0 translate-middle-y text-lg text-dark ms-3"></i>
                    </form>
                    <div class="relative inline-flex hs-dropdown ">
                        <button id="hs-dropdown-custom-icon-trigger"
                            class="items-center justify-center font-semibold rounded-full hs-dropdown-toggle text-bodytext dark:text-darklink">
                            Recent Chats<i class="ti ti-chevron-down ms-1 fs-5"></i>
                        </button>

                        <div class="hs-dropdown-menu z-[1] transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-40"
                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                            <div class="flex flex-col">
                                <div class="px-4 py-2 light-dark-hoverbg ">
                                    <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                        Sort by time
                                    </a>
                                </div>
                                <div class="px-4 py-2 light-dark-hoverbg ">
                                    <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                        Sort by Unread
                                    </a>
                                </div>
                                <div class="px-4 py-2 light-dark-hoverbg ">
                                    <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                        Hide favourites
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!----Left side users---->
                <div class="mt-3 app-chat">
                    <ul class="chat-users mh-n100" data-simplebar>
                        @foreach ($conversations as $conversation)
                            <li>
                                <a wire:click="selectConversation({{ $conversation['conversation_id'] }})"
                                    class="flex items-start justify-between px-5 py-3 bg-lightgray dark:bg-darkprimary chat-user"
                                    id="{{ $conversation['conversation_id'] }}" data-user-id="1">
                                    <div class="flex items-center gap-3">
                                        <span class="relative">
                                            <x-avatar :avatar="$conversation['other_user_image']" :name="$conversation['other_user_name']" :w="12"
                                                :h="12" />

                                            <span class="absolute right-0 bottom-0.5 p-1 rounded-full bg-success">
                                            </span>
                                        </span>
                                        <div class="inline-block ">

                                            <h6 class="mb-1 text-sm chat-title" data-username="Bianca Anderson">Michell
                                                {{ $conversation['other_user_name'] }}
                                            </h6>

                                            <span class="block"> {{ $conversation['last_message'] }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="pt-1 text-xs text-bodytext dark:text-darklink">
                                        {{ $conversation['last_message_date'] }}
                                    </div>
                                </a>
                            </li>
                             <li class="py-3 sm:py-4"
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





                    </ul>
                </div>
                <!----Left side users wnd---->
            </div>
        </div>
        <div class="lg:w-[70%] w-full chat-container">
            <div class="h-full chat-box-inner-part">
                <div class="hidden chat-not-selected h-100">
                    <div class="flex items-center p-5 justify-content-center h-100">
                        <div class="text-center">
                            <span class="text-primary">
                                <i class="ti ti-message-dots fs-10"></i>
                            </span>
                            <h6 class="mt-2">Open chat from the list</h6>
                        </div>
                    </div>
                </div>
                <div class="block chatting-box">
                    <div
                        class="flex items-center justify-between px-5 py-3 border-b border-border dark:border-darkborder chat-meta-user">
                        <div class="flex items-center gap-3 current-chat-user-name">
                            <span class="relative">
                                <img src="../assets/images/profile/user-1.jpg" alt="user-4"
                                    class="w-12 h-12 rounded-full">
                                <span class="absolute right-0 bottom-0.5 p-1 rounded-full bg-success">
                                </span>
                            </span>
                            <div class="inline-block ">
                                <h6 class="mb-1 text-sm font-semibold text-bodytext dark:text-darklink name">
                                </h6>
                                <p class="card-subtitle">Away</p>
                            </div>
                        </div>

                        <ul class="flex items-center">
                            <li>
                                <a class="flex items-center justify-center w-10 h-10 text-base rounded-full text-bodytext dark:text-darklink hover:bg-lightprimary hover:text-primary hover:dark:bg-darkprimary "
                                    href="javascript:void(0)">
                                    <i class="text-2xl ti ti-phone"></i>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center justify-center w-10 h-10 text-base rounded-full text-bodytext dark:text-darklink hover:bg-lightprimary hover:text-primary hover:dark:bg-darkprimary "
                                    href="javascript:void(0)">
                                    <i class="text-2xl ti ti-video"></i>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center justify-center w-10 h-10 text-base rounded-full chat-menu text-bodytext dark:text-darklink hover:bg-lightprimary hover:text-primary hover:dark:bg-darkprimary "
                                    href="javascript:void(0)">
                                    <i class="text-2xl ti ti-menu-2"></i>
                                </a>

                            </li>
                        </ul>

                    </div>
                    <div class="relative flex overflow-hidden parent-chat-box">
                        <div class="relative flex flex-col flex-grow chat-box sm:full">
                            <div class="">
                                <div class="p-5 mh-n100" data-simplebar>
                                    <!---1-->=
                                    <div class="chat-list chat active-chat" data-user-id="1">
                                        {{-- @foreach ($messages as $message)
                                            <div
                                                class="flex items-start {{ $message->sender_id == Auth::id() ? 'justify-end' : '' }} mb-4">
                                                @if ($message->sender_id != Auth::id())
                                                    <img src="{{ asset('storage/' . $message->sender->image) }}"
                                                        alt="Sender Image"
                                                        class="w-8 h-8 mr-2 rounded-full shadow-lg">
                                                @endif
                                                <div
                                                    class="max-w-xs p-3 rounded-lg shadow {{ $message->sender_id == Auth::id() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800' }}">
                                                    <p>{{ $message->content }}</p>
                                                    @if ($message->image)
                                                        <img src="{{ asset('storage/' . $message->image) }}"
                                                            alt="Image" class="max-w-xs mt-2 rounded shadow-md">
                                                    @endif
                                                    <div class="mt-2 text-xs text-gray-500">
                                                        {{ $message->created_at->format('H:i') }}</div>
                                                </div>
                                                @if ($message->sender_id == Auth::id())
                                                    <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                        alt="Sender Image"
                                                        class="w-8 h-8 ml-2 rounded-full shadow-lg">
                                                @endif
                                            </div>
                                        @endforeach
                                        <div class="flex items-start justify-start gap-3 mb-7">
                                            <img src="../assets/images/profile/user-7.jpg" alt="user8"
                                                class="w-10 h-10 rounded-full" />
                                            <div>
                                                <h6 class="mb-2 text-xs text-bodytext dark:text-darklink">
                                                    Andrew, 2 hours ago
                                                </h6>
                                                <div
                                                    class="py-1.5 px-2 bg-lightgray dark:bg-darkgray rounded-md inline-block text-dark dark:text-white text-sm">
                                                    If I don’t like something, I’ll stay away
                                                    from it.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-end gap-3 align-items-start mb-7">
                                            <div class="text-end">
                                                <h6 class="mb-2 text-xs text-bodytext dark:text-darklink">
                                                    2 hours ago</h6>
                                                <div
                                                    class="py-1.5 px-2 bg-lightinfo dark:bg-darkinfo rounded-md inline-block text-dark dark:text-white text-sm">
                                                    If I don’t like something, I’ll stay away
                                                    from it.
                                                </div>
                                            </div>
                                        </div> --}}

                                        @foreach ($messages as $message)
                                            <div
                                                class="flex items-start {{ $message->sender_id == Auth::id() ? 'justify-end' : 'justify-start' }} gap-3 mb-7">
                                                @if ($message->sender_id != Auth::id())
                                                    <!-- Sender's Image -->
                                                    {{-- <img src="{{ asset('storage/' . $message->sender->image) }}"
                                                        alt="Sender Image" class="w-10 h-10 rounded-full"> --}}
                                                    <x-avatar :avatar="$message->sender->image" :name="$message->sender->name" :w="10"
                                                        :h="10" />
                                                @endif

                                                <div class="{{ $message->sender_id == Auth::id() ? 'text-end' : '' }}">
                                                    <h6 class="mb-2 text-xs text-bodytext dark:text-darklink">
                                                        {{ $message->sender->name }},
                                                        {{ $message->created_at->diffForHumans() }}
                                                    </h6>

                                                    <div
                                                        class="py-1.5 px-2 rounded-md inline-block {{ $message->sender_id == Auth::id() ? 'bg-lightinfo dark:bg-darkinfo text-dark dark:text-white' : 'bg-lightgray dark:bg-darkgray text-dark dark:text-white' }} text-sm">
                                                        {{ $message->content }}
                                                    </div>

                                                    @if ($message->image)
                                                        <!-- Optional Message Image -->
                                                        <img src="{{ asset('storage/' . $message->image) }}"
                                                            alt="Message Image"
                                                            class="max-w-xs mt-2 rounded shadow-md">
                                                    @endif
                                                </div>

                                                @if ($message->sender_id == Auth::id())
                                                    <!-- Current User's Image -->
                                                    {{-- <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                        alt="Your Image" class="w-10 h-10 rounded-full"> --}}
                                                    <x-avatar :avatar="$message->sender->image" :name="$message->sender->name" :w="10"
                                                        :h="10" />
                                                @endif
                                            </div>
                                        @endforeach

                                    </div>



                                </div>

                            </div>
                            <div
                                class="px-5 py-3 border-t border-border dark:border-darkborder chat-send-message-footer">
                                <!---Chat input-->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center w-full gap-2">
                                        <a class="relative flex items-center justify-center w-10 h-10 text-base rounded-full text-bodytext dark:text-darklink hover:bg-lightprimary hover:text-primary hover:dark:bg-darkprimary"
                                            href="javascript:void(0)">
                                            <i class="text-2xl ti ti-mood-smile"></i>
                                        </a>
                                        <input type="text"
                                            class="w-full text-sm bg-transparent border-0 message-type-box no-focus text-dark dark:text-white form-control"
                                            placeholder="Type a Message" fdprocessedid="0p3op" />
                                    </div>
                                    <ul class="flex items-center mb-0 list-unstyledn">
                                        <li>
                                            <a class="flex items-center justify-center w-10 h-10 text-base rounded-full text-bodytext dark:text-darklink hover:bg-lightprimary hover:text-primary hover:dark:bg-darkprimary "
                                                href="javascript:void(0)">
                                                <i class="text-2xl ti ti-photo-plus"></i>
                                            </a>

                                        </li>
                                        <li>
                                            <a class="flex items-center justify-center w-10 h-10 text-base rounded-full text-bodytext dark:text-darklink hover:bg-lightprimary hover:text-primary hover:dark:bg-darkprimary "
                                                href="javascript:void(0)">
                                                <i class="text-2xl ti ti-paperclip"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-center w-10 h-10 text-base rounded-full text-bodytext dark:text-darklink hover:bg-lightprimary hover:text-primary hover:dark:bg-darkprimary "
                                                href="javascript:void(0)">
                                                <i class="text-2xl ti ti-microphone"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!---Chat input end-->

                            </div>
                        </div>
                        <div
                            class="w-full bg-white app-chat-offcanvas border-s dark:bg-dark border-border dark:border-darkborder">
                            <div class="mh-n100" data-simplebar>

                                <div class="p-3">
                                    <div class="flex items-center justify-between mb-8 ">
                                        <h6 class="text-sm font-semibold text-dark dark:text-white ">
                                            Media <span class="opacity-50 card-subtitle">(36)</span>
                                        </h6>
                                        <a class="flex items-center justify-center w-10 h-10 text-base rounded-full chat-menu lg:hidden text-bodytext dark:text-darklink hover:bg-lightprimary hover:text-primary hover:dark:bg-darkprimary "
                                            href="javascript:void(0)">
                                            <i class="ti ti-x"></i>
                                        </a>
                                    </div>

                                    <div class="offcanvas-body">
                                        <div class="media-chat mb-7">
                                            <div class="grid grid-cols-12 gap-2">
                                                <div class="col-span-4">
                                                    <div class="overflow-hidden rounded-md ">
                                                        <img src="../assets/images/products/product-1.jpg"
                                                            alt="" class="w-full" />
                                                    </div>
                                                </div>
                                                <div class="col-span-4">
                                                    <div class="overflow-hidden rounded-md ">
                                                        <img src="../assets/images/products/product-2.jpg"
                                                            alt="" class="w-full" />
                                                    </div>
                                                </div>
                                                <div class="col-span-4">
                                                    <div class="overflow-hidden rounded-md ">
                                                        <img src="../assets/images/products/product-3.jpg"
                                                            alt="" class="w-full" />
                                                    </div>
                                                </div>
                                                <div class="col-span-4">
                                                    <div class="overflow-hidden rounded-md ">
                                                        <img src="../assets/images/products/product-4.jpg"
                                                            alt="" class="w-full" />
                                                    </div>
                                                </div>
                                                <div class="col-span-4">
                                                    <div class="overflow-hidden rounded-md ">
                                                        <img src="../assets/images/products/product-1.jpg"
                                                            alt="" class="w-full" />
                                                    </div>
                                                </div>
                                                <div class="col-span-4">
                                                    <div class="overflow-hidden rounded-md ">
                                                        <img src="../assets/images/products/product-2.jpg"
                                                            alt="" class="w-full" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="files-chat">
                                            <h6 class="mb-8 text-sm font-semibold text-dark dark:text-white ">
                                                Files <span class="opacity-50 card-subtitle">(36)</span>
                                            </h6>
                                            <a href="javascript:void(0)"
                                                class="flex items-center justify-between gap-3 mb-4 file-chat-hover">
                                                <div class="flex items-center gap-3">
                                                    <div class="p-3 rounded-md bg-lightgray dark:bg-darkprimary">
                                                        <img src="../assets/images/chat/icon-adobe.svg" alt=""
                                                            width="24" height="24" />
                                                    </div>
                                                    <div>
                                                        <h6
                                                            class="mb-1 font-semibold text-dark dark:text-white hover:text-primary">
                                                            service-task.pdf
                                                        </h6>
                                                        <div
                                                            class="flex gap-3 text-xs text-bodytext dark:text-darklink">
                                                            <span>2 MB</span><span>2 Dec
                                                                2024</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="flex items-center justify-center w-10 h-10 text-base rounded-full download-file text-bodytext dark:text-darklink hover:bg-lightprimary hover:text-primary hover:dark:bg-darkprimary ">
                                                    <i class="text-lg ti ti-download"></i>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="flex items-center justify-between gap-3 mb-4 file-chat-hover">
                                                <div class="flex items-center gap-3">
                                                    <div class="p-3 rounded-md bg-lightgray dark:bg-darkprimary">
                                                        <img src="../assets/images/chat/icon-figma.svg" alt=""
                                                            width="24" height="24" />
                                                    </div>
                                                    <div>
                                                        <h6
                                                            class="mb-1 font-semibold text-dark dark:text-white hover:text-primary">
                                                            homepage-design.fig
                                                        </h6>
                                                        <div
                                                            class="flex gap-3 text-xs text-bodytext dark:text-darklink">
                                                            <span>2 MB</span><span>2 Dec
                                                                2024</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="flex items-center justify-center w-10 h-10 text-base rounded-full download-file text-bodytext dark:text-darklink hover:bg-lightprimary hover:text-primary hover:dark:bg-darkprimary ">
                                                    <i class="text-lg ti ti-download"></i>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="flex items-center justify-between gap-3 mb-4 file-chat-hover">
                                                <div class="flex items-center gap-3">
                                                    <div class="p-3 rounded-md bg-lightgray dark:bg-darkprimary">
                                                        <img src="../assets/images/chat/icon-chrome.svg"
                                                            alt="" width="24" height="24" />
                                                    </div>
                                                    <div>
                                                        <h6
                                                            class="mb-1 font-semibold text-dark dark:text-white hover:text-primary">
                                                            about-us.html
                                                        </h6>
                                                        <div
                                                            class="flex gap-3 text-xs text-bodytext dark:text-darklink">
                                                            <span>2 MB</span><span>2 Dec
                                                                2024</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="flex items-center justify-center w-10 h-10 text-base rounded-full download-file text-bodytext dark:text-darklink hover:bg-lightprimary hover:text-primary hover:dark:bg-darkprimary ">
                                                    <i class="text-lg ti ti-download"></i>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="flex items-center justify-between gap-3 mb-4 file-chat-hover">
                                                <div class="flex items-center gap-3">
                                                    <div class="p-3 rounded-md bg-lightgray dark:bg-darkprimary">
                                                        <img src="../assets/images/chat/icon-zip-folder.svg"
                                                            alt="" width="24" height="24" />
                                                    </div>
                                                    <div>
                                                        <h6
                                                            class="mb-1 font-semibold text-dark dark:text-white hover:text-primary">
                                                            work-project.zips
                                                        </h6>
                                                        <div
                                                            class="flex gap-3 text-xs text-bodytext dark:text-darklink">
                                                            <span>2 MB</span><span>2 Dec
                                                                2024</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="flex items-center justify-center w-10 h-10 text-base rounded-full download-file text-bodytext dark:text-darklink hover:bg-lightprimary hover:text-primary hover:dark:bg-darkprimary ">
                                                    <i class="text-lg ti ti-download"></i>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="flex items-center justify-between gap-3 mb-4 file-chat-hover">
                                                <div class="flex items-center gap-3">
                                                    <div class="p-3 rounded-md bg-lightgray dark:bg-darkprimary">
                                                        <img src="../assets/images/chat/icon-javascript.svg"
                                                            alt="" width="24" height="24" />
                                                    </div>
                                                    <div>
                                                        <h6
                                                            class="mb-1 font-semibold text-dark dark:text-white hover:text-primary">
                                                            custom.js
                                                        </h6>
                                                        <div
                                                            class="flex gap-3 text-xs text-bodytext dark:text-darklink">
                                                            <span>2 MB</span><span>2 Dec
                                                                2024</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="flex items-center justify-center w-10 h-10 text-base rounded-full download-file text-bodytext dark:text-darklink hover:bg-lightprimary hover:text-primary hover:dark:bg-darkprimary ">
                                                    <i class="text-lg ti ti-download"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!----Mobile Sidebar----->
        <div id="chat-sidebar"
            class="lg:hidden bg-white hs-overlay  dark:bg-dark hs-overlay-open:translate-x-0  translate-x-full rtl:hs-overlay-open:translate-x-0  rtl:-translate-x-full  fixed top-0 right-0 rtl:left-0 rtl:right-auto transition-all duration-300 transform h-full max-w-xs  w-full z-[60] hidden"
            tabindex="-1" data-hs-overlay-close-on-resize>

            <div class="px-5 py-5">
                <div class="flex items-center justify-between ">
                    <h5 class="text-lg font-semibold text-dark dark:text-white">Chats</h5>
                    <button type="button"
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-sm text-gray-500 rounded-md hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white "
                        data-hs-overlay="#chat-sidebar">
                        <span class="sr-only">Close modal</span>
                        <i class="text-xl ti ti-x text-dark dark:text-white"></i>
                    </button>
                </div>
            </div>

            <div class="flex-shrink-0 left-part border-e border-border dark:border-darkborder user-chat-box">
                <div class="py-3">
                    <div class="flex items-center justify-between px-5 mb-3">
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <img src="../assets/images/profile/user-1.jpg" alt="user1" width="54"
                                    height="54" class="rounded-full" />
                                <span class="absolute right-0 bottom-0.5 p-1 rounded-full bg-success">
                                </span>
                            </div>
                            <div class="">
                                <h6 class="mb-2 text-sm font-semibold text-dark dark:text-white">
                                    Mathew Anderson</h6>
                                <p class="text-xs text-bodytext dark:text-darklink ">Marketing Director</p>
                            </div>
                        </div>
                        <div class="relative inline-flex hs-dropdown ">
                            <button id="hs-dropdown-custom-icon-trigger"
                                class="items-center justify-center w-10 h-10 rounded-full hs-dropdown-toggle text-bodytext dark:text-darklink hover:text-primary light-dark-hoverbg">
                                <i class="text-lg ti ti-dots-vertical"></i>
                            </button>

                            <div class="hs-dropdown-menu z-[1] transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-40"
                                aria-labelledby="hs-dropdown-custom-icon-trigger">
                                <div class="flex flex-col">
                                    <div
                                        class="px-4 py-2 border-b light-dark-hoverbg border-border dark:border-darkborder">
                                        <a class="flex items-center gap-2 leading-none card-subtitle"
                                            href="javascript:void(0)">
                                            <i class="text-base ti ti-settings"></i>Setting </a>
                                    </div>
                                    <div class="px-4 py-2 light-dark-hoverbg ">
                                        <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                            <i class="text-base ti ti-help"></i>Help
                                            and feadbacks
                                        </a>
                                    </div>
                                    <div class="px-4 py-2 light-dark-hoverbg ">
                                        <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                            <i class="text-base ti ti-layout-board-split"></i>Enable
                                            split View mode
                                        </a>
                                    </div>
                                    <div class="px-4 py-2 light-dark-hoverbg ">
                                        <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                            <i class="text-base ti ti-table-shortcut"></i>Keyboard
                                            shortcut
                                        </a>
                                    </div>
                                    <div class="px-4 py-2 light-dark-hoverbg ">
                                        <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                            <i class="text-base ti ti-login"></i>Sign
                                            Out
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-5">
                        <form class="relative w-full mt-4 mb-5 ">
                            <input type="text" class="py-2 form-control search-chat ps-10" id="text-srh"
                                placeholder="Search Contact">
                            <i
                                class="ti ti-search absolute top-1.5 start-0 translate-middle-y text-lg text-dark ms-3"></i>
                        </form>
                        <div class="relative inline-flex hs-dropdown ">
                            <button id="hs-dropdown-custom-icon-trigger"
                                class="items-center justify-center font-semibold rounded-full hs-dropdown-toggle text-bodytext dark:text-darklink">
                                Recent Chats<i class="ti ti-chevron-down ms-1 fs-5"></i>
                            </button>

                            <div class="hs-dropdown-menu z-[1] transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-40"
                                aria-labelledby="hs-dropdown-custom-icon-trigger">
                                <div class="flex flex-col">
                                    <div class="px-4 py-2 light-dark-hoverbg ">
                                        <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                            Sort by time
                                        </a>
                                    </div>
                                    <div class="px-4 py-2 light-dark-hoverbg ">
                                        <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                            Sort by Unread
                                        </a>
                                    </div>
                                    <div class="px-4 py-2 light-dark-hoverbg ">
                                        <a class="flex items-center gap-2 card-subtitle " href="javascript:void(0)">
                                            Hide favourites
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!----Left side users---->
                    <div class="mt-3 app-chat">
                        <ul class="chat-users mh-n100" data-simplebar>
                            <li>
                                <a href="javascript:void(0)"
                                    class="flex items-start justify-between px-5 py-3 bg-lightgray dark:bg-darkprimary chat-user"
                                    id="chat_user_1" data-user-id="1">
                                    <div class="flex items-center gap-3">
                                        <span class="relative">
                                            <img src="../assets/images/profile/user-1.jpg" alt="user-4"
                                                class="w-12 h-12 rounded-full">
                                            <span class="absolute right-0 bottom-0.5 p-1 rounded-full bg-success">
                                            </span>
                                        </span>
                                        <div class="inline-block ">

                                            <h6 class="text-sm font-semibold text-dark dark:text-white chat-title"
                                                data-username="Bianca Anderson">Michell
                                                Flintoffs
                                            </h6>

                                            <span class="block truncate ">You:
                                                Yesterdy was great...</span>
                                            <div class="pt-1 text-xs text-bodytext dark:text-darklink">
                                                15 minutes
                                            </div>
                                        </div>
                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="flex items-start justify-between px-5 py-3 light-dark-hoverbg chat-user"
                                    id="chat_user_2" data-user-id="2">
                                    <div class="flex items-center gap-3">
                                        <span class="relative">
                                            <img src="../assets/images/profile/user-2.jpg" alt="user-4"
                                                class="w-12 h-12 rounded-full">
                                            <span class="absolute right-0 bottom-0.5 p-1 rounded-full bg-error">
                                            </span>
                                        </span>
                                        <div class="inline-block ">

                                            <h6 class="text-sm font-semibold text-dark dark:text-white chat-title"
                                                data-username="Bianca Anderson">Bianca Anderson
                                            </h6>

                                            <span class="block truncate">Nice
                                                looking dress you...</span>
                                            <div class="pt-1 text-xs text-bodytext dark:text-darklink">
                                                30 minutes
                                            </div>
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="flex items-start justify-between px-5 py-3 light-dark-hoverbg chat-user"
                                    id="chat_user_3" data-user-id="3">
                                    <div class="flex items-center gap-3">
                                        <span class="relative">
                                            <img src="../assets/images/profile/user-8.jpg" alt="user-4"
                                                class="w-12 h-12 rounded-full">
                                            <span class="absolute right-0 bottom-0.5 p-1 rounded-full bg-warning">
                                            </span>
                                        </span>
                                        <div class="inline-block ">

                                            <h6 class="text-sm font-semibold text-dark dark:text-white chat-title"
                                                data-username="Andrew Johnson">Andrew Johnson
                                            </h6>

                                            <span class="block truncate">Sent
                                                a photo</span>
                                            <div class="pt-1 text-xs text-bodytext dark:text-darklink">
                                                2 hours
                                            </div>
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="flex items-start justify-between px-5 py-3 light-dark-hoverbg chat-user"
                                    id="chat_user_4" data-user-id="4">
                                    <div class="flex items-center gap-3">
                                        <span class="relative">
                                            <img src="../assets/images/profile/user-4.jpg" alt="user-4"
                                                class="w-12 h-12 rounded-full">
                                            <span class="absolute right-0 bottom-0.5 p-1 rounded-full bg-success">
                                            </span>
                                        </span>
                                        <div class="inline-block ">

                                            <h6 class="text-sm font-semibold text-dark dark:text-white chat-title"
                                                data-username="Mark Strokes">Mark Strokes
                                            </h6>

                                            <span class="block truncate">Lorem
                                                ispusm text sud...</span>
                                            <div class="pt-1 text-xs text-bodytext dark:text-darklink">
                                                5 days
                                            </div>
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="flex items-start justify-between px-5 py-3 light-dark-hoverbg chat-user"
                                    id="chat_user_5" data-user-id="5">
                                    <div class="flex items-center gap-3">
                                        <span class="relative">
                                            <img src="../assets/images/profile/user-4.jpg" alt="user-4"
                                                class="w-12 h-12 rounded-full">
                                            <span class="absolute right-0 bottom-0.5 p-1 rounded-full bg-success">
                                            </span>
                                        </span>
                                        <div class="inline-block ">

                                            <h6 class="text-sm font-semibold text-dark dark:text-white chat-title"
                                                data-username="Mark Strokes">Mark, Stoinus &
                                                Rishvi..
                                            </h6>

                                            <span class="block truncate">Lorem
                                                ispusm text sud...</span>
                                            <div class="pt-1 text-xs text-bodytext dark:text-darklink">
                                                5 days
                                            </div>
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="flex items-start justify-between px-5 py-3 light-dark-hoverbg chat-user"
                                    id="chat_user_2" data-user-id="2">
                                    <div class="flex items-center gap-3">
                                        <span class="relative">
                                            <img src="../assets/images/profile/user-2.jpg" alt="user-4"
                                                class="w-12 h-12 rounded-full">
                                            <span class="absolute right-0 bottom-0.5 p-1 rounded-full bg-error">
                                            </span>
                                        </span>
                                        <div class="inline-block ">

                                            <h6 class="text-sm font-semibold text-dark dark:text-white chat-title"
                                                data-username="Bianca Anderson">Bianca Anderson
                                            </h6>

                                            <span class="block truncate">Nice
                                                looking dress you...</span>
                                            <div class="pt-1 text-xs text-bodytext dark:text-darklink">
                                                30 minutes
                                            </div>
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="flex items-start justify-between px-5 py-3 light-dark-hoverbg chat-user"
                                    id="chat_user_3" data-user-id="3">
                                    <div class="flex items-center gap-3">
                                        <span class="relative">
                                            <img src="../assets/images/profile/user-8.jpg" alt="user-4"
                                                class="w-12 h-12 rounded-full">
                                            <span class="absolute right-0 bottom-0.5 p-1 rounded-full bg-warning">
                                            </span>
                                        </span>
                                        <div class="inline-block ">

                                            <h6 class="text-sm font-semibold text-dark dark:text-white chat-title"
                                                data-username="Andrew Johnson">Andrew Johnson
                                            </h6>

                                            <span class="block truncate">Nice
                                                looking dress you...</span>
                                            <div class="pt-1 text-xs text-bodytext dark:text-darklink">
                                                2 hours
                                            </div>
                                        </div>

                                    </div>

                                </a>
                            </li>
                        </ul>
                    </div>
                    <!----Left side users wnd---->
                </div>
            </div>

        </div>
        <!----Mobile Sidebar End----->
    </div>
</div>
