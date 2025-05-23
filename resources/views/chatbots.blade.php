<x-app-layout>
     <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-text-800">
            {{ __('About') }}
        </h2>
    </x-slot>
    {{-- <div class="">
        @livewire('chat')
    </div> --}}
    <div class="flex flex-col items-center justify-center w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="mb-4 text-2xl font-semibold text-center">استفسار عن العقارات</h2>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sendchat') }}" method="post">
{{--            @csrf--}}
            <div class="mb-4">
                <label for="query" class="block text-sm font-medium text-gray-700">استفسار</label>
                <textarea id="query" name="query" rows="4" required class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-teal-300 focus:border-teal-500"></textarea>
            </div>

            <button type="submit" class="w-full py-2 font-semibold text-white transition duration-200 bg-teal-500 rounded-md hover:bg-teal-600">
                إرسال
            </button>
        </form>
    </div>


</x-app-layout>
