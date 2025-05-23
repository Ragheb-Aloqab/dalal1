<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="عرض سؤال متكرر" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.fqs.index'), 'icon' => 'ti ti-apps', 'label' => 'الأسئلة المتكررة'],
            ['label' => 'عرض سؤال متكرر'],
        ]" />
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-lg font-semibold text-dark dark:text-white">{{ $fqs->question }}</h5>
                <div class="flex gap-2">
                    <a href="{{ route('admin.fqs.edit', $fqs->id) }}" class="btn btn-md btn-primary">
                        <i class="text-lg ti ti-pencil me-2"></i> تعديل
                    </a>
                    <form action="{{ route('admin.fqs.destroy', $fqs->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا السؤال؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-md btn-light-error">
                            <i class="text-lg ti ti-trash me-2"></i> حذف
                        </button>
                    </form>
                    <a href="{{ route('admin.fqs.index') }}" class="btn btn-secondary">
                        <i class="text-lg ti ti-arrow-left me-2"></i> عودة إلى القائمة
                    </a>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-dark dark:text-white">الجواب</label>
                <p class="mt-1 text-sm text-gray-700 dark:text-gray-400">{{ $fqs->answer }}</p>
            </div>
        </div>
    </div>
</x-app-layout-admin>
