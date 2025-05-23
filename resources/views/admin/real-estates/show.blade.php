<!-- resources/views/real-estates/show.blade.php -->
<x-app-layout-admin>


    <!----Breadcrumb Start---->
    <x-slot name="header">
        <x-admin.title text="عرض عقار" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.real-estates.index'), 'icon' => 'ti ti-building', 'label' => 'العقارات'],
            ['label' => 'عرض عقار']
        ]" />
    </x-slot>

    <!----Breadcrumb End---->


    <div class="shop-detail">
        <!---Product Slider / Product details--->
        <div class="mb-6 border shadow-none card border-border dark:border-darkborder">
            <div class="card-body">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-12">
                        <div id="sync1" class="owl-carousel owl-theme">

                            @foreach ($realEstate->attachments as $attachment)
                                @if ($attachment->file_type === 'image')
                                    <div class="overflow-hidden rounded-md item">
                                        <img src="{{ filter_var($attachment->file_path, FILTER_VALIDATE_URL) ? $attachment->file_path : asset($attachment->file_path) }}"
                                            alt="" class="w-full max-w-full">
                                    </div>


                                @endif
                            @endforeach


                        </div>

                        <div id="sync2" class="owl-carousel owl-theme">

                            @foreach ($realEstate->attachments as $attachment)
                                @if ($attachment->file_type === 'image')

                                    <div class="overflow-hidden rounded-md item">
                                        <img src="{{ filter_var($attachment->file_path, FILTER_VALIDATE_URL) ? $attachment->file_path : asset($attachment->file_path) }}"
                                            alt="" class="w-full max-w-full">
                                    </div>
                                 @elseif($attachment->file_type === 'video')

                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-12">
                        <div class="shop-content">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-xs font-medium text-white bg-success badge-md">In
                                    Stock</span>
                                <span class="text-xs">books</span>
                            </div>
                            <h4 class="mb-2 text-xl">How Innovation Works</h4>
                            <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ex arcu,
                                tincidunt bibendum felis.</p>
                            <h4 class="flex gap-2 mb-3 text-xl">
                                <del class="font-normal text-bodytext dark:text-darklink opacity-60">$350</del> $275
                            </h4>
                            <div class="flex items-center gap-3 pb-4">
                                <ul class="flex items-center mb-0 list-unstyled">
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="text-base ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="text-base ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="text-base ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="text-base ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="" href="javascript:void(0)"><i
                                                class="text-base ti ti-star text-warning"></i></a>
                                    </li>
                                </ul>
                                <a href="javascript:void(0)"
                                    class="text-dark dark:text-darklink hover:text-primary">(236
                                    reviews)</a>
                            </div>
                            <hr class="my-2 border-b-1 border-border dark:border-darkborder" />
                            <div class="flex items-center gap-2 py-7">
                                <h6 class="text-base">
                                    Colors:</h6>
                                <a href="javascript:void(0)" class="w-6 h-6 rounded-full bg-primary"></a>
                            </div>
                            <div class="flex items-center gap-7 pb-7">
                                <h6 class="text-base">
                                    QTY:</h6>
                                <!----Input Quantity----->
                                <div class="flex" data-hs-input-number>
                                    <div class="flex items-center">
                                        <button type="button"
                                            class="inline-flex items-center justify-center w-10 text-sm border h-9 border-secondary rounded-s-md "
                                            data-hs-input-number-decrement>
                                            <i class="text-lg ti ti-minus text-secondary"></i>
                                        </button>
                                        <input
                                            class="w-10 p-0 text-base text-center bg-transparent h-9 border-y border-x-0 border-secondary text-secondary"
                                            type="text" value="1" data-hs-input-number-input>
                                        <button type="button"
                                            class="inline-flex items-center justify-center w-10 text-sm border h-9 border-secondary rounded-e-md"
                                            data-hs-input-number-increment>
                                            <i class="text-lg ti ti-plus text-secondary"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- End Input Quantity Number -->
                            </div>
                            <hr class="my-2 border-b-1 border-border dark:border-darkborder" />
                            <div class="items-center gap-4 pt-8 sm:flex mb-7">
                                <a href="javascript:void(0)" class="btn block px-12 py-2.5 mb-2 sm:mb-0">Buy Now</a>
                                <a href="javascript:void(0)" class="btn block px-7 py-2.5 bg-error btn-error">Add to
                                    Cart</a>
                            </div>
                            <p class="mb-0">Dispatched in 2-3 weeks</p>
                            <a href="javascript:void(0)" class="text-dark dark:text-darklink">Why
                                the longer time for delivery?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---Product Tabs--->
        <div class="border shadow-none card border-border dark:border-darkborder">
            <div class="card-body">

                <nav class="flex space-x-3 border-b border-border dark:border-darkborder" aria-label="Tabs"
                    role="tablist">
                    <button type="button"
                        class="inline-flex items-center gap-2 px-3 py-2 text-sm border-b-2 border-transparent hs-tab-active:border-primary hs-tab-active:text-primary whitespace-nowrap text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary active"
                        id="Desc-tab" data-hs-tab="#desc" aria-controls="desc" role="tab">
                        <span class="">Description</span>
                    </button>
                    <button type="button"
                        class="inline-flex items-center gap-2 px-3 py-2 text-sm border-b-2 border-transparent hs-tab-active:border-primary hs-tab-active:text-primary whitespace-nowrap text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary"
                        id="Review-tab" data-hs-tab="#review" aria-controls="review" role="tab">
                        <span class="">Reviews</span>
                    </button>
                </nav>
                <div class="mt-6">
                    <div id="desc" role="tabpanel" aria-labelledby="Desc-tab">
                        <h5 class="mb-5 leading-none card-title">
                            Sed at diam elit. Vivamus tortor odio, pellentesque eu tincidunt a, aliquet sit amet lorem
                            pellentesque eu tincidunt a, aliquet sit amet lorem.
                        </h5>
                        <p class="mb-7">
                            Cras eget elit semper, congue sapien id, pellentesque diam. Nulla faucibus diam nec
                            fermentum ullamcorper. Praesent sed ipsum ut augue vestibulum malesuada. Duis vitae volutpat
                            odio. Integer sit amet elit ac justo sagittis dignissim.
                        </p>
                        <p class="mb-0">
                            Vivamus quis metus in nunc semper efficitur eget vitae diam. Proin justo diam, venenatis sit
                            amet eros in, iaculis auctor magna. Pellentesque sit amet accumsan urna, sit amet pretium
                            ipsum. Fusce condimentum venenatis mauris et luctus. Vestibulum ante
                            ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                        </p>
                    </div>
                    <div id="review" class="hidden" role="tabpanel" aria-labelledby="Review-tab">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="flex items-stretch col-span-12 lg:col-span-4 md:col-span-4 sm:col-span-4">
                                <div class="border shadow-none card border-border dark:border-darkborder ">
                                    <div class="flex flex-col justify-center h-full text-center card-body">
                                        <h6 class="mb-3 text-dark dark:text-white">Average Rating
                                        </h6>
                                        <h2 class="mb-3 text-4xl font-semibold text-primary">4/5
                                        </h2>
                                        <ul class="flex justify-center mb-0 list-unstyled align-items-center">
                                            <li><a class="me-1" href="javascript:void(0)"><i
                                                        class="text-lg ti ti-star text-warning"></i></a>
                                            </li>
                                            <li><a class="me-1" href="javascript:void(0)"><i
                                                        class="text-lg ti ti-star text-warning"></i></a>
                                            </li>
                                            <li><a class="me-1" href="javascript:void(0)"><i
                                                        class="text-lg ti ti-star text-warning"></i></a>
                                            </li>
                                            <li><a class="me-1" href="javascript:void(0)"><i
                                                        class="text-lg ti ti-star text-warning"></i></a>
                                            </li>
                                            <li><a class="" href="javascript:void(0)"><i
                                                        class="text-lg ti ti-star text-warning"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-stretch col-span-12 lg:col-span-4 md:col-span-4 sm:col-span-4">

                                <div class="border shadow-none card border-border dark:border-darkborder ">
                                    <div class="flex flex-col justify-center h-full gap-3 text-center card-body">
                                        <div class="flex items-center gap-4">
                                            <span class="text-xs shrink-0">1 Stars</span>
                                            <!-- Progress -->
                                            <div class="flex w-full h-1 overflow-hidden rounded-md bg-lightprimary dark:bg-darkprimary"
                                                role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-primary whitespace-nowrap "
                                                    style="width: 45%"></div>
                                            </div>
                                            <!-- End Progress -->
                                            <h6 class="mb-0 text-sm font-semibold text-dark dark:text-white">
                                                (485)</h6>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <span class="text-xs shrink-0">2 Stars</span>
                                            <!-- Progress -->
                                            <div class="flex w-full h-1 overflow-hidden rounded-md bg-lightprimary dark:bg-darkprimary"
                                                role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-primary whitespace-nowrap "
                                                    style="width: 25%"></div>
                                            </div>
                                            <!-- End Progress -->
                                            <h6 class="mb-0 text-sm font-semibold text-dark dark:text-white">
                                                (215)</h6>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <span class="text-xs shrink-0">3 Stars</span>
                                            <!-- Progress -->
                                            <div class="flex w-full h-1 overflow-hidden rounded-md bg-lightprimary dark:bg-darkprimary"
                                                role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-primary whitespace-nowrap "
                                                    style="width: 20%"></div>
                                            </div>
                                            <!-- End Progress -->
                                            <h6 class="mb-0 text-sm font-semibold text-dark dark:text-white">
                                                (110)</h6>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <span class="text-xs shrink-0">4 Stars</span>
                                            <!-- Progress -->
                                            <div class="flex w-full h-1 overflow-hidden rounded-md bg-lightprimary dark:bg-darkprimary"
                                                role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-primary whitespace-nowrap "
                                                    style="width: 80%"></div>
                                            </div>
                                            <!-- End Progress -->
                                            <h6 class="mb-0 text-sm font-semibold text-dark dark:text-white">
                                                (620)</h6>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <span class="text-xs shrink-0">5 Stars</span>
                                            <!-- Progress -->
                                            <div class="flex w-full h-1 overflow-hidden rounded-md bg-lightprimary dark:bg-darkprimary"
                                                role="progressbar" aria-valuenow="12" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-primary whitespace-nowrap "
                                                    style="width: 12%"></div>
                                            </div>
                                            <!-- End Progress -->
                                            <h6 class="mb-0 text-sm font-semibold text-dark dark:text-white">
                                                (160)</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-stretch col-span-12 lg:col-span-4 md:col-span-4 sm:col-span-4">
                                <div class="border shadow-none card border-border dark:border-darkborder ">
                                    <div class="flex flex-col justify-center h-full gap-3 text-center card-body">
                                        <button type="button"
                                            class=" btn-outline-primary flex items-center gap-2 py-1.5 mx-auto"><i
                                                class="text-xl ti ti-pencil"></i>Write an
                                            Review</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---Products Tabs End--->

        <div class="mt-10 related-products">
            <h4 class="text-xl">Related Products</h4>
            <div class="grid grid-cols-12 gap-6 mt-4">
                <div class="col-span-12 lg:col-span-3 md:col-span-6 sm:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="relative">
                            <a href="../rtl/eco-shop-detail.html">
                                <img src="../assets/images/products/s2.jpg" class="w-full max-w-full rounded-0"
                                    alt="..."></a>
                        </div>
                        <div class="px-5 py-5 card-body">
                            <h6 class="mb-1 text-base">
                                Psalms Book for Growth</h6>
                            <div class="flex items-center justify-between">
                                <h6 class="text-base">
                                    $89 <span
                                        class="text-sm font-normal ms-2 text-bodytext dark:text-darklink opacity-60"><del>$99</del></span>
                                </h6>
                                <ul class="flex items-center mb-0">
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-3 md:col-span-6 sm:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="relative">
                            <a href="../rtl/eco-shop-detail.html">
                                <img src="../assets/images/products/s4.jpg" class="w-full max-w-full rounded-0"
                                    alt="..."></a>
                        </div>
                        <div class="px-5 py-5 card-body">
                            <h6 class="mb-1 text-base">
                                Boat Headphone</h6>
                            <div class="flex items-center justify-between">
                                <h6 class="text-base">
                                    $50 <span
                                        class="text-sm font-normal ms-2 text-bodytext dark:text-darklink opacity-60"><del>$65</del></span>
                                </h6>
                                <ul class="flex items-center mb-0">
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-3 md:col-span-6 sm:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="relative">
                            <a href="../rtl/eco-shop-detail.html">
                                <img src="../assets/images/products/s5.jpg" class="w-full max-w-full rounded-0"
                                    alt="..."></a>
                        </div>
                        <div class="px-5 py-5 card-body">
                            <h6 class="mb-1 text-base">
                                MacBook Air Pro</h6>
                            <div class="flex items-center justify-between">
                                <h6 class="text-base">
                                    $650 <span
                                        class="text-sm font-normal ms-2 text-bodytext dark:text-darklink opacity-60"><del>$900</del></span>
                                </h6>
                                <ul class="flex items-center mb-0">
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-3 md:col-span-6 sm:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="relative">
                            <a href="../rtl/eco-shop-detail.html">
                                <img src="../assets/images/products/s6.jpg" class="w-full max-w-full rounded-0"
                                    alt="..."></a>
                        </div>
                        <div class="px-5 py-5 card-body">
                            <h6 class="mb-1 text-base">
                                Gaming Console</h6>
                            <div class="flex items-center justify-between">
                                <h6 class="text-base">
                                    $25 <span
                                        class="text-sm font-normal ms-2 text-bodytext dark:text-darklink opacity-60"><del>$31</del></span>
                                </h6>
                                <ul class="flex items-center mb-0">
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="me-1" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a>
                                    </li>
                                    <li><a class="" href="javascript:void(0)"><i
                                                class="ti ti-star text-warning"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</x-app-layout-admin>
