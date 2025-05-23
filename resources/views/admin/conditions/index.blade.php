<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="الشروط والأحكام" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'الشروط والأحكام'],
        ]" />
    </x-slot>

    <x-admin.search-and-add searchUrl="{{ route('admin.conditions.index') }}"
        createUrl="{{ route('admin.conditions.create') }}" />
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
                الإجراءات
            </x-admin.table-header>
        </x-admin.table-head>
        <x-admin.table-body>
            @foreach ($conditions as $item)
                <tr class="search-items">
                    <x-admin.table-data>
                        {{ $item->id }}
                    </x-admin.table-data>
                    <x-admin.table-data>

                        {{ $item->header }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        {{ Str::limit($item->content, 50, '...') }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <x-admin.table-action-buttons :viewUrl="route('admin.conditions.show', $item->id)" :editUrl="route('admin.conditions.edit', $item->id)" :deleteUrl="route('admin.conditions.destroy', $item->id)" />
                    </x-admin.table-data>
                </tr>
            @endforeach
        </x-admin.table-body>
    </x-admin.table>

</x-app-layout-admin>
