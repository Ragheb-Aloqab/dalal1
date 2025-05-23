<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="تعديل عميل" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.clients.index'), 'icon' => 'ti ti-users', 'label' => 'العملاء'],
            ['label' => 'تعديل عميل'],
        ]" />
    </x-slot>
    <x-admin.card-container :title="'تعديل بيانات المستخدم'">
        <form action="{{ route('admin.clients.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-admin.user-fields :name="$user->name" :email="$user->email" :phone="$user->phone" :city_id="$user->city_id" />
            <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                <!-- User Role -->
                <div class="col-span-12 md:col-span-6">
                    <x-admin.select-field id="role" name="role" label="دور المستخدم" :options="[
                        'admin' => 'مدير',
                        'provider' => 'مزود',
                        'client' => 'عميل',
                    ]"
                        :selected="old('role', $user->role)" required="true" />
                </div>
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="User Avatar"
                        class="w-20 h-20 mt-4 rounded-full">
                @endif
            </div>
            </div>
            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
