<x-app-layout-provider>
    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12">
            <div class="owl-carousel counter-carousel owl-theme">
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Lands Icon -->
                                    <i class="mb-3 text-4xl ti ti-map-pin text-primary"></i>
                                </div>
                                <p class="mb-1 font-semibold text-primary">الأراضي</p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">
                                    {{ $realEstateCounts['landsCount'] }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightwarning dark:bg-darkwarning">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Apartments Icon -->
                                    <i class="mb-3 text-4xl ti ti-building-skyscraper text-warning"></i>
                                </div>
                                <p class="mb-1 font-semibold text-warning">الشقق</p>
                                <h5 class="mb-0 text-lg font-semibold text-warning">
                                    {{ $realEstateCounts['apartmentsCount'] }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightinfo dark:bg-darkinfo">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Buildings Icon -->
                                    <i class="mb-3 text-4xl ti ti-building text-info"></i>
                                </div>
                                <p class="mb-1 font-semibold text-info">المباني</p>
                                <h5 class="mb-0 text-lg font-semibold text-info">
                                    {{ $realEstateCounts['buildingsCount'] }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lighterror dark:bg-darkerror">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Followers Icon -->
                                    <i class="mb-3 text-4xl ti ti-users text-error"></i>
                                </div>
                                <p class="mb-1 font-semibold text-error">المتابعون</p>
                                <h5 class="mb-0 text-lg font-semibold text-error">{{ $followersCount }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightsuccess dark:bg-darksuccess">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Advertisements Icon -->
                                    <i class="mb-3 text-4xl ti ti-speakerphone text-success"></i>
                                </div>
                                <p class="mb-1 font-semibold text-success">الإعلانات</p>
                                <h5 class="mb-0 text-lg font-semibold text-success">{{ $advertisementsCount }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Conversations Icon -->
                                    <i class="mb-3 text-4xl ti ti-message-circle text-primary"></i>
                                </div>
                                <p class="mb-1 font-semibold text-primary">المحادثات</p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">{{ $conversationsCount }}</h5>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>



        {{-- <div id="real-estate-chart" style="margin-top: 20px;"></div> --}}




        {{-- <div class="col-span-12">
            <div class="owl-carousel counter-carousel owl-theme">
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Lands Icon -->
                                    <i class="mb-3 text-4xl ti ti-map-pin text-primary"></i>
                                </div>
                                <p class="mb-1 font-semibold text-primary">الأراضي</p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">96</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightwarning dark:bg-darkwarning">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Apartments Icon -->
                                    <i class="mb-3 text-4xl ti ti-building-skyscraper text-warning"></i>
                                </div>
                                <p class="mb-1 font-semibold text-warning">الشقق</p>
                                <h5 class="mb-0 text-lg font-semibold text-warning">3,650</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightinfo dark:bg-darkinfo">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Buildings Icon -->
                                    <i class="mb-3 text-4xl ti ti-building text-info"></i>
                                </div>
                                <p class="mb-1 font-semibold text-info">المباني</p>
                                <h5 class="mb-0 text-lg font-semibold text-info">356</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lighterror dark:bg-darkerror">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Followers Icon -->
                                    <i class="mb-3 text-4xl ti ti-users text-error"></i>
                                </div>
                                <p class="mb-1 font-semibold text-error">المتابعون</p>
                                <h5 class="mb-0 text-lg font-semibold text-error">696</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightsuccess dark:bg-darksuccess">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Advertisements Icon -->
                                    <i class="mb-3 text-4xl ti ti-speakerphone text-success"></i>
                                </div>
                                <p class="mb-1 font-semibold text-success">الإعلانات</p>
                                <h5 class="mb-0 text-lg font-semibold text-success">$96k</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Requests Icon -->
                                    <i class="mb-3 text-4xl ti ti-file-text text-primary"></i>
                                </div>
                                <p class="mb-1 font-semibold text-primary">الطلبات</p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">59</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Conversations Icon -->
                                    <i class="mb-3 text-4xl ti ti-message-circle text-primary"></i>
                                </div>
                                <p class="mb-1 font-semibold text-primary">المحادثات</p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">12</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}



        <!---Top Cards End--->

        <!---Revenu Update / Yearly Breakups Cards--->
        {{-- <div class="col-span-12 lg:col-span-8 md:col-span-12 sm:col-span-12">
            <div class="card ">
                <div class="card-body">
                    <div class="items-center justify-between mb-6 sm:flex">
                        <div>
                            <h5 class="card-title">Revenue Updates
                            </h5>
                            <p class="card-subtitle">Overview of Profit</p>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <select>
                                <option selected>March 2024</option>
                                <option>April 2024</option>
                                <option>May 2024</option>
                                <option>June 2024</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 lg:col-span-8 md:col-span-8 sm:col-span-12">
                            <div class="-me-6">
                                <div id="real-estate-chart" style="margin-top: 20px;"></div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-4 md:col-span-4 sm:col-span-12">
                            <div class="flex items-center gap-4 pt-6">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-md bg-lightprimary dark:bg-darkprimary">
                                    <i class="text-xl ti ti-grid-dots text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="text-2xl font-semibold text-dark dark:text-white">
                                        $63,489.50</h4>
                                    <p>Total Earnings
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-baseline gap-3 pt-9">
                                <i class="w-2 h-2 rounded-full bg-primary"></i>
                                <div>
                                    <p>Earnings this month
                                    </p>
                                    <h6 class="text-lg">
                                        $48,820</h6>
                                </div>
                            </div>
                            <div class="flex items-baseline gap-3 pt-5">
                                <i class="w-2 h-2 rounded-full bg-secondary"></i>
                                <div>
                                    <p>Expense this month
                                    </p>
                                    <h6 class="text-lg">
                                        $26,498</h6>
                                </div>
                            </div>
                            <button type="button" class="w-full btn mt-7">view full
                                report</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-span-12 lg:col-span-8 md:col-span-12 sm:col-span-12">
            <div class="card">
                <div class="card-body">
                    <div class="items-center justify-between mb-6 sm:flex">
                        <div>
                            <h5 class="card-title">تحديثات الإيرادات</h5>
                            <p class="card-subtitle">نظرة عامة على الأرباح</p>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <select>
                                <option selected>مارس 2024</option>
                                <option>أبريل 2024</option>
                                <option>مايو 2024</option>
                                <option>يونيو 2024</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 lg:col-span-8 md:col-span-8 sm:col-span-12">
                            <div class="-me-6">
                                <div id="real-estate-chart" style="margin-top: 20px;"></div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-4 md:col-span-4 sm:col-span-12">
                            <div class="flex items-center gap-4 pt-6">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-md bg-lightprimary dark:bg-darkprimary">
                                    <i class="text-xl ti ti-grid-dots text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="text-2xl font-semibold text-dark dark:text-white">
                                        $63,489.50</h4>
                                    <p>إجمالي الأرباح</p>
                                </div>
                            </div>
                            <div class="flex items-baseline gap-3 pt-9">
                                <i class="w-2 h-2 rounded-full bg-primary"></i>
                                <div>
                                    <p>الأرباح هذا الشهر</p>
                                    <h6 class="text-lg">
                                        $48,820</h6>
                                </div>
                            </div>
                            <div class="flex items-baseline gap-3 pt-5">
                                <i class="w-2 h-2 rounded-full bg-secondary"></i>
                                <div>
                                    <p>المصروفات هذا الشهر</p>
                                    <h6 class="text-lg">
                                        $26,498</h6>
                                </div>
                            </div>
                            <button type="button" class="w-full btn mt-7">عرض التقرير الكامل</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---Revenu Update / Yearly Breakups Cards End--->

        <!---Yearly Breakups Cards--->
        {{-- <div class="col-span-12 lg:col-span-4 md:col-span-12 sm:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-12 md:col-span-6 sm:col-span-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="grid grid-cols-12 ">
                                <div class="col-span-8 lg:col-span-8 md:col-span-8">
                                    <h5 class="mb-4 card-title">
                                        Yearly Breakup
                                    </h5>
                                    <h4 class="mb-3 text-xl">
                                        $36,358
                                    </h4>
                                    <div class="flex items-center gap-2 mb-3">
                                        <span
                                            class="flex items-center justify-center p-1 rounded-full bg-lightsuccess dark:bg-darksuccess ">
                                            <i class="ti ti-arrow-up-left text-success"></i>
                                        </span>
                                        <p class="mb-0 text-dark dark:text-white">+9%</p>
                                        <p class="mb-0 dark:text-darklink">last year
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center">
                                            <i class="text-xl ti ti-point-filled text-primary me-1"></i>
                                            <span class="text-xs dark:text-darklink">2023</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="text-xl ti ti-point-filled text-secondary me-1"></i>
                                            <span class="text-xs dark:text-darklink">2024</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-4 lg:col-span-4 md:col-span-4">
                                    <div class="flex justify-center">
                                        <div id="breakup"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-12 md:col-span-6 sm:col-span-12">
                    <div class="card">
                        <div class="pb-4 card-body">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-8 lg:col-span-8 md:col-span-8">
                                    <h5 class="mb-4 card-title">
                                        Monthly Earnings
                                    </h5>
                                    <h4 class="mb-3 text-xl">
                                        $6,820
                                    </h4>
                                    <div class="flex items-center gap-2 mb-3">
                                        <span
                                            class="flex items-center justify-center p-1 rounded-full bg-lighterror dark:bg-darkerror ">
                                            <i class="ti ti-arrow-down-right text-error"></i>
                                        </span>
                                        <p class="mb-0 text-dark dark:text-white">+9%</p>
                                        <p class="mb-0 dark:text-darklink">last year
                                        </p>
                                    </div>
                                </div>
                                <div class="col-span-4 lg:col-span-4 md:col-span-4">
                                    <div class="flex justify-end">
                                        <div
                                            class="flex items-center justify-center text-white rounded-full bg-secondary h-11 w-11">
                                            <i class="text-xl ti ti-currency-dollar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="earning"></div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-span-12 lg:col-span-4 md:col-span-12 sm:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-12 md:col-span-6 sm:col-span-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="grid grid-cols-12">
                                <div class="col-span-8 lg:col-span-8 md:col-span-8">
                                    <h5 class="mb-4 card-title">
                                        تقسيم سنوي
                                    </h5>
                                    <h4 class="mb-3 text-xl">
                                        $36,358
                                    </h4>
                                    <div class="flex items-center gap-2 mb-3">
                                        <span class="flex items-center justify-center p-1 rounded-full bg-lightsuccess dark:bg-darksuccess">
                                            <i class="ti ti-arrow-up-left text-success"></i>
                                        </span>
                                        <p class="mb-0 text-dark dark:text-white">+9%</p>
                                        <p class="mb-0 dark:text-darklink">العام الماضي</p>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center">
                                            <i class="text-xl ti ti-point-filled text-primary me-1"></i>
                                            <span class="text-xs dark:text-darklink">2023</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="text-xl ti ti-point-filled text-secondary me-1"></i>
                                            <span class="text-xs dark:text-darklink">2024</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-4 lg:col-span-4 md:col-span-4">
                                    <div class="flex justify-center">
                                        <div id="breakup"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-12 md:col-span-6 sm:col-span-12">
                    <div class="card">
                        <div class="pb-4 card-body">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-8 lg:col-span-8 md:col-span-8">
                                    <h5 class="mb-4 card-title">
                                        الأرباح الشهرية
                                    </h5>
                                    <h4 class="mb-3 text-xl">
                                        $6,820
                                    </h4>
                                    <div class="flex items-center gap-2 mb-3">
                                        <span class="flex items-center justify-center p-1 rounded-full bg-lighterror dark:bg-darkerror">
                                            <i class="ti ti-arrow-down-right text-error"></i>
                                        </span>
                                        <p class="mb-0 text-dark dark:text-white">+9%</p>
                                        <p class="mb-0 dark:text-darklink">العام الماضي</p>
                                    </div>
                                </div>
                                <div class="col-span-4 lg:col-span-4 md:col-span-4">
                                    <div class="flex justify-end">
                                        <div class="flex items-center justify-center text-white rounded-full bg-secondary h-11 w-11">
                                            <i class="text-xl ti ti-currency-dollar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="earning"></div>
                    </div>
                </div>
            </div>
        </div>

        <!---Yearly Breakups Cards End--->

        <!---Employee Salary Cards--->
        <div class="col-span-12 lg:col-span-4 md:col-span-6 sm:col-span-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">راتب الموظف</h5>
                    <p class="card-subtitle">كل شهر</p>
                    <div class="-me-12">
                        <div id="salary" class="pb-6 mb-6"></div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="flex items-center justify-center w-10 h-10 rounded-md bg-lightprimary dark:bg-darkprimary">
                                <i class="text-xl ti ti-grid-dots text-primary"></i>
                            </div>
                            <div>
                                <p class="dark:text-darklink ">الراتب</p>
                                <h6 class="text-base">
                                    $36,358
                                </h6>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="flex items-center justify-center w-10 h-10 rounded-md bg-lightgray dark:bg-darkgray">
                                <i class="text-xl ti ti-grid-dots opacity-70 dark:opacity-100"></i>
                            </div>
                            <div>
                                <p class="dark:text-darklink ">الأرباح</p>
                                <h6 class="text-base">
                                    $5,296
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---Employee Salary Cards End--->

        <!---Customer Cards--->
        <div class="col-span-12 lg:col-span-4 md:col-span-6 sm:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-12">
                    <div class="card">
                        <div class="card-body">
                            <p>العملاء</p>
                            <h4 class="my-2 text-2xl">36,358</h4>
                            <div class="flex items-center gap-2 mb-3">
                                <span class="flex items-center justify-center p-1 rounded-full bg-lighterror dark:bg-darkerror">
                                    <i class="ti ti-arrow-down-right text-error"></i>
                                </span>
                                <p class="mb-0 text-dark dark:text-white">+9%</p>
                            </div>
                        </div>
                        <div id="customers"></div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-12">
                    <div class="mb-0 card">
                        <div class="card-body">
                            <p>المشاريع</p>
                            <h4 class="my-2 text-2xl">78,298</h4>
                            <div class="flex items-center gap-2 mb-3">
                                <span class="flex items-center justify-center p-1 rounded-full bg-lightsuccess dark:bg-darksuccess">
                                    <i class="ti ti-arrow-up-left text-success"></i>
                                </span>
                                <p class="mb-0 text-dark dark:text-white">+9%</p>
                            </div>
                            <div class="-me-4">
                                <div id="projects"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="mb-0 card">
                        <div class="card-body">
                            <div class="flex items-center gap-4 pb-2 mb-8">
                                <div>
                                    <img src="../assets/images/profile/user-2.jpg" class="rounded-md" alt width="72" height="72" />
                                </div>
                                <div>
                                    <h5 class="mb-2 leading-tight card-title">رائع للغاية، Vue قريباً!</h5>
                                    <p class="card-subtitle">22 مارس، 2023</p>
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <div class="flex">
                                    <a href="javascript:void(0)" class="relative">
                                        <img src="../assets/images/profile/user-2.jpg" class="border-2 rounded-full h-11 w-11 border-body dark:border-dark" alt="user" />
                                    </a>
                                    <a href="javascript:void(0)" class="relative -ms-2">
                                        <img src="../assets/images/profile/user-3.jpg" class="border-2 rounded-full h-11 w-11 border-body dark:border-dark" alt="user" />
                                    </a>
                                    <a href="javascript:void(0)" class="relative -ms-2">
                                        <img src="../assets/images/profile/user-4.jpg" class="border-2 rounded-full h-11 w-11 border-body dark:border-dark" alt="user" />
                                    </a>
                                    <a href="javascript:void(0)" class="relative -ms-2">
                                        <img src="../assets/images/profile/user-5.jpg" class="border-2 rounded-full h-11 w-11 border-body dark:border-dark" alt="user" />
                                    </a>
                                </div>
                                <div class="flex items-center justify-center w-10 h-10 rounded-md bg-lightgray dark:bg-darkgray">
                                    <i class="text-xl ti ti-message-2 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---Customer Cards End--->

        <!---Best Selling Products Cards--->
        <div class="col-span-12 lg:col-span-4 md:col-span-12 sm:col-span-12">
            <div class="overflow-hidden card bg-primary">
                <div class="pb-0 card-body bg-primary">
                    <h5 class="text-white card-title">أفضل المنتجات مبيعًا</h5>
                    <p class="text-white card-subtitle dark:text-white">نظرة عامة 2023</p>
                    <div class="flex justify-center mt-3">
                        <img src="../assets/images/backgrounds/piggy.png" class="w-full" alt />
                    </div>
                </div>
                <div class="px-2 pb-2 bg-primary">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-6">
                                <div class="flex items-center justify-between mb-3">
                                    <div>
                                        <h6>MaterialPro</h6>
                                        <p>$23,568</p>
                                    </div>
                                    <div>
                                        <span class="badge-md bg-lightprimary dark:bg-darkprimary text-primary">55%</span>
                                    </div>
                                </div>
                                <!-- شريط التقدم -->
                                <div class="flex w-full h-1 overflow-hidden rounded-md bg-lightprimary dark:bg-darkprimary" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                                    <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-primary whitespace-nowrap" style="width: 55%"></div>
                                </div>
                                <!-- نهاية شريط التقدم -->
                            </div>
                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <div>
                                        <h6>Flexy Admin</h6>
                                        <p>$23,568</p>
                                    </div>
                                    <div>
                                        <span class="badge-md bg-lightsecondary dark:bg-darksecondary text-secondary">20%</span>
                                    </div>
                                </div>
                                <!-- شريط التقدم -->
                                <div class="flex w-full h-1 overflow-hidden rounded-md bg-lightsecondary dark:bg-darksecondary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-secondary whitespace-nowrap" style="width: 20%"></div>
                                </div>
                                <!-- نهاية شريط التقدم -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---Best Selling Products Cards End--->

        <!---Weekly Stats Cards--->
        <div class="col-span-12 lg:col-span-4 md:col-span-6 sm:col-span-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">إحصائيات الأسبوع</h5>
                    <p class="card-subtitle">متوسط المبيعات</p>
                    <div id="stats" class="my-8"></div>
                    <div class="flex items-center justify-between pt-2 mb-7">
                        <div class="flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-md bg-lightprimary dark:bg-darkprimary">
                                <i class="text-xl ti ti-grid-dots text-primary"></i>
                            </div>
                            <div>
                                <h6 class="text-base">أفضل مبيعات
                                </h6>
                                <p class="dark:text-darklink">جوناثان دو</p>
                            </div>
                        </div>
                        <span class="badge-md bg-lightprimary dark:bg-darkprimary text-primary">+68</span>
                    </div>
                    <div class="flex items-center justify-between mb-7">
                        <div class="flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-md bg-lightsuccess dark:bg-darksuccess">
                                <i class="text-xl ti ti-grid-dots text-success"></i>
                            </div>
                            <div>
                                <h6 class="text-base">أفضل بائع
                                </h6>
                                <p class="dark:text-darklink">أفضل البائعين</p>
                            </div>
                        </div>
                        <span class="badge-md bg-lightsuccess dark:bg-darksuccess text-success">+68</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-md bg-lighterror dark:bg-darkerror">
                                <i class="text-xl ti ti-grid-dots text-error"></i>
                            </div>
                            <div>
                                <h6 class="text-base">أفضل بائع
                                </h6>
                                <p class="dark:text-darklink">أفضل البائعين</p>
                            </div>
                        </div>
                        <span class="badge-md bg-lighterror dark:bg-darkerror text-error">+68</span>
                    </div>
                </div>
            </div>
        </div>

        <!---Weekly Stats Cards End--->

        <!--- Top Followers Card --->
        <div class="col-span-12 lg:col-span-8 md:col-span-6 sm:col-span-12">
            <div class="card">
                <div class="card-body">
                    <div class="items-center justify-between mb-6 sm:flex">
                        <div>
                            <h5 class="card-title">أفضل المتابعين</h5>
                            <p class="card-subtitle">أفضل المتابعين لهذا الشهر</p>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <select>
                                <option selected>مارس 2024</option>
                                <option>أبريل 2024</option>
                                <option>مايو 2024</option>
                                <option>يونيو 2024</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y divide-border dark:divide-darkborder">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="p-4 font-semibold text-right text-dark dark:text-white">
                                                    المتابع</th>
                                                <th scope="col"
                                                    class="p-4 font-semibold text-right text-dark dark:text-white">
                                                    البريد الإلكتروني</th>
                                                <th scope="col"
                                                    class="p-4 font-semibold text-right text-dark dark:text-white">
                                                    نوع الحساب</th>
                                                <th scope="col"
                                                    class="p-4 font-semibold text-right text-dark dark:text-white">
                                                    تاريخ الانضمام</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-border dark:divide-darkborder">
                                            @forelse ($followers as $follower)
                                                <tr>
                                                    <td class="p-4 whitespace-nowrap">
                                                        <div class="flex items-center gap-3">
                                                            <div>
                                                                <img src="{{ isset($follower->user) && $follower->user->avatar ? Storage::url($follower->user->avatar) : asset('/assets/images/profile/user-1.jpg') }}"
                                                                    class="w-10 h-10 rounded-full" alt="user" />

                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1">{{ $follower->name }}</h6>
                                                                <p class="text-xs dark:text-darklink">متابع</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-4 whitespace-nowrap dark:text-darklink">
                                                        {{ $follower->email }}
                                                    </td>
                                                    <td class="p-4">
                                                        <span
                                                            class="badge-md bg-lightprimary dark:bg-darkprimary text-primary">نشط</span>
                                                    </td>
                                                    <td class="p-4 text-right whitespace-nowrap dark:text-darklink ">
                                                        {{ $follower->created_at->format('d/m/Y') }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4"
                                                        class="p-4 text-center text-gray-500 dark:text-gray-400">
                                                        لا يوجد متابعون حالياً
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- Top Followers Card End --->


        <!-- Most Liked Advertisements Chart -->
        <div id="most-liked-chart" style="margin-top: 20px;"></div>

        <!-- Highest Rated Advertisements Chart -->
        <div id="highest-rated-chart" style="margin-top: 20px;"></div>

        <script>
            // =====================================
            // Most Liked Advertisements Chart
            // =====================================
            var mostLikedData = @json($mostLikedData);
            var likedAdNames = mostLikedData.map(ad => ad.name);
            var likedAdCounts = mostLikedData.map(ad => ad.likes);

            var likedChart = {
                series: [{
                    name: 'Likes',
                    data: likedAdCounts,
                }],
                chart: {
                    type: 'bar',
                    height: 310,
                    toolbar: {
                        show: false
                    },
                    fontFamily: "inherit",
                    foreColor: "#adb0bb",
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        distributed: true,
                        borderRadius: 5,
                    },
                },
                colors: ['#5A67D8'],
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                xaxis: {
                    categories: likedAdNames,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                },
                yaxis: {
                    title: {
                        text: 'Number of Likes'
                    },
                },
                tooltip: {
                    theme: 'dark'
                },
            };

            new ApexCharts(document.querySelector("#most-liked-chart"), likedChart).render();

            // =====================================
            // Highest Rated Advertisements Chart
            // =====================================
            var highestRatedData = @json($highestRatedData);
            var ratedAdNames = highestRatedData.map(ad => ad.name);
            var ratedAdValues = highestRatedData.map(ad => ad.rating);

            var ratingChart = {
                series: [{
                    name: 'Average Rating',
                    data: ratedAdValues,
                }],
                chart: {
                    type: 'bar',
                    height: 310,
                    toolbar: {
                        show: false
                    },
                    fontFamily: "inherit",
                    foreColor: "#adb0bb",
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        distributed: true,
                        borderRadius: 5,
                    },
                },
                colors: ['#F56565'],
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                xaxis: {
                    categories: ratedAdNames,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                },
                yaxis: {
                    title: {
                        text: 'Average Rating'
                    },
                },
                tooltip: {
                    theme: 'dark'
                },
            };

            new ApexCharts(document.querySelector("#highest-rated-chart"), ratingChart).render();
        </script>


        <script>
            // Debug: Log the real estate data to make sure it's present
            console.log('Real Estate Counts:', @json($realEstateCounts));

            // Real Estate Counts Chart (Lands, Apartments, Buildings)
            var realEstateCounts = @json($realEstateCounts);
            var realEstateCategories = ['Lands', 'Apartments', 'Buildings'];
            var realEstateData = [realEstateCounts.landsCount, realEstateCounts.apartmentsCount, realEstateCounts
                .buildingsCount
            ];

            console.log('Real Estate Data for Chart:', realEstateData); // Debug: Log chart data

            var realEstateChart = {
                series: [{
                    name: 'Real Estate Count',
                    data: realEstateData,
                }],
                chart: {
                    type: 'bar',
                    height: 310,
                    toolbar: {
                        show: false
                    },
                    fontFamily: "inherit",
                    foreColor: "#adb0bb",
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        distributed: true,
                        borderRadius: 5,
                    },
                },
                colors: ['#4299E1', '#48BB78', '#ED8936'],
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                xaxis: {
                    categories: realEstateCategories,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                },
                yaxis: {
                    title: {
                        text: 'Count'
                    },
                },
                tooltip: {
                    theme: 'dark'
                },
            };

            new ApexCharts(document.querySelector("#real-estate-chart"), realEstateChart).render();
        </script>
    </div>
</x-app-layout-provider>
