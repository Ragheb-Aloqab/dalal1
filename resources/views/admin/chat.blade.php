<x-app-layout-admin>
    <!----Breadcrumb Start---->
    <x-slot name="header">
        <h4 class="mb-3 text-xl font-semibold text-dark dark:text-white">Contact</h4>
        <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm leading-tight text-gray-500 hover:text-primary focus:outline-none focus:text-primary dark:focus:text-primary"
                    href="#">
                    <i class="text-lg font-medium leading-tight ti ti-home me-3"></i>
                    Home
                </a>
                <i class="mx-2 text-sm font-medium leading-tight ti ti-chevron-right"></i>
            </li>
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm leading-tight text-gray-500 hover:text-primary focus:outline-none focus:text-primary dark:focus:text-primary"
                    href="#">
                    <i class="text-lg font-medium leading-tight ti ti-apps me-3"></i>
                    App Center
                    <i class="mx-2 text-sm font-medium leading-tight ti ti-chevron-right"></i>
                </a>
            </li>
            <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200"
                aria-current="page">
                Application
            </li>
        </ol>
    </x-slot>
    <!----Breadcrumb End---->

    <!---Contact Card--->

    <div class="mb-6 card ">
        <div class="card-body">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-4 md:col-span-12 sm:col-span-12 ">
                    <form class="relative max-w-64">
                        <input type="text" class="py-2 form-control product-search pl-11" id="input-search"
                            placeholder="Search Contacts..." />
                        <i
                            class="absolute text-xl translate-y-1/2 ti ti-search start-3 text-bodytext dark:text-darklink -top-2"></i>

                    </form>
                </div>
                <div class="col-span-12 lg:col-span-8 md:col-span-12 sm:col-span-12">
                    <div class="flex items-center justify-end gap-3">
                        <div class="action-btn show-btn" style="display: none">
                            <a href="javascript:void(0)"
                                class="flex items-center gap-2 delete-multiple btn btn-light-error">
                                <i class="text-lg leading-none ti ti-trash"></i>
                                Delete All Row
                            </a>
                        </div>
                        <a href="javascript:void(0)" id="btn-add-contact" data-hs-overlay="#addContactModal"
                            class="flex items-center gap-2 btn ">
                            <i class="text-lg leading-none text-white ti ti-users"></i> Add
                            Contact
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div id="addContactModal"
        class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto ">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div
                class="flex flex-col w-full bg-white rounded-md shadow-md dark:bg-dark dark:shadow-dark-md modal-content">
                <div class="flex items-center justify-between px-4 py-3">
                    <h3 class="text-lg">
                        Contact
                    </h3>
                    <button type="button"
                        class="flex items-center justify-center text-sm font-semibold text-gray-800 border border-transparent rounded-full w-7 h-7 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        data-hs-overlay="#addContactModal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            <form id="addContactModalTitle">
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-12">
                                        <div class="contact-name">
                                            <input type="text" id="c-name" class="form-control"
                                                placeholder="Name" />
                                            <span class="validation-text text-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-12">
                                        <div class="contact-email">
                                            <input type="text" id="c-email" class="form-control"
                                                placeholder="Email" />
                                            <span class="validation-text text-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-12">
                                        <div class="contact-occupation">
                                            <input type="text" id="c-occupation" class="form-control"
                                                placeholder="Occupation" />
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-12">
                                        <div class="contact-phone">
                                            <input type="text" id="c-phone" class="form-control"
                                                placeholder="Phone" />
                                            <span class="validation-text text-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-span-12">
                                        <div class="contact-location">
                                            <input type="text" id="c-location" class="form-control"
                                                placeholder="Location" />
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end items-center gap-x-3.5 pb-5 pt-3 px-4">
                    <button id="btn-add" class="px-4 text-white btn bg-success hover:bg-successemphasis">Add</button>
                    <button id="btn-edit" class="px-4 btn">Save</button>
                    <button class="px-4 btn btn-light-error" data-hs-overlay="#addContactModal">
                        Discard </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="table min-w-full divide-y search-table divide-border dark:divide-darkborder">
                                <thead>
                                    <tr>
                                        <th class="p-4 ps-0">
                                            <div class="text-center n-chk align-self-center">
                                                <div class="form-check">
                                                    <input type="checkbox" class="rounded-sm form-check-input"
                                                        id="contact-check-all" />
                                                    <label class="form-check-label" for="contact-check-all"></label>
                                                    <span class="new-control-indicator"></span>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-sm font-semibold text-left rtl:text-right text-dark dark:text-white">
                                            Name</th>
                                        <th scope="col"
                                            class="p-4 text-sm font-semibold text-left rtl:text-right text-dark dark:text-white">
                                            Email</th>
                                        <th scope="col"
                                            class="p-4 text-sm font-semibold text-left rtl:text-right text-dark dark:text-white">
                                            Location</th>
                                        <th scope="col"
                                            class="p-4 text-sm font-semibold text-left rtl:text-right text-dark dark:text-white">
                                            Phone</th>
                                        <th scope="col"
                                            class="p-4 text-sm font-semibold text-left rtl:text-right text-dark dark:text-white">
                                            Action</th>

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-border dark:divide-darkborder">
                                    <tr class="search-items">
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="text-center n-chk align-self-center">
                                                <div class="form-check">
                                                    <input type="checkbox"
                                                        class="rounded-sm form-check-input contact-chkbox"
                                                        id="checkbox1" />
                                                    <label class="form-check-label" for="checkbox1"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <img src="../assets/images/profile/user-9.jpg"
                                                        class="rounded-full rounded-circle h-9 w-9" alt="user " />
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 user-name" data-name="Emma Adams">
                                                        Emma Adams</h6>
                                                    <p class="text-xs user-work text-bodytext dark:text-darklink"
                                                        data-occupation="Web Developer">
                                                        Web Developer
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm usr-email-addr whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-email="adams@mail.com">
                                            adams@mail.com
                                        </td>
                                        <td class="p-4 text-sm usr-location whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-location="Boston, USA">
                                            Boston, USA
                                        </td>
                                        <td class="p-4 text-sm usr-ph-no whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-phone="+1 (070) 123-4567">
                                            +91 (070) 123-4567
                                        </td>

                                        <td class="p-4 text-sm whitespace-nowrap text-bodytext dark:text-darklink">
                                            <div class="flex gap-3 action-btn">
                                                <a href="javascript:void(0)" class="text-info edit">
                                                    <i class="text-lg ti ti-eye"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="text-dark delete">
                                                    <i
                                                        class="text-lg ti ti-trash text-bodytext dark:text-darklink"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="search-items">
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="text-center n-chk align-self-center">
                                                <div class="form-check">
                                                    <input type="checkbox"
                                                        class="rounded-sm form-check-input contact-chkbox"
                                                        id="checkbox2" />
                                                    <label class="form-check-label" for="checkbox2"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <img src="../assets/images/profile/user-6.jpg"
                                                        class="rounded-full rounded-circle h-9 w-9" alt="user " />
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 user-name" data-name="Olivia Allen">
                                                        Olivia Allen</h6>
                                                    <p class="text-xs user-work text-bodytext dark:text-darklink"
                                                        data-occupation="Web Designer">
                                                        Web Designer
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm usr-email-addr whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-email="allen@mail.com">
                                            allen@mail.com
                                        </td>
                                        <td class="p-4 text-sm usr-location whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-location="Sydney, Australia">Sydney, Australia
                                        </td>
                                        <td class="p-4 text-sm usr-ph-no whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-phone="+91 (125) 450-1500">+91 (125) 450-1500
                                        </td>

                                        <td class="p-4 text-sm whitespace-nowrap text-bodytext dark:text-darklink">
                                            <div class="flex gap-3 action-btn">
                                                <a href="javascript:void(0)" class="text-info edit">
                                                    <i class="text-lg ti ti-eye"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="text-dark delete">
                                                    <i
                                                        class="text-lg ti ti-trash text-bodytext dark:text-darklink"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="search-items">
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="text-center n-chk align-self-center">
                                                <div class="form-check">
                                                    <input type="checkbox"
                                                        class="rounded-sm form-check-input contact-chkbox"
                                                        id="checkbox3" />
                                                    <label class="form-check-label" for="checkbox3"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <img src="../assets/images/profile/user-10.jpg"
                                                        class="rounded-full rounded-circle h-9 w-9" alt="user " />
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 user-name" data-name="Isabella Anderson">
                                                        Isabella Anderson</h6>
                                                    <p class="text-xs user-work text-bodytext dark:text-darklink"
                                                        data-occupation="UX/UI Designer">
                                                        UX/UI Designer
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm usr-email-addr whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-email="anderson@mail.com">anderson@mail.com
                                        </td>
                                        <td class="p-4 text-sm usr-location whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-location="Miami, USA">Miami, USA
                                        </td>
                                        <td class="p-4 text-sm usr-ph-no whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-phone="+91 (100) 154-1254">+91 (100) 154-1254
                                        </td>

                                        <td class="p-4 text-sm whitespace-nowrap text-bodytext dark:text-darklink">
                                            <div class="flex gap-3 action-btn">
                                                <a href="javascript:void(0)" class="text-info edit">
                                                    <i class="text-lg ti ti-eye"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="text-dark delete">
                                                    <i
                                                        class="text-lg ti ti-trash text-bodytext dark:text-darklink"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="search-items">
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="text-center n-chk align-self-center">
                                                <div class="form-check">
                                                    <input type="checkbox"
                                                        class="rounded-sm form-check-input contact-chkbox"
                                                        id="checkbox4" />
                                                    <label class="form-check-label" for="checkbox4"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <img src="../assets/images/profile/user-2.jpg"
                                                        class="rounded-full rounded-circle h-9 w-9" alt="user " />
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 user-name" data-name="Amelia Armstrong"> Amelia
                                                        Armstrong </h6>
                                                    <p class="text-xs user-work text-bodytext dark:text-darklink"
                                                        data-occupation="Ethical Hacker">
                                                        Ethical Hacker
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm usr-email-addr whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-email="armstrong@mail.com">
                                            armstrong@mail.com
                                        </td>
                                        <td class="p-4 text-sm usr-location whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-location="Tokyo, Japan">Tokyo, Japan
                                        </td>
                                        <td class="p-4 text-sm usr-ph-no whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-phone="+91 (154) 199- 1540">+91 (154) 199- 1540
                                        </td>

                                        <td class="p-4 text-sm whitespace-nowrap text-bodytext dark:text-darklink">
                                            <div class="flex gap-3 action-btn">
                                                <a href="javascript:void(0)" class="text-info edit">
                                                    <i class="text-lg ti ti-eye"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="text-dark delete">
                                                    <i
                                                        class="text-lg ti ti-trash text-bodytext dark:text-darklink"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="search-items">
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="text-center n-chk align-self-center">
                                                <div class="form-check">
                                                    <input type="checkbox"
                                                        class="rounded-sm form-check-input contact-chkbox"
                                                        id="checkbox5" />
                                                    <label class="form-check-label" for="checkbox5"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <img src="../assets/images/profile/user-10.jpg"
                                                        class="rounded-full rounded-circle h-9 w-9" alt="user " />
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 user-name" data-name="Emily Atkinson"> Emily
                                                        Atkinson
                                                    </h6>
                                                    <p class="text-xs user-work text-bodytext dark:text-darklink"
                                                        data-occupation="Web developer">Web
                                                        developer
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm usr-email-addr whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-email="atkinson@mail.com">atkinson@mail.com
                                        </td>
                                        <td class="p-4 text-sm usr-location whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-location="Edinburgh, UK">Edinburgh, UK
                                        </td>
                                        <td class="p-4 text-sm usr-ph-no whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-phone="+91 (900) 150- 1500">+91 (900) 150- 1500
                                        </td>

                                        <td class="p-4 text-sm whitespace-nowrap text-bodytext dark:text-darklink">
                                            <div class="flex gap-3 action-btn">
                                                <a href="javascript:void(0)" class="text-info edit">
                                                    <i class="text-lg ti ti-eye"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="text-dark delete">
                                                    <i
                                                        class="text-lg ti ti-trash text-bodytext dark:text-darklink"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="search-items">
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="text-center n-chk align-self-center">
                                                <div class="form-check">
                                                    <input type="checkbox"
                                                        class="rounded-sm form-check-input contact-chkbox"
                                                        id="checkbox6" />
                                                    <label class="form-check-label" for="checkbox6"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <img src="../assets/images/profile/user-6.jpg"
                                                        class="rounded-full rounded-circle h-9 w-9" alt="user " />
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 user-name" data-name="Sofia Bailey">Sofia Bailey
                                                    </h6>
                                                    <p class="text-xs user-work text-bodytext dark:text-darklink"
                                                        data-occupation="UX/UI Designer">
                                                        UX/UI Designer
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm usr-email-addr whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-email="bailey@mail.com">bailey@mail.com
                                        </td>
                                        <td class="p-4 text-sm usr-location whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-location="New York, USA">New York, USA
                                        </td>
                                        <td class="p-4 text-sm usr-ph-no whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-phone="+91 (001) 160- 1845">+91 (001) 160- 1845
                                        </td>

                                        <td class="p-4 text-sm whitespace-nowrap text-bodytext dark:text-darklink">
                                            <div class="flex gap-3 action-btn">
                                                <a href="javascript:void(0)" class="text-info edit">
                                                    <i class="text-lg ti ti-eye"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="text-dark delete">
                                                    <i
                                                        class="text-lg ti ti-trash text-bodytext dark:text-darklink"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="search-items">
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="text-center n-chk align-self-center">
                                                <div class="form-check">
                                                    <input type="checkbox"
                                                        class="rounded-sm form-check-input contact-chkbox"
                                                        id="checkbox7" />
                                                    <label class="form-check-label" for="checkbox7"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <img src="../assets/images/profile/user-4.jpg"
                                                        class="rounded-full rounded-circle h-9 w-9" alt="user " />
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 user-name" data-name="Victor Sharma">
                                                        Victor Sharma</h6>
                                                    <p class="text-xs user-work text-bodytext dark:text-darklink"
                                                        data-occupation="Project Manager">
                                                        Project Managers
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm usr-email-addr whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-email="sharma@mail.com">sharma@mail.com
                                        </td>
                                        <td class="p-4 text-sm usr-location whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-location="Miami, USA">Miami, USA
                                        </td>
                                        <td class="p-4 text-sm usr-ph-no whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-phone="+91 (110) 180- 1600">+91 (110) 180- 1600
                                        </td>

                                        <td class="p-4 text-sm whitespace-nowrap text-bodytext dark:text-darklink">
                                            <div class="flex gap-3 action-btn">
                                                <a href="javascript:void(0)" class="text-info edit">
                                                    <i class="text-lg ti ti-eye"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="text-dark delete">
                                                    <i
                                                        class="text-lg ti ti-trash text-bodytext dark:text-darklink"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="search-items">
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="text-center n-chk align-self-center">
                                                <div class="form-check">
                                                    <input type="checkbox"
                                                        class="rounded-sm form-check-input contact-chkbox"
                                                        id="checkbox8" />
                                                    <label class="form-check-label" for="checkbox8"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 ps-0 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <img src="../assets/images/profile/user-3.jpg"
                                                        class="rounded-full rounded-circle h-9 w-9" alt="user " />
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 user-name" data-name="Penelope Baker"> Penelope
                                                        Baker
                                                    </h6>
                                                    <p class="text-xs user-work text-bodytext dark:text-darklink"
                                                        data-occupation="Web Developer">Web
                                                        Developer
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm usr-email-addr whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-email="baker@mail.com">baker@mail.com
                                        </td>
                                        <td class="p-4 text-sm usr-location whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-location="Edinburgh, UK">Edinburgh, UK
                                        </td>
                                        <td class="p-4 text-sm usr-ph-no whitespace-nowrap text-bodytext dark:text-darklink"
                                            data-phone="+91 (405) 483- 4512">+91 (405) 483- 4512
                                        </td>

                                        <td class="p-4 text-sm whitespace-nowrap text-bodytext dark:text-darklink">
                                            <div class="flex gap-3 action-btn">
                                                <a href="javascript:void(0)" class="text-info edit">
                                                    <i class="text-lg ti ti-eye"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="text-dark delete">
                                                    <i
                                                        class="text-lg ti ti-trash text-bodytext dark:text-darklink"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout-admin>
