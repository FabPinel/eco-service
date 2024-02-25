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
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Links -->
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/boutique" class="-m-2 block p-2 font-medium text-gray-900">Boutique</a>
                    </div>
                </div>
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/zero-dechet" class="-m-2 block p-2 font-medium text-gray-900">Zéro dechet</a>
                    </div>
                </div>
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/DIY" class="-m-2 block p-2 font-medium text-gray-900">DIY</a>
                    </div>
                </div>
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/contact" class="-m-2 block p-2 font-medium text-gray-900">Contact</a>
                    </div>
                </div>
                @auth
                    @if (Auth::user()->role == 0)
                        <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                            <div class="flow-root">
                                <a href="{{ route('admin.products.index') }}"
                                    class="-m-2 block p-2 font-medium text-gray-900">Admin</a>
                            </div>
                        </div>
                    @endif
                @endauth
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/register" class="-m-2 block p-2 font-medium text-gray-900">Créer un compte</a>
                    </div>
                    <div class="flow-root">
                        <a href="/login" class="-m-2 block p-2 font-medium text-gray-900">Se connecter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Laptop Menu -->
    <header class="relative z-10" x-data="{ isSticky: false }"
        @scroll.window="isSticky = window.scrollY >= $refs.nav.offsetHeight">
        <nav aria-label="Top">
            <!-- Top navigation -->
            <div class="bg-[#1c3242]" x-ref="nav">
                <div class="ml-auto flex h-10 w-full items-center justify-end px-4 sm:px-6 lg:px-8">
                    @guest
                        <div class="flex items-center space-x-6">
                            <a href="/login" class="text-sm font-medium text-white hover:text-gray-100">Se
                                connecter</a>
                            <a href="/register" class="text-sm font-medium text-white hover:text-gray-100">Créer un
                                compte</a>
                        </div>
                    @elseif(Auth::user()->role == 0)
                        <a class="text-white" href="/mon-compte">Bienvenue administrateur {{ Auth::user()->username }}</a>
                        <a class="text-rose-700" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    @else
                        <p class="text-white">Bienvenue {{ Auth::user()->username }}</p>
                        <a class="text-rose-700" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    @endguest <!-- Secondary navigation -->
                </div>

            </div>
            <div :class="{ 'fixed top-0 w-full': isSticky }"
                class="bg-[#e88229] bg-opacity-50 backdrop-blur-md backdrop-filter">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div>
                        <div class="flex h-16 items-center justify-between">
                            <!-- Logo (lg+) -->
                            <div class="hidden lg:flex lg:flex-1 lg:items-center">
                                <a href="/">
                                    <span class="sr-only">Eco-Service</span>
                                    <img class="h-20 w-auto"src="https://image.noelshack.com/fichiers/2024/04/5/1706279129-logo-eco-service.png"
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
                                                    onclick="window.location.href='{{ url('/boutique') }}'"
                                                    class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                                    aria-expanded="false">
                                                    Boutique
                                                    <!-- Open: "bg-white", Closed: "" -->
                                                    <span
                                                        class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out"
                                                        aria-hidden="true"></span>
                                                </button>
                                            </div>

                                            <!--
                                                    'Women' flyout menu, show/hide based on flyout menu state.

                                                    Entering: "transition ease-out duration-200"
                                                        From: "opacity-0"
                                                        To: "opacity-100"
                                                    Leaving: "transition ease-in duration-150"
                                                        From: "opacity-100"
                                                        To: "opacity-0"
                                                    -->
                                            <div class="absolute inset-x-0 top-full text-sm text-gray-500">
                                                <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                                <div class="absolute inset-0 top-1/2 bg-white shadow"
                                                    aria-hidden="true"></div>


                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="relative flex">
                                                <button type="button"
                                                    onclick="window.location.href='{{ url('/zero-dechet') }}'"
                                                    class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                                    aria-expanded="false">
                                                    Zéro dechet
                                                    <!-- Open: "bg-white", Closed: "" -->
                                                    <span
                                                        class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out"
                                                        aria-hidden="true"></span>
                                                </button>
                                            </div>

                                            <!--
                                                    'Women' flyout menu, show/hide based on flyout menu state.

                                                    Entering: "transition ease-out duration-200"
                                                        From: "opacity-0"
                                                        To: "opacity-100"
                                                    Leaving: "transition ease-in duration-150"
                                                        From: "opacity-100"
                                                        To: "opacity-0"
                                                    -->

                                        </div>

                                        <button type="button" onclick="window.location.href='{{ url('/DIY') }}'"
                                            class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                            aria-expanded="false">
                                            DIY
                                            <!-- Open: "bg-white", Closed: "" -->
                                            <span
                                                class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out"
                                                aria-hidden="true"></span>
                                        </button>
                                        <button type="button" onclick="window.location.href='{{ url('/contact') }}'"
                                            class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                            aria-expanded="false">
                                            Contact
                                            <!-- Open: "bg-white", Closed: "" -->
                                            <span
                                                class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out"
                                                aria-hidden="true"></span>
                                        </button>


                                        @auth
                                            @if (Auth::user()->role == 0)
                                                <a href="{{ route('admin.products.index') }}"
                                                    class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                                    aria-expanded="false">Admin</a>
                                            @endif
                                        @endauth
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
                            </div>

                            <!-- Logo (lg-) -->
                            <a href="#" class="lg:hidden">
                                <span class="sr-only">Eco-Service</span>
                                <img src="https://image.noelshack.com/fichiers/2024/04/5/1706279129-logo-eco-service.png"
                                    alt="" class="h-16 w-auto">
                            </a>

                            <div class="flex flex-1 items-center justify-end">
                                <div class="flex items-center lg:ml-8">
                                    <!-- Cart -->
                                    <div x-data="{ totalQuantity: 0 }" x-init="totalQuantity = Object.values(JSON.parse('{{ json_encode(session('cart', [])) }}')).reduce((acc, curr) => acc + parseInt(curr.quantity), 0)"
                                        class="ml-4 flow-root lg:ml-8">
                                        <a href="{{ route('panier') }}" class="group -m-2 flex items-center p-2">
                                            <svg class="h-6 w-6 flex-shrink-0 text-white" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                            </svg>
                                            <span class="ml-2 text-sm font-medium text-white"
                                                x-text="totalQuantity"></span>
                                            <span class="sr-only">items in cart, view bag</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>
