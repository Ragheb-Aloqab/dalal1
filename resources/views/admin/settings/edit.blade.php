<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="تعديل إعداد" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.settings.index'), 'label' => 'الإعدادات'],
            ['label' => 'تعديل إعداد'],
        ]" />
    </x-slot>
    <x-admin.card-container :title="'إضافة إعداد جديدة'">
        <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-admin.input-field label="المفتاح" name="key" :value="old('key', $setting->key)" required="true" />
            <x-admin.input-field label="القيمة" name="value" :value="old('value', $setting->value)" required="true" />
            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
