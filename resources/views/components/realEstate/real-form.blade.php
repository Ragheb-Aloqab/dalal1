@props([
    'description' => '',
    'boundaries' => '',
    'cityId' => '',
    'location' => '',
    'price' => '',
    'commercialNumber' => '',
    'status' => '',
])

<!-- Real Estate Description -->
<div class="col-span-12 md:col-span-12">
    <x-form.textarea-field label="وصف العقار" name="description" rows="4" :value="$description" />
</div>

<!-- Real Estate Boundaries -->
<div class="col-span-12 md:col-span-12">
    <x-form.textarea-field label="حدود العقار" name="boundaries" rows="2" :value="$boundaries" />
</div>

<!-- Province -->
<div class="col-span-12 md:col-span-6">
    <x-form.select-city id="city_id" name="city_id" label="المحافظة" :selected="$cityId" required="true" />

</div>

<!-- Location -->
<div class="col-span-12 md:col-span-6">
    <x-form.input-field label="الموقع" name="location" :value="$location" />
</div>

<!-- Price -->
<div class="col-span-12 md:col-span-6">
    <x-form.input-field label="السعر" name="price" :value="$price" type="number" />
</div>

<!-- Commercial Number -->
<div class="col-span-12 md:col-span-6">
    <x-form.input-field label="الرقم التجاري" name="commercial_number" :value="$commercialNumber" type="number" />
</div>

<!-- Status -->
<div class="col-span-12 md:col-span-6">
    <x-form.select-field id="status" name="status" label="حالة العقار" :options="[
        'rent' => 'إيجار',
        'sale' => 'بيع',
    ]" :selected="$status"
        required="true" />
</div>
