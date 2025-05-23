<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة جهة اتصال جديدة" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.contacts.index'), 'icon' => 'ti ti-apps', 'label' => 'جهات الاتصال'],
            ['label' => 'إضافة جهة اتصال جديدة'],
        ]" />
    </x-slot>
    <x-admin.card-container :title="'إضافة جهة اتصال جديدة'">

        <form action="{{ route('admin.contacts.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                <div class="col-span-12 md:col-span-6">
                    <x-admin.input-field label="الاسم" name="name" :value="old('name', $about->title ?? '')" required="true" />
                </div>
                <div class="col-span-12 md:col-span-6">
                    <x-admin.input-field label="أيقونة الويب" name="apk_icon" :value="old('apk_icon', $about->content ?? '')" required="true" />

                </div>
                <div class="col-span-12 md:col-span-6">
                    <x-admin.input-field label="أيقونة التطبيق" name="web_icon" :value="old('web_icon', $about->content ?? '')" required="true" />

                </div>
                <div class="col-span-12 md:col-span-6">
                    <x-admin.input-field label="الرابط" name="link" :value="old('link', $about->content ?? '')" required="true" />

                </div>
            </div>
            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>

</x-app-layout-admin>
