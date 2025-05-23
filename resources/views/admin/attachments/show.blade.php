<x-app-layout-admin>
    <x-slot name="header">
        <h4 class="mb-3 text-xl font-semibold text-dark dark:text-white">الوسائط</h4>
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
                    href="{{ route('admin.about.index') }}">
                    <i class="text-lg font-medium leading-tight ti ti-apps me-3"></i>
                    الوسائط
                    <i class="mx-2 text-sm font-medium leading-tight ti ti-chevron-right"></i>
                </a>
            </li>
            <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200"
                aria-current="page">
                Application
            </li>
        </ol>
    </x-slot>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-6 card-title">title</h5>
                    {{-- <form action="{{ route('admin.real-estates.store') }}" method="POST" enctype="multipart/form-data">
                    </form> --}}
                </div>
            </div>
        </div>
</x-app-layout-admin>
