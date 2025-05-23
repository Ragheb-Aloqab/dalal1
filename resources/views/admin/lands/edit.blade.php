<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="تعديل أرض" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.lands.index'), 'icon' => 'ti ti-apps', 'label' => 'الأراضي'],
            ['label' => 'تعديل أرض'],
        ]" />
    </x-slot>

    <x-admin.card-container :title="'تعديل أرض'">
        <form action="{{ route('admin.lands.update', $realEstate->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                <x-admin.ads-inputs-field :title="$realEstate->advertisement->title" :selectedProvider="$realEstate->advertisement->provider_id" :selectedStatus="$realEstate->advertisement->status" />
                <x-admin.real-estate-inputs-field description="{{ $realEstate->description }}"
                    boundaries="{{ $realEstate->boundaries }}" cityId="{{ $realEstate->city_id }}"
                    location="{{ $realEstate->location }}" price="{{ $realEstate->price }}"
                    commercialNumber="{{ $realEstate->commercial_number }}" status="{{ $realEstate->status }}" />
            </div>

            <x-admin.land-inputs area="{{ $realEstate->realEstateable->area }}"
                water="{{ $realEstate->realEstateable->water }}"
                electricity="{{ $realEstate->realEstateable->electricity }}"
                sewage="{{ $realEstate->realEstateable->sewage }}" gas="{{ $realEstate->realEstateable->gas }}"
                access="{{ $realEstate->realEstateable->access }}" />

            <x-admin.multi-input-field name="tags" label="ميزات العقار" :values="$tags->toArray()"
                placeholder="Enter a tag" />
            @livewire('attachment-view', ['images' => $realEstate->attachments])
            <x-admin.multi-file-preview name="attachments" label="تحميل الصور" existingImages="{{ $attachments }}" />

            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
