<li>
    <a href="{{ $href }}" class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="{{ $svgViewBox }}">
            <path d="{{ $svgPath }}"/>
        </svg>
        {{ $slot }}
    </a>
</li>
