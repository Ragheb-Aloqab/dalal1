<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة رد جديد" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.responses.index'), 'label' => 'الردود'],
            ['label' => 'إضافة رد جديد'],
        ]" />
    </x-slot>


    <x-admin.card-container :title="'إضافة طلب جديد'">

        <form action="{{ route('admin.responses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                
                <!-- Provider Select -->
                <div class="col-span-12 md:col-span-6">
                    <x-admin.provider-select id="provider_id" name="provider_id" :selected="old('provider_id')" required="true" />

                </div>

                <!-- Select Request -->
                <div class="col-span-12 md:col-span-6">
                    <label for="request_id" class="block mb-2 font-semibold text-dark">الطلب</label>
                    <select id="request_id" name="request_id" class="block w-full mt-1 form-select" required>
                        <option value="">اختر الطلب</option>
                        @foreach ($requests as $request)
                            <option value="{{ $request->id }}"
                                {{ old('request_id') == $request->id ? 'selected' : '' }}>
                                {{ $request->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Answer -->
                <div class="col-span-12">
                    <x-admin.textarea-field label="الرد" name="answer" rows="4" />
                </div>

                <!-- Has Ads -->
                <div class="col-span-12 md:col-span-6">
                    <label class="block mb-2 font-semibold text-dark">يتضمن إعلان؟</label>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="has_ads" id="has_ads" {{ old('has_ads') ? 'checked' : '' }}>
                        <label for="has_ads">نعم</label>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
