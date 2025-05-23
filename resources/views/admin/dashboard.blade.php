<x-app-layout-admin>
    <div class="grid grid-cols-12 gap-6">
        <!---Top Cards--->
        <div class="col-span-12">
            <div class="owl-carousel counter-carousel owl-theme ">
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <!-- Lands Icon -->
                                    <i class="mb-3 text-4xl ti ti-map-pin text-primary"></i>
                                </div>
                                <p class="mb-1 font-semibold text-primary">
                                    اجمالي المستخدمين
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">



                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightwarning dark:bg-darkwarning">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-briefcase.svg" width="50" height="50"
                                        class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-warning">
                                    العملاء
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-warning">{{ $totalClients }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightwarning dark:bg-darkwarning">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-briefcase.svg" width="50" height="50"
                                        class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-warning">
                                    المزودين
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-warning">{{ $totalProviders }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightinfo dark:bg-darkinfo">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-mailbox.svg" width="50" height="50"
                                        class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-info">
                                    الاعلانات النشطة
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-info">{{ $activeAdvertisements }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lighterror dark:bg-darkerror">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-favorites.svg" width="50" height="50"
                                        class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-error">
                                    العلانات الغير نشطة
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-error">{{ $inactiveAdvertisements }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightsuccess dark:bg-darksuccess">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-speech-bubble.svg" width="50"
                                        height="50" class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-success">
                                    كل العقارات
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-success">{{ $totalRealEstate }}</h5>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-connect.svg" width="50" height="50"
                                        class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-primary">
                                    الاراضي التي للبيع
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">{{ $landsForSale }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-connect.svg" width="50" height="50"
                                        class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-primary">
                                    الاراضي التي للايجار
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">{{ $landsForRent }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-connect.svg" width="50" height="50"
                                        class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-primary">
                                    الشقق التي للبيع
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">{{ $apartmentsForSale }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-connect.svg" width="50" height="50"
                                        class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-primary">
                                    الشقق التي للايجار
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">{{ $apartmentsForRent }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-connect.svg" width="50" height="50"
                                        class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-primary">
                                    المباني التي للبيع
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">{{ $buildingsForSale }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-connect.svg" width="50" height="50"
                                        class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-primary">
                                    المباني التي للايجار
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">{{ $buildingsForRent }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-connect.svg" width="50" height="50"
                                        class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-primary">
                                    الطلبات
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">{{ $totalRequests }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-connect.svg" width="50" height="50"
                                        class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-primary">
                                    الاتصالات
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">{{ $totalContacts }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="w-full mb-0 shadow-none card bg-lightprimary dark:bg-darkprimary">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="../assets/images/svgs/icon-connect.svg" width="50" height="50"
                                        class="mb-3" alt>
                                </div>
                                <p class="mb-1 font-semibold text-primary">
                                    عد الحسابات
                                </p>
                                <h5 class="mb-0 text-lg font-semibold text-primary">{{ $registeredAccounts }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---Top Cards End--->

        <!---Revenu Update / Yearly Breakups Cards--->
        <div class="col-span-12 lg:col-span-8 md:col-span-12 sm:col-span-12">
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
                                <div id="chart"></div>
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
        </div>
        <!---Revenu Update / Yearly Breakups Cards End--->

        <!---Yearly Breakups Cards--->
        <div class="col-span-12 lg:col-span-4 md:col-span-12 sm:col-span-12">
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
        </div>
        <!---Yearly Breakups Cards End--->

        <!---Employee Salary Cards--->
        <div class="col-span-12 lg:col-span-4 md:col-span-6 sm:col-span-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Employee Salary</h5>
                    <p class="card-subtitle">Every month</p>
                    <div class="-me-12">
                        <div id="salary" class="pb-6 mb-6"></div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-md bg-lightprimary dark:bg-darkprimary">
                                <i class="text-xl ti ti-grid-dots text-primary"></i>
                            </div>
                            <div>
                                <p class="dark:text-darklink ">Salary</p>
                                <h6 class="text-base">
                                    $36,358
                                </h6>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-md bg-lightgray dark:bg-darkgray">
                                <i class="text-xl ti ti-grid-dots opacity-70 dark:opacity-100"></i>
                            </div>
                            <div>
                                <p class="dark:text-darklink ">Profit</p>
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
        {{-- <div class="col-span-12 lg:col-span-4 md:col-span-6 sm:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-12">
                    <div class="card">
                        <div class="card-body">
                            <p>Customers
                            </p>
                            <h4 class="my-2 text-2xl">
                                36,358</h4>
                            <div class="flex items-center gap-2 mb-3">
                                <span
                                    class="flex items-center justify-center p-1 rounded-full bg-lighterror dark:bg-darkerror ">
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
                            <p>Projects
                            </p>
                            <h4 class="my-2 text-2xl">
                                78,298</h4>
                            <div class="flex items-center gap-2 mb-3">
                                <span
                                    class="flex items-center justify-center p-1 rounded-full bg-lightsuccess dark:bg-darksuccess ">
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
                                    <img src="../assets/images/profile/user-2.jpg" class="rounded-md" alt
                                        width="72" height="72" />
                                </div>
                                <div>
                                    <h5 class="mb-2 leading-tight card-title">
                                        Super awesome, Vue coming soon!
                                    </h5>
                                    <p class="card-subtitle">22 March, 2023
                                    </p>
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <div class="flex">
                                    <a href="javascript:void(0)" class="relative ">
                                        <img src="../assets/images/profile/user-2.jpg"
                                            class="border-2 rounded-full h-11 w-11 border-body dark:border-dark"
                                            alt="user" />
                                    </a>
                                    <a href="javascript:void(0)" class="relative -ms-2">
                                        <img src="../assets/images/profile/user-3.jpg"
                                            class="border-2 rounded-full h-11 w-11 border-body dark:border-dark"
                                            alt="user" />
                                    </a>
                                    <a href="javascript:void(0)" class="relative -ms-2">
                                        <img src="../assets/images/profile/user-4.jpg"
                                            class="border-2 rounded-full h-11 w-11 border-body dark:border-dark"
                                            alt="user" />
                                    </a>
                                    <a href="javascript:void(0)" class="relative -ms-2">
                                        <img src="../assets/images/profile/user-5.jpg"
                                            class="border-2 rounded-full h-11 w-11 border-body dark:border-dark"
                                            alt="user" />
                                    </a>
                                </div>
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-md bg-lightgray dark:bg-darkgray">
                                    <i class="text-xl ti ti-message-2 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="col-span-12 lg:col-span-4 md:col-span-6 sm:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-12">
                    <div class="card">
                        <div class="card-body">
                            <p>إجمالي الطلبات</p>
                            <h4 class="my-2 text-2xl">
                                <?php echo $reqstats['total_requests']; ?>
                            </h4>
                            <div class="flex items-center gap-2 mb-3">
                                <span
                                    class="flex items-center justify-center p-1 rounded-full bg-lighterror dark:bg-darkerror">
                                    <i class="ti ti-arrow-down-right text-error"></i>
                                </span>
                                <p class="mb-0 text-dark dark:text-white">طلبات معلقة: <?php echo $reqstats['pending_requests']; ?></p>
                            </div>
                        </div>
                        <div id="requests"></div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-12">
                    <div class="card">
                        <div class="card-body">
                            <p>الطلبات المكتملة</p>
                            <h4 class="my-2 text-2xl">
                                <?php echo $reqstats['completed_requests']; ?>
                            </h4>
                            <div class="flex items-center gap-2 mb-3">
                                <span
                                    class="flex items-center justify-center p-1 rounded-full bg-lightsuccess dark:bg-darksuccess">
                                    <i class="ti ti-arrow-up-left text-success"></i>
                                </span>
                                <p class="mb-0 text-dark dark:text-white">طلبات مكتملة</p>
                            </div>
                        </div>
                        <div id="completed-requests"></div>
                    </div>
                </div>

                <div class="col-span-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-4 card-title">إحصائيات الطلبات حسب النوع</h5>
                            <div class="flex flex-col gap-4">
                                <?php foreach ($reqstats['requests_by_type'] as $typeStat): ?>
                                    <div class="flex items-center justify-between">
                                        <span class="flex items-center">
                                            <i class="ti ti-check text-success me-1"></i> <!-- أيقونة علامة الصح -->
                                            <?php echo ucfirst($typeStat->request_type); ?>:
                                        </span>
                                        <span><?php echo $typeStat->total; ?></span>
                                    </div>
                                <?php endforeach; ?>
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
                    <h5 class="text-white card-title">Best Selling Products</h5>
                    <p class="text-white card-subtitle dark:text-white">Overview 2023</p>
                    <div class="flex justify-center mt-3">
                        <img src="../assets/images/backgrounds/piggy.png" class="w-full" alt />
                    </div>
                </div>
                <div class="px-2 pb-2 bg-primary">
                    <div class="card ">
                        <div class="card-body ">
                            <div class="mb-6">
                                <div class="flex items-center justify-between mb-3">
                                    <div>
                                        <h6>
                                            MaterialPro</h6>
                                        <p>$23,568
                                        </p>
                                    </div>
                                    <div>
                                        <span
                                            class="badge-md bg-lightprimary dark:bg-darkprimary text-primary">55%</span>
                                    </div>
                                </div>
                                <!-- Progress -->
                                <div class="flex w-full h-1 overflow-hidden rounded-md bg-lightprimary dark:bg-darkprimary"
                                    role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                                    <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-primary whitespace-nowrap "
                                        style="width: 55%"></div>
                                </div>
                                <!-- End Progress -->
                            </div>
                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <div>
                                        <h6>
                                            Flexy Admin</h6>
                                        <p>$23,568
                                        </p>
                                    </div>
                                    <div>
                                        <span
                                            class="badge-md bg-lightsecondary dark:bg-darksecondary text-secondary">20%</span>
                                    </div>
                                </div>
                                <!-- Progress -->
                                <div class="flex w-full h-1 overflow-hidden rounded-md bg-lightsecondary dark:bg-darksecondary"
                                    role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-secondary whitespace-nowrap "
                                        style="width: 20%"></div>
                                </div>
                                <!-- End Progress -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!---Best Selling Products Cards End--->

        <!---Weekly Stats Cards--->
        {{-- <div class="col-span-12 lg:col-span-4 md:col-span-6 sm:col-span-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Weekly Stats</h5>
                    <p class="card-subtitle">Average sales</p>
                    <div id="stats" class="my-8"></div>
                    <div class="flex items-center justify-between pt-2 mb-7">
                        <div class="flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-md bg-lightprimary dark:bg-darkprimary">
                                <i class="text-xl ti ti-grid-dots text-primary"></i>
                            </div>
                            <div>
                                <h6 class="text-base">Top Sales
                                </h6>
                                <p class=" dark:text-darklink">Johnathan Doe</p>
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
                                <h6 class="text-base">Best Seller
                                </h6>
                                <p class=" dark:text-darklink">Best Sellers</p>
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
                                <h6 class="text-base">Best Seller
                                </h6>
                                <p class=" dark:text-darklink">Best Sellers</p>
                            </div>
                        </div>
                        <span class="badge-md bg-lighterror dark:bg-darkerror text-error">+68</span>

                    </div>
                </div>
            </div>
        </div> --}}

        {{--
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
        </div> --}}

        {{-- <div class="col-span-12 lg:col-span-4 md:col-span-6 sm:col-span-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">إحصائيات الإعلانات</h5>
                    <p class="card-subtitle">الإعلانات المضافة من كل محافظة</p>
                    <div id="ads-stats" class="my-8"></div>
                    <div class="flex items-center justify-between pt-2 mb-7">
                        <div class="flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-md bg-lightprimary dark:bg-darkprimary">
                                <i class="text-xl ti ti-grid-dots text-primary"></i>
                            </div>
                            <div>
                                <h6 class="text-base">المحافظة الأولى</h6>
                                <p class="dark:text-darklink">عدد الإعلانات: 120</p>
                            </div>
                        </div>
                        <span class="badge-md bg-lightprimary dark:bg-darkprimary text-primary">+15%</span>
                    </div>
                    <div class="flex items-center justify-between mb-7">
                        <div class="flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-md bg-lightsuccess dark:bg-darksuccess">
                                <i class="text-xl ti ti-grid-dots text-success"></i>
                            </div>
                            <div>
                                <h6 class="text-base">المحافظة الثانية</h6>
                                <p class="dark:text-darklink">عدد الإعلانات: 95</p>
                            </div>
                        </div>
                        <span class="badge-md bg-lightsuccess dark:bg-darksuccess text-success">+10%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-md bg-lighterror dark:bg-darkerror">
                                <i class="text-xl ti ti-grid-dots text-error"></i>
                            </div>
                            <div>
                                <h6 class="text-base">المحافظة الثالثة</h6>
                                <p class="dark:text-darklink">عدد الإعلانات: 85</p>
                            </div>
                        </div>
                        <span class="badge-md bg-lighterror dark:bg-darkerror text-error">+8%</span>
                    </div>
                </div>
            </div>
        </div> --}}


        <div class="col-span-12 lg:col-span-4 md:col-span-6 sm:col-span-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">إحصائيات العقارات</h5>
                    <p class="card-subtitle">العقارات المضافة من كل محافظة</p>
                    <div id="ads-stats" class="my-8"></div>

                    @foreach ($stats as $sta)
                        <div class="flex items-center justify-between pt-2 mb-7">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-md bg-lightprimary dark:bg-darkprimary">
                                    <i class="text-xl ti ti-grid-dots text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="text-base">{{ $sta['name'] }}</h6>
                                    <p class="dark:text-darklink">عدد العقارات: {{ $sta['ads_count'] }}</p>
                                </div>
                            </div>
                            <span
                                class="badge-md bg-lightprimary dark:bg-darkprimary text-primary">+{{ $sta['ads_count'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!---Weekly Stats Cards End--->

        <!---Top Performers Cards--->



        <div class="col-span-12 lg:col-span-8 md:col-span-6 sm:col-span-12">
            <div class="card">
                <div class="card-body">
                    <div class="items-center justify-between mb-6 sm:flex">
                        <div>
                            <h5 class="card-title">أفضل المزودين</h5>
                            <p class="card-subtitle">أفضل المزودين لهذا الشهر</p>
                        </div>
                        {{-- <div class="mt-4 sm:mt-0">
                            <select>
                                <option selected>مارس 2024</option>
                                <option>أبريل 2024</option>
                                <option>مايو 2024</option>
                                <option>يونيو 2024</option>
                            </select>
                        </div> --}}
                    </div>

                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y divide-border dark:divide-darkborder">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="p-4 font-semibold text-left rtl:text-right ps-0 text-dark dark:text-white">
                                                    المزودين
                                                </th>
                                                <th scope="col"
                                                    class="p-4 font-semibold text-left rtl:text-right text-dark dark:text-white">
                                                    عدد الإعلانات
                                                </th>
                                                <th scope="col"
                                                    class="p-4 font-semibold text-left rtl:text-right text-dark dark:text-white">
                                                    حالة الحساب
                                                </th>
                                                <th scope="col"
                                                    class="p-4 font-semibold text-right rtl:text-left text-dark dark:text-white">
                                                    التاريخ
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-border dark:divide-darkborder">
                                            @foreach ($topProviders as $provider)
                                                <tr>
                                                    <td class="p-4 ps-0 whitespace-nowrap">
                                                        <div class="flex items-center gap-3">
                                                            <div>
                                                                <img src="/assets/images/profile/user-1.jpg"
                                                                    class="w-10 h-10 rounded-full" alt="user" />
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1">{{ $provider->name }}</h6>
                                                                <!-- اسم المزود -->
                                                                <p class="text-xs dark:text-darklink">
                                                                    {{ $provider->profession }}</p>
                                                                <!-- مهنة المزود -->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-4 whitespace-nowrap dark:text-darklink">
                                                        {{ $provider->advertisements_count }}</td>
                                                    <!-- عدد الإعلانات -->
                                                    <td class="p-4">
                                                        <span
                                                            class="badge-md bg-lightprimary dark:bg-darkprimary text-primary">
                                                            {{ $provider->account_status }}
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="p-4 text-right whitespace-nowrap dark:text-darklink rtl:text-left">
                                                        {{ optional($provider->created_at)->format('d M Y') ??'not available date'}} <!-- التاريخ -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>







        <!---Top Performers Cards End--->
    </div>
</x-app-layout-admin>
