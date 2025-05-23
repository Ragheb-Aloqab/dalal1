<x-app-layout-admin>

    <x-slot name="header">
        <x-admin.title text="تعديل مشرف" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.admins.index'), 'icon' => 'ti ti-apps', 'label' => 'المشرفين'],
            ['label' => 'تعديل مشرف'],
        ]" />
    </x-slot>

    <x-admin.card-container :title="'تعديل بيانات مشرف'">
        <form action="{{ route('admin.clients.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-admin.user-fields :name="$user->name" :email="$user->email" :phone="$user->phone" :city_id="$user->city_id" />
            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
