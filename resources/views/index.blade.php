@extends('layout')
@section('title', 'Accueil')
@section('content')

    <div class="bg-white">
        <!-- Hero section -->
        <div class="relative bg-gray-900 h-screen">
            <!-- Decorative image and overlay -->
            <div aria-hidden="true" class="absolute inset-0 overflow-hidden h-screen">
                <img src="https://image.noelshack.com/fichiers/2024/05/1/1706536138-hero-section-eco-service.jpg"
                    alt="" class="h-full w-full object-cover object-center">
            </div>
            <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-50"></div>

            <div class="relative mx-auto flex max-w-3xl flex-col items-center px-6 py-32 text-center sm:py-64 lg:px-0">
                <h1 class="text-4xl font-bold tracking-tight text-white lg:text-6xl">Eco-Service</h1>
                <p class="mt-4 text-xl text-white">Transformez votre quotidien avec notre gamme complète de produits DIY
                    pour des solutions de nettoyage respectueuses de l'environnement. Chez Éco-Service, nous croyons en la
                    puissance du Do It Yourself (Faites-le vous-même) pour créer des produits ménagers efficaces,
                    écologiques et économiques..</p>
                <a href="/boutique"
                    class="mt-8 inline-block rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-gray-900 hover:bg-gray-100">Découvrez
                    nos solutions durables</a>
            </div>
        </div>

        <main>
            <!-- Category section -->
            <section aria-labelledby="category-heading" class="pt-24 sm:pt-32 xl:mx-auto xl:max-w-7xl xl:px-8">
                <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:px-0">
                    <h2 id="category-heading" class="text-2xl font-bold tracking-tight text-gray-900">Découvrez nos produits
                    </h2>
                    <a href="/boutique" class="hidden text-m font-semibold text-[#1c3242] hover:text-[#374a56] sm:block">
                        Voir tous les produits
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>

                <div class="mt-4 flow-root">
                    <div class="-my-2">
                        <div class="relative box-content h-80 overflow-x-auto py-2 xl:overflow-visible">
                            <div
                                class="absolute flex space-x-8 px-4 sm:px-6 lg:px-8 xl:relative xl:grid xl:grid-cols-5 xl:gap-x-8 xl:space-x-0 xl:px-0">
                                @foreach ($productsHome as $product)
                                    <a href="{{ route('shop.productName', $product->id) }}"
                                        class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                                        <span aria-hidden="true" class="absolute inset-0">
                                            <img class="h-full w-full object-cover object-center"
                                                src="{{ asset('storage/images/' . $product->media) }}"
                                                alt="{{ $product->name }}">
                                        </span>
                                        <span aria-hidden="true"
                                            class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                                        <span
                                            class="relative mt-auto text-center text-xl font-bold text-white">{{ $product->name }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 px-4 sm:hidden">
                    <a href="#" class="block text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                        Browse all categories
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>
            </section>

            <!-- Featured section -->
            <section aria-labelledby="social-impact-heading" class="mx-auto max-w-7xl px-4 pt-24 sm:px-6 sm:pt-32 lg:px-8">
                <div class="relative overflow-hidden rounded-lg">
                    <div class="absolute inset-0">
                        <img src="https://image.noelshack.com/fichiers/2024/05/1/1706538116-pexels-polina-tankilevitch-3735147.jpg"
                            alt="" class="h-full w-full object-cover object-center">
                    </div>
                    <div class="relative bg-gray-900 bg-opacity-50 px-6 py-32 sm:px-12 sm:py-40 lg:px-16">
                        <div class="relative mx-auto flex max-w-3xl flex-col items-center text-center">
                            <h2 id="social-impact-heading" class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                                <span class="block sm:inline">Zéro Déchet !</span>
                            </h2>
                            <p class="mt-3 text-xl text-white"> Choisissez une vie sans gaspillage, privilégiez le
                                réutilisable au jetable, et faites un impact positif sur la planète. Rejoignez-nous pour un
                                avenir plus vert et responsable. #ZéroDéchet 🌿♻️</p>
                            <a href="#"
                                class="mt-8 block w-full rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-gray-900 hover:bg-gray-100 sm:w-auto">Je
                                découvre !</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Collection section -->
            <section aria-labelledby="collection-heading"
                class="mx-auto max-w-xl px-4 pt-24 sm:px-6 sm:pt-32 lg:max-w-7xl lg:px-8">
                <h2 id="collection-heading" class="text-2xl font-bold tracking-tight text-gray-900">Nos articles DIY</h2>
                <p class="mt-4 text-base text-gray-500">Explorez l'art du DIY écologique avec nos articles pour créer des
                    solutions durables à la maison. Faites place à la créativité et à la responsabilité environnementale !
                    🌱🛠️</p>
                <div class="mt-10 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0">
                    @foreach ($diyHome as $diy)
                        <a href="#" class="group block">
                            <div aria-hidden="true"
                                class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg lg:aspect-h-6 lg:aspect-w-5 group-hover:opacity-75">
                                <img src="{{ asset('storage/images/' . $diy->image) }}"
                                    class="h-full w-full object-cover object-center">
                            </div>
                            <h3 class="mt-4 text-base font-semibold text-gray-900">{{ $diy->title }}</h3>
                            <p class="mt-2 text-sm text-gray-500">{{ $diy->description }}</p>
                        </a>
                    @endforeach
                </div>
            </section>
        </main>
        @if ($message = Session::get('success'))
            <div id="successMessage" class="fixed bottom-0 right-0 bg-green-500 text-white p-4 mb-4 mr-4 rounded shadow">
                {{ $message }}
            </div>
        @endif
        <script>
            setTimeout(function() {
                document.getElementById('successMessage').remove();
            }, 5000); // La popup disparaîtra après 5 secondes (5000 millisecondes)
        </script>
    </div>


@endsection
