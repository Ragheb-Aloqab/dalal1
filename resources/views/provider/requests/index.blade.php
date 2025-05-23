<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="الطلبات" />
        <x-admin.breadcrumb :items="[
            ['url' => route('provider.requests.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'الطلبات'],
        ]" />
    </x-slot>


    <x-admin.search-and-add searchUrl="{{ route('provider.requests.index') }}"
        createUrl="{{ route('admin.requests.create') }}" />

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="card">
                <div class="card-body">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="overflow-hidden">
                                    <table class="table min-w-full divide-y divide-border dark:divide-darkborder">
                                        <thead>
                                            <tr>
                                                <th class="p-4 ps-0">
                                                    <div class="text-right n-chk align-self-center">
                                                        <div class="form-check">
                                                            <label class="form-check-label"
                                                                for="request-check-all">المستخدم</label>
                                                            <span class="new-control-indicator"></span>
                                                        </div>
                                                    </div>
                                                </th>


                                                <th scope="col"
                                                    class="p-4 text-sm font-semibold text-right text-dark dark:text-white">
                                                    الوصف
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-sm font-semibold text-right text-dark dark:text-white">
                                                    نوع الطلب
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-sm font-semibold text-right text-dark dark:text-white">
                                                    الحالة
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-sm font-semibold text-right text-dark dark:text-white">
                                                    الإجراء
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-border dark:divide-darkborder">
                                            @foreach ($requests as $request)
                                                <tr class="search-items">
                                                    <td class="p-4 ps-0 whitespace-nowrap">
                                                        <div class="flex items-center gap-3">
                                                            <div class="">
                                                                <img src="{{ asset($request->user->avatar ? 'storage/profile/' . $request->user->avatar : 'assets/images/profile/user-1.jpg') }}"
                                                                    class="w-12 h-12 rounded-full"
                                                                    alt="{{ $request->user->name }}" />
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1 user-name text-md"
                                                                    data-name="{{ $request->user->name }}">
                                                                    {{ $request->user->name }}
                                                                </h6>
                                                                <p
                                                                    class="text-xs user-work text-bodytext dark:text-darklink">
                                                                <div class="flex items-center ">
                                                                    <span
                                                                        class="px-2 rounded-sm badge-xs bg-lightprimary text-primary dark:bg-darkprimary dark:text-primary ">
                                                                        {{ $request->user->email }}
                                                                    </span>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <x-admin.table-data>
                                                        {{ Str::limit($request->description, 50, '...') }}
                                                    </x-admin.table-data>
                                                   
                                                    <td class="p-4 text-right whitespace-nowrap">
                                                        <p class="text-xs">
                                                            {{ ucfirst($request->request_type) }}
                                                        </p>
                                                    </td>
                                                    <td class="p-4 text-right whitespace-nowrap">
                                                        <p class="text-xs">
                                                            {{ ucfirst($request->status) }}
                                                        </p>
                                                    </td>
                                                    <td class="p-4 text-sm text-right whitespace-nowrap">
                                                        <div class="flex gap-3 action-btn">
                                                            <a href="{{ route('provider.requests.show', $request->id) }}"
                                                                class="text-info edit">
                                                                <i class="text-lg ti ti-eye"></i>
                                                            </a>
                                                            <a href="{{ route('provider.requests.edit', $request->id) }}"
                                                                class="text-dark delete">
                                                                <i
                                                                    class="text-lg ti ti-pencil text-bodytext dark:text-darklink"></i>
                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout-admin>
