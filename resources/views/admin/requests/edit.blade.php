<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="تعديل الطلب" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.requests.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.requests.show', $request->id), 'label' => 'الطلبات'],
            ['label' => 'تعديل الطلب'],
        ]" />
    </x-slot>


    <x-admin.card-container :title="'إضافة طلب جديد'">

        <form action="{{ route('admin.requests.update', $request->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-y-6">
                <!-- User -->
                <div class="col-span-12 md:col-span-6">
                    <x-admin.select-field id="user_id" name="user_id" label="المستخدم" :options="$users"
                        :selected="$request->user_id" required="true" />
                </div>

                <!-- Request Type -->
                <div class="col-span-12 md:col-span-6">
                    <x-admin.select-field id="request_type" name="request_type" label="نوع الطلب" :options="[
                        'inquiry' => 'استفسار',
                        'viewing' => 'مشاهدة',
                        'purchase' => 'شراء',
                        'rental' => 'إيجار',
                    ]"
                        :selected="$request->request_type" required="true" />
                </div>

                <!-- Description -->
                <div class="col-span-12">
                    <x-admin.textarea-field label="الوصف" name="description" rows="4" :value="$request->description" />
                </div>

                <!-- Status -->
                <div class="col-span-12 md:col-span-6">
                    <x-admin.select-field id="status" name="status" label="الحالة" :options="[
                        'pending' => 'معلق',
                        'approved' => 'موافق عليه',
                        'rejected' => 'مرفوض',
                        'completed' => 'مكتمل',
                    ]"
                        :selected="$request->status" required="true" />
                </div>

            </div>

            <!-- Submit Button -->
            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
