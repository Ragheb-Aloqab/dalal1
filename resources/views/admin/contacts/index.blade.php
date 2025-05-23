<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="جهات الاتصال" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'جهات الاتصال'],
        ]" />
    </x-slot>

    <x-admin.search-and-add searchUrl="{{ route('admin.contacts.index') }}"
        createUrl="{{ route('admin.contacts.create') }}" />

    <x-admin.table>
        <x-admin.table-head>
            <x-admin.table-header>
                #
            </x-admin.table-header>
            <x-admin.table-header>
                الاسم
            </x-admin.table-header>
            <x-admin.table-header>
                أيقونة الويب
            </x-admin.table-header>
            <x-admin.table-header>
                أيقونة التطبيق
            </x-admin.table-header>
            <x-admin.table-header>
                الرابط
            </x-admin.table-header>
            <x-admin.table-header>
                الإجراءات
            </x-admin.table-header>
        </x-admin.table-head>
        <x-admin.table-body>
            @foreach ($contacts as $item)
                <tr class="search-items">
                    <x-admin.table-data>
                        {{ $item->id }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        {{ $item->name }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        {{ $item->web_icon }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        {{ $item->apk_icon }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                       {{$item->link}}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <x-admin.table-action-buttons :viewUrl="route('admin.contacts.show', $item->id)" :editUrl="route('admin.contacts.edit', $item->id)" :deleteUrl="route('admin.contacts.destroy', $item->id)" />
                    </x-admin.table-data>
                </tr>
            @endforeach
        </x-admin.table-body>
    </x-admin.table>

</x-app-layout-admin>
