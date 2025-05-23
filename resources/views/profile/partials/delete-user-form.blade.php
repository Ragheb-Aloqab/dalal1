<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-text-900">
            {{ __('حذف الحساب') }}
        </h2>

        <p class="mt-1 text-sm text-text-600">
            {{ __('بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته بشكل دائم. قبل حذف حسابك، يرجى تنزيل أي بيانات أو معلومات ترغب في الاحتفاظ بها.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="border border-red-500 hover:bg-red-500"
    >
        {{ __('حذف الحساب') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-text-900">
                {{ __('هل أنت متأكد من رغبتك في حذف حسابك؟') }}
            </h2>

            <p class="mt-1 text-sm text-text-600">
                {{ __('بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته بشكل دائم. يرجى إدخال كلمة المرور الخاصة بك لتأكيد رغبتك في حذف حسابك بشكل دائم.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('كلمة المرور') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-3/4 mt-1 border-secondary-300 focus:border-primary-500 focus:ring-primary-500"
                    placeholder="{{ __('كلمة المرور') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-text-600" />
            </div>

            <div class="flex justify-end mt-6">
                <x-secondary-button x-on:click="$dispatch('close')" class="bg-background-100 text-text-700 hover:bg-background-200">
                    {{ __('إلغاء') }}
                </x-secondary-button>

                <x-danger-button class="text-white ms-3 bg-danger-500 hover:bg-danger-600 focus:ring-danger-700">
                    {{ __('حذف الحساب') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
