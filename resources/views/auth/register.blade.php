<x-guest-layout>
    <div class="">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- الاسم -->
            <div>
                <x-input-label for="name" :value="__('الاسم')" />
                <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- البريد الإلكتروني -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('البريد الإلكتروني')" />
                <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- المدينة و الهاتف -->
            <div class="flex justify-between">
                <div class="w-full mt-4">
                    <x-input-label for="city_id" :value="__('المدينة')" />

                    @php
                        $cities = App\Models\City::all(); // Retrieve all cities directly in the Blade view
                    @endphp

                    <select id="city_id" name="city_id"
                        class="block w-full mt-1 rounded-lg border-secondary-300 focus:border-primary-500 focus:ring-primary-500"
                        required>
                        <option value="">{{ __('اختر المدينة') }}</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
                </div>
                <div class="w-full mt-4 mr-2">
                    <x-input-label for="phone" :value="__('رقم الهاتف')" />
                    <x-text-input id="phone" class="block w-full mt-1" type="text" name="phone"
                        :value="old('phone')" required autocomplete="tel" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
            </div>

            <!-- كلمة المرور و تأكيد كلمة المرور -->
            <div class="justify-between sm:flex">
                <div class="w-full mt-4">
                    <x-input-label for="password" :value="__('كلمة المرور')" />
                    <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="w-full mt-4 sm:mr-2">
                    <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" />
                    <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <!-- التسجيل -->
            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('مسجل مسبقًا؟') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('التسجيل') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
