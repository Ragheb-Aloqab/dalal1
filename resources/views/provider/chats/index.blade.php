<x-app-layout-provider>
    <x-slot name="header">
        <x-admin.title text="عرض مزود" />
        <x-admin.breadcrumb :items="[
            ['url' => route('provider.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            // ['url' => route('provider.providers.index'), 'icon' => 'ti ti-apps', 'label' => 'المزودين'],
            ['label' => 'عرض مزود'],
        ]" />
    </x-slot>

    <div class="pt-1">
        <div class="container py-2 full-container">
            {{$id = auth()->user()->id}}
          @livewire('chats',['userId'=>$id])
        </div>
    </div>

</x-app-layout-provider>
