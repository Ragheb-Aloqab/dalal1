<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="الإعلانات" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'الإعلانات'],
        ]" />
    </x-slot>

    <x-admin.search-and-add searchUrl="{{ route('admin.advertisements.index') }}"
        createUrl="{{ route('admin.advertisements.create') }}" />

    <x-admin.table>
        <x-admin.table-head>
            <x-admin.table-header>
                المزود
            </x-admin.table-header>

            <x-admin.table-header>
                العنوان
            </x-admin.table-header>

            <x-admin.table-header>
                المشاهدات
            </x-admin.table-header>
            <x-admin.table-header>
                المشاركات
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
            @foreach ($advertisements as $ad)
                <tr class="search-items">
                    <td class="p-4 ps-0 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <div class="">
                                <img src="{{ asset($ad->provider->user->avatar ? 'storage/profile/' . $ad->provider->user->avatar : 'assets/images/profile/user-1.jpg') }}"
                                    class="w-12 h-12 rounded-full" alt="{{ $ad->provider->user->name }}" />
                            </div>
                            <div>
                                <h6 class="mb-1 user-name text-md" data-name="{{ $ad->provider->user->name }}">
                                    {{ $ad->provider->user->name }}
                                </h6>
                                <p class="text-xs user-work text-bodytext dark:text-darklink">
                                <div class="flex items-center ">
                                    <span
                                        class="px-2 rounded-sm badge-xs bg-lightprimary text-primary dark:bg-darkprimary dark:text-primary ">
                                        {{ $ad->provider->user->email }}
                                    </span>

                                </div>
                                </p>
                            </div>
                        </div>
                    </td>
                    <x-admin.table-data>
                        {{ Str::limit($ad->title, 50, '...') }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <i class="ti ti-eye me-2 text-info"></i>
                        {{ $ad->views_count ? $ad->views_count : 0 }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <i class="ti ti-share me-2 text-success"></i>
                        {{ $ad->shares_count ? $ad->shares_count : 0 }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <i class="ti ti-star me-2 text-warning"></i> {{ $ad->rating ? $ad->rating : 0 }}

                    </x-admin.table-data>
                    <x-admin.table-data>
                        <i class="ti ti-thumb-up me-2 text-primary"></i>
                        {{ $ad->likes_count ? $ad->likes_count : 0 }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <span
                            class="px-2 rounded-sm badge-xs
                                                @if ($ad->status == 'active') bg-lightsuccess text-success dark:bg-darksuccess dark:text-success
                                                @elseif ($ad->status == 'inactive') bg-lightprimary text-primary dark:bg-darkprimary dark:text-primary
                                                @else  bg-lighterror text-error  dark:bg-darkerror dark:text-error @endif">
                            {{ ucfirst($ad->status) }}
                        </span>
                    </x-admin.table-data>
                    <x-admin.table-data>
                        <x-admin.table-action-buttons :viewUrl="route('admin.advertisements.show', $ad->id)" :editUrl="route('admin.advertisements.edit', $ad->id)" :deleteUrl="route('admin.advertisements.destroy', $ad->id)" />
                    </x-admin.table-data>
                </tr>
            @endforeach
        </x-admin.table-body>
    </x-admin.table>


</x-app-layout-admin>
