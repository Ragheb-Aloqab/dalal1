<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-text-800">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="">
        @livewire('tabs-component')
    </div>
</x-app-layout>
