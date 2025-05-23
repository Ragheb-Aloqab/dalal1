<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="عرض الردود" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'عرض الردود']
        ]" />
    </x-slot>


    <x-admin.search-and-add searchUrl="{{ route('admin.responses.index') }}"
        createUrl="{{ route('admin.responses.create') }}" />

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
                                                                for="response-check-all">#</label>
                                                            <span class="new-control-indicator"></span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-sm font-semibold text-right text-dark dark:text-white">
                                                    العنوان
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-sm font-semibold text-right text-dark dark:text-white">
                                                    الرد
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-sm font-semibold text-right text-dark dark:text-white">
                                                    الإجراء
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-border dark:divide-darkborder">
                                            @foreach ($responses as $response)
                                                <tr class="search-items">
                                                    <td class="p-4 ps-0 whitespace-nowrap">
                                                        <div class="text-center n-chk align-self-center">
                                                            <div class="form-check">
                                                                <label class="form-check-label"
                                                                    for="checkbox{{ $response->id }}">{{ $response->id }}</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-4 text-right whitespace-nowrap">
                                                        <h6 class="mb-1">{{ $response->title }}</h6>
                                                    </td>
                                                    <td
                                                        class="max-w-xs p-4 overflow-hidden text-right whitespace-nowrap text-ellipsis">
                                                        <p class="text-xs">
                                                            {{ Str::limit($response->content, 50, '...') }}
                                                        </p>
                                                    </td>
                                                    <td class="p-4 text-sm text-right whitespace-nowrap">
                                                        <div class="flex gap-3 action-btn">
                                                            <a href="{{ route('admin.responses.show', $response->id) }}"
                                                                class="text-info edit">
                                                                <i class="text-lg ti ti-eye"></i>
                                                            </a>
                                                            <a href="{{ route('admin.responses.edit', $response->id) }}"
                                                                class="text-dark delete">
                                                                <i
                                                                    class="text-lg ti ti-pencil text-bodytext dark:text-darklink"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('admin.responses.destroy', $response->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('هل أنت متأكد من حذف هذا الرد؟');">
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
