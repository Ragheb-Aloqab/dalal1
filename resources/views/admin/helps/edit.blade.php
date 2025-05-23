<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="تعديل مساعدة" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.helps.index'), 'icon' => 'ti ti-apps', 'label' => 'قائمة المساعدات'],
            ['label' => 'تعديل مساعدة'],
        ]" />
    </x-slot>

    <x-admin.card-container :title="'تعديل مساعدة '">
        <form action="{{ route('admin.helps.update', $help->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-admin.input-field label="العنوان" name="title" :value="old('title', $help->title ?? '')" required="true" />
            <x-admin.input-field label="المحتوى" name="content" :value="old('content', $help->content ?? '')" required="true" />
            <x-admin.input-field label="النوع" name="type" :value="old('type', $help->type ?? '')" required="true" />
            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
