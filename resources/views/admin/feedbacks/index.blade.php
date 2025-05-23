<x-app-layout-admin>
    <x-slot name="header">
        <h4 class="mb-3 text-xl font-semibold text-dark dark:text-white">قائمة التغذية الراجعة</h4>
        <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm leading-tight text-gray-500 hover:text-primary focus:outline-none focus:text-primary dark:focus:text-primary"
                    href="{{ route('admin.dashboard.index') }}">
                    <i class="text-lg font-medium leading-tight ti ti-home me-3"></i>
                    الصفحة الرئيسية
                </a>
                <i class="mx-2 text-sm font-medium leading-tight ti ti-chevron-right"></i>
            </li>
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm leading-tight text-gray-500 hover:text-primary focus:outline-none focus:text-primary dark:focus:text-primary"
                    href="{{ route('admin.feedback.index') }}">
                    <i class="text-lg font-medium leading-tight ti ti-feedback me-3"></i>
                    التغذية الراجعة
                </a>
            </li>
        </ol>
    </x-slot>

    <x-admin.search-and-add searchUrl="{{ route('admin.feedback.index') }}"
        createUrl="{{ route('admin.feedback.create') }}" />

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
                                                                for="feedback-check-all">#</label>
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
                                                    المحتوى
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-sm font-semibold text-right text-dark dark:text-white">
                                                    التقييم
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-sm font-semibold text-right text-dark dark:text-white">
                                                    النوع
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-sm font-semibold text-right text-dark dark:text-white">
                                                    الإجراء
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-border dark:divide-darkborder">
                                            @foreach ($feedbacks as $feedback)
                                                <tr class="search-items">
                                                    <td class="p-4 ps-0 whitespace-nowrap">
                                                        <div class="text-center n-chk align-self-center">
                                                            <div class="form-check">
                                                                <label class="form-check-label"
                                                                    for="checkbox{{ $feedback->id }}">{{ $feedback->id }}</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-4 text-right whitespace-nowrap">
                                                        <h6 class="mb-1">{{ $feedback->user->name }}</h6>
                                                    </td>
                                                    <td
                                                        class="max-w-xs p-4 overflow-hidden text-right whitespace-nowrap text-ellipsis">
                                                        <p class="text-xs">
                                                            {{ Str::limit($feedback->content, 50, '...') }}
                                                        </p>
                                                    </td>
                                                    <td class="p-4 text-right whitespace-nowrap">
                                                        {{ $feedback->rating ? $feedback->rating : 'N/A' }}
                                                    </td>
                                                    <td class="p-4 text-right whitespace-nowrap">
                                                        {{ ucfirst($feedback->type) }}
                                                    </td>
                                                    <td class="p-4 text-sm text-right whitespace-nowrap">
                                                        <div class="flex gap-3 action-btn">
                                                            <a href="{{ route('admin.feedback.show', $feedback->id) }}"
                                                                class="text-info edit">
                                                                <i class="text-lg ti ti-eye"></i>
                                                            </a>
                                                            <a href="{{ route('admin.feedback.edit', $feedback->id) }}"
                                                                class="text-dark delete">
                                                                <i
                                                                    class="text-lg ti ti-pencil text-bodytext dark:text-darklink"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('admin.feedback.destroy', $feedback->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('هل أنت متأكد من حذف هذا العنصر؟');">
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
