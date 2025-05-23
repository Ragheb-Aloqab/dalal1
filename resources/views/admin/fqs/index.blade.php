<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="الأسئلة المتكررة" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'الأسئلة المتكررة'],
        ]" />
    </x-slot>

    <x-admin.search-and-add searchUrl="{{ route('admin.fqs.index') }}" createUrl="{{ route('admin.fqs.create') }}" />

    <x-admin.table>
        <x-admin.table-head>
            <x-admin.table-header>
                #
            </x-admin.table-header>

            <x-admin.table-header>
                السؤال
            </x-admin.table-header>

            <x-admin.table-header>
                الجواب
            </x-admin.table-header>

            <x-admin.table-header>
                الإجراءات
            </x-admin.table-header>
        </x-admin.table-head>
        <x-admin.table-body>
            @foreach ($fqs as $item)
                <tr class="search-items">
                    <x-admin.table-data>
                        {{ $item->id }}
                    </x-admin.table-data>
                    <x-admin.table-data>

                        {{ $item->question }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        {{ Str::limit($item->answer, 50, '...') }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <x-admin.table-action-buttons :viewUrl="route('admin.fqs.show', $item->id)" :editUrl="route('admin.fqs.edit', $item->id)" :deleteUrl="route('admin.fqs.destroy', $item->id)" />
                    </x-admin.table-data>
                </tr>
            @endforeach
        </x-admin.table-body>
    </x-admin.table>
</x-app-layout-admin>
