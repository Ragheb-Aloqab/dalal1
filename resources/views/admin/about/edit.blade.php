<x-app-layout-admin>

    <x-slot name="header">
        <x-admin.title text="تعديل معلومات" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.about.index'), 'icon' => 'ti ti-apps', 'label' => 'حول'],
            ['label' => 'تعديل معلومات'],
        ]" />
    </x-slot>
    <x-admin.card-container :title="'تعديل معلومات'">
        <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-admin.input-field label="عنوان" name="title" :value="old('title', $about->title ?? '')" required="true" />
            <x-admin.input-field label="المحتوى" name="content" :value="old('content', $about->content ?? '')" required="true" />
            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
