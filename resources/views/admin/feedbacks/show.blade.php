<x-app-layout-admin>
    <x-slot name="header">
        <h4 class="mb-3 text-xl font-semibold text-dark dark:text-white">تفاصيل التغذية الراجعة</h4>
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
                <i class="mx-2 text-sm font-medium leading-tight ti ti-chevron-right"></i>
            </li>
            <li class="inline-flex items-center">
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">تفاصيل</span>
            </li>
        </ol>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">المستخدم</label>
                <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $feedback->user->name }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">المحتوى</label>
                <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $feedback->content }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">التقييم</label>
                <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $feedback->rating }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">النوع</label>
                <p class="mt-1 text-gray-900 dark:text-gray-100">{{ ucfirst($feedback->type) }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">رد الإدارة</label>
                <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $feedback->admin_response }}</p>
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('admin.feedback.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-gray-300 rounded-md shadow-sm dark:text-gray-300 dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    العودة
                </a>
            </div>
        </div>
    </div>
</x-app-layout-admin>
