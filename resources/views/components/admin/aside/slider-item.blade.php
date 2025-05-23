<!-- resources/views/components/sidebar-link.blade.php -->
<li class="sidebar-item">
    @php
        $isActive = request()->routeIs($activeRoute); // Check if the current route is the active route
    @endphp

    <a class="sidebar-link dark-sidebar-link {{ $isActive ? 'active activemenu' : '' }} dark:text-white"
        href="{{ $href }}">
        {{ $slot }}
    </a>
</li>
