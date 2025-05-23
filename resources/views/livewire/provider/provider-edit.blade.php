<div>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-4 md:col-span-12 sm:col-span-12">
            <div class="mb-6 border shadow-none card border-border dark:border-darkborder">
                <div class="card-body ">
                    <h4 class="mb-3 text-xl">
                        نبذه عن المكتب
                    </h4>
                    <p class="mb-3 ">Hello, I am Mathew
                        Anderson. I love making websites and graphics.
                        Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit.
                    </p>
                    <ul class="mb-0 list-unstyled">
                        <li class="flex items-center gap-3 mb-4">
                            <i class="text-xl ti ti-briefcase text-bodytext dark:text-darklink"></i>
                            <h6 class="text-base">
                                Sir, P P Institute Of Science
                            </h6>
                        </li>
                        <li class="flex items-center gap-3 mb-4">
                            <i class="text-xl ti ti-mail text-bodytext dark:text-darklink"></i>
                            <h6 class="text-base">
                                {{ $provider->user->email }}
                            </h6>
                        </li>
                        <li class="flex items-center gap-3 mb-4">
                            <i class="text-xl ti ti-phone text-bodytext dark:text-darklink"></i>
                            <h6 class="text-base">
                                {{ $provider->user->phone }}
                            </h6>
                        </li>
                        <li class="flex items-center gap-3 mb-2">
                            <i class="text-xl ti ti-map-pin text-bodytext dark:text-darklink"></i>
                            <h6 class="text-base">
                                {{ $provider->user->city->name }}
                            </h6>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border shadow-none card border-border dark:border-darkborder">
                <div class="card-body">
                    <h4 class="mb-3 text-xl">Photos
                    </h4>
                    <div class="grid grid-cols-12 gap-6">
                        <div class="relative col-span-6">
                            @if ($commercial_certificate_image)
                                <div class="mt-2 text-sm text-green-500">تم اختيار الصورة الجديدة!</div>
                            @elseif($errors->has('commercial_certificate_image'))
                                <div class="mt-2 text-sm text-red-500">
                                    {{ $errors->first('commercial_certificate_image') }}
                                </div>
                            @endif
                            <span class="absolute flex items-center px-0.5 m-1 rounded-sm bg-primary">
                                <span class=""> السجل التجاري</span>
                                <span class="flex">
                                    <button type="button" class="flex justify-between p-1 mx-1 text-dark edit"
                                        onclick="document.getElementById('commercial_certificate_input').click()">
                                        <i class="text-lg ti ti-edit text-bodytext dark:text-darklink"></i>
                                    </button>
                                    <button type="submit" wire:click="updateCommercialCertificateImage"
                                        class="mx-1 text-lg text-bodytext focus:outline-non e">
                                        <i class="ti ti-device-floppy text-bodytext dark:text-darklink"></i>
                                    </button>
                                </span>
                            </span>
                            <!-- Image Display -->
                            <img src="{{ $paste_commercial_certificate_image ? Storage::url($paste_commercial_certificate_image) : asset('assets/images/profile/user-1.jpg') }}"
                                alt="Commercial Certificate Image" class="w-full rounded-md">
                            <!-- Hidden File Input -->
                            <input type="file" id="commercial_certificate_input"
                                wire:model="commercial_certificate_image" class="hidden">
                            <!-- Show loading state or errors if any -->
                        </div>
                        <div class="relative col-span-6">
                            @error('avatar')
                                <p class="mt-2 text-sm text-error" id="email-error-helper">{{ $message }}</p>
                            @enderror
                            @if (session()->has('avatar'))
                                <p class="mt-2 text-sm text-success" id="email-success-helper">
                                    {{ session('avatar') }}</p>
                            @endif
                            <span class="absolute flex items-center px-0.5 m-1 rounded-sm bg-primary">
                                <span class="text-sm font-semibold">صورة</span>
                                <span class="flex">
                                    <button type="button" class="flex justify-between p-1 mx-1 text-dark edit"
                                        onclick="document.getElementById('avatar_input').click()">
                                        <i class="text-lg ti ti-edit text-bodytext dark:text-darklink"></i>
                                    </button>
                                    <button type="submit" wire:click="updateAvatar"
                                        class="mx-1 text-lg text-bodytext focus:outline-non e">
                                        <i class="ti ti-device-floppy text-bodytext dark:text-darklink"></i>
                                    </button>
                                </span>
                            </span>
                            <!-- Image Display -->
                            <img src="{{ $paste_avatar ? Storage::url($paste_avatar) : asset('assets/images/profile/user-1.jpg') }}"
                                alt="Commercial Certificate Image" class="w-full rounded-md">
                            <!-- Hidden File Input -->

                            <input type="file" id="avatar_input" wire:model="avatar" class="hidden">
                            <!-- Show loading state or errors if any -->
                        </div>
                        <div class="relative col-span-6">
                            @error('paste_personal_id_image')
                                <p class="mt-2 text-sm text-error" id="email-error-helper">{{ $message }}</p>
                            @enderror
                            @if (session()->has('paste_personal_id_image'))
                                <p class="mt-2 text-sm text-success" id="email-success-helper">
                                    {{ session('paste_personal_id_image') }}</p>
                            @endif
                            <span class="absolute flex items-center px-0.5 m-1 rounded-sm bg-primary">
                                <span class="text-sm font-semibold">صورة</span>
                                <span class="flex">
                                    <button type="button" class="flex justify-between p-1 mx-1 text-dark edit"
                                        onclick="document.getElementById('paste_personal_id_image_input').click()">
                                        <i class="text-lg ti ti-edit text-bodytext dark:text-darklink"></i>
                                    </button>
                                    <button type="submit" wire:click="updatePersonalIdImage"
                                        class="mx-1 text-lg text-bodytext focus:outline-non e">
                                        <i class="ti ti-device-floppy text-bodytext dark:text-darklink"></i>
                                    </button>
                                </span>
                            </span>
                            <!-- Image Display -->
                            <img src="{{ $paste_personal_id_image ? Storage::url($paste_personal_id_image) : asset('assets/images/profile/user-1.jpg') }}"
                                alt="Commercial Certificate Image" class="w-full rounded-md">
                            <!-- Hidden File Input -->

                            <input type="file" id="paste_personal_id_image_input" wire:model="new_personal_id_image"
                                class="hidden">
                            <!-- Show loading state or errors if any -->
                        </div>
                        <div class="relative col-span-6">
                            @error('avatar')
                                <p class="mt-2 text-sm text-error" id="email-error-helper">{{ $message }}</p>
                            @enderror
                            @if (session()->has('avatar'))
                                <p class="mt-2 text-sm text-success" id="email-success-helper">
                                    {{ session('avatar') }}</p>
                            @endif
                            <span class="absolute flex items-center px-0.5 m-1 rounded-sm bg-primary">
                                <span class="text-sm font-semibold">صورة</span>
                                <span class="flex">
                                    <button type="button" class="flex justify-between p-1 mx-1 text-dark edit"
                                        onclick="document.getElementById('avatar_input').click()">
                                        <i class="text-lg ti ti-edit text-bodytext dark:text-darklink"></i>
                                    </button>
                                    <button type="submit" wire:click="updateAvatar"
                                        class="mx-1 text-lg text-bodytext focus:outline-non e">
                                        <i class="ti ti-device-floppy text-bodytext dark:text-darklink"></i>
                                    </button>
                                </span>
                            </span>
                            <!-- Image Display -->
                            <img src="{{ $paste_avatar ? Storage::url($paste_avatar) : asset('assets/images/profile/user-1.jpg') }}"
                                alt="Commercial Certificate Image" class="w-full rounded-md">
                            <!-- Hidden File Input -->

                            <input type="file" id="avatar_input" wire:model="avatar" class="hidden">
                            <!-- Show loading state or errors if any -->
                        </div>



                    </div>
                </div>
            </div>
        </div>

        {{-- @livewire('advertisements', ['providerId' => $provider->id]) --}}

        <div class="col-span-12 lg:col-span-8 md:col-span-12 sm:col-span-12">
            <div class="mb-6 border shadow-none card border-border dark:border-darkborder">
                <div class="card-body">
                    <div class="grid">
                        <div class="mb-4">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-dark dark:text-white">email</label>
                            <div class="relative">
                                <input type="text" id="email" wire:model.lazy="email"
                                    class="py-2.5 px-4 block w-full rounded-md text-sm
                                @error('email') border-error focus:border-error focus:ring-error
                                @else border-success focus:border-success focus:ring-success @enderror focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                    aria-describedby="email-error-helper">
                                <div class="absolute inset-y-0 flex items-center end-0 pe-3" wire:click="updateEmail">
                                    <button type="submit" wire:click="updateEmail"
                                        class="text-lg text-bodytext focus:outline-none">
                                        <i class="ti ti-device-floppy"></i>
                                    </button>
                                </div>
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-error" id="email-error-helper">{{ $message }}</p>
                            @enderror
                            @if (session()->has('email'))
                                <p class="mt-2 text-sm text-success" id="email-success-helper">{{ session('email') }}
                                </p>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-dark dark:text-white">password</label>
                            <div class="relative">
                                <input type="text" id="password" type="password" wire:model.lazy="password"
                                    class="py-2.5 px-4 block w-full rounded-md text-sm
                                @error('password') border-error focus:border-error focus:ring-error
                                @else border-success focus:border-success focus:ring-success @enderror  focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                    aria-describedby="email-error-helper">
                                <div class="absolute inset-y-0 flex items-center end-0 pe-3"
                                    wire:click="updatePassword">
                                    <button type="submit" wire:click="updateEmail"
                                        class="text-lg text-bodytext focus:outline-none">
                                        <i class="ti ti-device-floppy"></i>
                                    </button>
                                </div>
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-error" id="email-error-helper">{{ $message }}</p>
                            @enderror
                            @if (session()->has('password'))
                                <p class="mt-2 text-sm text-success" id="email-success-helper">
                                    {{ session('password') }}</p>
                            @endif
                        </div>
                        <div class="mb-4">
                            <!-- Email Field -->
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-dark dark:text-white">name</label>
                            <div class="relative">
                                <!-- Input Field with Dynamic Border Color Based on Validation -->
                                <input type="text" id="name" wire:model.lazy="name"
                                    class="py-2.5 px-4 block w-full rounded-md text-sm
                                @error('name') border-error focus:border-error focus:ring-error
                                @else border-success focus:border-success focus:ring-success @enderror  focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                    aria-describedby="email-error-helper">

                                <!-- Save Button -->
                                <div class="absolute inset-y-0 flex items-center end-0 pe-3" wire:click="updateName">
                                    <button type="submit" wire:click="updateLocation"
                                        class="text-lg text-bodytext focus:outline-none">
                                        <i class="ti ti-device-floppy"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Error Message -->
                            @error('name')
                                <p class="mt-2 text-sm text-error" id="email-error-helper">{{ $message }}</p>
                            @enderror
                            @if (session()->has('name'))
                                <p class="mt-2 text-sm text-success" id="email-success-helper">{{ session('name') }}
                                </p>
                            @endif
                        </div>
                        <div class="mb-4">
                            <!-- Email Field -->
                            <label for="location" class="block mb-2 text-sm font-medium text-dark dark:text-white">رقم
                                السجل
                                التجاري</label>
                            <div class="relative">
                                <!-- Input Field with Dynamic Border Color Based on Validation -->
                                <input type="text" id="location" wire:model.lazy="location"
                                    class="py-2.5 px-4 block w-full rounded-md text-sm
                                @error('location') border-error focus:border-error focus:ring-error
                                @else border-success focus:border-success focus:ring-success @enderror  focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                    aria-describedby="email-error-helper">

                                <!-- Save Button -->
                                <div class="absolute inset-y-0 flex items-center end-0 pe-3"
                                    wire:click="updateCommercialNumber">
                                    <button type="submit" wire:click="updateLocation"
                                        class="text-lg text-bodytext focus:outline-none">
                                        <i class="ti ti-device-floppy"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Error Message -->
                            @error('location')
                                <p class="mt-2 text-sm text-error" id="email-error-helper">{{ $message }}</p>
                            @enderror
                            @if (session()->has('location'))
                                <p class="mt-2 text-sm text-success" id="email-success-helper">
                                    {{ session('location') }}</p>
                            @endif
                        </div>
                        <div class="mb-4">
                            <!-- Email Field -->
                            <label for="commercial_number"
                                class="block mb-2 text-sm font-medium text-dark dark:text-white">رقم السجل
                                التجاري</label>
                            <div class="relative">
                                <!-- Input Field with Dynamic Border Color Based on Validation -->
                                <input type="text" id="commercial_number" wire:model.lazy="commercial_number"
                                    class="py-2.5 px-4 block w-full rounded-md text-sm
                                @error('commercial_number') border-error focus:border-error focus:ring-error
                                @else border-success focus:border-success focus:ring-success @enderror  focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                    aria-describedby="email-error-helper">

                                <!-- Save Button -->
                                <div class="absolute inset-y-0 flex items-center end-0 pe-3"
                                    wire:click="updateCommercialNumber">
                                    <button type="submit" wire:click="updateCommercialNumber"
                                        class="text-lg text-bodytext focus:outline-none">
                                        <i class="ti ti-device-floppy"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Error Message -->
                            @error('commercial_number')
                                <p class="mt-2 text-sm text-error" id="email-error-helper">{{ $message }}</p>
                            @enderror
                            @if (session()->has('commercial_number'))
                                <p class="mt-2 text-sm text-success" id="email-success-helper">
                                    {{ session('commercial_number') }}</p>
                            @endif
                        </div>
                        <div class="mb-4">
                            <!-- Email Field -->
                            <label for="personal_id_number"
                                class="block mb-2 text-sm font-medium text-dark dark:text-white">رقم
                                البطاقة
                                الشخصية</label>
                            <div class="relative">
                                <!-- Input Field with Dynamic Border Color Based on Validation -->
                                <input type="text" id="personal_id_number" wire:model.lazy="personal_id_number"
                                    class="py-2.5 px-4 block w-full rounded-md text-sm
                                @error('personal_id_number') border-error focus:border-error focus:ring-error
                                @else border-success focus:border-success focus:ring-success @enderror  focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                    aria-describedby="email-error-helper">

                                <!-- Save Button -->
                                <div class="absolute inset-y-0 flex items-center end-0 pe-3"
                                    wire:click="updateCommercialNumber">
                                    <button type="submit" wire:click="updatePersonalIdNumber"
                                        class="text-lg text-bodytext focus:outline-none">
                                        <i class="ti ti-device-floppy"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Error Message -->
                            @error('personal_id_number')
                                <p class="mt-2 text-sm text-error" id="email-error-helper">{{ $message }}</p>
                            @enderror
                            @if (session()->has('personal_id_number'))
                                <p class="mt-2 text-sm text-success" id="email-success-helper">
                                    {{ session('personal_id_number') }}
                                </p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
