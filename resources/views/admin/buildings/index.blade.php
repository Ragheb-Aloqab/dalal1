<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="قائمة المباني" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'المباني'],
        ]" />
    </x-slot>
    <x-admin.search-and-add searchUrl="{{ route('admin.buildings.index') }}"
    createUrl="{{ route('admin.buildings.create') }}" />
    <x-admin.table>
        <x-admin.table-head>
            <x-admin.table-header>
                المزود
            </x-admin.table-header>

            <x-admin.table-header>
                الوصف
            </x-admin.table-header>

            <x-admin.table-header>
                الحدود
            </x-admin.table-header>
            <x-admin.table-header>
                السعر
            </x-admin.table-header>
            <x-admin.table-header>
                عدد الطوابق
            </x-admin.table-header>
            <x-admin.table-header>
                عدد الشقق
            </x-admin.table-header>

            <x-admin.table-header>
                المدينه
            </x-admin.table-header>
            <x-admin.table-header>
                الإجراءات
            </x-admin.table-header>
        </x-admin.table-head>
        <x-admin.table-body>
            @foreach ($reals as $real)
                <tr class="search-items">
                    <td class="p-4 ps-0 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <div class="">
                                <img src="{{ asset($real->advertisement->provider->user->avatar ? 'storage/profile/' . $real->advertisement->provider->user->avatar : 'assets/images/profile/user-1.jpg') }}"
                                    class="w-12 h-12 rounded-full"
                                    alt="{{ $real->advertisement->provider->user->name }}" />
                            </div>
                            <div>
                                <h6 class="mb-1 user-name text-md"
                                    data-name="{{ $real->advertisement->provider->user->name }}">
                                    {{ $real->advertisement->provider->user->name }}
                                </h6>
                                <p class="text-xs user-work text-bodytext dark:text-darklink">
                                <div class="flex items-center ">
                                    <span
                                        class="px-2 rounded-sm badge-xs bg-lightprimary text-primary dark:bg-darkprimary dark:text-primary ">
                                        {{ $real->advertisement->provider->user->email }}
                                    </span>

                                </div>
                                </p>
                            </div>
                        </div>
                    </td>
                    <x-admin.table-data>
                        {{ Str::limit($real->description, 50, '...') }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        {{ Str::limit($real->boundaries, 50, '...') }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        {{ $real->price }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        {{ $real->realEstateable->floors_number }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        {{ $real->realEstateable->apartments_count }}
                    </x-admin.table-data>

                    <x-admin.table-data>
                        <span
                            class="px-2 rounded-sm badge-xs bg-lightsuccess text-success dark:bg-darksuccess dark:text-success">
                            {{ $real->city->name }}
                        </span>
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <x-admin.table-action-buttons :viewUrl="route('admin.buildings.show', $real->id)" :editUrl="route('admin.buildings.edit', $real->id)" :deleteUrl="route('admin.buildings.destroy', $real->id)" />
                    </x-admin.table-data>
                </tr>
            @endforeach
        </x-admin.table-body>
    </x-admin.table>
</x-app-layout-admin>
