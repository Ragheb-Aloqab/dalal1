<x-app-layout-provider>
    <x-slot name="header">
        <x-admin.title text="عرض الطلب" />
        <x-admin.breadcrumb :items="[
            ['url' => route('provider.requests.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'عرض الطلب'],
        ]" />
    </x-slot>

    <x-admin.card-container :title="'عرض طلب '">

        <div class="grid grid-cols-12 gap-6">
            <!-- User -->
            <div class="col-span-12" bis_skin_checked="1">
                <div class="border rounded-sm border-1" bis_skin_checked="1">
                    <div class="flex flex-row items-center gap-4 py-5 card-body" bis_skin_checked="1">
                        <img src="{{ asset($request->user->avatar ? 'storage/profile/' . $request->user->avatar : 'assets/images/profile/user-1.jpg') }}"
                            alt="" class="w-10 h-10 rounded-full">
                        <div class="" bis_skin_checked="1">
                            <h5 class="text-base leading-normal xl:text-lg">
                                {{ $request->user->name }}</h5>
                            <span class="flex items-center gap-1 text-xs"><i class="text-sm ti ti-map-pin"></i>
                                {{ $request->user->city->name }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-6">
                    {{-- <x-admin.select-field id="request_type" name="request_type" label="نوع الطلب" :options="[
                        'inquiry' => 'استفسار',
                        'viewing' => 'مشاهدة',
                        'purchase' => 'شراء',
                        'rental' => 'إيجار',
                    ]"
                        :selected="$request->request_type" required="true" /> --}}
                    <!-- Display request type message -->
                    <!-- Display request type message -->
                    <p class="p-2 my-2 text-lg text-gray-500 border rounded-sm border-1">
                        @if ($request->request_type === 'inquiry')
                            نوع الطلب: استفسار - الحالة:
                        @elseif($request->request_type === 'viewing')
                            نوع الطلب: مشاهدة - الحالة:
                        @elseif($request->request_type === 'purchase')
                            نوع الطلب: شراء - الحالة:
                        @elseif($request->request_type === 'rental')
                            نوع الطلب: إيجار - الحالة:
                        @else
                            حالة الطلب غير معروفة.
                        @endif
                    </p>

                </div>

                <div class="col-span-12 mb-4" bis_skin_checked="1">
                    <div class="p-2 border rounded-sm border-1" bis_skin_checked="1">
                        <div class="flex flex-col gap-4 py-1 card-body" bis_skin_checked="1">
                            <h3 class="text-md">الوصف</h3>
                            <p class="text-sm">{{ $request->description }}</p>
                        </div>
                    </div>
                </div>
                @forelse ($request->responses as  $respond)
                    <div class="mb-2 shadow-none card bg-lightgray dark:bg-darkprimary">
                        <div class="relative card-body">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset($respond->provider->user->avatar ? 'storage/profile/' . $respond->provider->user->avatar : 'assets/images/profile/user-1.jpg') }}"
                                    alt="Profile" class="w-8 h-8 rounded-full">
                                <div class="" bis_skin_checked="1">
                                    <h6 class="text-base">
                                        {{ $respond->provider->user->name }}
                                    </h6>
                                    <span class="flex items-center gap-1 text-xs"><i class="text-sm ti ti-map-pin"></i>
                                        {{ $respond->provider->user->city->name }}
                                    </span>
                                    <i class="w-2 h-2 rounded-full bg-link dark:bg-darklink opacity-30"></i>
                                </div>
                            </div>
                            <p class="my-3 card-subtitle">
                                {{ $respond->answer }}
                            </p>
                            <form action="{{ route('provider.requests.destroy', $respond->id) }}" method="POST"
                                onsubmit="return confirm('هل أنت متأكد؟')">
                                <button class="absolute p-2 text-lg rounded-full text-warning hover:text-danger"
                                    style="left: 1% !important; top: 3% !important;">
                                    @csrf
                                    @method('DELETE')
                                    <i class="text-lg ti ti-trash text-bodytext dark:text-darklink"></i>
                                </button>
                            </form>

                        </div>
                    </div>


                @empty
                @endforelse
            </div>
        </div>
    </x-admin.card-container>
</x-app-layout-provider>
