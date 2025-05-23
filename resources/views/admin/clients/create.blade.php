<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة عميل جديد" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.clients.index'), 'icon' => 'ti ti-users', 'label' => 'العملاء'],
            ['label' => 'إضافة عميل جديد'],
        ]" />
    </x-slot>
    <x-admin.card-container :title="'إضافة مستخدم جديد'">
        <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- User Information Fields -->
            <x-admin.user-fields :name="old('name')" :email="old('email')" :phone="old('phone')" />
            <!-- Submit Button -->
            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
