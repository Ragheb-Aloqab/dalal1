<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="عرض الإعدادات" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'الإعدادات'],
        ]" />
    </x-slot>


    <x-admin.search-and-add searchUrl="{{ route('admin.settings.index') }}"
        createUrl="{{ route('admin.settings.create') }}" />
    <x-admin.table>
        <x-admin.table-head>
            <x-admin.table-header>
                #
            </x-admin.table-header>

            <x-admin.table-header>
                المفتاح
            </x-admin.table-header>

            <x-admin.table-header>
                القيمة
            </x-admin.table-header>

            <x-admin.table-header>
                الإجراءات
            </x-admin.table-header>
        </x-admin.table-head>
        <x-admin.table-body>
            @foreach ($settings as $item)
                <tr class="search-items">
                    <x-admin.table-data>
                        {{ $item->id }}
                    </x-admin.table-data>
                    <x-admin.table-data>

                        {{ $item->key }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        {{ Str::limit($item->value, 50, '...') }}
                    </x-admin.table-data>

                    <x-admin.table-data>
                        <x-admin.table-action-buttons :viewUrl="route('admin.settings.show', $item->id)" :editUrl="route('admin.settings.edit', $item->id)" :deleteUrl="route('admin.settings.destroy', $item->id)" />
                    </x-admin.table-data>
                </tr>
            @endforeach
        </x-admin.table-body>
    </x-admin.table>

</x-app-layout-admin>
