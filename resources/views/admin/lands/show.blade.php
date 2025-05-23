<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="عرض أرض" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.lands.index'), 'icon' => 'ti ti-apps', 'label' => 'الأراضي'],
            ['label' => 'عرض أرض'],
        ]" />
    </x-slot>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-6 card-title">title</h5>
                    {{-- <form action="{{ route('admin.real-estates.store') }}" method="POST" enctype="multipart/form-data">
                    </form> --}}
                </div>
            </div>
        </div>
</x-app-layout-admin>
