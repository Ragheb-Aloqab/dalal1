<x-app-layout-provider>
    <x-slot name="header">
        <x-admin.title text="إضافة شقة" />
        <x-admin.breadcrumb :items="[
            ['url' => route('provider.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('provider.apartments.index'), 'icon' => 'ti ti-apps', 'label' => 'الشقق'],
            ['label' => 'إضافة شقة'],
        ]" />
    </x-slot>
  
    <x-admin.card-container :title="'إضافة شقة'">
        <form action="{{ route('provider.apartments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                <div class="col-span-12 md:col-span-12">
                    <x-admin.input-field label="عنوان الإعلان" name="title" :value="old('title')" />
                </div>
                {{-- <x-admin.ads-inputs-field :title="old('title')" :selectedProvider="old('provider_id')" :selectedStatus="old('ads_status')" /> --}}
                <x-admin.real-estate-inputs-field description="{{ old('description') }}"
                    boundaries="{{ old('boundaries') }}" cityOptions="{{ $cities->pluck('id', 'name') }}"
                    cityId="{{ old('city_id') }}" location="{{ old('location') }}" price="{{ old('price') }}"
                    commercialNumber="{{ old('commercial_number') }}" status="{{ old('status') }}" />

            </div>
            <x-admin.apartment-inputs title="العقار هو شقة" floor_number="{{ old('floor_number') }}"
                rooms_number="{{ old('rooms_number') }}" bathrooms_number="{{ old('bathrooms_number') }}"
                kitchens_number="{{ old('kitchens_number') }}" condition="{{ old('condition') }}" />

            <x-admin.multi-input-field name="tags" label="ميزات العقار" :values="old('tags', [])"
                placeholder="Enter a tag" />

            <x-admin.multi-file-preview name="attachments" label="تحميل الصور" existingImages="{{ null }}" />

            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>

</x-app-layout-provider>



