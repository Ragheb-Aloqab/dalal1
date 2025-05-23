<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="تعديل جهة الاتصال" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.contacts.index'), 'icon' => 'ti ti-apps', 'label' => 'جهات الاتصال'],
            ['label' => 'تعديل جهة الاتصال'],
        ]" />
    </x-slot>

    <div class="card">
        <div class="card-body">
            <!-- Contact Details -->
            <div class="mb-6">
                <h5 class="text-lg font-semibold text-dark dark:text-white">الاسم</h5>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $contact->name }}</p>
            </div>
            <div class="mb-6">
                <h5 class="text-lg font-semibold text-dark dark:text-white">أيقونة الويب</h5>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $contact->web_icon }}</p>
            </div>
            <div class="mb-6">
                <h5 class="text-lg font-semibold text-dark dark:text-white">أيقونة التطبيق</h5>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $contact->apk_icon }}</p>
            </div>
            <div class="mb-6">
                <h5 class="text-lg font-semibold text-dark dark:text-white">الرابط</h5>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    <a href="{{ $contact->link }}" class="text-primary hover:underline"
                        target="_blank">{{ $contact->link }}</a>
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 mt-6">

                <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-md btn-primary">
                    <i class="text-lg ti ti-pencil me-2"></i> تعديل
                </a>
                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
                    onsubmit="return confirm('هل أنت متأكد من حذف هذا الشرط؟');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-md btn-light-error">
                        <i class="text-lg ti ti-trash me-2"></i> حذف
                    </button>
                </form>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                    <i class="text-lg ti ti-arrow-left me-2"></i> عودة إلى القائمة
                </a>


            </div>
        </div>
    </div>
</x-app-layout-admin>
