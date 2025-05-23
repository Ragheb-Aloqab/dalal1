<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="تعديل الرد" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.responses.index'), 'label' => 'الردود'],
            ['label' => 'تعديل الرد'],
        ]" />
    </x-slot>


    <x-admin.card-container :title="'إضافة طلب جديد'">

        <form action="{{ route('admin.responses.update', $response->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                <!-- Select Provider -->
                <div class="col-span-12 md:col-span-6">
                    <label for="provider_id" class="block mb-2 font-semibold text-dark">مزود الخدمة</label>
                    <select id="provider_id" name="provider_id" class="block w-full mt-1 form-select" required>
                        <option value="">اختر مزود الخدمة</option>
                        @foreach ($providers as $provider)
                            <option value="{{ $provider->id }}"
                                {{ old('provider_id', $response->provider_id) == $provider->id ? 'selected' : '' }}>
                                {{ $provider->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Select Request -->
                <div class="col-span-12 md:col-span-6">
                    <label for="request_id" class="block mb-2 font-semibold text-dark">الطلب</label>
                    <select id="request_id" name="request_id" class="block w-full mt-1 form-select" required>
                        <option value="">اختر الطلب</option>
                        @foreach ($requests as $request)
                            <option value="{{ $request->id }}"
                                {{ old('request_id', $response->request_id) == $request->id ? 'selected' : '' }}>
                                {{ $request->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Answer -->
                <div class="col-span-12">
                    <x-admin.textarea-field label="الرد" name="answer" rows="4"
                        value="{{ old('answer', $response->answer) }}" />
                </div>

                <!-- Has Ads -->
                <div class="col-span-12 md:col-span-6">
                    <label class="block mb-2 font-semibold text-dark">يتضمن إعلان؟</label>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="has_ads" id="has_ads"
                            {{ old('has_ads', $response->has_ads) ? 'checked' : '' }}>
                        <label for="has_ads">نعم</label>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
