<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="عرض مشرف" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.admins.index'), 'icon' => 'ti ti-apps', 'label' => 'المشرفين'],
            ['label' => 'عرض مشرف'],
        ]" />
    </x-slot>
    <div class="overflow-hidden card">
        <div class="p-0 card-body">
            <img src="../assets/images/backgrounds/profilebg.jpg" alt="" class="w-full">
            <div class="grid grid-cols-12 gap-6">
                <div class="order-2 col-span-12 lg:col-span-4 lg:order-1">
                    <div class="flex items-center justify-around p-0 lg:p-6">
                        <div class="text-center">
                            <i class="block mb-1 text-xl ti ti-file-description text-bodytext dark:text-darklink"></i>
                            <h4 class="text-xl">938</h4>
                            <p class="text-base text-bodytext dark:text-darklink">Posts</p>
                        </div>
                        <div class="text-center">
                            <i class="block mb-1 text-xl ti ti-user-circle text-bodytext dark:text-darklink"></i>
                            <h4 class="text-xl">3,586</h4>
                            <p class="text-base text-bodytext dark:text-darklink">Followers</p>
                        </div>
                        <div class="text-center">
                            <i class="block mb-1 text-xl ti ti-user-check text-bodytext dark:text-darklink"></i>
                            <h4 class="text-xl">2,659</h4>
                            <p class="text-base text-bodytext dark:text-darklink">Following</p>
                        </div>
                    </div>
                </div>
                <div class="order-1 col-span-12 lg:col-span-4 lg:order-2">
                    <div class="-mt-14">
                        <div class="flex items-center justify-center mb-2">
                            <div class="flex items-center justify-center rounded-full linear-gradient"
                                style="width: 110px; height: 110px;" ;>
                                <div class="flex items-center justify-center overflow-hidden border-4 rounded-full border-body"
                                    style="width: 100px; height: 100px;" ;>
                                    <img src="../assets/images/profile/user-1.jpg" alt="" class="w-full">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="card-title ">Mathew
                                Anderson</h5>
                            <p class="">Designer</p>
                        </div>
                    </div>
                </div>
                <div class="order-last col-span-12 mb-6 lg:col-span-4 lg:mb-0">
                    <ul class="flex items-center justify-center h-full gap-4">
                        <li class="relative">
                            <a class="flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn"
                                href="javascript:void(0)">
                                <i class="text-lg ti ti-brand-facebook"></i>
                            </a>
                        </li>
                        <li class="relative">
                            <a class="flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn bg-info hover:bg-blue-500"
                                href="javascript:void(0)">
                                <i class="text-lg ti ti-brand-twitter"></i>
                            </a>
                        </li>
                        <li class="relative">
                            <a class="flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn btn-secondary"
                                href="javascript:void(0)">
                                <i class="text-lg ti ti-brand-dribbble"></i>
                            </a>
                        </li>
                        <li class="relative">
                            <a class="flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn btn-error"
                                href="javascript:void(0)">
                                <i class="text-lg ti ti-brand-youtube"></i>
                            </a>
                        </li>
                        <li><button class="btn btn-primary">Add To Story</button></li>
                    </ul>
                </div>
            </div>

            <!----------->
            <div class="px-3 rounded-md bg-lightprimary dark:bg-darkprimary">
                <nav class="flex justify-end space-x-3" aria-label="Tabs" role="tablist">
                    <button type="button"
                        class="inline-flex items-center gap-2 px-3 py-2 text-sm border-b-2 border-transparent hs-tab-active:border-primary hs-tab-active:text-primary whitespace-nowrap text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary active"
                        id="Profile-tab" data-hs-tab="#profile" aria-controls="profile" role="tab">
                        <i class="text-xl ti ti-user-circle"></i><span class="hidden md:flex">Profile</span>
                    </button>
                    <button type="button"
                        class="inline-flex items-center gap-2 px-3 py-2 text-sm border-b-2 border-transparent hs-tab-active:border-primary hs-tab-active:text-primary whitespace-nowrap text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary"
                        id="Followers-tab" data-hs-tab="#followers" aria-controls="followers" role="tab">
                        <i class="text-xl ti ti-heart"></i><span class="hidden md:flex">Followers</span>
                    </button>
                    <button type="button"
                        class="inline-flex items-center gap-2 px-3 py-2 text-sm border-b-2 border-transparent hs-tab-active:border-primary hs-tab-active:text-primary whitespace-nowrap text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary"
                        id="Friends-tab" data-hs-tab="#friends" aria-controls="friends" role="tab">
                        <i class="text-xl ti ti-user-circle"></i><span class="hidden md:flex">Friends</span>
                    </button>
                    <button type="button"
                        class="inline-flex items-center gap-2 px-3 py-2 text-sm border-b-2 border-transparent hs-tab-active:border-primary hs-tab-active:text-primary whitespace-nowrap text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary"
                        id="Gallery-tab" data-hs-tab="#gallery" aria-controls="gallery" role="tab">
                        <i class="text-xl ti ti-photo-plus"></i><span class="hidden md:flex">Gallery</span>
                    </button>
                </nav>
            </div>
        </div>


        <!----------->

    </div>

    <!---Tabs Content--->
    <div class="mt-6">
        <div id="profile" role="tabpanel" aria-labelledby="Profile-tab">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-4 md:col-span-12 sm:col-span-12">
                    <div class="mb-6 border shadow-none card border-border dark:border-darkborder">
                        <div class="card-body ">
                            <h4 class="mb-3 text-xl">
                                Introduction</h4>
                            <p class="mb-3 ">Hello, I am Mathew
                                Anderson. I love making websites and graphics.
                                Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit.</p>
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
                                        xyzjonathan@gmail.com</h6>
                                </li>
                                <li class="flex items-center gap-3 mb-4">
                                    <i class="text-xl ti ti-device-desktop text-bodytext dark:text-darklink"></i>
                                    <h6 class="text-base">
                                        www.xyz.com</h6>
                                </li>
                                <li class="flex items-center gap-3 mb-2">
                                    <i class="text-xl ti ti-map-pin text-bodytext dark:text-darklink"></i>
                                    <h6 class="text-base">
                                        Newyork, USA - 100001</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="border shadow-none card border-border dark:border-darkborder">
                        <div class="card-body">
                            <h4 class="mb-3 text-xl">
                                Photos
                            </h4>
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-4">
                                    <img src="../assets/images/profile/user-10.jpg" alt=""
                                        class="w-full rounded-md ">
                                </div>
                                <div class="col-span-4">
                                    <img src="../assets/images/profile/user-2.jpg" alt=""
                                        class="w-full rounded-md ">
                                </div>
                                <div class="col-span-4">
                                    <img src="../assets/images/profile/user-3.jpg" alt=""
                                        class="w-full rounded-md ">
                                </div>
                                <div class="col-span-4">
                                    <img src="../assets/images/profile/user-4.jpg" alt=""
                                        class="w-full rounded-md ">
                                </div>
                                <div class="col-span-4">
                                    <img src="../assets/images/profile/user-5.jpg" alt=""
                                        class="w-full rounded-md ">
                                </div>
                                <div class="col-span-4">
                                    <img src="../assets/images/profile/user-6.jpg" alt=""
                                        class="w-full rounded-md ">
                                </div>
                                <div class="col-span-4">
                                    <img src="../assets/images/profile/user-7.jpg" alt=""
                                        class="w-full rounded-md ">
                                </div>
                                <div class="col-span-4">
                                    <img src="../assets/images/profile/user-8.jpg" alt=""
                                        class="w-full rounded-md ">
                                </div>
                                <div class="col-span-4">
                                    <img src="../assets/images/profile/user-1.jpg" alt=""
                                        class="w-full rounded-md ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-span-12 lg:col-span-8 md:col-span-12 sm:col-span-12">
                    <!--Card 1-->
                    <div class="mb-6 border shadow-none card border-border dark:border-darkborder">
                        <div class="card-body ">
                            <textarea class="form-control" rows="5" placeholder="Share your thoughts"></textarea>
                            <div class="flex items-center gap-6 mt-3">
                                <a class="flex items-center gap-2" href="javascript:void(0)">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn bg-primary">
                                        <i class="ti ti-photo"></i>
                                    </div>
                                    <span class="">Photo /
                                        Video</span>
                                </a>
                                <a href="javascript:void(0)" class="flex items-center gap-2">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn btn-secondary">
                                        <i class="ti ti-notebook"></i>
                                    </div>
                                    <span class="">Article</span>
                                </a>
                                <button class="btn btn-primary ms-auto">Post</button>
                            </div>
                        </div>
                    </div>
                    <!--Card 2-->
                    <div class="mb-6 border shadow-none card border-border dark:border-darkborder">
                        <div class="card-body ">
                            <div class="flex items-center gap-3">
                                <img src="../assets/images/profile/user-1.jpg" alt=""
                                    class="w-10 h-10 rounded-full">
                                <h6 class="text-base">Mathew
                                    Anderson</h6>
                                <span class="flex items-center gap-2 text-xs text-bodytext dark:text-darklink ">
                                    <i class="w-2 h-2 rounded-full bg-link dark:bg-darklink opacity-30"></i>
                                    15 min
                                    ago
                                </span>
                            </div>
                            <p class="my-3 ">
                                Nu kek vuzkibsu mooruno ejepogojo uzjon gag fa ezik disan he nah.
                                Wij wo pevhij tumbug rohsa
                                ahpi ujisapse lo vap labkez eddu suk.
                            </p>
                            <img src="../assets/images/products/s1.jpg" alt=""
                                class="object-cover w-full max-w-full rounded-md h-96">
                            <div class="flex items-center gap-4 my-3">
                                <div class="flex items-center gap-2">
                                    <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn bg-primary hs-tooltip hs-tooltip-toggle"
                                        href="javascript:void(0)">
                                        <i class="ti ti-thumb-up"></i>
                                        <span
                                            class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                            role="tooltip">
                                            Like
                                        </span>
                                    </a>
                                    <span class="font-semibold ">67</span>
                                </div>
                                <div class="flex items-center gap-2 ">
                                    <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn btn-secondary bg-secondary hs-tooltip hs-tooltip-toggle"
                                        href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Comment">
                                        <i class="ti ti-message-2"></i>
                                        <span
                                            class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                            role="tooltip">
                                            Comment
                                        </span>
                                    </a>
                                    <span class="font-semibold ">2</span>
                                </div>
                                <a class="relative flex items-center justify-center ms-auto hs-tooltip hs-tooltip-toggle hover:text-primary"
                                    href="javascript:void(0)">
                                    <i class="text-lg ti ti-share"></i>
                                    <span
                                        class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                        role="tooltip">
                                        Share
                                    </span>
                                </a>
                            </div>

                            <!-----Comments----->
                            <div class="mb-6 shadow-none card bg-lightgray dark:bg-darkprimary">
                                <div class="card-body">
                                    <div class="flex items-center gap-4">
                                        <img src="../assets/images/profile/user-3.jpg" alt=""
                                            class="w-8 h-8 rounded-full">
                                        <h6 class="text-base">
                                            Deran Mac</h6>
                                        <span
                                            class="flex items-center gap-2 text-xs text-bodytext dark:text-darklink ">
                                            <i class="w-2 h-2 rounded-full bg-link dark:bg-darklink opacity-30"></i>
                                            8 min
                                            ago
                                        </span>
                                    </div>
                                    <p class="my-4 ">Lufo zizrap
                                        iwofapsuk pusar luc jodawbac zi op uvezojroj duwage vuhzoc
                                        ja
                                        vawdud le furhez siva
                                        fikavu ineloh. Zot afokoge si mucuve hoikpaf adzuk zileuda
                                        falohfek zoije fuka udune lub
                                        annajor gazo
                                        conis sufur gu.
                                    </p>

                                    <div class="flex items-center gap-4 ">
                                        <div class="flex items-center gap-2">
                                            <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn bg-primary hs-tooltip hs-tooltip-toggle"
                                                href="javascript:void(0)">
                                                <i class="ti ti-thumb-up"></i>
                                                <span
                                                    class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                                    role="tooltip">
                                                    Like
                                                </span>
                                            </a>
                                            <span class="font-semibold ">67</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn btn-secondary bg-secondary hs-tooltip hs-tooltip-toggle"
                                                href="javascript:void(0)" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Comment">
                                                <i class="ti ti-arrow-back-up"></i>
                                                <span
                                                    class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                                    role="tooltip">
                                                    Comment
                                                </span>
                                            </a>
                                            <span class="font-semibold ">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-----Comments ends----->

                            <!-----Comments----->
                            <div class="mb-6 shadow-none card bg-lightgray dark:bg-darkprimary">
                                <div class="card-body">
                                    <div class="flex items-center gap-4">
                                        <img src="../assets/images/profile/user-4.jpg" alt=""
                                            class="w-8 h-8 rounded-full">
                                        <h6 class="text-base">
                                            Jonathan Bg</h6>
                                        <span
                                            class="flex items-center gap-2 text-xs text-bodytext dark:text-darklink ">
                                            <i class="w-2 h-2 rounded-full bg-link dark:bg-darklink opacity-30"></i>
                                            8 min
                                            ago
                                        </span>
                                    </div>
                                    <p class="my-4 ">Zumankeg ba
                                        lah lew ipep tino tugjekoj hosih fazjid wotmila durmuri buf
                                        hi sigapolu joit ebmi joge vo. Horemo vogo hat na ejednu
                                        sarta afaamraz zi cunidce peroido suvan podene igneve.
                                    </p>

                                    <div class="flex items-center gap-4 ">
                                        <div class="flex items-center gap-2">
                                            <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn bg-primary hs-tooltip hs-tooltip-toggle"
                                                href="javascript:void(0)">
                                                <i class="ti ti-thumb-up"></i>
                                                <span
                                                    class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                                    role="tooltip">
                                                    Like
                                                </span>
                                            </a>
                                            <span class="font-semibold ">68</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn btn-secondary bg-secondary hs-tooltip hs-tooltip-toggle"
                                                href="javascript:void(0)" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Comment">
                                                <i class="ti ti-arrow-back-up"></i>
                                                <span
                                                    class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                                    role="tooltip">
                                                    Comment
                                                </span>
                                            </a>
                                            <span class="font-semibold ">1</span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-----Comments ends----->

                            <!-----Comments----->
                            <div class="ms-6">
                                <div class="shadow-none card bg-lightgray dark:bg-darkprimary">
                                    <div class="card-body">
                                        <div class="flex items-center gap-4">
                                            <img src="../assets/images/profile/user-5.jpg" alt=""
                                                class="w-10 h-10 rounded-full">
                                            <h6 class="text-base">
                                                Carry minati</h6>
                                            <span
                                                class="flex items-center gap-2 text-xs text-bodytext dark:text-darklink ">
                                                <i
                                                    class="w-2 h-2 rounded-full bg-link dark:bg-darklink opacity-30"></i>
                                                Just now
                                            </span>
                                        </div>
                                        <p class="mt-4 ">Olte ni
                                            somvukab ugura ovaobeco hakgoc miha peztajo tawosu
                                            udbacas kismakin hi. Dej zetfamu cevufi sokbid bud mun
                                            soimeuha pokahram vehurpar keecris pepab voegmud
                                            zundafhef hej pe
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-----Comments ends----->
                        </div>

                        <div class="flex items-center gap-3 px-3 py-4 border-t border-border dark:border-darkborder ">
                            <img src="../assets/images/profile/user-1.jpg" alt="" class="rounded-full"
                                width="33" height="33">
                            <input type="text" class="form-control " id="exampleInputtext"
                                aria-describedby="textHelp" placeholder="Comment">
                            <button class="btn ">Comment</button>
                        </div>

                    </div>

                    <!--Card 3-->
                    <div class="mb-6 border shadow-none card border-border dark:border-darkborder">
                        <div class="card-body">
                            <div class="flex items-center gap-4">
                                <img src="../assets/images/profile/user-5.jpg" alt=""
                                    class="w-10 h-10 rounded-full">
                                <h6 class="text-base">
                                    Carry Minati</h6>
                                <span class="flex items-center gap-2 text-xs text-bodytext dark:text-darklink ">
                                    <i class="w-2 h-2 rounded-full bg-link dark:bg-darklink opacity-30"></i>
                                    now
                                </span>
                            </div>
                            <p class="my-4 ">Pucnus taw set babu
                                lasufot lawdebuw nem ig bopnub notavfe pe ranlu dijsan liwfekaj lo
                                az. Dom giat gu sehiosi bikelu lo eb uwrerej bih woppoawi wijdiola
                                iknem hih suzega gojmev kir rigoj.
                            </p>

                            <div class="flex items-center gap-4 ">
                                <div class="flex items-center gap-2">
                                    <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn bg-primary hs-tooltip hs-tooltip-toggle"
                                        href="javascript:void(0)">
                                        <i class="ti ti-thumb-up"></i>
                                        <span
                                            class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                            role="tooltip">
                                            Like
                                        </span>
                                    </a>
                                    <span class="font-semibold ">1</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn btn-secondary bg-secondary hs-tooltip hs-tooltip-toggle"
                                        href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Comment">
                                        <i class="ti ti-message-2"></i>
                                        <span
                                            class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                            role="tooltip">
                                            Comment
                                        </span>
                                    </a>
                                    <span class="font-semibold ">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 px-3 py-4 border-t border-border dark:border-darkborder ">
                            <img src="../assets/images/profile/user-1.jpg" alt="" class="rounded-full"
                                width="33" height="33">
                            <input type="text" class="form-control " id="exampleInputtext"
                                aria-describedby="textHelp" placeholder="Comment">
                            <button class="btn ">Comment</button>
                        </div>
                    </div>

                    <!--Card 4-->
                    <div class="mb-6 border shadow-none card border-border dark:border-darkborder">
                        <div class="card-body">
                            <div class="flex items-center gap-4">
                                <img src="../assets/images/profile/user-5.jpg" alt=""
                                    class="w-10 h-10 rounded-full">
                                <h6 class="text-base">
                                    Genelia Desouza
                                </h6>
                                <span class="flex items-center gap-2 text-xs text-bodytext dark:text-darklink ">
                                    <i class="w-2 h-2 rounded-full bg-link dark:bg-darklink opacity-30"></i>
                                    15 min ago
                                </span>
                            </div>
                            <p class="my-4 ">Faco kiswuoti
                                mucurvi juokomo fobgi aze huweik zazjofefa kuujer talmoc li niczot
                                lohejbo vozev zi huto. Ju tupma uwujate bevolkoh hob munuap lirec
                                zak ja li hotlanu pigtunu.
                            </p>
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-12 sm:col-span-6">
                                    <img src="../assets/images/products/s2.jpg" alt=""
                                        class="w-full mb-3 rounded-md sm:mb-0">
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <img src="../assets/images/products/s4.jpg" alt=""
                                        class="w-full mb-3 rounded-md sm:mb-0">
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mt-4">
                                <div class="flex items-center gap-2">
                                    <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn bg-primary hs-tooltip hs-tooltip-toggle"
                                        href="javascript:void(0)">
                                        <i class="ti ti-thumb-up"></i>
                                        <span
                                            class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                            role="tooltip">
                                            Like
                                        </span>
                                    </a>
                                    <span class="font-semibold ">320</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn btn-secondary bg-secondary hs-tooltip hs-tooltip-toggle"
                                        href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Comment">
                                        <i class="ti ti-message-2"></i>
                                        <span
                                            class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                            role="tooltip">
                                            Comment
                                        </span>
                                    </a>
                                    <span class="font-semibold ">1</span>
                                </div>
                                <a class="relative flex items-center justify-center ms-auto hs-tooltip hs-tooltip-toggle hover:text-primary"
                                    href="javascript:void(0)">
                                    <i class="text-lg ti ti-share"></i>
                                    <span
                                        class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                        role="tooltip">
                                        Share
                                    </span>
                                </a>
                            </div>


                            <div class="mt-4 shadow-none card bg-lightgray dark:bg-darkprimary">
                                <div class="card-body">
                                    <div class="flex items-center gap-4">
                                        <img src="../assets/images/profile/user-3.jpg" alt=""
                                            class="w-8 h-8 rounded-full">
                                        <h6 class="text-base">
                                            Ritesh Deshmukh</h6>
                                        <span
                                            class="flex items-center gap-2 text-xs text-bodytext dark:text-darklink ">
                                            <i class="w-2 h-2 rounded-full bg-link dark:bg-darklink opacity-30"></i>
                                            15 min ago
                                        </span>
                                    </div>
                                    <p class="my-4 ">Hintib
                                        cojno riv ze
                                        heb cipcep fij wo tufinpu bephekdab infule pajnaji. Jiran
                                        goetimip
                                        muovo go en gaga zeljomim hozlu lezuvi ehkapod dec bifoom
                                        hag
                                        dootasac odo luvgit ti ella.
                                    </p>
                                    <div class="flex items-center gap-4 ">
                                        <div class="flex items-center gap-2">
                                            <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn bg-primary hs-tooltip hs-tooltip-toggle"
                                                href="javascript:void(0)">
                                                <i class="ti ti-thumb-up"></i>
                                                <span
                                                    class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                                    role="tooltip">
                                                    Like
                                                </span>
                                            </a>
                                            <span class="font-semibold ">65</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn btn-secondary bg-secondary hs-tooltip hs-tooltip-toggle"
                                                href="javascript:void(0)" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Comment">
                                                <i class="ti ti-arrow-back-up"></i>
                                                <span
                                                    class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                                    role="tooltip">
                                                    Comment
                                                </span>
                                            </a>
                                            <span class="font-semibold ">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="flex items-center gap-3 px-3 py-4 border-t border-border dark:border-darkborder ">
                            <img src="../assets/images/profile/user-1.jpg" alt="" class="rounded-full"
                                width="33" height="33">
                            <input type="text" class="form-control " id="exampleInputtext"
                                aria-describedby="textHelp" placeholder="Comment">
                            <button class="btn ">Comment</button>
                        </div>
                    </div>

                    <!---Video card-->
                    <div class="mb-6 border shadow-none card border-border dark:border-darkborder">
                        <div class="card-body">
                            <div class="flex items-center gap-4">
                                <img src="../assets/images/profile/user-1.jpg" alt=""
                                    class="w-10 h-10 rounded-full">
                                <h6 class="text-base">
                                    Mathew Anderson
                                </h6>
                                <span class="flex items-center gap-2 text-xs text-bodytext dark:text-darklink ">
                                    <i class="w-2 h-2 rounded-full bg-link dark:bg-darklink opacity-30"></i>
                                    15 min ago
                                </span>
                            </div>
                            <p class="my-4 ">Faco kiswuoti
                                mucurvi juokomo fobgi aze huweik zazjofefa kuujer talmoc li niczot
                                lohejbo vozev zi huto. Ju tupma uwujate bevolkoh hob munuap lirec
                                zak ja li hotlanu pigtunu.
                            </p>
                            <iframe
                                class="mb-3 overflow-hidden rounded-md rounded-1 border-border dark:border-darkborder"
                                src="https://www.youtube.com/embed/d1-FRj20WBE" frameborder="0" width="100%"
                                style="height: 300px;"></iframe>
                            <div class="flex items-center gap-4 mt-5">
                                <div class="flex items-center gap-2">
                                    <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn bg-primary hs-tooltip hs-tooltip-toggle"
                                        href="javascript:void(0)">
                                        <i class="ti ti-thumb-up"></i>
                                        <span
                                            class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                            role="tooltip">
                                            Like
                                        </span>
                                    </a>
                                    <span class="font-semibold ">129</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <a class="relative flex items-center justify-center w-8 h-8 p-0 text-white rounded-full btn btn-secondary bg-secondary hs-tooltip hs-tooltip-toggle"
                                        href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Comment">
                                        <i class="ti ti-message-2"></i>
                                        <span
                                            class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                            role="tooltip">
                                            Comment
                                        </span>
                                    </a>
                                    <span class="font-semibold ">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 px-3 py-4 border-t border-border dark:border-darkborder ">
                            <img src="../assets/images/profile/user-1.jpg" alt="" class="rounded-full"
                                width="33" height="33">
                            <input type="text" class="form-control " id="exampleInputtext"
                                aria-describedby="textHelp" placeholder="Comment">
                            <button class="btn ">Comment</button>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        {{-- followers --}}

        <div id="followers" class="hidden" role="tabpanel" aria-labelledby="Followers-tab">
            <div class="items-center justify-between mt-3 mb-4 sm:flex">
                <h3 class="flex items-center gap-2 mb-3 text-2xl font-semibold sm:mb-0 text-dark dark:text-white">
                    Followers
                    <span
                        class="flex items-center leading-normal rounded-full bg-secondary  text-xs px-2 py-0.5 font-medium text-white w-fit">20</span>
                </h3>
                <form class="relative">
                    <input type="text" class="py-2 form-control search-chat ps-10" id="text-srh"
                        placeholder="Search Followers">
                    <i
                        class="ti ti-search absolute top-1.5 start-0 translate-middle-y text-lg text-dark dark:text-darklink  ms-3"></i>
                </form>
            </div>

            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-8.jpg" alt=""
                                class="w-10 h-10 rounded-full">
                            <div class="">
                                <h5 class="mb-0 text-lg leading-normal">
                                    Betty Adams</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Sint
                                    Maarten</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto btn-outline-primary">Follow</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-2.jpg" alt=""
                                class="w-10 h-10 rounded-full">
                            <div class="">
                                <h5 class="mb-0 text-lg leading-normal">
                                    Virginia Wong</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Tunesia</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto btn-outline-primary">Follow</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-3.jpg" alt=""
                                class="w-10 h-10 rounded-full">
                            <div class="">
                                <h5 class="mb-0 text-lg leading-normal">
                                    Birdie Burgess</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Algeria</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Followed</button>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-4.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Steven</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Malaysia</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Followed</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-5.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Rhodes</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Grenada</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Followed</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-6.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Effie Gross</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Azerbaijan</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto btn-outline-primary">Follow</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-7.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Barton</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>French
                                    Southern </span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto btn-outline-primary">Follow</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-8.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    John</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Nauru</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Followed</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-9.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Elizabeth </h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Djibouti</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Followed</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-10.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Jon Cohen</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>United
                                    States</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Followed</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-8.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Dwayn</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Equatorial
                                    Guinea</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Follow</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-2.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Willie </h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Solomon
                                    Islands</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Followed</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-3.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Harvey</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Uruguay</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Followed</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-4.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Alice George</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Madagascar</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto btn-outline-primary">Follow</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-5.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Simpson</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Bahrain</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Followed</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-3.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Francis Barber</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Colombia</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto btn-outline-primary">Follow</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-7.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Christofer</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Maldives</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Followed</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-8.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Nelson</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>St.
                                    Helena</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Followed</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-9.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Marlyn</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>South
                                    Africa</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Followed</button>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                    <div class="card">
                        <div class="flex items-center gap-4 py-5 card-body">
                            <img src="../assets/images/profile/user-10.jpg" alt=""
                                class="w-10 h-10 rounded-full" width="40" height="40">
                            <div>
                                <h5 class="mb-0 text-lg leading-normal">
                                    Alica</h5>
                                <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink"><i
                                        class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>Suriname</span>
                            </div>
                            <button class="px-2 py-1 btn ms-auto">Followed</button>
                        </div>
                    </div>
                </div>




            </div>
        </div>

        {{-- followers --}}
        <div id="friends" class="hidden" role="tabpanel" aria-labelledby="Friends-tab">
            <div class="items-center justify-between mt-3 mb-4 sm:flex">
                <h3 class="flex items-center gap-2 mb-3 text-2xl font-semibold sm:mb-0 text-dark dark:text-white">
                    Friends
                    <span
                        class="flex items-center leading-normal rounded-full bg-secondary  text-xs px-2 py-0.5 font-medium text-white w-fit">20</span>
                </h3>
                <form class="relative">
                    <input type="text" class="py-2 form-control search-chat ps-10" id="text-srh"
                        placeholder="Search Followers">
                    <i
                        class="ti ti-search absolute top-1.5 start-0 translate-middle-y text-lg text-dark dark:text-darklink  ms-3"></i>
                </form>
            </div>

            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-7.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Jonny Adams</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Medical
                                Secretary</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-2.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Inez Lyons</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Medical
                                Technician</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-3.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Steve Bryan</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Preschool
                                Teacher</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-4.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Smash Bryant</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Legal
                                Secretary</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-5.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Paul Benson</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Safety
                                Engineer</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-6.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Roberta Francis</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Nursing
                                Administrator</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-7.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Billy Rogers</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Legal
                                Secretary</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-8.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Rian Brewer</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Comptroller</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-9.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Patricka Knight</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Retail Store
                                Manager</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-10.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Francis Sutton</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Astronomer</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-5.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Bernice Henry</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Security
                                Consultant</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-2.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Estella Garcia</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Lead Software
                                Test
                                Engineer</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-3.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Norman Moran</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Engineer
                                Technician</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-4.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Jesson Matthews</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Lead Software
                                Engineer</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-5.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Mcyan Perez</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Special Education
                                Teacher</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-6.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Liily Martin</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Transportation
                                Manager</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-7.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Elvsh Wong</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Logistics
                                Manager</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-8.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Edith Taylor</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Union
                                Representative</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-9.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Violet Jackson</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Agricultural
                                Inspector</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card">
                        <div class="pb-5 text-center card-body">
                            <img src="../assets/images/profile/user-10.jpg" alt=""
                                class="w-20 h-20 mx-auto mb-3 rounded-full">
                            <h5 class="mb-0 text-lg leading-normal">
                                Phoebe Owens</h5>
                            <span class="text-xs text-bodytext dark:text-darklink">Safety
                                Engineer</span>
                        </div>
                        <ul
                            class="flex items-center justify-center gap-4 px-3 py-3 mb-0 border-t bg-lightgray dark:bg-darkprimary border-border dark:border-darkborder ">
                            <li class="position-relative">
                                <a class="text-lg text-primary" href="javascript:void(0)">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative ">
                                <a class="text-lg text-error" href="javascript:void(0)">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-info" href="javascript:void(0)">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-lg text-secondary" href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>



            </div>
        </div>
        <div id="gallery" class="hidden" role="tabpanel" aria-labelledby="Gallery-tab">
            <div class="items-center justify-between mt-3 mb-4 sm:flex">
                <h3 class="flex items-center gap-2 mb-3 text-2xl font-semibold sm:mb-0 text-dark dark:text-white">
                    Gallery
                    <span
                        class="flex items-center leading-normal rounded-full bg-secondary  text-xs px-2 py-0.5 font-medium text-white w-fit">12</span>
                </h3>
                <form class="relative">
                    <input type="text" class="py-2 form-control search-chat ps-10" id="text-srh"
                        placeholder="Search Followers">
                    <i
                        class="ti ti-search absolute top-1.5 start-0 translate-middle-y text-lg text-dark dark:text-darklink  ms-3"></i>
                </form>
            </div>

            <div class="grid grid-cols-12 gap-6 mt-7">
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden rounded-md card">
                        <div class="p-0 card-body">
                            <img src="../assets/images/products/s1.jpg" alt=""
                                class="object-cover w-full h-56 max-w-full">
                            <div class="flex items-center justify-between p-6">
                                <div>
                                    <h6 class="text-base">
                                        Isuava wakceajo fe.jpg</h6>
                                    <span class="text-xs text-bodytext dark:text-darklink ">Wed, Dec 14, 2024</span>
                                </div>
                                <div>
                                    <div class="relative inline-flex hs-dropdown">
                                        <button id="hs-dropdown-custom-icon-trigger " type="button"
                                            class="flex items-center justify-center hs-dropdown-toggle ">
                                            <i
                                                class="ti ti-dots-vertical text-bodytext dark:text-darklink hover:text-primary"></i>
                                        </button>

                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0  hidden min-w-40 z-[2]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="flex flex-col">
                                                <div class="px-4 py-2 light-dark-hoverbg ">
                                                    <a class="flex items-center gap-2 " href="#">
                                                        <i class="text-base ti ti-link"></i>Isuava
                                                        wakceajo fe.jpg
                                                    </a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card hover-img rounded-2">
                        <div class="p-0 card-body">
                            <img src="../assets/images/products/s2.jpg" alt=""
                                class="object-cover w-full h-56 max-w-full">
                            <div class="flex items-center justify-between p-6">
                                <div>
                                    <h6 class="text-base">Ip
                                        docmowe vemremrif.jpg</h6>
                                    <span class="text-xs text-bodytext dark:text-darklink">Wed, Dec
                                        14,
                                        2024</span>
                                </div>
                                <div>
                                    <div class="relative inline-flex hs-dropdown">
                                        <button id="hs-dropdown-custom-icon-trigger " type="button"
                                            class="flex items-center justify-center hs-dropdown-toggle ">
                                            <i
                                                class="ti ti-dots-vertical text-bodytext dark:text-darklink hover:text-primary"></i>
                                        </button>

                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0  hidden min-w-40 z-[2]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="flex flex-col">
                                                <div class="px-4 py-2 light-dark-hoverbg ">
                                                    <a class="flex items-center gap-2 " href="#">
                                                        <i class="text-base ti ti-link"></i>docmowe
                                                        vemremrif.jpg
                                                    </a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card hover-img rounded-2">
                        <div class="p-0 card-body">
                            <img src="../assets/images/products/s3.jpg" alt=""
                                class="object-cover w-full h-56 max-w-full">
                            <div class="flex items-center justify-between p-6">
                                <div>
                                    <h6 class="text-base">
                                        Duan cosudos utaku.jpg</h6>
                                    <span class="text-xs text-bodytext dark:text-darklink">Wed, Dec
                                        14,
                                        2024</span>
                                </div>
                                <div>
                                    <div class="relative inline-flex hs-dropdown">
                                        <button id="hs-dropdown-custom-icon-trigger " type="button"
                                            class="flex items-center justify-center hs-dropdown-toggle ">
                                            <i
                                                class="ti ti-dots-vertical text-bodytext dark:text-darklink hover:text-primary"></i>
                                        </button>

                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0  hidden min-w-40 z-[2]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="flex flex-col">
                                                <div class="px-4 py-2 light-dark-hoverbg ">
                                                    <a class="flex items-center gap-2 " href="#">
                                                        <i class="text-base ti ti-link"></i>Duan
                                                        cosudos utaku.jpg
                                                    </a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card hover-img rounded-2">
                        <div class="p-0 card-body">
                            <img src="../assets/images/products/s4.jpg" alt=""
                                class="object-cover w-full h-56 max-w-full">
                            <div class="flex items-center justify-between p-6">
                                <div>
                                    <h6 class="text-base">Fu
                                        netbuv oggu.jpg</h6>
                                    <span class="text-xs text-bodytext dark:text-darklink">Wed, Dec
                                        14,
                                        2024</span>
                                </div>
                                <div>
                                    <div class="relative inline-flex hs-dropdown">
                                        <button id="hs-dropdown-custom-icon-trigger " type="button"
                                            class="flex items-center justify-center hs-dropdown-toggle ">
                                            <i
                                                class="ti ti-dots-vertical text-bodytext dark:text-darklink hover:text-primary"></i>
                                        </button>

                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0  hidden min-w-40 z-[2]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="flex flex-col">
                                                <div class="px-4 py-2 light-dark-hoverbg ">
                                                    <a class="flex items-center gap-2 " href="#">
                                                        <i class="text-base ti ti-link"></i>netbuv
                                                        oggu.jpg
                                                    </a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card hover-img rounded-2">
                        <div class="p-0 card-body">
                            <img src="../assets/images/products/s5.jpg" alt=""
                                class="object-cover w-full h-56 max-w-full">
                            <div class="flex items-center justify-between p-6">
                                <div>
                                    <h6 class="text-base">Di
                                        sekog do.jpg</h6>
                                    <span class="text-xs text-bodytext dark:text-darklink">Wed, Dec
                                        14,
                                        2024</span>
                                </div>
                                <div>
                                    <div class="relative inline-flex hs-dropdown">
                                        <button id="hs-dropdown-custom-icon-trigger " type="button"
                                            class="flex items-center justify-center hs-dropdown-toggle ">
                                            <i
                                                class="ti ti-dots-vertical text-bodytext dark:text-darklink hover:text-primary"></i>
                                        </button>

                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0  hidden min-w-40 z-[2]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="flex flex-col">
                                                <div class="px-4 py-2 light-dark-hoverbg ">
                                                    <a class="flex items-center gap-2 " href="#">
                                                        <i class="text-base ti ti-link"></i>sekog
                                                        do.jpg
                                                    </a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card hover-img rounded-2">
                        <div class="p-0 card-body">
                            <img src="../assets/images/products/s6.jpg" alt=""
                                class="object-cover w-full h-56 max-w-full">
                            <div class="flex items-center justify-between p-6">
                                <div>
                                    <h6 class="text-base">Lo
                                        jogu camhiisi.jpg</h6>
                                    <span class="text-xs text-bodytext dark:text-darklink">Thu, Dec
                                        15,
                                        2024</span>
                                </div>
                                <div>
                                    <div class="relative inline-flex hs-dropdown">
                                        <button id="hs-dropdown-custom-icon-trigger " type="button"
                                            class="flex items-center justify-center hs-dropdown-toggle ">
                                            <i
                                                class="ti ti-dots-vertical text-bodytext dark:text-darklink hover:text-primary"></i>
                                        </button>

                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0  hidden min-w-40 z-[2]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="flex flex-col">
                                                <div class="px-4 py-2 light-dark-hoverbg ">
                                                    <a class="flex items-center gap-2 " href="#">
                                                        <i class="text-base ti ti-link"></i> jogu
                                                        camhiisi.jpg
                                                    </a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card hover-img rounded-2">
                        <div class="p-0 card-body">
                            <img src="../assets/images/products/s7.jpg" alt=""
                                class="object-cover w-full h-56 max-w-full">
                            <div class="flex items-center justify-between p-6">
                                <div>
                                    <h6 class="text-base">
                                        Orewac huosazud robuf.jpg</h6>
                                    <span class="text-xs text-bodytext dark:text-darklink">Fri, Dec
                                        16,
                                        2024</span>
                                </div>
                                <div>
                                    <div class="relative inline-flex hs-dropdown">
                                        <button id="hs-dropdown-custom-icon-trigger " type="button"
                                            class="flex items-center justify-center hs-dropdown-toggle ">
                                            <i
                                                class="ti ti-dots-vertical text-bodytext dark:text-darklink hover:text-primary"></i>
                                        </button>

                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0  hidden min-w-40 z-[2]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="flex flex-col">
                                                <div class="px-4 py-2 light-dark-hoverbg ">
                                                    <a class="flex items-center gap-2 " href="#">
                                                        <i class="text-base ti ti-link"></i>Orewac
                                                        huosazud robuf.jpg
                                                    </a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card hover-img rounded-2">
                        <div class="p-0 card-body">
                            <img src="../assets/images/products/s8.jpg" alt=""
                                class="object-cover w-full h-56 max-w-full">
                            <div class="flex items-center justify-between p-6">
                                <div>
                                    <h6 class="text-base">
                                        Nira biolaizo tuzi.jpg</h6>
                                    <span class="text-xs text-bodytext dark:text-darklink">Sat, Dec
                                        17,
                                        2024</span>
                                </div>
                                <div>
                                    <div class="relative inline-flex hs-dropdown">
                                        <button id="hs-dropdown-custom-icon-trigger " type="button"
                                            class="flex items-center justify-center hs-dropdown-toggle ">
                                            <i
                                                class="ti ti-dots-vertical text-bodytext dark:text-darklink hover:text-primary"></i>
                                        </button>

                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0  hidden min-w-40 z-[2]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="flex flex-col">
                                                <div class="px-4 py-2 light-dark-hoverbg ">
                                                    <a class="flex items-center gap-2 " href="#">
                                                        <i class="text-base ti ti-link"></i>Nira
                                                        biolaizo tuzi.jpg
                                                    </a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card hover-img rounded-2">
                        <div class="p-0 card-body">
                            <img src="../assets/images/products/s9.jpg" alt=""
                                class="object-cover w-full h-56 max-w-full">
                            <div class="flex items-center justify-between p-6">
                                <div>
                                    <h6 class="text-base">
                                        Peri metu ejvu.jpg</h6>
                                    <span class="text-xs text-bodytext dark:text-darklink">Sun, Dec
                                        18,
                                        2024</span>
                                </div>
                                <div>
                                    <div class="relative inline-flex hs-dropdown">
                                        <button id="hs-dropdown-custom-icon-trigger " type="button"
                                            class="flex items-center justify-center hs-dropdown-toggle ">
                                            <i
                                                class="ti ti-dots-vertical text-bodytext dark:text-darklink hover:text-primary"></i>
                                        </button>

                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0  hidden min-w-40 z-[2]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="flex flex-col">
                                                <div class="px-4 py-2 light-dark-hoverbg ">
                                                    <a class="flex items-center gap-2 " href="#">
                                                        <i class="text-base ti ti-link"></i>Peri
                                                        metu ejvu.jpgs
                                                    </a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card hover-img rounded-2">
                        <div class="p-0 card-body">
                            <img src="../assets/images/products/s10.jpg" alt=""
                                class="object-cover w-full h-56 max-w-full">
                            <div class="flex items-center justify-between p-6">
                                <div>
                                    <h6 class="text-base">
                                        Vurnohot tajraje isusufuj.jpg</h6>
                                    <span class="text-xs text-bodytext dark:text-darklink">Mon, Dec
                                        19,
                                        2024</span>
                                </div>
                                <div>
                                    <div class="relative inline-flex hs-dropdown">
                                        <button id="hs-dropdown-custom-icon-trigger " type="button"
                                            class="flex items-center justify-center hs-dropdown-toggle ">
                                            <i
                                                class="ti ti-dots-vertical text-bodytext dark:text-darklink hover:text-primary"></i>
                                        </button>

                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0  hidden min-w-40 z-[2]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="flex flex-col">
                                                <div class="px-4 py-2 light-dark-hoverbg ">
                                                    <a class="flex items-center gap-2 " href="#">
                                                        <i class="text-base ti ti-link"></i>Vurnohot
                                                        tajraje isusufuj.jpg
                                                    </a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card hover-img rounded-2">
                        <div class="p-0 card-body">
                            <img src="../assets/images/products/s11.jpg" alt=""
                                class="object-cover w-full h-56 max-w-full">
                            <div class="flex items-center justify-between p-6">
                                <div>
                                    <h6 class="text-base">
                                        Juc oz
                                        ma.jpg</h6>
                                    <span class="text-xs text-bodytext dark:text-darklink">Tue, Dec
                                        20,
                                        2024</span>
                                </div>
                                <div>
                                    <div class="relative inline-flex hs-dropdown">
                                        <button id="hs-dropdown-custom-icon-trigger " type="button"
                                            class="flex items-center justify-center hs-dropdown-toggle ">
                                            <i
                                                class="ti ti-dots-vertical text-bodytext dark:text-darklink hover:text-primary"></i>
                                        </button>

                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0  hidden min-w-40 z-[2]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="flex flex-col">
                                                <div class="px-4 py-2 light-dark-hoverbg ">
                                                    <a class="flex items-center gap-2 " href="#">
                                                        <i class="text-base ti ti-link"></i>Juc
                                                        ozma.jpg
                                                    </a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4 md:col-span-6">
                    <div class="overflow-hidden card hover-img rounded-2">
                        <div class="p-0 card-body">
                            <img src="../assets/images/products/s12.jpg" alt=""
                                class="object-cover w-full h-56 max-w-full">
                            <div class="flex items-center justify-between p-6">
                                <div>
                                    <h6 class="text-base">
                                        Povipvez marjelliz zuuva.jpg</h6>
                                    <span class="text-xs text-bodytext dark:text-darklink">Wed, Dec
                                        21,
                                        2024</span>
                                </div>
                                <div>
                                    <div class="relative inline-flex hs-dropdown">
                                        <button id="hs-dropdown-custom-icon-trigger " type="button"
                                            class="flex items-center justify-center hs-dropdown-toggle ">
                                            <i
                                                class="ti ti-dots-vertical text-bodytext dark:text-darklink hover:text-primary"></i>
                                        </button>

                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0  hidden min-w-40 z-[2]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="flex flex-col">
                                                <div class="px-4 py-2 light-dark-hoverbg ">
                                                    <a class="flex items-center gap-2 " href="#">
                                                        <i class="text-base ti ti-link"></i>Povipvez
                                                        marjelliz zuuva.jpg
                                                    </a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout-admin>
