<div x-data="{ isOpen: false }">      
    <!-- Mobile menu -->           
     <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true" x-show="isOpen" @click.away="isOpen = false">
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
                     <button type="button" @click="isOpen = false"
                     class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                     <span class="sr-only">Close menu</span>
                     <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
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
                                 aria-controls="tabs-1-panel-1" role="tab" type="button">Boutique</button>
                             <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-900" -->
                             <button id="tabs-1-tab-2"
                                 class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium"
                                 aria-controls="tabs-1-panel-2" role="tab" type="button">Zéro déchet</button>
                         </div>
                     </div>

                     <!-- 'Women' tab panel, show/hide based on tab state. -->
                     <div id="tabs-1-panel-1" class="space-y-12 px-4 py-6" aria-labelledby="tabs-1-tab-1" role="tabpanel"
                         tabindex="0">
                         <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                             <div class="group relative">
                                 <div
                                     class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                     <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg"
                                         alt="Models sitting back to back, wearing Basic Tee in black and bone."
                                         class="object-cover object-center">
                                 </div>
                                 <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                     <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                     New Arrivals
                                 </a>
                                 <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                             </div>
                             <div class="group relative">
                                 <div
                                     class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                     <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg"
                                         alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees."
                                         class="object-cover object-center">
                                 </div>
                                 <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                     <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                     Basic Tees
                                 </a>
                                 <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                             </div>
                             <div class="group relative">
                                 <div
                                     class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                     <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-03.jpg"
                                         alt="Model wearing minimalist watch with black wristband and white watch face."
                                         class="object-cover object-center">
                                 </div>
                                 <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                     <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                     Accessories
                                 </a>
                                 <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                             </div>
                             <div class="group relative">
                                 <div
                                     class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                     <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-04.jpg"
                                         alt="Model opening tan leather long wallet with credit card pockets and cash pouch."
                                         class="object-cover object-center">
                                 </div>
                                 <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                     <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                     Carry
                                 </a>
                                 <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                             </div>
                         </div>
                     </div>
                     <!-- 'Men' tab panel, show/hide based on tab state. -->
                     <div id="tabs-1-panel-2" class="space-y-12 px-4 py-6" aria-labelledby="tabs-1-tab-2" role="tabpanel"
                         tabindex="0">
                         <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                             <div class="group relative">
                                 <div
                                     class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                     <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-01.jpg"
                                         alt="Hats and sweaters on wood shelves next to various colors of t-shirts on hangers."
                                         class="object-cover object-center">
                                 </div>
                                 <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                     <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                     New Arrivals
                                 </a>
                                 <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                             </div>
                             <div class="group relative">
                                 <div
                                     class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                     <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-02.jpg"
                                         alt="Model wearing light heather gray t-shirt."
                                         class="object-cover object-center">
                                 </div>
                                 <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                     <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                     Basic Tees
                                 </a>
                                 <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                             </div>
                             <div class="group relative">
                                 <div
                                     class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                     <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-03.jpg"
                                         alt="Grey 6-panel baseball hat with black brim, black mountain graphic on front, and light heather gray body."
                                         class="object-cover object-center">
                                 </div>
                                 <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                     <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                     Accessories
                                 </a>
                                 <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                             </div>
                             <div class="group relative">
                                 <div
                                     class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                     <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-04.jpg"
                                         alt="Model putting folded cash into slim card holder olive leather wallet with hand stitching."
                                         class="object-cover object-center">
                                 </div>
                                 <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                     <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                     Carry
                                 </a>
                                 <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                     <div class="flow-root">
                         <a href="/admin/diy" class="-m-2 block p-2 font-medium text-gray-900">DIY</a>
                     </div>
                 </div>

                 <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                     <div class="flow-root">
                         <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Create an account</a>
                     </div>
                     <div class="flow-root">
                         <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
                     </div>
                 </div>

                 <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                     <!-- Currency selector -->
                     <form>
                         <div class="inline-block">
                             <label for="mobile-currency" class="sr-only">Currency</label>
                             <div
                                 class="group relative -ml-2 rounded-md border-transparent focus-within:ring-2 focus-within:ring-white">
                                 <select id="mobile-currency" name="currency"
                                     class="flex items-center rounded-md border-transparent bg-none py-0.5 pl-2 pr-5 text-sm font-medium text-gray-700 focus:border-transparent focus:outline-none focus:ring-0 group-hover:text-gray-800">
                                     <option>CAD</option>
                                     <option>USD</option>
                                     <option>AUD</option>
                                     <option>EUR</option>
                                     <option>GBP</option>
                                 </select>
                                 <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
                                     <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                         <path fill-rule="evenodd"
                                             d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                             clip-rule="evenodd" />
                                     </svg>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>

     <!-- Navigation -->
     <header class="relative z-10" x-data="{ isSticky: true }" @scroll.window="isSticky = window.scrollY >= $refs.nav.offsetHeight">
         <nav aria-label="Top">
             <!-- Secondary navigation -->
             <div :class="{ 'fixed top-0 w-full': isSticky }" class="bg-[#e88229] bg-opacity-50 backdrop-blur-md backdrop-filter">
                 <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                     <div>
                         <div class="flex h-16 items-center justify-between">
                             <!-- Logo (lg+) -->
                             <div class="hidden lg:flex lg:flex-1 lg:items-center">
                                <a href="/">
                                    <span class="sr-only">Your Company</span>
                                    <img class="h-20 w-auto"
                                        src="https://image.noelshack.com/fichiers/2024/04/5/1706279129-logo-eco-service.png"
                                        alt="">
                                </a>
                             </div>

                             <div class="hidden h-full lg:flex">
                                 <!-- Flyout menus -->
                                 <div class="inset-x-0 bottom-0 px-4">
                                     <div class="flex h-full justify-center space-x-8">
                                        <div class="flex">
                                            <div class="relative flex">
                                                <button type="button"
                                                    class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                                    aria-expanded="false">
                                                    Dashboard
                                                    <!-- Open: "bg-white", Closed: "" -->
                                                    <span
                                                        class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out"
                                                        aria-hidden="true"></span>
                                                </button>
                                            </div>
                                            <div class="absolute inset-x-0 top-full text-sm text-gray-500">
                                                <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                                <div class="absolute inset-0 top-1/2 bg-white shadow"
                                                    aria-hidden="true"></div>
                                            </div>
                                        </div>
                                         <div class="flex">
                                             <div class="relative flex">
                                                <button type="button"
                                                    onclick="window.location.href='{{ url('/admin/index') }}'"
                                                    class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                                    aria-expanded="false">
                                                        Produits
                                                        <!-- Open: "bg-white", Closed: "" -->
                                                    <span class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out" aria-hidden="true"></span>
                                                </button>
                                             </div>
                                             <div class="absolute inset-x-0 top-full text-sm text-gray-500">
                                                 <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                                 <div class="absolute inset-0 top-1/2 bg-white shadow"
                                                     aria-hidden="true"></div>
                                             </div>
                                         </div>
                                         <div class="flex">
                                             <div class="relative flex">
                                                 <button type="button"
                                                     class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                                     aria-expanded="false">
                                                     Commandes
                                                     <span
                                                         class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out"
                                                         aria-hidden="true"></span>
                                                 </button>
                                             </div>
                                         </div>
                                         <a href="/admin/diy" class="flex items-center text-sm font-medium text-white">DIY</a>
                                         <a href="#" class="flex items-center text-sm font-medium text-white">Messages</a>
                                         <button type="button"
                                         onclick="window.location.href='{{ url('/') }}'"
                                         class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                         aria-expanded="false">
                                             Accueil
                                             <!-- Open: "bg-white", Closed: "" -->
                                         <span class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out" aria-hidden="true"></span>
                                     </button>
                                     </div>
                                 </div>
                             </div>

                             <!-- Mobile menu and search (lg-) -->
                             <div class="flex flex-1 items-center lg:hidden">
                                 <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                                 <button type="button" class="-ml-2 p-2 text-white" @click="isOpen = !isOpen">
                                     <span class="sr-only">Open menu</span>
                                     <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true">
                                         <path stroke-linecap="round" stroke-linejoin="round"
                                             d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                     </svg>
                                 </button>

                                 <!-- Search -->
                                 <a href="#" class="ml-2 p-2 text-white">
                                     <span class="sr-only">Recherche</span>
                                     <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true">
                                         <path stroke-linecap="round" stroke-linejoin="round"
                                             d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                     </svg>
                                 </a>
                             </div>

                             <!-- Logo (lg-) -->
                             <a href="#" class="lg:hidden">
                                 <span class="sr-only">Your Company</span>
                                 <img src="https://tailwindui.com/img/logos/mark.svg?color=white" alt=""
                                     class="h-8 w-auto">
                             </a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </nav>
     </header>
</div>
