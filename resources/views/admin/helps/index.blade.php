<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="قائمة المساعدات" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'قائمة المساعدات'],
        ]" />
    </x-slot>

    <x-admin.search-and-add searchUrl="{{ route('admin.helps.index') }}" createUrl="{{ route('admin.helps.create') }}" />


    <x-admin.table>
        <x-admin.table-head>
            <x-admin.table-header>
                #
            </x-admin.table-header>

            <x-admin.table-header>
                العنوان
            </x-admin.table-header>

            <x-admin.table-header>
                المحتوى
            </x-admin.table-header>

            <x-admin.table-header>
                النوع
            </x-admin.table-header>

            <x-admin.table-header>
                الإجراءات
            </x-admin.table-header>
        </x-admin.table-head>
        <x-admin.table-body>
            @foreach ($helps as $item)
                <tr class="search-items">
                    <x-admin.table-data>
                        {{ $item->id }}
                    </x-admin.table-data>
                    <x-admin.table-data>

                        {{ $item->title }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        {{ Str::limit($item->content, 50, '...') }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <span class="text-sm">{{ $item->type }}</span>
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <x-admin.table-action-buttons :viewUrl="route('admin.helps.show', $item->id)" :editUrl="route('admin.helps.edit', $item->id)" :deleteUrl="route('admin.helps.destroy', $item->id)" />
                    </x-admin.table-data>
                </tr>
            @endforeach
        </x-admin.table-body>
    </x-admin.table>
</x-app-layout-admin>
