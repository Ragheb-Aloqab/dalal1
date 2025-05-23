<x-app-layout-admin>
    <x-slot name="header">
        <h4 class="mb-3 text-xl font-semibold text-dark dark:text-white">تعديل جهة الاتصال</h4>
        <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm leading-tight text-gray-500 hover:text-primary focus:outline-none focus:text-primary dark:focus:text-primary"
                    href="{{ route('admin.dashboard.index') }}">
                    <i class="text-lg font-medium leading-tight ti ti-home me-3"></i>
                    الصفحة الرئيسية
                </a>
                <i class="mx-2 text-sm font-medium leading-tight ti ti-chevron-right"></i>
            </li>
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm leading-tight text-gray-500 hover:text-primary focus:outline-none focus:text-primary dark:focus:text-primary"
                    href="{{ route('admin.contacts.index') }}">
                    <i class="text-lg font-medium leading-tight ti ti-apps me-3"></i>
                    جهات الاتصال
                    <i class="mx-2 text-sm font-medium leading-tight ti ti-chevron-right"></i>
                </a>
            </li>
            <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200"
                aria-current="page">
                تعديل
            </li>
        </ol>
    </x-slot>

    <x-admin.card-container :title="'إضافة جهة اتصال جديدة'">

        <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')

            <x-admin.input-field label="الاسم" name="name" :value="old('name', $contact->name ?? '')" required="true" />
            <x-admin.input-field label="أيقونة التطبيق" name="apk_icon" :value="old('apk_icon', $contact->apk_icon ?? '')" required="true" />
            <x-admin.input-field label="أيقونة  الويب" name="web_icon" :value="old('web_icon', $contact->web_icon ?? '')" required="true" />
            <x-admin.input-field label="الرابط" name="link" :value="old('link', $contact->link ?? '')" required="true" />

            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>

</x-app-layout-admin>
