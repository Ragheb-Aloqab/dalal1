<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="تعديل عقار" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.real-estates.index'), 'icon' => 'ti ti-building', 'label' => 'العقارات'],
            ['label' => 'تعديل عقار'],
        ]" />
    </x-slot>

    <x-admin.card-container :title="'تعديل عقار'">
        <form action="{{ route('admin.real-estates.update', $realEstate->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                <x-admin.ads-inputs-field :title="$realEstate->advertisement->title" :selectedProvider="$realEstate->advertisement->provider_id" :selectedStatus="$realEstate->advertisement->status" />
                <x-admin.real-estate-inputs-field description="{{ $realEstate->description }}"
                    boundaries="{{ $realEstate->boundaries }}" cityId="{{ $realEstate->city_id }}"
                    location="{{ $realEstate->location }}" price="{{ $realEstate->price }}"
                    commercialNumber="{{ $realEstate->commercial_number }}" status="{{ $realEstate->status }}" />
            </div>
            @if ($realEstate->isBuilding() || old('type') == 'building')
                <input type="hidden" name="type" value="building">
                <x-admin.building-inputs title="العقار هو مبنى"
                    floors_number="{{ old('floors_number', $realEstate->realEstateable->floors_number) }}"
                    apartments_count="{{ old('apartments_count', $realEstate->realEstateable->apartments_count) }}" />
            @elseif($realEstate->isApartment() || old('type') == 'apartment')
                <input type="hidden" name="type" value="apartment">
                <x-admin.apartment-inputs title="العقار هو شقة"
                    floor_number="{{ old('floor_number', $realEstate->realEstateable->floor_number) }}"
                    rooms_number="{{ old('rooms_number', $realEstate->realEstateable->rooms_number) }}"
                    bathrooms_number="{{ old('bathrooms_number', $realEstate->realEstateable->bathrooms_number) }}"
                    kitchens_number="{{ old('kitchens_number', $realEstate->realEstateable->kitchens_number) }}"
                    condition="{{ old('condition', $realEstate->realEstateable->condition) }}" />
            @elseif($realEstate->isLand() || old('type') == 'land')
                <input type="hidden" name="type" value="land">
                <x-admin.land-inputs area="{{ old('area', $realEstate->realEstateable->area) }}"
                    water="{{ old('water', $realEstate->realEstateable->water) }}"
                    electricity="{{ old('electricity', $realEstate->realEstateable->electricity) }}"
                    sewage="{{ old('sewage', $realEstate->realEstateable->sewage) }}"
                    gas="{{ old('gas', $realEstate->realEstateable->gas) }}"
                    access="{{ old('access', $realEstate->realEstateable->access) }}" />
            @endif


            <x-admin.multi-input-field name="tags" label="ميزات العقار" :values="$realEstate->features->pluck('name')->toArray()"
                placeholder="Enter a tag" />
            @livewire('attachment-view', ['images' => $realEstate->attachments])
            <x-admin.multi-file-preview name="attachments" label="تحميل الصور"
                existingImages="{{ $realEstate->attachments }}" />

            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>

</x-app-layout-admin>
