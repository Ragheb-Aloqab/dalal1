<x-guest-layout>
    <div class="max-w-xs mx-auto">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('هذه منطقة آمنة في التطبيق. يرجى تأكيد كلمة المرور قبل المتابعة.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- كلمة المرور -->
            <div>
                <x-input-label for="password" :value="__('كلمة المرور')" />

                <x-text-input id="password" class="block w-full mt-1"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-4">
                <x-primary-button>
                    {{ __('تأكيد') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
