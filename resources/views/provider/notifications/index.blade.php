<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="الطلبات" />
        <x-admin.breadcrumb :items="[
            ['url' => route('provider.requests.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['label' => 'الطلبات'],
        ]" />
    </x-slot>


    <x-admin.search-and-add searchUrl="{{ route('provider.requests.index') }}"
        createUrl="{{ route('admin.requests.create') }}" />

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="card">
                <div class="card-body">
                    <div class="border-b border-gray-200 dark:border-gray-700">
                        <nav class="flex space-x-4" aria-label="Tabs" role="tablist">
                            <button type="button"
                                class="inline-flex items-center px-1 py-3 mx-4 text-base text-gray-500 border-b-2 border-transparent hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary gap-x-2 whitespace-nowrap hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary active"
                                id="tabs-with-badges-item-1" data-hs-tab="#tabs-with-badges-1"
                                aria-controls="tabs-with-badges-1" role="tab">
                                Tab 1 <span
                                    class="hs-tab-active:bg-lightprimary hs-tab-active:text-primary dark:hs-tab-active:bg-darkprimary dark:hs-tab-active:text-white ms-1 py-0.5 px-1.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">99+</span>
                            </button>
                            <button type="button"
                                class="inline-flex items-center px-1 py-3 mx-4 text-base text-gray-500 border-b-2 border-transparent hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary gap-x-2 whitespace-nowrap hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary"
                                id="tabs-with-badges-item-2" data-hs-tab="#tabs-with-badges-2"
                                aria-controls="tabs-with-badges-2" role="tab">
                                Tab 2 <span
                                    class="hs-tab-active:bg-lightprimary hs-tab-active:text-primary dark:hs-tab-active:bg-darkprimary dark:hs-tab-active:text-white ms-1 py-0.5 px-1.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">99+</span>
                            </button>
                            <button type="button"
                                class="inline-flex items-center px-1 py-3 mx-4 text-base text-gray-500 border-b-2 border-transparent hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:text-primary gap-x-2 whitespace-nowrap hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary"
                                id="tabs-with-badges-item-3" data-hs-tab="#tabs-with-badges-3"
                                aria-controls="tabs-with-badges-3" role="tab">
                                Tab 3
                            </button>
                        </nav>
                    </div>
                    <div class="mt-3">
                        <div id="tabs-with-badges-1" role="tabpanel" aria-labelledby="tabs-with-badges-item-1">
                            <p class="text-gray-500 dark:text-gray-400">
                                Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu
                                banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.
                                Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
                            </p>
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div class="p-4">
                                    <div class="bg-gray-50 border border-gray-200 text-sm text-gray-600 rounded-md p-4 dark:bg-white/[.05] dark:border-white/10 dark:text-gray-400"
                                        role="alert">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <i class="text-lg font-medium leading-tight ti ti-alert-circle"></i>
                                            </div>
                                            <div class="flex-1 md:flex md:justify-between ms-2">
                                                <p class="text-sm leading-tight">
                                                    A new software update is available. See what's new in version 3.0.7
                                                </p>
                                                <p class="mt-3 text-sm md:mt-0 md:ms-6">
                                                    <a class="font-medium text-gray-800 hover:text-gray-500 whitespace-nowrap dark:text-gray-200 dark:hover:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                        href="#">Details</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="p-4 bg-green-500 ">Column 2</div>
                                <div class="p-4 text-white ">Column 3</div>
                                <div class="p-4 text-white bg-yellow-500">Column 4</div>
                            </div>


                        </div>
                        <div id="tabs-with-badges-2" class="hidden" role="tabpanel"
                            aria-labelledby="tabs-with-badges-item-2">
                            <p class="text-gray-500 dark:text-gray-400">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                                artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo
                                enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud
                                organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia
                                yr, vero magna velit sapiente.
                            </p>
                        </div>
                        <div id="tabs-with-badges-3" class="hidden" role="tabpanel"
                            aria-labelledby="tabs-with-badges-item-3">
                            <p class="text-gray-500 dark:text-gray-400">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit dolor quibusdam explicabo
                                eligendi iste, soluta temporibus error commodi perferendis. Odit eveniet repellat,
                                repudiandae aliquam fuga, modi molestias reprehenderit soluta at, temporibus et minima
                                ex qui ab quisquam! Minus fugit officiis repellendus ipsa asperiores optio veritatis.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout-admin>
