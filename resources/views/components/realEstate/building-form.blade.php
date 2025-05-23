@props(['title', 'floors_number', 'apartments_count'])

<div class="grid grid-cols-12 md:gap-6 gap-y-6">
    <!-- Title -->
    <div class="col-span-12 md:col-span-12">
        <label for="title" class="block my-2 font-semibold text-dark dark:text-darklink">{{ $title }}</label>
    </div>

    <!-- Floors Number -->
    <div class="col-span-12 md:col-span-6">
        <x-form.input-field label="عدد الطوابق" name="floors_number" type="number" :value="$floors_number" />
    </div>

    <!-- Apartments Count -->
    <div class="col-span-12 md:col-span-6">
        <x-form.input-field label="عدد الشقق" name="apartments_count" type="number" :value="$apartments_count" />
    </div>
</div>
