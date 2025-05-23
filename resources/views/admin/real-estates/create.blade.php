<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="إضافة عقار جديد" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.real-estates.index'), 'icon' => 'ti ti-building', 'label' => 'العقارات'],
            ['label' => 'إضافة عقار جديد'],
        ]" />
    </x-slot>

    <x-admin.card-container :title="'إضافة عقار جديد'">

        <form action="{{ route('admin.real-estates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                <!-- وصف العقار -->
                <div class="col-span-12 md:col-span-12">
                    <label for="description" class="block mb-2 font-semibold text-dark dark:text-darklink">وصف
                        العقار</label>
                    <textarea id="description" name="description" rows="4" class="py-2.5 px-4 block w-full form-control"></textarea>
                </div>

                <!-- حدود العقار -->
                <div class="col-span-12 md:col-span-12">
                    <label for="boundaries" class="block mb-2 font-semibold text-dark dark:text-darklink">حدود
                        العقار</label>
                    <textarea id="boundaries" name="boundaries" rows="2" class="py-2.5 px-4 block w-full form-control"></textarea>
                </div>

                <!-- المحافظة -->
                <div class="col-span-12 md:col-span-6">
                    <label for="province" class="block mb-2 font-semibold text-dark dark:text-darklink">المحافظة</label>
                    <input type="text" id="province" name="province" class="py-2.5 px-4 block w-full form-control">
                </div>

                <!-- الموقع -->
                <div class="col-span-12 md:col-span-6">
                    <label for="location" class="block mb-2 font-semibold text-dark dark:text-darklink">الموقع</label>
                    <input type="text" id="location" name="location" class="py-2.5 px-4 block w-full form-control">
                </div>

                <!-- السعر -->
                <div class="col-span-12 md:col-span-3">
                    <label for="price" class="block mb-2 font-semibold text-dark dark:text-darklink">السعر</label>
                    <input type="text" id="price" name="price" class="py-2.5 px-4 block w-full form-control">
                </div>

                <!-- حالة العقار -->
                <div class="col-span-12 md:col-span-3">
                    <label for="status" class="block mb-2 font-semibold text-dark dark:text-darklink">حالة
                        العقار</label>
                    <select id="status" name="status" class="py-2.5 px-4 block w-full form-control">
                        <option value="rent">إيجار</option>
                        <option value="sale">بيع</option>
                    </select>
                </div>

                {{-- <!-- الرقم التجاري --> --}}
                <div class="col-span-12 md:col-span-6">
                    <label for="commercial_number" class="block mb-2 font-semibold text-dark dark:text-darklink">الرقم
                        التجاري</label>
                    <input type="text" id="commercial_number" name="commercial_number"
                        class="py-2.5 px-4 block w-full form-control">
                </div>

                <!-- إعلان مرتبط -->
                <div class="col-span-12 md:col-span-6">
                    <label for="provider_id" class="block mb-2 font-semibold text-dark dark:text-darklink">الإعلان
                        المرتبط</label>
                    <select id="provider_id" name="provider_id" class="py-2.5 px-4 block w-full form-control">
                        @foreach ($providers as $provider)
                            <option value="{{ $provider->id }}">{{ $provider->user->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="flex justify-between p-4 ">
                <div class="w-1/3">
                    <button type="button" data-tab="apartment"
                        class="pb-2 text-gray-600 border-b-2 border-transparent w-full2 focus:outline-none hover:border-gray-600">
                        شقة
                    </button>
                </div>
                <div class="w-1/3">
                    <button type="button" data-tab="building"
                        class="w-full pb-2 text-gray-600 border-b-2 border-transparent focus:outline-none hover:border-gray-600">
                        مبنى
                    </button>
                </div>
                <div class="w-1/3">
                    <button type="button" data-tab="land"
                        class="w-full pb-2 text-gray-600 border-b-2 border-transparent focus:outline-none hover:border-gray-600">
                        أرض
                    </button>
                </div>
            </div>



            <!-- Hidden Input to Track Selected Type -->
            <input type="hidden" name="real_estate_type" value="apartment">

            <!-- Forms Container -->
            <div id="forms-container">

            </div>
            <div class="col-span-12 md:col-span-6">
                <label for="features" class="block mb-2 font-semibold text-gray-700">قيم الميزة</label>
                <div id="features_container">
                    <div class="flex items-center mb-2">
                        <input type="text" name="features[]"
                            class="py-2.5 px-4 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="أدخل قيمة الميزة">
                        <button type="button" class="ml-2 text-red-500 hover:text-red-700"
                            onclick="removeFeatureValue(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <button type="button" id="add_feature_value"
                    class="px-4 py-2 mt-2 text-white bg-indigo-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    أضف قيمة أخرى
                </button>
            </div>
            <script>
                // Function to add a new feature value input field
                document.getElementById('add_feature_value').addEventListener('click', function() {
                    const container = document.getElementById('features_container');
                    const newField = document.createElement('div');
                    newField.classList.add('flex', 'items-center', 'mb-2');

                    const newInput = document.createElement('input');
                    newInput.type = 'text';
                    newInput.name = 'features[]';
                    newInput.placeholder = 'أدخل قيمة الميزة';
                    newInput.classList.add('py-2.5', 'px-4', 'block', 'w-full', 'border-gray-300', 'rounded-md',
                        'shadow-sm', 'focus:border-indigo-500', 'focus:ring', 'focus:ring-indigo-200',
                        'focus:ring-opacity-50');

                    const removeButton = document.createElement('button');
                    removeButton.type = 'button';
                    removeButton.classList.add('ml-2', 'text-red-500', 'hover:text-red-700');
                    removeButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                          </svg>`;
                    removeButton.addEventListener('click', function() {
                        container.removeChild(newField);
                    });

                    newField.appendChild(newInput);
                    newField.appendChild(removeButton);
                    container.appendChild(newField);
                });

                // Function to remove a feature value input field
                function removeFeatureValue(button) {
                    const container = document.getElementById('features_container');
                    container.removeChild(button.parentElement);
                }
            </script>
            <!-- تحميل الصور -->
            <div class="col-span-12">
                <label for="attachments" class="block mb-2 font-semibold text-dark">تحميل الصور</label>
                <input type="file" id="attachments" name="attachments[]"
                    class="py-2.5 px-4 block w-full form-control" multiple onchange="previewImages(event)">
            </div>
            <div class="col-span-12">
                <div id="image-preview" class="grid grid-cols-4 gap-1">

                </div>
            </div>

            </div>

            <!-- Submit Button -->
            <x-admin.button-form submitText="حفظ البيانات" resetText="إعادة تعيين" />
        </form>
    </x-admin.card-container>



    <script>
        function previewImages(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('image-preview');
            previewContainer.innerHTML = '';

            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const elementString = `
                    <div class="relative w-full group">
                        <img src="${e.target.result}" alt="Preview Image"
                            class="object-cover w-full rounded-lg shadow-md h-[300px]">
                        <button onclick="removeImage(${index})"
                            class="absolute hidden p-2 text-lg text-red-600 bg-red-600 rounded-full top-2 right-2 hover:bg-red-700 group-hover:block">x</button>
                    </div>
                  `;

                    previewContainer.innerHTML += elementString;

                    previewContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }

        function removeImage(index) {
            const input = document.getElementById('attachments');
            const dataTransfer = new DataTransfer();

            Array.from(input.files).forEach((file, i) => {
                if (i !== index) {
                    dataTransfer.items.add(file);
                }
            });

            input.files = dataTransfer.files;
            previewImages({
                target: input
            });
        }
    </script>
    <script defer>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('[data-tab]');
            const formsContainer = document.querySelector('#forms-container');
            const hiddenInput = document.querySelector('input[name="real_estate_type"]');

            const forms = {
                apartment: `
                    <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                        <div class="col-span-12 md:col-span-12">
                            <label for="title" class="block mb-2 font-semibold text-dark dark:text-darklink"> العقار هو شقة</label>

                         </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="floor_number" class="block mb-2 font-semibold text-dark">رقم الطابق</label>
                            <input type="number" id="floor_number" name="floor_number" class="py-2.5 px-4 block w-full form-control" required>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="rooms_number" class="block mb-2 font-semibold text-dark">عدد الغرف</label>
                            <input type="number" id="rooms_number" name="rooms_number" class="py-2.5 px-4 block w-full form-control" required>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="bathrooms_number" class="block mb-2 font-semibold text-dark">عدد الحمامات</label>
                            <input type="number" id="bathrooms_number" name="bathrooms_number" class="py-2.5 px-4 block w-full form-control" required>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="kitchens_number" class="block mb-2 font-semibold text-dark">عدد المطابخ</label>
                            <input type="number" id="kitchens_number" name="kitchens_number" class="py-2.5 px-4 block w-full form-control" required>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="condition" class="block mb-2 font-semibold text-dark">حالة الشقة</label>
                            <select id="condition" name="condition" class="py-2.5 px-4 block w-full form-control" required>
                                <option value="new">جديدة</option>
                                <option value="old">قديمة</option>
                            </select>
                        </div>
                    </div>
                `,
                building: `
                    <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                        <div class="col-span-12 md:col-span-12">
                            <label for="title" class="block mb-2 font-semibold text-dark dark:text-darklink"> العقار هو مبنى </label>

                         </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="floors_number" class="block mb-2 font-semibold text-dark">عدد الطوابق</label>
                            <input type="number" id="floors_number" name="floors_number" class="py-2.5 px-4 block w-full form-control" required>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="apartments_count" class="block mb-2 font-semibold text-dark">عدد الشقق</label>
                            <input type="number" id="apartments_count" name="apartments_count" class="py-2.5 px-4 block w-full form-control" required>
                        </div>
                    </div>
                `,
                land: `
                    <div class="grid grid-cols-12 md:gap-6 gap-y-6">
                         <div class="col-span-12 md:col-span-12">
                            <label for="title" class="block mb-2 font-semibold text-dark dark:text-darklink">  العقار هو أرض </label>

                         </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="area" class="block mb-2 font-semibold text-dark">مساحة الأرض</label>
                            <input type="text" id="area" name="area" class="py-2.5 px-4 block w-full form-control" required>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="water" class="block mb-2 font-semibold text-dark">يتوفر خط مياه؟</label>
                            <select id="water" name="water" class="py-2.5 px-4 block w-full form-control" required>
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            </select>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="electricity" class="block mb-2 font-semibold text-dark">يتوفر خط كهرباء؟</label>
                            <select id="electricity" name="electricity" class="py-2.5 px-4 block w-full form-control" required>
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            </select>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="sewage" class="block mb-2 font-semibold text-dark">يتوفر خط صرف صحي؟</label>
                            <select id="sewage" name="sewage" class="py-2.5 px-4 block w-full form-control" required>
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            </select>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <label for="gas" class="block mb-2 font-semibold text-dark">يتوفر خط غاز؟</label>
                            <select id="gas" name="gas" class="py-2.5 px-4 block w-full form-control" required>
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            </select>
                        </div>
                        <div class="col-span-12">
                            <label for="access" class="block mb-2 font-semibold text-dark">تفاصيل الوصول</label>
                            <textarea id="access" name="access" class="py-2.5 px-4 block w-full form-control" rows="4" required></textarea>
                        </div>
                    </div>
                `
            };

            // Add event listeners to tabs
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const type = tab.getAttribute('data-tab');

                    // tabs.forEach(t => t.classList.remove('text-blue-600', 'border-b-2',
                    //     'border-blue-600'));
                    // tab.classList.add('btn', 'border-b-2', 'border-blue-600','text-white');
                    tabs.forEach(t => {
                        t.classList.remove('text-white', 'bg-gray-300', 'border-b-2',
                            'border-blue-600');
                        t.classList.add('text-gray-600', 'border-b-2', 'border-transparent',
                            'bg-transparent');
                    });

                    tab.classList.add('text-white', 'bg-gray-300', 'border-blue-600');
                    formsContainer.innerHTML = forms[type];
                    hiddenInput.value = type;
                });
            });

            // Initialize with the first tab active
            if (tabs.length > 0) {
                tabs[0].click();
            }
        });
    </script>

</x-app-layout-admin>
