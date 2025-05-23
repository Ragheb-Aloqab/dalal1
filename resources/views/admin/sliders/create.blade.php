<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة صورة منزلقة جديدة" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.sliders.index'), 'icon' => 'ti ti-apps', 'label' => 'الصور المنزلقة'],
            ['label' => 'إضافة صورة منزلقة جديدة']
        ]" />
    </x-slot>


    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title Input -->
                <label for="title" class="block mb-2 text-sm font-medium text-dark dark:text-white">العنوان</label>
                <div class="relative">
                    <input type="text" id="title" name="title"
                        class="py-2.5 px-4 block w-full border @error('title') border-error @else border-gray-300 @enderror rounded-md text-sm focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                        value="{{ old('title') }}" required aria-describedby="title-error">
                    @error('title')
                        <div class="absolute inset-y-0 flex items-center pointer-events-none end-0 pe-3">
                            <i class="text-lg font-medium leading-tight ti ti-alert-circle text-error"></i>
                        </div>
                        <p class="mt-2 text-sm text-error" id="title-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload -->
                <label for="path" class="block mb-2 text-sm font-medium text-dark dark:text-white">تحميل الصورة</label>
                <div class="relative">
                    <input type="file" id="path" name="path"
                        class="py-2.5 px-4 block w-full border @error('path') border-error @else border-gray-300 @enderror rounded-md text-sm focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                        accept="image/*" required aria-describedby="path-error">
                    @error('path')
                        <div class="absolute inset-y-0 flex items-center pointer-events-none end-0 pe-3">
                            <i class="text-lg font-medium leading-tight ti ti-alert-circle text-error"></i>
                        </div>
                        <p class="mt-2 text-sm text-error" id="path-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Input -->
                <label for="description" class="block mb-2 text-sm font-medium text-dark dark:text-white">الوصف</label>
                <div class="relative mb-2">
                    <textarea id="description" name="description"
                        class="py-2.5 px-4 block w-full border @error('description') border-error @else border-gray-300 @enderror rounded-md text-sm focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                        rows="4" aria-describedby="description-error">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="absolute inset-y-0 flex items-center pointer-events-none end-0 pe-3">
                            <i class="text-lg font-medium leading-tight ti ti-alert-circle text-error"></i>
                        </div>
                        <p class="mt-2 text-sm text-error" id="description-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end gap-3 mt-6">
                    <button class="btn btn-md btn-primary" type="submit">حفظ الصورة</button>
                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-light-error">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout-admin>
