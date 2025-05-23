<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة مستخدم جديد" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.users.index'), 'label' => 'المستخدمين'],
            ['label' => 'إضافة مستخدم جديد'],
        ]" />
    </x-slot>
    <x-admin.card-container :title="'إضافة مستخدم جديد'">
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- User Information Fields -->
            <x-admin.user-fields :name="old('name')" :email="old('email')" :phone="old('phone')" />
            <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                <!-- User Role -->
                <div class="col-span-12 md:col-span-6">
                    <x-admin.select-field id="role" name="role" label="دور المستخدم" :options="[
                        'admin' => 'مدير',
                        'provider' => 'مزود',
                        'client' => 'عميل',
                    ]"
                        :selected="old('role')" required="true" />
                </div>
            </div>

            <!-- Submit Button -->
            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />

        </form>
    </x-admin.card-container>
</x-app-layout-admin>
