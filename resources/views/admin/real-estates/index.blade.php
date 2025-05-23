<x-app-layout-admin>

    <x-slot name="header">
        <x-admin.title text="عرض العقارات" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'العقارات'],
        ]" />
    </x-slot>



    <x-admin.search-and-add searchUrl="{{ route('admin.real-estates.index') }}"
        createUrl="{{ route('admin.real-estates.create') }}" />

    <x-admin.table>
        <x-admin.table-head>
            <x-admin.table-header>
                المزود
            </x-admin.table-header>

            <x-admin.table-header>
                الوصف
            </x-admin.table-header>

            <x-admin.table-header>
                النوع
            </x-admin.table-header>

            <x-admin.table-header>
                المشاهدات
            </x-admin.table-header>

            <x-admin.table-header>
                التقييم
            </x-admin.table-header>
            <x-admin.table-header>
                الإعجابات
            </x-admin.table-header>
            <x-admin.table-header>
                الحالة
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
                        <span
                            class="px-2 rounded-sm badge-xs
                    @if ($real->isBuilding()) bg-lightprimary text-primary dark:bg-darkprimary dark:text-primary
                    @elseif($real->isApartment()) bg-lightsuccess text-success dark:bg-darksuccess dark:text-success
                    @elseif($real->isLand())bg-lightgray text-dark dark:bg-darkborder dark:text-darklink @endif
                ">
                            @if ($real->isBuilding())
                                مبني
                            @elseif($real->isApartment())
                                شقه
                            @elseif($real->isLand())
                                ارض
                            @endif
                        </span>
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <i class="ti ti-eye me-2 text-info"></i>
                        {{ $real->advertisement->views_count ? $real->advertisement->views_count : 0 }}
                    </x-admin.table-data>

                    <x-admin.table-data>
                        <i class="ti ti-star me-2 text-warning"></i>
                        {{ $real->advertisement->rating ? $real->advertisement->rating : 0 }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <i class="ti ti-thumb-up me-2 text-primary"></i>
                        {{ $real->advertisement->likes_count ? $real->advertisement->likes_count : 0 }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <span
                            class="px-2 rounded-sm badge-xs
                                                @if ($real->advertisement->status == 'active') bg-lightsuccess text-success dark:bg-darksuccess dark:text-success
                                                @elseif ($real->advertisement->status == 'inactive') bg-lightprimary text-primary dark:bg-darkprimary dark:text-primary
                                                @else  bg-lighterror text-error  dark:bg-darkerror dark:text-error @endif">
                            {{ ucfirst($real->advertisement->status) }}
                        </span>
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <x-admin.table-action-buttons :viewUrl="route('admin.real-estates.show', $real->id)" :editUrl="route('admin.real-estates.edit', $real->id)" :deleteUrl="route('admin.real-estates.destroy', $real->id)" />
                    </x-admin.table-data>
                </tr>
            @endforeach
        </x-admin.table-body>
    </x-admin.table>


</x-app-layout-admin>
