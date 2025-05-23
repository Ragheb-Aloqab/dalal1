<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="عرض الطلب" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.requests.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'عرض الطلب'],
        ]" />
    </x-slot>

    <x-admin.card-container :title="'إضافة طلب جديد'">

        <div class="grid grid-cols-12 gap-y-6">
            <!-- User -->
            <div class="col-span-12 md:col-span-6">
                <x-admin.show-field label="المستخدم" :value="$request->user->name" />
            </div>
            <!-- Request Type -->
            <div class="col-span-12 md:col-span-6">
                <x-admin.show-field label="نوع الطلب" :value="ucfirst($request->request_type)" />
            </div>

            <!-- Description -->
            <div class="col-span-12">
                <x-admin.show-field label="الوصف" :value="$request->description" />
            </div>

            <!-- Status -->
            <div class="col-span-12 md:col-span-6">
                <x-admin.show-field label="الحالة" :value="ucfirst($request->status)" />
            </div>

        </div>

        <div class="flex justify-end mt-4">
            <a href="{{ route('admin.requests.index') }}" class="btn btn-secondary">رجوع</a>
        </div>
    </x-admin.card-container>
</x-app-layout-admin>
