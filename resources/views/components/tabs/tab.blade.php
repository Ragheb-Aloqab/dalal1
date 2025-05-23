<!-- resources/views/components/tabs/tab.blade.php -->
@props(['id', 'active' => false])

<li class="me-2" role="presentation">
    <button
        class="inline-block p-4 border-b-2 rounded-t-lg {{ $active ? 'text-purple-600 border-purple-600 dark:text-purple-500 dark:border-purple-500' : 'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}"
        id="{{ $id }}-styled-tab"
        data-tabs-target="#styled-{{ $id }}"
        type="button" role="tab"
        aria-controls="{{ $id }}"
        aria-selected="{{ $active ? 'true' : 'false' }}">
        {{ $slot }}
    </button>
</li>
