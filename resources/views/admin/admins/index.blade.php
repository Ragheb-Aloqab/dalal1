<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="المشرفين" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'المشرفين'],
        ]" />
    </x-slot>
    <x-admin.search-and-add searchUrl="{{ route('admin.admins.index') }}"
        createUrl="{{ route('admin.admins.create') }}" />

    <x-admin.table>
        <x-admin.table-head>
            <x-admin.table-header>
                الاسم
            </x-admin.table-header>

            <x-admin.table-header>
                البريد الإلكتروني
            </x-admin.table-header>

            <x-admin.table-header>
                الموقع
            </x-admin.table-header>
            <x-admin.table-header>
                الهاتف
            </x-admin.table-header>

            <x-admin.table-header>
                الإجراءات
            </x-admin.table-header>
        </x-admin.table-head>
        <x-admin.table-body>
            @foreach ($users as $user)
                <tr class="search-items">
                    <td class="p-4 ps-0 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <div class="">
                                <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('assets/images/profile/user-1.jpg') }}"
                                    class="w-12 h-12 rounded-full" alt="{{ $user->name }}" />
                            </div>
                            <div>
                                <h6 class="mb-1 user-name text-md" data-name="{{ $user->name }}">
                                    {{ $user->name }}
                                </h6>
                                <p class="text-xs user-work text-bodytext dark:text-darklink">
                                <div class="flex items-center ">
                                    <span
                                        class="px-2 rounded-sm badge-xs
                                                @if ($user->isAdmin()) bg-lightprimary text-primary dark:bg-darkprimary dark:text-primary
                                                @elseif($user->isProvider()) bg-lightsuccess text-success dark:bg-darksuccess dark:text-success
                                                @elseif($user->isClient())bg-lightgray text-dark dark:bg-darkborder dark:text-darklink @endif
                                            ">
                                        @if ($user->isAdmin())
                                            Admin
                                        @elseif($user->isProvider())
                                            Provider
                                        @elseif($user->isClient())
                                            Client
                                        @endif
                                    </span>

                                </div>
                                </p>
                            </div>
                        </div>
                    </td>
                    <x-admin.table-data>
                        {{ $user->email }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        {{ $user->city->name }}
                    </x-admin.table-data>
                    <x-admin.table-data>
                        {{ $user->phone }}
                    </x-admin.table-data>

                    <x-admin.table-data>
                        <x-admin.table-action-buttons :viewUrl="route('admin.admins.show', $user->id)" :editUrl="route('admin.admins.edit', $user->id)" :deleteUrl="route('admin.admins.destroy', $user->id)" />
                    </x-admin.table-data>
                </tr>
            @endforeach
        </x-admin.table-body>
    </x-admin.table>
</x-app-layout-admin>
