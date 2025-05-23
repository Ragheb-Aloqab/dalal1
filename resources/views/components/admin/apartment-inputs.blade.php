@props(['title', 'floor_number', 'rooms_number', 'bathrooms_number', 'kitchens_number', 'condition'])

<div class="grid grid-cols-12 md:gap-6 gap-y-6">
    <!-- Title -->
    <div class="col-span-12 md:col-span-12">
        <label for="title" class="block my-2 font-semibold text-dark dark:text-darklink">{{ $title }}</label>
    </div>

    <!-- Floor Number -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.input-field label="رقم الطابق" name="floor_number" type="number" :value="$floor_number" />
    </div>

    <!-- Rooms Number -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.input-field label="عدد الغرف" name="rooms_number" type="number" :value="$rooms_number" />
    </div>

    <!-- Bathrooms Number -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.input-field label="عدد الحمامات" name="bathrooms_number" type="number" :value="$bathrooms_number" />
    </div>

    <!-- Kitchens Number -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.input-field label="عدد المطابخ" name="kitchens_number" type="number" :value="$kitchens_number" />
    </div>

    <!-- Condition -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.select-field id="condition" name="condition" label="حالة الشقة" :options="[
            'new' => 'جديدة',
            'old' => 'قديمة',
        ]" :selected="$condition"
            required="true" />
    </div>
</div>
