<x-app-layout-provider>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('provider') }}
        </h2>
    </x-slot>
    {{-- <a href="{{ route('con') }}" class="inline-block p-4 text-center text-white transition duration-300 ease-in-out bg-purple-600 rounded-lg shadow-md hover:bg-purple-700">
        Client
    </a>
    <a href="{{ route('not') }}" class="inline-block p-4 text-center text-white transition duration-300 ease-in-out bg-purple-600 rounded-lg shadow-md hover:bg-purple-700">
        notify
    </a> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
   @livewire('advertisement-chart')



</x-app-layout-provider>
