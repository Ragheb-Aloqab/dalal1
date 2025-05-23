<x-app-layout-admin>
    <x-slot name="header">
        <h4 class="mb-3 text-xl font-semibold text-dark dark:text-white">إضافة تغذية راجعة جديدة</h4>
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
                    href="{{ route('admin.feedback.index') }}">
                    <i class="text-lg font-medium leading-tight ti ti-feedback me-3"></i>
                    التغذية الراجعة
                </a>
                <i class="mx-2 text-sm font-medium leading-tight ti ti-chevron-right"></i>
            </li>
            <li class="inline-flex items-center">
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">إضافة</span>
            </li>
        </ol>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.feedback.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">المستخدم</label>
                    <select id="user_id" name="user_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">المحتوى</label>
                    <textarea id="content" name="content" rows="4" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary dark:bg-gray-800 dark:border-gray-700 dark:text-white">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300">التقييم</label>
                    <input type="number" id="rating" name="rating" min="1" max="5" value="{{ old('rating') }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary dark:bg-gray-800 dark:border-gray-700 dark:text-white" />
                    @error('rating')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">النوع</label>
                    <select id="type" name="type" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                        <option value="general" {{ old('type') == 'general' ? 'selected' : '' }}>عام</option>
                        <option value="complaint" {{ old('type') == 'complaint' ? 'selected' : '' }}>شكوى</option>
                        <option value="suggestion" {{ old('type') == 'suggestion' ? 'selected' : '' }}>اقتراح</option>
                    </select>
                    @error('type')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>


                        <!-- Submit Button -->
                        <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
            </form>
        </div>
    </div>
</x-app-layout-admin>
