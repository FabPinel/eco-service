@extends('layout')
@section('content')
    <div class="bg-white">
        <div>
            <!--
                                                                                Mobile menu

                                                                                Off-canvas menu for mobile, show/hide based on off-canvas menu state.
                                                                              -->
            <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
                <!--
                                                                                  Off-canvas menu backdrop, show/hide based on off-canvas menu state.

                                                                                  Entering: "transition-opacity ease-linear duration-300"
                                                                                    From: "opacity-0"
                                                                                    To: "opacity-100"
                                                                                  Leaving: "transition-opacity ease-linear duration-300"
                                                                                    From: "opacity-100"
                                                                                    To: "opacity-0"
                                                                                -->
                <div class="fixed inset-0 bg-black bg-opacity-25"></div>

                <div class="fixed inset-0 z-40 flex">
                    <!--
                                                                                    Off-canvas menu, show/hide based on off-canvas menu state.

                                                                                    Entering: "transition ease-in-out duration-300 transform"
                                                                                      From: "-translate-x-full"
                                                                                      To: "translate-x-0"
                                                                                    Leaving: "transition ease-in-out duration-300 transform"
                                                                                      From: "translate-x-0"
                                                                                      To: "-translate-x-full"
                                                                                  -->
                    <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
                        <div class="flex px-4 pb-2 pt-5">
                            <button type="button"
                                class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Close menu</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Links -->
                        <div class="mt-2">
                            <div class="border-b border-gray-200">
                                <div class="-mb-px flex space-x-8 px-4" aria-orientation="horizontal" role="tablist">
                                    <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-900" -->
                                    <button id="tabs-1-tab-1"
                                        class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium"
                                        aria-controls="tabs-1-panel-1" role="tab" type="button">Women</button>
                                    <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-900" -->
                                    <button id="tabs-1-tab-2"
                                        class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium"
                                        aria-controls="tabs-1-panel-2" role="tab" type="button">Men</button>
                                </div>
                            </div>

                            <!-- 'Women' tab panel, show/hide based on tab state. -->
                            <div id="tabs-1-panel-1" class="space-y-10 px-4 pb-8 pt-10" aria-labelledby="tabs-1-tab-1"
                                role="tabpanel" tabindex="0">
                                <div class="grid grid-cols-2 gap-x-4">
                                    <div class="group relative text-sm">
                                        <div
                                            class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                            <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg"
                                                alt="Models sitting back to back, wearing Basic Tee in black and bone."
                                                class="object-cover object-center">
                                        </div>
                                        <a href="#" class="mt-6 block font-medium text-gray-900">
                                            <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                            New Arrivals
                                        </a>
                                        <p aria-hidden="true" class="mt-1">Shop now</p>
                                    </div>
                                    <div class="group relative text-sm">
                                        <div
                                            class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                            <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg"
                                                alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees."
                                                class="object-cover object-center">
                                        </div>
                                        <a href="#" class="mt-6 block font-medium text-gray-900">
                                            <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                            Basic Tees
                                        </a>
                                        <p aria-hidden="true" class="mt-1">Shop now</p>
                                    </div>
                                </div>
                                <div>
                                    <p id="women-clothing-heading-mobile" class="font-medium text-gray-900">Clothing</p>
                                    <ul role="list" aria-labelledby="women-clothing-heading-mobile"
                                        class="mt-6 flex flex-col space-y-6">
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Tops</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Dresses</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Pants</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Denim</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Sweaters</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">T-Shirts</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Jackets</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Activewear</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Browse All</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <p id="women-accessories-heading-mobile" class="font-medium text-gray-900">Accessories
                                    </p>
                                    <ul role="list" aria-labelledby="women-accessories-heading-mobile"
                                        class="mt-6 flex flex-col space-y-6">
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Watches</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Wallets</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Bags</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Sunglasses</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Hats</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Belts</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <p id="women-brands-heading-mobile" class="font-medium text-gray-900">Brands</p>
                                    <ul role="list" aria-labelledby="women-brands-heading-mobile"
                                        class="mt-6 flex flex-col space-y-6">
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Full Nelson</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">My Way</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Re-Arranged</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Counterfeit</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Significant Other</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- 'Men' tab panel, show/hide based on tab state. -->
                            <div id="tabs-1-panel-2" class="space-y-10 px-4 pb-8 pt-10" aria-labelledby="tabs-1-tab-2"
                                role="tabpanel" tabindex="0">
                                <div class="grid grid-cols-2 gap-x-4">
                                    <div class="group relative text-sm">
                                        <div
                                            class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                            <img src="https://tailwindui.com/img/ecommerce-images/product-page-04-detail-product-shot-01.jpg"
                                                alt="Drawstring top with elastic loop closure and textured interior padding."
                                                class="object-cover object-center">
                                        </div>
                                        <a href="#" class="mt-6 block font-medium text-gray-900">
                                            <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                            New Arrivals
                                        </a>
                                        <p aria-hidden="true" class="mt-1">Shop now</p>
                                    </div>
                                    <div class="group relative text-sm">
                                        <div
                                            class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-06.jpg"
                                                alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt."
                                                class="object-cover object-center">
                                        </div>
                                        <a href="#" class="mt-6 block font-medium text-gray-900">
                                            <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                            Artwork Tees
                                        </a>
                                        <p aria-hidden="true" class="mt-1">Shop now</p>
                                    </div>
                                </div>
                                <div>
                                    <p id="men-clothing-heading-mobile" class="font-medium text-gray-900">Clothing</p>
                                    <ul role="list" aria-labelledby="men-clothing-heading-mobile"
                                        class="mt-6 flex flex-col space-y-6">
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Tops</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Pants</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Sweaters</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">T-Shirts</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Jackets</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Activewear</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Browse All</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <p id="men-accessories-heading-mobile" class="font-medium text-gray-900">Accessories
                                    </p>
                                    <ul role="list" aria-labelledby="men-accessories-heading-mobile"
                                        class="mt-6 flex flex-col space-y-6">
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Watches</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Wallets</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Bags</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Sunglasses</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Hats</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Belts</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <p id="men-brands-heading-mobile" class="font-medium text-gray-900">Brands</p>
                                    <ul role="list" aria-labelledby="men-brands-heading-mobile"
                                        class="mt-6 flex flex-col space-y-6">
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Re-Arranged</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Counterfeit</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">Full Nelson</a>
                                        </li>
                                        <li class="flow-root">
                                            <a href="#" class="-m-2 block p-2 text-gray-500">My Way</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                            <div class="flow-root">
                                <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Company</a>
                            </div>
                            <div class="flow-root">
                                <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Stores</a>
                            </div>
                        </div>

                        <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                            <div class="flow-root">
                                <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
                            </div>
                            <div class="flow-root">
                                <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Create account</a>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 px-4 py-6">
                            <a href="#" class="-m-2 flex items-center p-2">
                                <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt=""
                                    class="block h-auto w-5 flex-shrink-0">
                                <span class="ml-3 block text-base font-medium text-gray-900">CAD</span>
                                <span class="sr-only">, change currency</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div>
            <!--
                                                                                Mobile filter dialog

                                                                                Off-canvas filters for mobile, show/hide based on off-canvas filters state.
                                                                              -->
            <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
                <!--
                                                                                  Off-canvas menu backdrop, show/hide based on off-canvas menu state.

                                                                                  Entering: "transition-opacity ease-linear duration-300"
                                                                                    From: "opacity-0"
                                                                                    To: "opacity-100"
                                                                                  Leaving: "transition-opacity ease-linear duration-300"
                                                                                    From: "opacity-100"
                                                                                    To: "opacity-0"
                                                                                -->
                <div class="fixed inset-0 bg-black bg-opacity-25"></div>

                <div class="fixed inset-0 z-40 flex">
                    <!--
                                                                                    Off-canvas menu, show/hide based on off-canvas menu state.

                                                                                    Entering: "transition ease-in-out duration-300 transform"
                                                                                      From: "translate-x-full"
                                                                                      To: "translate-x-0"
                                                                                    Leaving: "transition ease-in-out duration-300 transform"
                                                                                      From: "translate-x-0"
                                                                                      To: "translate-x-full"
                                                                                  -->
                    <div
                        class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                        <div class="flex items-center justify-between px-4">
                            <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                            <button type="button"
                                class="relative -mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Close menu</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Filters -->
                        <form class="mt-4 border-t border-gray-200">
                            <h3 class="sr-only">Categories</h3>
                            <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                                <li>
                                    <a href="#" class="block px-2 py-3">Totes</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3">Backpacks</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3">Travel Bags</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3">Hip Bags</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3">Laptop Sleeves</a>
                                </li>
                            </ul>

                            <div class="border-t border-gray-200 px-4 py-6">
                                <h3 class="-mx-2 -my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500"
                                        aria-controls="filter-section-mobile-0" aria-expanded="false">
                                        <span class="font-medium text-gray-900">Color</span>
                                        <span class="ml-6 flex items-center">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-0">
                                    <div class="space-y-6">
                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-0" name="color[]" value="white"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-color-0"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">White</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-1" name="color[]" value="beige"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-color-1"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">Beige</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-2" name="color[]" value="blue"
                                                type="checkbox" checked
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-color-2"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">Blue</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-3" name="color[]" value="brown"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-color-3"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">Brown</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-4" name="color[]" value="green"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-color-4"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">Green</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-5" name="color[]" value="purple"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-color-5"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">Purple</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-6">
                                <h3 class="-mx-2 -my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500"
                                        aria-controls="filter-section-mobile-1" aria-expanded="false">
                                        <span class="font-medium text-gray-900">Category</span>
                                        <span class="ml-6 flex items-center">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-1">
                                    <div class="space-y-6">
                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-0" name="category[]" value="new-arrivals"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-0"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">New Arrivals</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-1" name="category[]" value="sale"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-1"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">Sale</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-2" name="category[]" value="travel"
                                                type="checkbox" checked
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-2"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">Travel</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-3" name="category[]" value="organization"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-3"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">Organization</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-4" name="category[]" value="accessories"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-4"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">Accessories</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-6">
                                <h3 class="-mx-2 -my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500"
                                        aria-controls="filter-section-mobile-2" aria-expanded="false">
                                        <span class="font-medium text-gray-900">Size</span>
                                        <span class="ml-6 flex items-center">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-2">
                                    <div class="space-y-6">
                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-0" name="size[]" value="2l"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-size-0"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">2L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-1" name="size[]" value="6l"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-size-1"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">6L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-2" name="size[]" value="12l"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-size-2"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">12L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-3" name="size[]" value="18l"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-size-3"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">18L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-4" name="size[]" value="20l"
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-size-4"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">20L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-5" name="size[]" value="40l"
                                                type="checkbox" checked
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-size-5"
                                                class="ml-3 min-w-0 flex-1 text-gray-500">40L</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900">New Arrivals</h1>

                    <div x-data="{ isOpen: false }" class="flex items-center">
                        <div class="relative inline-block text-left">
                            <div>
                                <button @click="isOpen = !isOpen"
                                    class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                    id="menu-button" :aria-expanded="isOpen.toString()" aria-haspopup="true">
                                    Sort
                                    <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <div x-show="isOpen" @click.away="isOpen = false"
                                class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="#" class="font-medium text-gray-900 block px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="menu-item-0">Most Popular</a>
                                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem"
                                        tabindex="-1" id="menu-item-1">Best Rating</a>
                                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem"
                                        tabindex="-1" id="menu-item-2">Newest</a>
                                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem"
                                        tabindex="-1" id="menu-item-3">Price: Low to High</a>
                                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem"
                                        tabindex="-1" id="menu-item-4">Price: High to Low</a>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                            <span class="sr-only">View grid</span>
                            <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                                <!-- ... -->
                            </svg>
                        </button>
                        <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                            <span class="sr-only">Filters</span>
                            <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                                <!-- ... -->
                            </svg>
                        </button>
                    </div>

                </div>

                <section aria-labelledby="products-heading" class="pb-24 pt-6">
                    <h2 id="products-heading" class="sr-only">Products</h2>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                        <!-- Filters -->
                        {{-- <form class="hidden lg:block"> --}}
                        <div>
                            <h3 class="sr-only">Categories</h3>

                            <div x-data="{ isOpen: false }" class="border-b border-gray-200 py-6">
                                <h3 class="-my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button @click="isOpen = !isOpen"
                                        class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500"
                                        aria-controls="filter-section-0">
                                        <span class="font-medium text-gray-900">Category</span>
                                        <span class="ml-6 flex items-center">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg x-show="!isOpen" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg x-show="isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div x-show="isOpen" class="pt-6" id="filter-section-0">
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <input id="filter-category-0" name="category[]" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-0" class="ml-3 text-sm text-gray-600">New
                                                Arrivals</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-category-1" name="category[]" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-1" class="ml-3 text-sm text-gray-600">Sale</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-category-2" name="category[]" type="checkbox" checked
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-2"
                                                class="ml-3 text-sm text-gray-600">Travel</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-category-3" name="category[]" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-3"
                                                class="ml-3 text-sm text-gray-600">Organization</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-category-4" name="category[]" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-4"
                                                class="ml-3 text-sm text-gray-600">Accessories</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- </form> --}}

                        <!-- Product grid -->
                        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-4 lg:col-span-3 lg:gap-x-8">
                            <a href="#" class="group text-sm">
                                <div
                                    class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/category-page-07-product-01.jpg"
                                        alt="White fabric pouch with white zipper, black zipper pull, and black elastic loop."
                                        class="h-full w-full object-cover object-center">
                                </div>
                                <h3 class="mt-4 font-medium text-gray-900">Nomad Pouch</h3>
                                <p class="italic text-gray-500">White and Black</p>
                                <p class="mt-2 font-medium text-gray-900">$50</p>
                            </a>
                            <a href="#" class="group text-sm">
                                <div
                                    class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/category-page-07-product-02.jpg"
                                        alt="Front of tote bag with washed black canvas body, black straps, and tan leather handles and accents."
                                        class="h-full w-full object-cover object-center">
                                </div>
                                <h3 class="mt-4 font-medium text-gray-900">Zip Tote Basket</h3>
                                <p class="italic text-gray-500">Washed Black</p>
                                <p class="mt-2 font-medium text-gray-900">$140</p>
                            </a>

                            <a href="#" class="group text-sm">
                                <div
                                    class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/category-page-07-product-01.jpg"
                                        alt="White fabric pouch with white zipper, black zipper pull, and black elastic loop."
                                        class="h-full w-full object-cover object-center">
                                </div>
                                <h3 class="mt-4 font-medium text-gray-900">Nomad Pouch</h3>
                                <p class="italic text-gray-500">White and Black</p>
                                <p class="mt-2 font-medium text-gray-900">$50</p>
                            </a>
                            <a href="#" class="group text-sm">
                                <div
                                    class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/category-page-07-product-02.jpg"
                                        alt="Front of tote bag with washed black canvas body, black straps, and tan leather handles and accents."
                                        class="h-full w-full object-cover object-center">
                                </div>
                                <h3 class="mt-4 font-medium text-gray-900">Zip Tote Basket</h3>
                                <p class="italic text-gray-500">Washed Black</p>
                                <p class="mt-2 font-medium text-gray-900">$140</p>
                            </a>

                        </div>
                    </div>
                </section>
            </main>

            <footer aria-labelledby="footer-heading" class="bg-white">
                <h2 id="footer-heading" class="sr-only">Footer</h2>
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div
                        class="grid grid-cols-2 gap-8 border-t border-gray-200 py-20 sm:grid-cols-2 sm:gap-y-0 lg:grid-cols-4">
                        <div class="grid grid-cols-1 gap-y-10 lg:col-span-2 lg:grid-cols-2 lg:gap-x-8 lg:gap-y-0">
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">Account</h3>
                                <ul role="list" class="mt-6 space-y-6">
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Manage Account</a>
                                    </li>
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Saved Items</a>
                                    </li>
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Orders</a>
                                    </li>
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Redeem Gift card</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">Service</h3>
                                <ul role="list" class="mt-6 space-y-6">
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Shipping &amp;
                                            Returns</a>
                                    </li>
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Warranty</a>
                                    </li>
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">FAQ</a>
                                    </li>
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Find a store</a>
                                    </li>
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Get in touch</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-y-10 lg:col-span-2 lg:grid-cols-2 lg:gap-x-8 lg:gap-y-0">
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">Company</h3>
                                <ul role="list" class="mt-6 space-y-6">
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Who we are</a>
                                    </li>
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Press</a>
                                    </li>
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Careers</a>
                                    </li>
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Terms &amp;
                                            Conditions</a>
                                    </li>
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Privacy</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">Connect</h3>
                                <ul role="list" class="mt-6 space-y-6">
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Instagram</a>
                                    </li>
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Pinterest</a>
                                    </li>
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600">Twitter</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 py-10 sm:flex sm:items-center sm:justify-between">
                        <div class="flex items-center justify-center text-sm text-gray-500">
                            <p>Shipping to Canada ($CAD)</p>
                            <p class="ml-3 border-l border-gray-200 pl-3">English</p>
                        </div>
                        <p class="mt-6 text-center text-sm text-gray-500 sm:mt-0">&copy; 2021 Your Company, Inc.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
