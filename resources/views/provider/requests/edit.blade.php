<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="تعديل الطلب" />
        <x-admin.breadcrumb :items="[
            ['url' => route('provider.requests.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('provider.requests.show', $request->id), 'label' => 'الطلبات'],
            ['label' => 'تعديل الطلب'],
        ]" />
    </x-slot>


    <x-admin.card-container :title="'إضافة طلب جديد'">

        <form action="{{ route('provider.requests.update', $request->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-y-6">
                <!-- User -->

                <div class="col-span-12 " bis_skin_checked="1">
                    <div class="border rounded-sm border-1" bis_skin_checked="1">
                        <div class="flex flex-row items-center gap-4 py-5 card-body" bis_skin_checked="1">
                            <img src="{{ asset($request->user->avatar ? 'storage/profile/' . $request->user->avatar : 'assets/images/profile/user-1.jpg') }}"
                                alt="" class="w-12 h-12 rounded-full">
                            <div class="" bis_skin_checked="1">
                                <h5 class="text-base leading-normal xl:text-lg">
                                    {{ $request->user->name }}</h5>
                                <span class="flex items-center gap-1 text-xs"><i class="text-sm ti ti-map-pin"></i>
                                    {{ $request->user->city->name }}
                                </span>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Request Type -->
                <div class="col-span-12 md:col-span-6">
                    <x-admin.select-field id="request_type" name="request_type" label="نوع الطلب" :options="[
                        'inquiry' => 'استفسار',
                        'viewing' => 'مشاهدة',
                        'purchase' => 'شراء',
                        'rental' => 'إيجار',
                    ]"
                        :selected="$request->request_type" required="true" />
                </div>

                <div class="col-span-12 " bis_skin_checked="1">
                    <div class="p-2 border rounded-sm border-1" bis_skin_checked="1">
                        <div class="flex flex-col gap-4 py-1 card-body" bis_skin_checked="1">
                            <h3 class="text-md">الوصف</h3>
                            <p class="text-sm">{{ $request->description }}</p>
                        </div>
                    </div>
                </div>


                <div class="col-span-12">
                    <x-admin.textarea-field label="الاجابه" name="answer" rows="4" />
                </div>


                {{-- <div class="card" bis_skin_checked="1">
                    <div class="card-body" bis_skin_checked="1">
                        <h5 class="mb-6 card-title">Checkbox - colors</h5>
                        <form action="#" class="flex flex-col gap-4">
                            <div class="flex gap-20" bis_skin_checked="1">
                                <span class="w-20 text-sm">Success</span>
                                <div class="flex gap-4" bis_skin_checked="1">
                                    <div class="flex" bis_skin_checked="1">
                                        <input type="radio" name="hs-colored-radio"
                                            class="shrink-0 mt-0.5 w-5 h-5 border-bordergray bg-transparent dark:border-darkborder rounded-full text-success focus:ring-success disabled:opacity-50 disabled:pointer-events-none dark:checked:bg-success dark:checked:border-success dark:focus:ring-offset-gray-800"
                                            id="hs-checked-radio7">
                                        <label for="hs-checked-radio7"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Default</label>
                                    </div>
                                    <div class="flex" bis_skin_checked="1">
                                        <input type="radio" name="hs-colored-radio"
                                            class="shrink-0 mt-0.5 w-5 h-5 border-bordergray bg-transparent dark:border-darkborder rounded-full text-success focus:ring-success disabled:opacity-50 disabled:pointer-events-none dark:checked:bg-success dark:checked:border-success dark:focus:ring-offset-gray-800"
                                            id="hs-checked-radio8" checked="">
                                        <label for="hs-checked-radio8"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Checked</label>
                                    </div>
                                    <div class="flex opacity-40" bis_skin_checked="1">
                                        <input type="radio" name="hs-disabled-radio"
                                            class="shrink-0 mt-0.5 w-5 h-5 border-bordergray bg-transparent dark:border-darkborder rounded-full text-success focus:ring-success disabled:opacity-50 disabled:pointer-events-none dark:checked:bg-success dark:checked:border-success dark:focus:ring-offset-gray-800"
                                            id="hs-disabled-checked-radio9" checked="" disabled="">
                                        <label for="hs-disabled-checked-radio9"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Disabled</label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-20" bis_skin_checked="1">
                                <span class="w-20 text-sm">Danger</span>
                                <div class="flex gap-4" bis_skin_checked="1">
                                    <div class="flex" bis_skin_checked="1">
                                        <input type="radio" name="hs-colored-radio1"
                                            class="shrink-0 mt-0.5 w-5 h-5 border-bordergray bg-transparent dark:border-darkborder rounded-full text-error focus:ring-error disabled:opacity-50 disabled:pointer-events-none dark:checked:bg-error dark:checked:border-error dark:focus:ring-offset-gray-800"
                                            id="hs-checked-radio10">
                                        <label for="hs-checked-radio10"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Default</label>
                                    </div>
                                    <div class="flex" bis_skin_checked="1">
                                        <input type="radio" name="hs-colored-radio1"
                                            class="shrink-0 mt-0.5 w-5 h-5 border-bordergray bg-transparent dark:border-darkborder rounded-full text-error focus:ring-error disabled:opacity-50 disabled:pointer-events-none dark:checked:bg-error dark:checked:border-error dark:focus:ring-offset-gray-800"
                                            id="hs-checked-radio11" checked="">
                                        <label for="hs-checked-radio11"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Checked</label>
                                    </div>
                                    <div class="flex opacity-40" bis_skin_checked="1">
                                        <input type="radio" name="hs-disabled-radio1"
                                            class="shrink-0 mt-0.5 w-5 h-5 border-bordergray bg-transparent dark:border-darkborder rounded-full text-error focus:ring-error disabled:opacity-50 disabled:pointer-events-none dark:checked:bg-error dark:checked:border-error dark:focus:ring-offset-gray-800"
                                            id="hs-disabled-checked-radio12" checked="" disabled="">
                                        <label for="hs-disabled-checked-radio12"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Disabled</label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-20" bis_skin_checked="1">
                                <span class="w-20 text-sm">Warning</span>
                                <div class="flex gap-4" bis_skin_checked="1">
                                    <div class="flex" bis_skin_checked="1">
                                        <input type="radio" name="hs-colored-radio2"
                                            class="shrink-0 mt-0.5 w-5 h-5 border-bordergray bg-transparent dark:border-darkborder rounded-full text-warning focus:ring-warning disabled:opacity-50 disabled:pointer-events-none dark:checked:bg-warning dark:checked:border-warning dark:focus:ring-offset-gray-800"
                                            id="hs-checked-radio13">
                                        <label for="hs-checked-radio13"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Default</label>
                                    </div>
                                    <div class="flex" bis_skin_checked="1">
                                        <input type="radio" name="hs-colored-radio2"
                                            class="shrink-0 mt-0.5 w-5 h-5 border-bordergray bg-transparent dark:border-darkborder rounded-full text-warning focus:ring-warning disabled:opacity-50 disabled:pointer-events-none dark:checked:bg-warning dark:checked:border-warning dark:focus:ring-offset-gray-800"
                                            id="hs-checked-radio14" checked="">
                                        <label for="hs-checked-radio14"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Checked</label>
                                    </div>
                                    <div class="flex opacity-40" bis_skin_checked="1">
                                        <input type="radio" name="hs-disabled-radio2"
                                            class="shrink-0 mt-0.5 w-5 h-5 border-bordergray bg-transparent dark:border-darkborder rounded-full text-warning focus:ring-warning disabled:opacity-50 disabled:pointer-events-none dark:checked:bg-warning dark:checked:border-warning dark:focus:ring-offset-gray-800"
                                            id="hs-disabled-checked-radio14" checked="" disabled="">
                                        <label for="hs-disabled-checked-radio14"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Disabled</label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-20" bis_skin_checked="1">
                                <span class="w-20 text-sm">Primary</span>
                                <div class="flex gap-4" bis_skin_checked="1">
                                    <div class="flex" bis_skin_checked="1">
                                        <input type="radio" name="hs-colored-radio3"
                                            class="shrink-0 mt-0.5 w-5 h-5 form-check-input" id="hs-checked-radio15">
                                        <label for="hs-checked-radio15"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Default</label>
                                    </div>
                                    <div class="flex" bis_skin_checked="1">
                                        <input type="radio" name="hs-colored-radio3"
                                            class="shrink-0 mt-0.5 w-5 h-5 form-check-input" id="hs-checked-radio16"
                                            checked="">
                                        <label for="hs-checked-radio16"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Checked</label>
                                    </div>
                                    <div class="flex opacity-40" bis_skin_checked="1">
                                        <input type="radio" name="hs-disabled-radio3"
                                            class="shrink-0 mt-0.5 w-5 h-5 form-check-input"
                                            id="hs-disabled-checked-radio17" checked="" disabled="">
                                        <label for="hs-disabled-checked-radio17"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Disabled</label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-20" bis_skin_checked="1">
                                <span class="w-20 text-sm">Secondary</span>
                                <div class="flex gap-4" bis_skin_checked="1">
                                    <div class="flex" bis_skin_checked="1">
                                        <input type="radio" name="hs-colored-radio4"
                                            class="shrink-0 mt-0.5 w-5 h-5 border-bordergray bg-transparent dark:border-darkborder rounded-full text-secondary focus:ring-secondary disabled:opacity-50 disabled:pointer-events-none dark:checked:bg-secondary dark:checked:border-secondary dark:focus:ring-offset-gray-800"
                                            id="hs-checked-radio18">
                                        <label for="hs-checked-radio18"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Default</label>
                                    </div>
                                    <div class="flex" bis_skin_checked="1">
                                        <input type="radio" name="hs-colored-radio4"
                                            class="shrink-0 mt-0.5 w-5 h-5 border-bordergray bg-transparent dark:border-darkborder rounded-full text-secondary focus:ring-secondary disabled:opacity-50 disabled:pointer-events-none dark:checked:bg-secondary dark:checked:border-secondary dark:focus:ring-offset-gray-800"
                                            id="hs-checked-radio20" checked="">
                                        <label for="hs-checked-radio20"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Checked</label>
                                    </div>
                                    <div class="flex opacity-40" bis_skin_checked="1">
                                        <input type="radio" name="hs-disabled-radio4"
                                            class="shrink-0 mt-0.5 w-5 h-5 border-bordergray bg-transparent dark:border-darkborder rounded-full text-secondary focus:ring-secondary disabled:opacity-50 disabled:pointer-events-none dark:checked:bg-secondary dark:checked:border-secondary dark:focus:ring-offset-gray-800"
                                            id="hs-disabled-checked-radio20" checked="" disabled="">
                                        <label for="hs-disabled-checked-radio20"
                                            class="text-sm text-gray-500 ms-2 dark:text-gray-400">Disabled</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
                <!-- Status -->
                <div class="col-span-12 md:col-span-6">
                    <x-admin.select-field id="status" name="status" label="الحالة" :options="[
                        'pending' => 'معلق',
                        'approved' => 'موافق عليه',
                        'rejected' => 'مرفوض',
                        'completed' => 'مكتمل',
                    ]"
                        :selected="$request->status" required="true" />
                </div>

            </div>

            <!-- Submit Button -->
            <x-admin.button-form submitText="تحديث البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>
</x-app-layout-admin>
