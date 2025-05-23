<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="عرض شرط" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.conditions.index'), 'icon' => 'ti ti-apps', 'label' => 'الشروط والأحكام'],
            ['label' => 'عرض شرط'],
        ]" />
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-lg font-semibold text-dark dark:text-white">{{ $condition->header }}</h5>
                <div class="flex gap-2">
                    <a href="{{ route('admin.conditions.edit', $condition->id) }}" class="btn btn-md btn-primary">
                        <i class="text-lg ti ti-pencil me-2"></i> تعديل
                    </a>
                    <form action="{{ route('admin.conditions.destroy', $condition->id) }}" method="POST"
                        onsubmit="return confirm('هل أنت متأكد من حذف هذا الشرط؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-md btn-light-error">
                            <i class="text-lg ti ti-trash me-2"></i> حذف
                        </button>
                    </form>
                    <a href="{{ route('admin.conditions.index') }}" class="btn btn-secondary">
                        <i class="text-lg ti ti-arrow-left me-2"></i> عودة إلى القائمة
                    </a>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-dark dark:text-white">المحتوى</label>
                <p class="mt-1 text-sm text-gray-700 dark:text-gray-400">{!! nl2br(e($condition->content)) !!}</p>
            </div>
        </div>
    </div>
</x-app-layout-admin>
