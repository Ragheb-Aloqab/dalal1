<div class="overflow-hidden">
    <div class="scroll-sidebar" data-simplebar="">
        <div class="px-6 mt-8 mini-layout" data-te-sidenav-menu-ref>
            <nav class="flex flex-col w-full hs-accordion-group">
                <ul data-te-sidenav-menu-ref id="sidebarnav">


                    {{$slot}}
                    <!---Dashboard Menu---->



                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/index2.html">
                            <i class="flex-shrink-0 text-xl ti ti-shopping-cart"></i> <span
                                class="flex-shrink-0 hide-menu">eCommerce</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/index3.html">
                            <i class="flex-shrink-0 text-xl ti ti-currency-dollar"></i> <span
                                class="flex-shrink-0 hide-menu">NFT</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/index4.html">
                            <i class="flex-shrink-0 text-xl ti ti-cpu"></i> <span
                                class="flex-shrink-0 hide-menu">Crypto</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/index5.html">
                            <i class="flex-shrink-0 text-xl ti ti-activity-heartbeat"></i>
                            <span class="flex-shrink-0 hide-menu">General</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/index6.html">
                            <i class="flex-shrink-0 text-xl ti ti-playlist"></i> <span
                                class="flex-shrink-0 hide-menu">Music</span>
                        </a>
                    </li>

                    <!---Apps Menu---->
                    <div class="mt-8 caption">
                        <i class="ti ti-dots nav-small-cap-icon "></i>
                        <span class="hide-menu">apps</span>
                    </div>

                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/app-calendar.html">
                            <i class="flex-shrink-0 text-xl ti ti-calendar"></i> <span
                                class="flex-shrink-0 hide-menu">Calendar</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/app-kanban.html">
                            <i class="flex-shrink-0 text-xl ti ti-ti ti-layout-kanban"></i>
                            <span class="flex-shrink-0 hide-menu">Kanban</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/app-chat.html">
                            <i class="flex-shrink-0 text-xl ti ti-message-dots"></i> <span
                                class="flex-shrink-0 hide-menu">Chat</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/app-email.html">
                            <i class="flex-shrink-0 text-xl ti ti-mail"></i> <span
                                class="flex-shrink-0 hide-menu">Email</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/app-notes.html">
                            <i class="flex-shrink-0 text-xl ti ti-notes"></i> <span
                                class="flex-shrink-0 hide-menu">Notes</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/app-contact.html">
                            <i class="flex-shrink-0 text-xl ti ti-phone"></i> <span
                                class="flex-shrink-0 hide-menu">Contact Table</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/app-contact2.html">
                            <i class="flex-shrink-0 text-xl ti ti-list-details"></i> <span
                                class="flex-shrink-0 hide-menu">Contact List</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/app-invoice.html">
                            <i class="flex-shrink-0 text-xl ti ti-file-text"></i> <span
                                class="flex-shrink-0 hide-menu">Invoice</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/page-user-profile.html">
                            <i class="flex-shrink-0 text-xl ti ti-user-circle"></i> <span
                                class="flex-shrink-0 hide-menu">User Profile</span>
                        </a>
                    </li>

                    <li class="hs-accordion sidebar-item " id="blog-accordion">
                        <a class="hs-accordion-toggle sidebar-link dropdown-menu-link ">
                            <i class="flex-shrink-0 text-xl ti ti-chart-donut-3"></i> <span
                                class="hide-menu">Blog</span>
                            <span class="hide-menu ms-auto">
                                <i class="text-lg ti ti-chevron-down ms-auto hs-accordion-active:hidden "></i>
                                <i
                                    class="relative z-10 hidden ml-auto text-lg ti ti-chevron-up ms-auto hs-accordion-active:block"></i>
                            </span>
                        </a>

                        <div id="blog-accordion" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/blog-posts.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Posts</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/blog-detail.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Details</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="hs-accordion sidebar-item " id="ecom-accordion">
                        <a class="hs-accordion-toggle sidebar-link dropdown-menu-link ">
                            <i class="flex-shrink-0 text-xl ti ti-basket"></i> <span
                                class="hide-menu">Ecommerce</span>
                            <span class="hide-menu ms-auto">
                                <i class="text-lg ti ti-chevron-down ms-auto hs-accordion-active:hidden "></i>
                                <i
                                    class="relative z-10 hidden ml-auto text-lg ti ti-chevron-up ms-auto hs-accordion-active:block"></i>
                            </span>
                        </a>

                        <div id="ecom-accordion" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/eco-shop.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Shop</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/eco-shop-detail.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Details</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/eco-product-list.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">List</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/eco-checkout.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Checkout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!---Ui Elements---->
                    <div class="mt-8 caption">
                        <i class="ti ti-dots nav-small-cap-icon "></i>
                        <span class="hide-menu">UI</span>
                    </div>

                    <li class="hs-accordion sidebar-item " id="ui-elements">
                        <a class="hs-accordion-toggle sidebar-link dropdown-menu-link ">
                            <i class="flex-shrink-0 text-xl ti ti-layout-grid"></i> <span class="hide-menu">Ui
                                Elements</span>
                            <span class="hide-menu ms-auto">
                                <i class="text-lg ti ti-chevron-down ms-auto hs-accordion-active:hidden "></i>
                                <i
                                    class="relative z-10 hidden ml-auto text-lg ti ti-chevron-up ms-auto hs-accordion-active:block"></i>
                            </span>
                        </a>
                        <div id="ui-elements" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-accordion.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Accordion</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-badge.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Badge</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-button.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Button</span>
                                    </a>
                                </li>

                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-breadcrumb.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Breadcrumb</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-carousel.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Carousel</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-chat-bubbles.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Chat Bubbles</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-dropdowns.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Dropdowns</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-datepicker.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">DatePicker</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-devices.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Devices</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-grid.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Grid</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-lists.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Lists</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-link.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Link</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-modals.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Modals</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-notification.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Notification</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-offcanvas.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Offcanvas</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-progressbar.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Progressbar</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-pagination.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Pagination</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-ratings.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Ratings</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-scrollspy.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Scrollspy</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-spinner.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Spinner</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-stepper.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Stepper</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-skeleton.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Skeleton</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-tab.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Tab</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-typography.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Typography</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-tooltip-popover.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Tooltip & Popover</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-timeline.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Timeline</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-toasts.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Toasts</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="hs-accordion sidebar-item " id="ui-card">
                        <a class="hs-accordion-toggle sidebar-link dropdown-menu-link ">
                            <i class="flex-shrink-0 text-xl ti ti-cards"></i> <span class="hide-menu">Cards</span>
                            <span class="hide-menu ms-auto">
                                <i class="text-lg ti ti-chevron-down ms-auto hs-accordion-active:hidden "></i>
                                <i
                                    class="relative z-10 hidden ml-auto text-lg ti ti-chevron-up ms-auto hs-accordion-active:block"></i>
                            </span>
                        </a>
                        <div id="ui-card" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-cards.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Basic Cards</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-card-customs.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Custom Cards</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/ui-card-weather.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Weather Cards</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!---Form Elements---->
                    <div class="mt-8 caption">
                        <i class="ti ti-dots nav-small-cap-icon "></i>
                        <span class="hide-menu">FORMS</span>
                    </div>

                    <li class="hs-accordion sidebar-item " id="form-elements">
                        <a class="hs-accordion-toggle sidebar-link dropdown-menu-link ">
                            <i class="flex-shrink-0 text-xl ti ti-files"></i> <span class="hide-menu">Form
                                Elements</span>
                            <span class="hide-menu ms-auto">
                                <i class="text-lg ti ti-chevron-down ms-auto hs-accordion-active:hidden "></i>
                                <i
                                    class="relative z-10 hidden ml-auto text-lg ti ti-chevron-up ms-auto hs-accordion-active:block"></i>
                            </span>
                        </a>
                        <div id="form-elements" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/form-inputs.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Forms Input</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/form-input-groups.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Input Groups</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/form-checkbox-radio.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Checkbox & Radios</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/form-input-grid.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Input Grid</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/form-input-number.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Input Number</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/form-advanced-password.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Advanced Password</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!---Pages---->
                    <div class="mt-8 caption">
                        <i class="ti ti-dots nav-small-cap-icon "></i>
                        <span class="hide-menu">Pages</span>
                    </div>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/page-pricing.html">
                            <i class="flex-shrink-0 text-xl ti ti-currency-dollar"></i> <span
                                class="flex-shrink-0 hide-menu">Pricing</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/page-faq.html">
                            <i class="flex-shrink-0 text-xl ti ti-help"></i> <span
                                class="flex-shrink-0 hide-menu">FAQ</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/page-account-settings.html">
                            <i class="flex-shrink-0 text-xl ti ti-user-circle"></i> <span
                                class="flex-shrink-0 hide-menu">Account Setting</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../landingpage/index.html">
                            <i class="flex-shrink-0 text-xl ti ti-app-window"></i> <span
                                class="flex-shrink-0 hide-menu">Landing Page</span>
                        </a>
                    </li>
                    <li class="hs-accordion sidebar-item " id="widgets">
                        <a class="hs-accordion-toggle sidebar-link dropdown-menu-link ">
                            <i class="flex-shrink-0 text-xl ti ti-layout"></i> <span class="hide-menu">Widgets</span>
                            <span class="hide-menu ms-auto">
                                <i class="text-lg ti ti-chevron-down ms-auto hs-accordion-active:hidden "></i>
                                <i
                                    class="relative z-10 hidden ml-auto text-lg ti ti-chevron-up ms-auto hs-accordion-active:block"></i>
                            </span>
                        </a>

                        <div id="widgets" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/widgets-cards.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Cards</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/widgets-banners.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Banner</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/widgets-charts.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Chart</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/widgets-feeds.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Feeds Widgets</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/widgets-apps.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Apps Widgets</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/widgets-data.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Data Widgets</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!---Table Elements---->
                    <div class="mt-8 caption">
                        <i class="ti ti-dots nav-small-cap-icon "></i>
                        <span class="hide-menu">TABLES</span>
                    </div>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/table-basic.html">
                            <i class="flex-shrink-0 text-xl ti ti-border-all"></i> <span
                                class="flex-shrink-0 hide-menu">Basic Table</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/table-layout-highlighted.html">
                            <i class="flex-shrink-0 text-xl ti ti-table-row"></i> <span
                                class="flex-shrink-0 hide-menu">Highlighted Table</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/table-miscellaneous.html">
                            <i class="flex-shrink-0 text-xl ti ti-table-alias"></i> <span
                                class="flex-shrink-0 hide-menu">Miscellaneous Table</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/table-editable.html">
                            <i class="flex-shrink-0 text-xl ti ti-brand-airtable"></i> <span
                                class="flex-shrink-0 hide-menu">Editable Table</span>
                        </a>
                    </li>

                    <!---DataTable ---->
                    <div class="mt-8 caption">
                        <i class="ti ti-dots nav-small-cap-icon "></i>
                        <span class="hide-menu">DATA TABLES</span>
                    </div>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/table-datatable-basic.html">
                            <i class="flex-shrink-0 text-xl ti ti-database"></i> <span
                                class="flex-shrink-0 hide-menu">Basic Data Table</span>
                        </a>
                    </li>



                    <!---Apexchart---->
                    <div class="mt-8 caption">
                        <i class="ti ti-dots nav-small-cap-icon "></i>
                        <span class="hide-menu">CHARTS</span>
                    </div>

                    <li class="hs-accordion sidebar-item " id="charts">
                        <a class="hs-accordion-toggle sidebar-link dropdown-menu-link ">
                            <i class="flex-shrink-0 text-xl ti ti-chart-pie"></i> <span class="hide-menu">Apex
                                Charts</span>
                            <span class="hide-menu ms-auto">
                                <i class="text-lg ti ti-chevron-down ms-auto hs-accordion-active:hidden "></i>
                                <i
                                    class="relative z-10 hidden ml-auto text-lg ti ti-chevron-up ms-auto hs-accordion-active:block"></i>
                            </span>
                        </a>

                        <div id="charts" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/chart-apex-line.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Line Chart</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/chart-apex-area.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Area Chart</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/chart-apex-bar.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Bar Chart</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/chart-apex-pie.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Pie Chart</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/chart-apex-radial.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Radial Chart</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/chart-apex-radar.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Radar Chart</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!---Icons---->
                    <div class="mt-8 caption">
                        <i class="ti ti-dots nav-small-cap-icon "></i>
                        <span class="hide-menu">Icons</span>
                    </div>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/icon-tabler.html">
                            <i class="flex-shrink-0 text-xl ti ti-archive"></i> <span
                                class="flex-shrink-0 hide-menu">Tabler</span>
                        </a>
                    </li>

                    <!---Auth Pages---->
                    <div class="mt-8 caption">
                        <i class="ti ti-dots nav-small-cap-icon "></i>
                        <span class="hide-menu">AUTH</span>
                    </div>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/authentication-error.html">
                            <i class="flex-shrink-0 text-xl ti ti-alert-circle"></i> <span
                                class="flex-shrink-0 hide-menu">Error</span>
                        </a>
                    </li>

                    <li class="hs-accordion sidebar-item " id="auth-login">
                        <a class="hs-accordion-toggle sidebar-link dropdown-menu-link ">
                            <i class="flex-shrink-0 text-xl ti ti-login"></i> <span class="hide-menu">Login</span>
                            <span class="hide-menu ms-auto">
                                <i class="text-lg ti ti-chevron-down ms-auto hs-accordion-active:hidden "></i>
                                <i
                                    class="relative z-10 hidden ml-auto text-lg ti ti-chevron-up ms-auto hs-accordion-active:block"></i>
                            </span>
                        </a>

                        <div id="auth-login" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/authentication-login.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Side Login</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/authentication-login2.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Boxed Login</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="hs-accordion sidebar-item " id="auth-register">
                        <a class="hs-accordion-toggle sidebar-link dropdown-menu-link ">
                            <i class="flex-shrink-0 text-xl ti ti-user-plus"></i> <span
                                class="hide-menu">Register</span>
                            <span class="hide-menu ms-auto">
                                <i class="text-lg ti ti-chevron-down ms-auto hs-accordion-active:hidden "></i>
                                <i
                                    class="relative z-10 hidden ml-auto text-lg ti ti-chevron-up ms-auto hs-accordion-active:block"></i>
                            </span>
                        </a>

                        <div id="auth-register" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/authentication-register.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Side Register</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/authentication-register2.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Boxed Register</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="hs-accordion sidebar-item" id="auth-forgot">
                        <a class="hs-accordion-toggle sidebar-link dropdown-menu-link ">
                            <i class="flex-shrink-0 text-xl ti ti-rotate"></i> <span class="hide-menu">Forgot
                                Password</span>
                            <span class="hide-menu ms-auto">
                                <i class="text-lg ti ti-chevron-down ms-auto hs-accordion-active:hidden "></i>
                                <i
                                    class="relative z-10 hidden ml-auto text-lg ti ti-chevron-up ms-auto hs-accordion-active:block"></i>
                            </span>
                        </a>

                        <div id="auth-forgot" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link "
                                        href="../rtl/authentication-forgot-password.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Side Forgot Password</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link "
                                        href="../rtl/authentication-forgot-password2.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Boxed Forgot Password</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="hs-accordion sidebar-item" id="auth-twostep">
                        <a class="hs-accordion-toggle sidebar-link dropdown-menu-link ">
                            <i class="flex-shrink-0 text-xl ti ti-zoom-code"></i> <span class="hide-menu">Two
                                Steps</span>
                            <span class="hide-menu ms-auto">
                                <i class="text-lg ti ti-chevron-down ms-auto hs-accordion-active:hidden "></i>
                                <i
                                    class="relative z-10 hidden ml-auto text-lg ti ti-chevron-up ms-auto hs-accordion-active:block"></i>
                            </span>
                        </a>

                        <div id="auth-twostep" class="hs-accordion-content ">
                            <ul class>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/authentication-two-steps.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Side Two Steps</span>
                                    </a>
                                </li>
                                <li class="pl-4 pr-3">
                                    <a class="dropdown-submenu-link " href="../rtl/authentication-two-steps2.html">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                        <span class="hide-menu">Boxed Two Steps</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../rtl/authentication-maintenance.html">
                            <i class="flex-shrink-0 text-xl ti ti-settings"></i> <span
                                class="flex-shrink-0 hide-menu">Maintenance</span>
                        </a>
                    </li>

                    <!----Documentation---->
                    <div class="mt-8 caption">
                        <i class="uppercase ti ti-dots nav-small-cap-icon"></i>
                        <span class="hide-menu">Documentation</span>
                    </div>
                    <li class="sidebar-item">
                        <a class="sidebar-link dark-sidebar-link " href="../docs/index.html">
                            <i class="flex-shrink-0 text-xl ti ti-file-text"></i> <span
                                class="flex-shrink-0 hide-menu">Getting Started</span>
                        </a>
                    </li>


                    <div class="mt-8 caption">
                        <i class="uppercase ti ti-dots nav-small-cap-icon"></i>
                        <span class="hide-menu">OTHERS</span>
                    </div>

                    <li class="hs-accordion sidebar-item " id="users-accordion">
                        <a class="hs-accordion-toggle sidebar-link dropdown-menu-link ">
                            <i class="flex-shrink-0 text-xl ti ti-menu"></i> <span class="hide-menu">Menu Level
                            </span>
                            <span class="hide-menu ms-auto">
                                <i class="text-lg ti ti-chevron-down ms-auto hs-accordion-active:hidden "></i>
                                <i
                                    class="relative z-10 hidden ml-auto text-lg ti ti-chevron-up ms-auto hs-accordion-active:block"></i>
                            </span>
                        </a>

                        <div id="users-accordion" class="hs-accordion-content ">
                            <ul class="hs-accordion-group " data-hs-accordion-always-open>
                                <li class="py-1 pl-4 pr-3 transition-colors duration-150 hs-accordion text-link dark:text-darklink"
                                    id="users-accordion-sub-1">

                                    <ul class>
                                        <li class>
                                            <a class="dropdown-submenu-link" href="#">
                                                <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                                <span class="hide-menu">Level 1</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <a class="flex w-full gap-2 py-2 hs-accordion-toggle dropdown-submenu-link"
                                        href="#">
                                        <i class="flex-shrink-0 text-xs ti ti-circle me-3"></i>
                                        <span class="hide-menu">Level 2</span>
                                        <span class="hide-menu ms-auto">
                                            <i
                                                class="flex-shrink-0 text-lg ti ti-chevron-down ms-auto hs-accordion-active:hidden"></i>
                                            <i
                                                class="relative z-10 flex-shrink-0 hidden ml-auto text-lg ti ti-chevron-up ms-auto hs-accordion-active:block "></i>
                                        </span>
                                    </a>

                                    <div id="users-accordion-sub-1" class="hs-accordion-content second-level">
                                        <ul class>
                                            <li class>
                                                <a class="flex w-full gap-2 py-2 dropdown-submenu-link"
                                                    href="#">
                                                    <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                                    <span class="hide-menu">Level 2.1</span>
                                                </a>
                                            </li>
                                            <li class>
                                                <a class="dropdown-submenu-link" href="#">
                                                    <i class="flex-shrink-0 text-xs ti ti-circle me-3 "></i>
                                                    <span class="hide-menu">Level 2.2</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a class=" px-3 py-[8px] rounded-md text-link dark:text-darklink w-full flex items-center text-sm opacity-50"
                            href="#">
                            <i class="flex-shrink-0 text-xl ti ti-circle-off me-3"></i> <span
                                class="hide-menu">Disabled</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class=" sidebar-link dark-sidebar-link" href="#">
                            <span class="flex items-center">
                                <i class="flex-shrink-0 text-xl ti ti-star me-3"></i>
                                <span class="hide-menu">Sub Caption <br>
                                    <p class="text-xs opacity-80">This is The subtitle</p>
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class=" sidebar-link dark-sidebar-link" href="#">
                            <i class="flex-shrink-0 text-xl ti ti-award"></i> <span class="hide-menu">Chip</span>
                            <span
                                class="flex items-center justify-center w-6 h-6 text-xs text-white rounded-full ms-auto bg-primary hide-menu-flex">9</span>

                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class=" sidebar-link dark-sidebar-link" href="#">
                            <i class="flex-shrink-0 text-xl ti ti-mood-smile"></i> <span
                                class="hide-menu">Outlined</span>
                            <span
                                class="px-2 py-1 text-xs text-center rounded-full ms-auto text-primary outline outline-1 outline-primary hide-menu">outline</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class=" sidebar-link dark-sidebar-link" href="#">
                            <i class="flex-shrink-0 text-xl ti ti-star"></i>
                            <span class="hide-menu">External Link</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
