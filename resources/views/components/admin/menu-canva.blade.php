 <!-- Menu Canvas-->
 <div id="navbar-offcanvas-example-menu"
     class="lg:hidden bg-white hs-overlay  dark:bg-dark hs-overlay-open:translate-x-0  translate-x-full rtl:hs-overlay-open:translate-x-0  rtl:-translate-x-full  fixed top-0 right-0 rtl:left-0 rtl:right-auto transition-all duration-300 transform h-full max-w-xs  w-full z-[60] hidden"
     tabindex="-1" data-hs-overlay-close-on-resize>
     <div class="items-center gap-2 lg:flex ">
         <div class="flex p-5 lg:hidden lg:p-0">
             <div class="flex items-center brand-logo ">
                 <a href="{{ route('admin.dashboard.index') }}" class="text-nowrap logo-img">
                     <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" class="block dark:hidden rtl:hidden"
                         alt="Logo-Dark" />
                     <img src="{{ asset('assets/images/logos/light-logo.svg') }}"
                         class="hidden dark:block rtl:hidden rtl:dark:hidden" alt="Logo-light" />

                     <img src="{{ asset('assets/images/logos/dark-logo-rtl.svg') }}"
                         class="hidden dark:hidden rtl:block rtl:dark:hidden" alt="Logo-Dark" />
                     <img src="{{ asset('assets/images/logos/light-logo-rtl.svg') }}"
                         class="hidden dark:hidden rtl:hidden rtl:dark:block" alt="Logo-light" />
                 </a>
             </div>

         </div>
         <div class="items-center gap-2 p-5 lg:p-0 lg:flex" data-simplebar="" style="height: calc(100vh - 100px)">
             <div class="items-center lg:flex">
                 <div
                     class="hs-dropdown lg:py-4  [--strategy:static] lg:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative group/menu">
                     <button type="button"
                         class="header-link-btn group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
                         <i class="text-xl ti ti-api-app lg:hidden lg:text-sm"></i>Apps
                         <i class="text-lg ti ti-chevron-down ms-auto lg:text-sm"></i>
                     </button>

                     <div
                         class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 left-0 hidden z-10 sm:mt-3 top-full start-0 min-w-[15rem] lg:w-[900px] before:absolute lg:bg-white bg-transparent dark:bg-dark lg:shadow-md shadow-none">
                         <div class="grid grid-cols-12">
                             <div class="flex items-stretch col-span-12 px-0 py-5 lg:col-span-8 lg:px-5 lg:pr-0">
                                 <div class="grid w-full grid-cols-12 lg:gap-3">
                                     <div class="flex items-stretch col-span-12 lg:col-span-6">
                                         <ul>
                                             <li class="mb-5">
                                                 <a href="../rtl/app-chat.html"
                                                     class="relative flex items-center gap-3 group">
                                                     <span class="apps-icons">
                                                         <img src="../assets/images/svgs/icon-dd-chat.svg"
                                                             class="w-6 h-6">
                                                     </span>
                                                     <div class="">
                                                         <h6 class="text-sm font-semibold group-hover:text-primary">
                                                             Chat Application
                                                         </h6>
                                                         <p class="text-xs">
                                                             New messages arrived</p>
                                                     </div>

                                                 </a>
                                             </li>
                                             <li class="mb-5">
                                                 <a href="../rtl/page-user-profile.html"
                                                     class="relative flex items-center gap-3 group">
                                                     <span class="apps-icons">
                                                         <img src="../assets/images/svgs/icon-dd-invoice.svg"
                                                             class="w-6 h-6">
                                                     </span>
                                                     <div class="">
                                                         <h6 class="text-sm font-semibold group-hover:text-primary ">
                                                             User Profile App
                                                         </h6>
                                                         <p class="text-xs">
                                                             Get profile details</p>
                                                     </div>
                                                 </a>
                                             </li>
                                             <li class="mb-5">
                                                 <a href="../rtl/app-contact.html"
                                                     class="relative flex items-center gap-3 group">
                                                     <span class="apps-icons">
                                                         <img src="{{asset('assets/images/svgs/icon-dd-mobile.svg')}}"
                                                             class="w-6 h-6">
                                                     </span>
                                                     <div class="">
                                                         <h6 class="text-sm font-semibold group-hover:text-primary">
                                                             Contact Application
                                                         </h6>
                                                         <p class="text-xs">
                                                             2 Unsaved Contacts</p>
                                                     </div>
                                                 </a>
                                             </li>
                                             <li class="mb-5">
                                                 <a href="../rtl/app-email.html"
                                                     class="relative flex items-center gap-3 group">
                                                     <span class="apps-icons">
                                                         <img src="{{asset('assets/images/svgs/icon-dd-message-box.svg')}}"
                                                             class="w-6 h-6">
                                                     </span>
                                                     <div class="">
                                                         <h6 class="text-sm font-semibold group-hover:text-primary">
                                                             Email App
                                                         </h6>
                                                         <p class="text-xs">
                                                             Get new emails</p>
                                                     </div>

                                                 </a>
                                             </li>
                                         </ul>
                                     </div>
                                     <div class="flex items-stretch col-span-12 lg:col-span-6">
                                         <ul>
                                             <li class="mb-5">
                                                 <a href="../rtl/eco-shop.html"
                                                     class="relative flex items-center gap-3 group">
                                                     <span class="apps-icons">
                                                         <img src="{{asset('assets/images/svgs/icon-dd-cart.svg')}}"
                                                             class="w-6 h-6">
                                                     </span>
                                                     <div class="">
                                                         <h6 class="text-sm font-semibold group-hover:text-primary">
                                                             eCommerce App

                                                         </h6>
                                                         <p class="text-xs">
                                                             learn more information</p>
                                                     </div>


                                                 </a>
                                             </li>
                                             <li class="mb-5">
                                                 <a href="../rtl/app-calendar.html"
                                                     class="relative flex items-center gap-3 group">
                                                     <span class="apps-icons">
                                                         <img src="{{asset('assets/images/svgs/icon-dd-mobile.svg')}}"
                                                             class="w-6 h-6">
                                                     </span>
                                                     <div class="">
                                                         <h6 class="text-sm font-semibold group-hover:text-primary">
                                                             Calendar App
                                                         </h6>
                                                         <p class="text-xs">
                                                             Get dates</p>
                                                     </div>


                                                 </a>
                                             </li>
                                             <li class="mb-5">
                                                 <a href="../rtl/page-account-settings.html"
                                                     class="relative flex items-center gap-3 group">
                                                     <span class="apps-icons">
                                                         <img src="{{asset('assets/images/svgs/icon-dd-lifebuoy.svg')}}"
                                                             class="w-6 h-6">
                                                     </span>
                                                     <div class="">
                                                         <h6 class="text-sm font-semibold group-hover:text-primary ">
                                                             Account Setting App

                                                         </h6>
                                                         <p class="text-xs">
                                                             Account settings</p>
                                                     </div>

                                                 </a>
                                             </li>
                                             <li class="mb-5">
                                                 <a href="../rtl/app-notes.html"
                                                     class="relative flex items-center gap-3 group">
                                                     <span class="apps-icons">
                                                         <img src="{{asset('assets/images/svgs/icon-dd-application.svg')}}"
                                                             class="w-6 h-6">
                                                     </span>
                                                     <div class="">
                                                         <h6 class="text-sm font-semibold group-hover:text-primary">
                                                             Notes Application

                                                         </h6>
                                                         <p class="text-xs">
                                                             To-do and Daily tasks</p>
                                                     </div>

                                                 </a>
                                             </li>
                                         </ul>
                                     </div>
                                     <div
                                         class="items-stretch hidden col-span-12 pt-4 pr-4 border-t md:col-span-12 border-border dark:border-darkborder lg:flex">
                                         <div class="flex items-center justify-between w-full ">
                                             <div class="flex items-center text-dark dark:text-white group">
                                                 <i
                                                     class="text-lg ti ti-help text-dark dark:text-darklink group-hover:text-primary"></i>
                                                 <a href="../rtl/page-faq.html"
                                                     class="ml-2 text-sm font-bold text-dark dark:text-darklink hover:text-primary group-hover:text-primary">
                                                     Frequently Asked Questions
                                                 </a>
                                             </div>
                                             <button type="button" class="px-4 py-2 btn ">
                                                 Check
                                             </button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="flex col-span-12 lg:col-span-4 items-strech">
                                 <div class="lg:p-5 lg:border-s border-border dark:border-darkborder">
                                     <h5 class="mb-4 text-xl font-semibold text-dark dark:text-white">
                                         Quick Links</h5>
                                     <ul>
                                         <li class="mb-4"><a href="../rtl/page-pricing.html"
                                                 class="text-sm card-title hover:text-primary">Pricing
                                                 Page</a></li>
                                         <li class="mb-4"><a href="../rtl/authentication-login.html"
                                                 class="text-sm card-title hover:text-primary">Authentication
                                                 Design</a></li>
                                         <li class="mb-4"><a href="../rtl/authentication-register.html"
                                                 class="text-sm card-title hover:text-primary">Register
                                                 Now</a></li>
                                         <li class="mb-4"><a href="../rtl/authentication-error.html"
                                                 class="text-sm card-title hover:text-primary">404
                                                 Error
                                                 Page</a></li>
                                         <li class="mb-4"><a href="../rtl/app-notes.html"
                                                 class="text-sm card-title hover:text-primary">Notes
                                                 App</a>
                                         </li>
                                         <li class="mb-4"><a href="../rtl/page-user-profile.html"
                                                 class="text-sm card-title hover:text-primary">User
                                                 Application</a></li>
                                         <li class="mb-4"><a href="../rtl/blog-posts.html"
                                                 class="text-sm card-title hover:text-primary">Blog
                                                 Design</a></li>
                                         <li class="mb-4"><a href="../rtl/eco-checkout.html"
                                                 class="text-sm card-title hover:text-primary">Shopping
                                                 Cart</a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div>
                 <a href="../rtl/app-chat.html" class="header-link-btn">
                     <i class="text-xl ti ti-message-dots lg:hidden lg:text-sm"></i>Chat</a>
             </div>
             <div>
                 <a href="../rtl/app-calendar.html" class="header-link-btn">
                     <i class="text-xl ti ti-calendar lg:hidden lg:text-sm"></i>Calender</a>
             </div>
             <div>
                 <a href="../rtl/app-email.html" class="header-link-btn">
                     <i class="text-xl ti ti-mail lg:hidden lg:text-sm"></i>Email</a>
             </div>
         </div>
     </div>
 </div>
 <div id="hs-focus-management-modal"
     class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[60] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
     <div
         class="m-3 transition-all opacity-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full sm:mx-auto">
         <div class="flex flex-col bg-white rounded-md shadow-md pointer-events-auto dark:bg-dark dark:shadow-dark-md">
             <div class="p-4 overflow-y-auto">
                 <input type="email" class="w-full form-control" placeholder="you@site.com" autofocus>
             </div>
             <div class="items-center px-4 py-3 border-t gap-x-2 border-border dark:border-darkborder">

                 <div class="overflow-hidden">
                     <h5 class="px-4 mb-4 text-lg">Quick Page Links</h5>
                     <div class="message-body max-h-[300px]" data-simplebar="">
                         <ul>
                             <li class="px-4 py-2 mb-2 rounded-md light-dark-hoverbg">
                                 <a href="#" class="text-sm font-semibold text-link dark:text-darklink ">
                                     Modern
                                     <p class="text-sm font-normal opacity-50 text-link dark:text-darklink">
                                         /dashboards/modern</p>
                                 </a>
                             </li>
                             <li class="px-4 py-2 mb-2 rounded-md light-dark-hoverbg">
                                 <a href="#" class="text-sm font-semibold text-link dark:text-darklink">
                                     eCommerce
                                     <p class="text-sm font-normal opacity-50 text-link dark:text-darklink">
                                         /dashboards/ecommerce</p>
                                 </a>
                             </li>
                             <li class="px-4 py-2 mb-2 rounded-md light-dark-hoverbg">
                                 <a href="#" class="text-sm font-semibold text-link dark:text-darklink">
                                     Contacts
                                     <p class="text-sm font-normal opacity-50 text-link dark:text-darklink">
                                         /apps/contacts</p>
                                 </a>
                             </li>
                             <li class="px-4 py-2 mb-2 rounded-md light-dark-hoverbg">
                                 <a href="#" class="text-sm font-semibold text-link dark:text-darklink">
                                     Shop
                                     <p class="text-sm font-normal opacity-50 text-link dark:text-darklink">
                                         /ecommerce/products</p>
                                 </a>
                             </li>
                             <li class="px-4 py-2 mb-2 rounded-md light-dark-hoverbg">
                                 <a href="#" class="text-sm font-semibold text-link dark:text-darklink">
                                     Checkout
                                     <p class="text-sm font-normal opacity-50 text-link dark:text-darklink">
                                         /ecommerce/checkout</p>
                                 </a>
                             </li>
                             <li class="px-4 py-2 mb-2 rounded-md light-dark-hoverbg">
                                 <a href="#" class="text-sm font-semibold text-link dark:text-darklink">
                                     Chats
                                     <p class="text-sm font-normal opacity-50 text-link dark:text-darklink">
                                         /apps/chats</p>
                                 </a>
                             </li>
                             <li class="px-4 py-2 mb-2 rounded-md light-dark-hoverbg">
                                 <a href="#" class="text-sm font-semibold text-link dark:text-darklink">
                                     Notes
                                     <p class="text-sm font-normal opacity-50 text-link dark:text-darklink">
                                         /apps/notes</p>
                                 </a>
                             </li>
                             <li class="px-4 py-2 mb-2 rounded-md light-dark-hoverbg">
                                 <a href="#" class="text-sm font-semibold text-link dark:text-darklink">
                                     Pricing
                                     <p class="text-sm font-normal opacity-50 text-link dark:text-darklink">
                                         /pages/pricing</p>
                                 </a>
                             </li>
                             <li class="px-4 py-2 mb-2 rounded-md light-dark-hoverbg">
                                 <a href="#" class="text-sm font-semibold text-link dark:text-darklink">
                                     Account Setting
                                     <p class="text-sm font-normal opacity-50 text-link dark:text-darklink">
                                         /pages/account-settings</p>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </div>
