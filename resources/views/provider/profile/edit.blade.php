<x-app-layout-provider>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-text-800">
            {{ __('Proddfile') }}
        </h2>
    </x-slot>

   



    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

            <x-tabs.tabs>
                <x-tabs.tab id="profile" active="true">Profile</x-tabs.tab>
                <x-tabs.tab id="dashboard">Dashboard</x-tabs.tab>
                <x-tabs.tab id="settings">Settings</x-tabs.tab>
                <x-tabs.tab id="contacts">Contacts</x-tabs.tab>
            </x-tabs.tabs>

            <div id="default-styled-tab-content">
                <x-tabs.tab-panel id="profile">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        This is some placeholder content for the
                        <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated
                            content</strong>.
                    </p>
                </x-tabs.tab-panel>
                <x-tabs.tab-panel id="dashboard">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        This is some placeholder content for the
                        <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated
                            content</strong>.
                    </p>
                </x-tabs.tab-panel>
                <x-tabs.tab-panel id="settings">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        This is some placeholder content for the
                        <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated
                            content</strong>.
                    </p>
                </x-tabs.tab-panel>
                <x-tabs.tab-panel id="contacts">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        This is some placeholder content for the
                        <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated
                            content</strong>.
                    </p>
                </x-tabs.tab-panel>
            </div>
            <div class="p-4 border shadow sm:p-8 bg-background-50 sm:rounded-lg border-secondary-300">
                <div class="max-w-xl">
                    @include('provider.profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 border shadow sm:p-8 bg-background-50 sm:rounded-lg border-secondary-300">
                <div class="max-w-xl">
                    @include('provider.profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 border shadow sm:p-8 bg-background-50 sm:rounded-lg border-secondary-300">
                <div class="max-w-xl">
                    @include('provider.profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout-provider>
