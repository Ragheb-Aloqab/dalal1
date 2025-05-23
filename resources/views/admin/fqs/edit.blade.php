<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="تعديل سؤال متكرر" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.fqs.index'), 'icon' => 'ti ti-apps', 'label' => 'الأسئلة المتكررة'],
            ['label' => 'تعديل سؤال متكرر'],
        ]" />
    </x-slot>
    <x-admin.card-container :title="'تعديل سؤال متكرر'">
        <form action="{{ route('admin.fqs.update', $fqs->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-admin.input-field label="السؤال" name="question" :value="old('question', $fqs->question ?? '')" required="true" />
            <x-admin.input-field label="الجواب" name="answer" :value="old('answer', $fqs->answer ?? '')" required="true" />
            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
