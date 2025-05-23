<section>
    <header>
        <h2 class="text-lg font-medium text-text-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-text-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="grid grid-cols-12 md:gap-6 gap-y-6">
            <div class="col-span-12 md:col-span-6">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text"
                    class="block w-full mt-1 border-secondary-300 focus:border-primary-500 focus:ring-primary-500"
                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2 text-text-600" :messages="$errors->get('name')" />
            </div>
            <div class="col-span-12 md:col-span-6">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" name="phone" type="text"
                    class="block w-full mt-1 border-secondary-300 focus:border-primary-500 focus:ring-primary-500"
                    :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
                <x-input-error class="mt-2 text-text-600" :messages="$errors->get('phone')" />
            </div>
            <div class="col-span-12 md:col-span-6">
                <div class="col-span-12 md:col-span-6">
                    <x-input-field label="Phone Number" name="phone" type="tel" value="{{ $user->phone }}" />

                </div>
            </div>

            <div class="col-span-12 md:col-span-6">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email"
                    class="block w-full mt-1 border-secondary-300 focus:border-primary-500 focus:ring-primary-500"
                    :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2 text-text-600" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="mt-2 text-sm text-text-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="text-sm underline rounded-md text-text-600 hover:text-text-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-sm font-medium text-text-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button
                class="text-white bg-primary-500 hover:bg-primary-600 focus:ring-primary-700">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-text-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
