<x-app-layout-provider>
    <x-slot name="header">
        <x-admin.title text="تعديل شقة" />
        <x-admin.breadcrumb :items="[
            ['url' => route('provider.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('provider.apartments.index'), 'icon' => 'ti ti-apps', 'label' => 'الشقق'],
            ['label' => 'تعديل شقة'],
        ]" />
    </x-slot>

    <x-admin.card-container :title="'تعديل شقة'">
        <form action="{{ route('provider.apartments.update', $realEstate->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                <div class="col-span-12 md:col-span-12">
                    <x-admin.input-field label="عنوان الإعلان" name="title" :value="$realEstate->advertisement->title" />
                </div>
                <x-admin.real-estate-inputs-field description="{{ $realEstate->description }}"
                    boundaries="{{ $realEstate->boundaries }}" cityId="{{ $realEstate->city_id }}"
                    location="{{ $realEstate->location }}" price="{{ $realEstate->price }}"
                    commercialNumber="{{ $realEstate->commercial_number }}" status="{{ $realEstate->status }}" />
            </div>
            <x-admin.apartment-inputs title="العقار هو شقة"
                floor_number="{{ $realEstate->realEstateable->floor_number }}"
                rooms_number="{{ $realEstate->realEstateable->rooms_number }}"
                bathrooms_number="{{ $realEstate->realEstateable->bathrooms_number }}"
                kitchens_number="{{ $realEstate->realEstateable->kitchens_number }}"
                condition="{{ $realEstate->realEstateable->condition }}" />

            <x-admin.multi-input-field name="tags" label="ميزات العقار" :values="$tags->toArray()"
                placeholder="Enter a tag" />
            @livewire('attachment-view', ['images' => $realEstate->attachments])

            <x-admin.multi-file-preview name="attachments" label="تحميل الصور" existingImages="{{ $attachments }}" />

            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-provider>
