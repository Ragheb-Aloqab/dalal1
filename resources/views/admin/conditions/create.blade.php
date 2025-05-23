<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة شرط جديد" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.conditions.index'), 'icon' => 'ti ti-apps', 'label' => 'الشروط والأحكام'],
            ['label' => 'إضافة شرط جديد'],
        ]" />
    </x-slot>


    <x-admin.card-container :title="'إضافة شرط جديد'">

        <form action="{{ route('admin.conditions.store') }}" method="POST">
            @csrf

            <x-admin.input-field label="العنوان" name="header" :value="old('header', $about->title ?? '')" required="true" />
            <x-admin.input-field label="المحتوى" name="content" :value="old('content', $about->content ?? '')" required="true" />
            <!-- Submit Button -->
            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>

</x-app-layout-admin>
