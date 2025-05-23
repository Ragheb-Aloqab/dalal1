<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة سؤال متكرر" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.fqs.index'), 'icon' => 'ti ti-apps', 'label' => 'الأسئلة المتكررة'],
            ['label' => 'إضافة'],
        ]" />
    </x-slot>
    <x-admin.card-container :title="'إضافة سؤال متكرر'">

        <form action="{{ route('admin.fqs.store') }}" method="POST">
            @csrf

            <x-admin.input-field label="السؤال" name="question" :value="old('question', $about->title ?? '')" required="true" />
            <x-admin.input-field label="الجواب" name="answer" :value="old('answer', $about->content ?? '')" required="true" />
            <!-- Submit Button -->
            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
