<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="تعديل مزود" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.providers.index'), 'icon' => 'ti ti-apps', 'label' => 'المزودين'],
            ['label' => 'تعديل مزود'],
        ]" />
    </x-slot>

    <x-admin.card-container :title="'تعديل مزود'">
        <form action="{{ route('admin.providers.update', $provider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- User Information Fields -->
            <x-admin.user-fields :name="old('name', $provider->user->name)" :email="old('email', $provider->user->email)" :phone="old('phone', $provider->user->phone)" />

            <!-- Provider Information Fields -->
            <x-admin.provider-fields :provider="$provider" />

            <!-- Submit Button -->
            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
