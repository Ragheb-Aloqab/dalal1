<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة مشرف" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.admins.index'), 'icon' => 'ti ti-apps', 'label' => 'المشرفين'],
            ['label' => 'إضافة مشرف'],
        ]" />
    </x-slot>
    <x-admin.card-container :title="'إضافة مشرف جديد'">
        <form action="{{ route('admin.admins.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- User Information Fields -->
            <x-admin.user-fields :name="old('name')" :email="old('email')" :phone="old('phone')" />
            <!-- Submit Button -->
            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
