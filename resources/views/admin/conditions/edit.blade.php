<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="تعديل شرط" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.conditions.index'), 'icon' => 'ti ti-apps', 'label' => 'الشروط والأحكام'],
            ['label' => 'تعديل شرط'],
        ]" />
    </x-slot>

    <x-admin.card-container :title="'تعديل شرط'">

        <form action="{{ route('admin.conditions.update', $condition->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-admin.input-field label="العنوان" name="header" :value="old('header', $condition->header ?? '')" required="true" />
            <x-admin.input-field label="المحتوى" name="content" :value="old('content', $condition->content ?? '')" required="true" />
            <!-- Submit Button -->
            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>

</x-app-layout-admin>
