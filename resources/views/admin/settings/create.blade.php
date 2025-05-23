<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة إعداد جديد" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.settings.index'), 'label' => 'الإعدادات'],
            ['label' => 'إضافة إعداد جديد'],
        ]" />
    </x-slot>

    <x-admin.card-container :title="'إضافة إعداد جديدة'">
        <form action="{{ route('admin.settings.store') }}" method="POST">
            @csrf
            <x-admin.input-field label="المفتاح" name="key" :value="old('key')" required="true" />
            <x-admin.input-field label="القيمة" name="value" :value="old('value')" required="true" />
            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>

</x-app-layout-admin>
