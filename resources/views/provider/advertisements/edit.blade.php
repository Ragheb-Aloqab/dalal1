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
        @if ($errors->has('type'))
            <div class="text-red-500">
                {{ $errors->first('type') }}
            </div>
        @endif
        <form action="{{ route('provider.advertisements.update', $realEstate->id) }}" method="POST"
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

            </div>.
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


            <x-admin.multi-input-field name="tags" label="ميزات العقار" :values="$tags->toArray()"
                placeholder="Enter a tag" />
            @livewire('attachment-view', ['images' => $realEstate->attachments])
            <x-admin.multi-file-preview name="attachments" label="تحميل الصور" existingImages="{{ $attachments }}" />
            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-provider>
