<!-- resources/views/components/tabs/tab-panel.blade.php -->
<div
    class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
    id="styled-{{ $id }}"
    role="tabpanel"
    aria-labelledby="{{ $id }}-tab">
    {{ $slot }}
</div>
