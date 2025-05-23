<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة مزود جديد" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.providers.index'), 'icon' => 'ti ti-apps', 'label' => 'المزودين'],
            ['label' => 'إضافة مزود جديد'],
        ]" />
    </x-slot>

    <x-admin.card-container :title="'إضافة مزود جديد'">
        <form action="{{ route('admin.providers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- User Information Fields -->
            <x-admin.user-fields :name="old('name')" :email="old('email')" :phone="old('phone')" />

            <!-- Provider Information Fields -->
            <x-admin.provider-fields :city_id="old('city_id')" :location="old('location')" :commercial_number="old('commercial_number')" :personal_id_number="old('personal_id_number')"
                :account_status="old('account_status', 'inactive')" />
            <!-- Submit Button -->
            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
