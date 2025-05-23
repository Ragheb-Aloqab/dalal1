<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="الطلبات" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.requests.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'الطلبات'],
        ]" />
    </x-slot>


    <x-admin.search-and-add searchUrl="{{ route('admin.requests.index') }}"
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
                                                    <div class="text-center n-chk align-self-center">
                                                        <div class="form-check">
                                                            <label class="form-check-label"
                                                                for="request-check-all">#</label>
                                                            <span class="new-control-indicator"></span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-sm font-semibold text-right text-dark dark:text-white">
                                                    المستخدم
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
                                                        <div class="text-center n-chk align-self-center">
                                                            <div class="form-check">
                                                                <label class="form-check-label"
                                                                    for="checkbox{{ $request->id }}">{{ $request->id }}</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-4 text-right whitespace-nowrap">
                                                        <h6 class="mb-1">{{ $request->user->name }}</h6>
                                                    </td>
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
                                                            <a href="{{ route('admin.requests.show', $request->id) }}"
                                                                class="text-info edit">
                                                                <i class="text-lg ti ti-eye"></i>
                                                            </a>
                                                            <a href="{{ route('admin.requests.edit', $request->id) }}"
                                                                class="text-dark delete">
                                                                <i
                                                                    class="text-lg ti ti-pencil text-bodytext dark:text-darklink"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('admin.requests.destroy', $request->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-danger delete">
                                                                    <i class="text-lg ti ti-trash"></i>
                                                                </button>
                                                            </form>
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
