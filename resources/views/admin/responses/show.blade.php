<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="عرض الرد" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.responses.index'), 'label' => 'الردود'],
            ['label' => 'عرض الرد'],
        ]" />
    </x-slot>


    <x-admin.card-container :title="'إضافة طلب جديد'">

        <div class="mb-4">
            <strong>مزود الخدمة:</strong>
            <span>{{ $response->provider->name }}</span>
        </div>
        <div class="mb-4">
            <strong>الطلب:</strong>
            <span>{{ $response->request->title }}</span>
        </div>
        <div class="mb-4">
            <strong>الرد:</strong>
            <span>{{ $response->answer }}</span>
        </div>
        <div class="mb-4">
            <strong>يتضمن إعلان؟</strong>
            <span>{{ $response->has_ads ? 'نعم' : 'لا' }}</span>
        </div>

        <a href="{{ route('admin.responses.edit', $response->id) }}" class="btn btn-primary">تعديل</a>
    </x-admin.card-container>
</x-app-layout-admin>
