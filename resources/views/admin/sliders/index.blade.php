<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="عرض الصور المنزلقة" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'الصور المنزلقة']
        ]" />
    </x-slot>


    <x-admin.search-and-add searchUrl="{{ route('admin.sliders.index') }}" createUrl="{{ route('admin.sliders.create') }}" />

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="card">
                <div class="card-body">
                    <table class="table min-w-full divide-y divide-border dark:divide-darkborder">
                        <thead>
                            <tr>
                                <th class="p-4 text-sm font-semibold text-right text-dark dark:text-white">الصورة</th>
                                <th scope="col" class="p-4 text-sm font-semibold text-right text-dark dark:text-white">العنوان</th>
                                <th scope="col" class="p-4 text-sm font-semibold text-right text-dark dark:text-white">الوصف</th>
                                <th scope="col" class="p-4 text-sm font-semibold text-right text-dark dark:text-white">الإجراء</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border dark:divide-darkborder">
                            @foreach ($sliders as $slider)
                                <tr class="search-items">
                                    <td class="p-4 text-right whitespace-nowrap">
                                        <img src="{{ asset('storage/' . $slider->path) }}" alt="{{ $slider->title }}" class="object-cover w-24 h-16">
                                    </td>
                                    <td class="p-4 text-right whitespace-nowrap">
                                        <h6 class="mb-1">{{ $slider->title }}</h6>
                                    </td>
                                    <td class="p-4 text-right whitespace-nowrap">
                                        <p class="text-xs">{{ Str::limit($slider->description, 50, '...') }}</p>
                                    </td>
                                    <td class="p-4 text-sm text-right whitespace-nowrap">
                                        <div class="flex gap-3 action-btn">
                                            <a href="{{ route('admin.sliders.show', $slider->id) }}" class="text-info edit">
                                                <i class="text-lg ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="text-dark edit">
                                                <i class="text-lg ti ti-pencil text-bodytext dark:text-darklink"></i>
                                            </a>
                                            <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الصورة؟');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger delete">
                                                    <i class="text-lg ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout-admin>
