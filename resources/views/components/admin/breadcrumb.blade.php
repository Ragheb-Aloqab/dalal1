@props(['items' => []])

<ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
    @foreach ($items as $index => $item)
        <li class="inline-flex items-center">
            @if (isset($item['url']))
                <a class="flex items-center text-sm leading-tight text-gray-500 hover:text-primary focus:outline-none focus:text-primary dark:focus:text-primary"
                    href="{{ $item['url'] }}">
                    @isset($item['icon'])
                        <i class="text-lg font-medium leading-tight {{ $item['icon'] }} me-3"></i>
                    @endisset
                    {{ $item['label'] }}
                </a>
                @if ($index < count($items) - 1)
                    <i class="mx-2 text-sm font-medium leading-tight ti ti-chevron-right"></i>
                @endif
            @else
                <span class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200">
                    {{ $item['label'] }}
                </span>
            @endif
        </li>
    @endforeach
</ol>
