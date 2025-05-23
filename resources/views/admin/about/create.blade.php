<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة معلومات" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.about.index'), 'icon' => 'ti ti-apps', 'label' => 'حول'],
            ['label' => 'إضافة معلومات'],
        ]" />
    </x-slot>
    <x-admin.card-container :title="'إضافة معلومات'">
        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-admin.input-field label="عنوان" name="title" :value="old('title')" required="true" />
            <x-admin.input-field label="المحتوى" name="content" :value="old('content')" required="true" />

            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
