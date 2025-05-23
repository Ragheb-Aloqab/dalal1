<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="عرض معلومات" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.about.index'), 'icon' => 'ti ti-apps', 'label' => 'حول'],
            ['label' => 'عرض معلومات'],
        ]" />
    </x-slot>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-4 text-2xl font-bold text-dark">عرض التفاصيل</h1>

                    <div class="p-6 bg-white rounded-lg shadow">
                        <!-- Title -->
                        <div class="mb-4">
                            <h2 class="text-xl font-semibold text-dark">العنوان:</h2>
                            <p class="mt-2 text-gray-700">{{ $about->title }}</p>
                        </div>

                        <!-- Content -->
                        <div class="mb-4">
                            <h2 class="text-xl font-semibold text-dark">المحتوى:</h2>
                            <p class="mt-2 text-gray-700">{{ $about->content }}</p>
                        </div>

                        <!-- Back Button -->
                        <div class="mt-6">
                            <a href="{{ route('admin.about.index') }}" class="btn btn-md">العودة إلى القائمة</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout-admin>
