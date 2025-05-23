@props([
    'city_id' => null,
    'location' => null,
    'commercial_number' => null,
    'personal_id_number' => null,
    'account_status' => 'inactive'
])

<div class="grid grid-cols-12 md:gap-6 gap-y-6">
   
    <!-- Location -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.input-field label="الموقع" name="location" :value="old('location', $location ?? '')" required="true" />
    </div>

    <!-- Commercial Number -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.input-field label="رقم السجل التجاري" name="commercial_number" :value="old('commercial_number', $commercial_number ?? '')" required="true" />
    </div>

    <!-- Personal ID Number -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.input-field label="رقم البطاقة الشخصية" name="personal_id_number" :value="old('personal_id_number', $personal_id_number ?? '')" required="true" />
    </div>

    <!-- Account Status -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.select-field id="account_status" name="account_status" label="حالة الحساب" :options="[
            'active' => 'نشط',
            'inactive' => 'غير نشط',
            'suspended' => 'معلق',
        ]"
            :selected="old('account_status', $account_status ?? 'inactive')" required="true" />
    </div>
</div>
