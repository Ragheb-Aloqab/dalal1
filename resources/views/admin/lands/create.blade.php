<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة أرض" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.lands.index'), 'icon' => 'ti ti-apps', 'label' => 'الأراضي'],
            ['label' => 'إضافة أرض'],
        ]" />
    </x-slot>
    <x-admin.card-container :title="'إضافة أرض'">
        <form action="{{ route('admin.lands.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                <x-admin.ads-inputs-field :title="old('title')" :selectedProvider="old('provider_id')" :selectedStatus="old('ads_status')" />
                <x-admin.real-estate-inputs-field description="{{ old('description') }}"
                    boundaries="{{ old('boundaries') }}" cityId="{{ old('city_id') }}" location="{{ old('location') }}"
                    price="{{ old('price') }}" commercialNumber="{{ old('commercial_number') }}"
                    status="{{ old('status') }}" />

            </div>
            <x-admin.land-inputs area="{{ old('area') }}" water="{{ old('water') }}"
                electricity="{{ old('electricity') }}" sewage="{{ old('sewage') }}" gas="{{ old('gas') }}"
                access="{{ old('access') }}" />


            <x-admin.multi-input-field name="tags" label="ميزات العقار" :values="old('tags', [])"
                placeholder="Enter a tag" />
           
            <x-admin.multi-file-preview name="attachments" label="تحميل الصور" existingImages="{{ null }}" />

            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
