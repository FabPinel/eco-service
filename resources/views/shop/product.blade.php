@extends('layout')
@section('content')
<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
        <!-- Image gallery -->
        <div class="flex flex-col-reverse border-r-2 border-gray-200 p-4">  
          <div class="aspect-h-1 aspect-w-1 w-full">
            <!-- Tab panel, show/hide based on tab state. -->
            <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
              <img src="{{ asset('storage/images/' . $product->media) }}"
              alt="{{ $product->name }}" class="h-full w-full object-cover object-center sm:rounded-lg">
            </div>
          </div>
        </div>
  
        <!-- Product info -->
        <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
          <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $product->name }}</h1>
  
          <div class="mt-3">
            <h2 class="sr-only">{{ $product->name }}</h2>
            <p class="mt-2 font-bold text-gray-900 text-4xl text-[#1c3242]">{{ $product->price }}€</p>
          </div>
      
          <div class="mt-10">
            <h2 class="text-sm font-medium text-gray-900">Description</h2>

            <div class="prose prose-sm mt-4 text-gray-500">
              <p>{{ $product->description }}</p>
            </div>
          </div>

          <form class="mt-6">
            <div class="mt-10 flex">
              <button type="submit" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-[#1c3242] px-8 py-3 text-base font-medium text-white hover:bg-[#374a56] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Ajouter au pannier</button>
            </div>
          </form>

          <div class="mt-8 border-t border-gray-200 pt-8">
            <h2 class="text-sm font-medium text-gray-900">Composition &amp; Fabrication</h2>

            <div class="prose prose-sm mt-4 text-gray-500">
              <ul role="list">
                <li>Matériaux Écologiques</li>
                <li>Fabrication Locale et Éthique</li>
                <li>Mode d'Entretien Respectueux de l'Environnement</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-3">
        <p class="prose prose-sm mt-4 text-gray-500">{{ $product->information }}</p>
        <section aria-labelledby="policies-heading" class="mt-10">
          <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
            <div class="rounded-lg border border-gray-200 bg-gray-50 p-6 text-center">
              <dt>
                <svg class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                </svg>
                <span class="mt-4 text-sm font-medium text-gray-900">Livraison rapide</span>
              </dt>
              <dd class="mt-1 text-sm text-gray-500">Entre 3/4 jours ouvrables</dd>
            </div>
            <div class="rounded-lg border border-gray-200 bg-gray-50 p-6 text-center">
              <dt>
                <svg class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="mt-4 text-sm font-medium text-gray-900">10% reversé</span>
              </dt>
              <dd class="mt-1 text-sm text-gray-500">Un beau geste pour la planète</dd>
            </div>
          </dl>
        </section>
      </div>

      @if ($relatedProducts->isNotEmpty())
        <!-- Category section -->
        <section aria-labelledby="category-heading" class="pt-24 sm:pt-32 xl:mx-auto xl:max-w-7xl xl:px-8">
          <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:px-0">
              <h2 id="category-heading" class="text-2xl font-bold tracking-tight text-gray-900">Vous aimerez peut être...
              </h2>
              <a href="/boutique" class="hidden text-m font-semibold text-[#1c3242] hover:text-[#374a56] sm:block">
                  Voir tous les produits
                  <span aria-hidden="true"> &rarr;</span>
              </a>
          </div>

          <div class="mt-4 flow-root">
              <div class="-my-2">
                  <div class="relative box-content h-80 overflow-x-auto py-2 xl:overflow-visible">
                      <div class="absolute flex space-x-8 px-4 sm:px-6 lg:px-8 xl:relative xl:grid xl:grid-cols-5 xl:gap-x-8 xl:space-x-0 xl:px-0">
                          @foreach ($relatedProducts as $product)
                              <a href="{{ route('shop.productName', $product->id) }}" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                                  <span aria-hidden="true" class="absolute inset-0">
                                      <img class="h-full w-full object-cover object-center"
                                          src="{{ asset('storage/images/' . $product->media) }}"
                                          alt="{{ $product->name }}">
                                  </span>
                                  <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                                  <span class="relative mt-auto text-center text-xl font-bold text-white">{{ $product->name }}</span>
                              </a>
                          @endforeach
                      </div>
                  </div>
              </div>
          </div>

          <div class="mt-6 px-4 sm:hidden">
              <a href="/boutique" class="block text-sm font-semibold text-[#1c3242] hover:text-[#374a56]">
                  Voir tous les produits
                  <span aria-hidden="true"> &rarr;</span>
              </a>
          </div>
      </section>
    @endif

    </div>
  </div>
  @endsection