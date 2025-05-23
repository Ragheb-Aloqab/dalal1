@props([
    'title' => '',
    'selectedProvider' => null,
    'selectedStatus' => 'inactive',
])

<!-- Advertisement Title -->
<div class="col-span-12 md:col-span-12">
    <x-admin.input-field label="عنوان الإعلان" name="title" :value="$title" />
</div>

<!-- Provider Select -->
<div class="col-span-12 md:col-span-6">
    <x-admin.provider-select id="provider_id" name="provider_id" :selected="$selectedProvider" required="true" />

</div>

<!-- Advertisement Status -->
<div class="col-span-12 md:col-span-6">
    <x-admin.select-field id="ads_status" name="ads_status" label="حالة الإعلان" :options="[
        'active' => 'نشط',
        'inactive' => 'غير نشط',
        'expired' => 'منتهي الصلاحية',
    ]" :selected="$selectedStatus"
        required="true" />
</div>
