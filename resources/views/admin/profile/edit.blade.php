<x-app-layout-admin>

    <x-slot name="header">
        <h4 class="mb-3 text-xl font-semibold text-dark dark:text-white">Contact</h4>
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
                @if ($errors->any())
                    <div class="mb-4">
                        <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded"
                            role="alert">
                            <strong class="font-bold">There were some problems with your input:</strong>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="mb-6 card-title">__(())</h5>
                    {{-- <form action="{{ route('admin.about.update', $about->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')


                        <div class="flex justify-end gap-3 mt-6">
                            <button class="btn btn-md" type="submit">حفظ التعديلات</button>
                            <button class="btn btn-light-error" type="reset">إعادة تعيين</button>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout-admin>
