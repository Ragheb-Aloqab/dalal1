<div class="">
    <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">اختر نوع العقار:</h3>
    <ul class="grid w-full gap-6 md:grid-cols-3">
        <li>
            <input type="radio" id="real-estate-apartment" name="realEstateType" value="apartment"
                wire:model.live="realEstateType" class="hidden peer">
            <label for="real-estate-apartment"
                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                    <div class="w-full text-lg font-semibold">شقة</div>
                    <div class="w-full">للشقق السكنية</div>
                </div>
            </label>
        </li>
        <li>
            <input type="radio" id="real-estate-land" name="realEstateType" value="land"
                wire:model.live="realEstateType" class="hidden peer" />
            <label for="real-estate-land"
                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                    <div class="w-full text-lg font-semibold">أرض</div>
                    <div class="w-full">للبقع أو الأراضي الفارغة</div>
                </div>

            </label>
        </li>
        <li>
            <input type="radio" id="real-estate-building" name="realEstateType" value="building"
                wire:model.live="realEstateType" class="hidden peer">
            <label for="real-estate-building"
                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                    <div class="w-full text-lg font-semibold">مبنى</div>
                    <div class="w-full">للمباني التجارية أو السكنية</div>
                </div>

            </label>
        </li>
    </ul>
    @if ($realEstateType)
        <div class="p-4 mt-3 border shadow sm:p-8 bg-background-50 sm:rounded-lg border-secondary-300">

            @if ($realEstateType === 'land')
                <x-realEstate.land-form area="{{ old('area') }}" water="{{ old('water') }}"
                    electricity="{{ old('electricity') }}" sewage="{{ old('sewage') }}" gas="{{ old('gas') }}"
                    access="{{ old('access') }}" />
            @elseif ($realEstateType === 'building')
                <x-realEstate.building-form title="العقار هو مبنى" floors_number="{{ old('floors_number') }}"
                    apartments_count="{{ old('apartments_count') }}" />
            @elseif ($realEstateType === 'apartment')
                <x-realEstate.apartment-form title="العقار هو شقة" floor_number="{{ old('floor_number') }}"
                    rooms_number="{{ old('rooms_number') }}" bathrooms_number="{{ old('bathrooms_number') }}"
                    kitchens_number="{{ old('kitchens_number') }}" condition="{{ old('condition') }}" />
            @endif
        </div>
    @endif
</div>
