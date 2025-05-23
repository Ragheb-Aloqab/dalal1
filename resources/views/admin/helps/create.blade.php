<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة مساعدة جديدة" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.helps.index'), 'icon' => 'ti ti-apps', 'label' => 'قائمة المساعدات'],
            ['label' => 'إضافة مساعدة جديدة'],
        ]" />
    </x-slot>

    <x-admin.card-container :title="'إضافة مساعدة جديدة'">
        <form action="{{ route('admin.helps.store') }}" method="POST">
            @csrf
            <x-admin.input-field label="العنوان" name="title" :value="old('title')" required="true" />
            <x-admin.input-field label="المحتوى" name="content" :value="old('content')" required="true" />
            <x-admin.input-field label="النوع" name="type" :value="old('type')" required="true" />
            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
