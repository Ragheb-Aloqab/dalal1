@props(['area', 'water', 'electricity', 'sewage', 'gas', 'access'])

<div class="grid grid-cols-12 md:gap-6 gap-y-6">
    <!-- Title -->
    <div class="col-span-12 md:col-span-12">
        <label for="title" class="block my-2 font-semibold text-dark dark:text-darklink">العقار هو أرض</label>
    </div>

    <!-- Area -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.input-field label="مساحة الأرض" name="area" type="text" :value="$area" type="number" />
    </div>

    <!-- Water -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.select-field label="يتوفر خط مياه؟" name="water" :options="['1' => 'نعم', '0' => 'لا']" :selected="$water" />
    </div>

    <!-- Electricity -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.select-field label="يتوفر خط كهرباء؟" name="electricity" :options="['1' => 'نعم', '0' => 'لا']" :selected="$electricity" />
    </div>

    <!-- Sewage -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.select-field label="يتوفر خط صرف صحي؟" name="sewage" :options="['1' => 'نعم', '0' => 'لا']" :selected="$sewage" />
    </div>

    <!-- Gas -->
    <div class="col-span-12 md:col-span-6">
        <x-admin.select-field label="يتوفر خط غاز؟" name="gas" :options="['1' => 'نعم', '0' => 'لا']" :selected="$gas" />
    </div>

    <!-- Access -->
    <div class="col-span-12">
        <x-admin.textarea-field label="تفاصيل الوصول" name="access" :value="$access" />
    </div>
</div>
