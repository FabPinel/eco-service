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
            <p class="mt-2 font-medium text-gray-900">{{ $product->price }}€</p>
          </div>
  
          <!-- Reviews -->
          {{-- <div class="mt-3">
            <h3 class="sr-only">Reviews</h3>
            <div class="flex items-center">
              <div class="flex items-center">
                <!-- Active: "text-indigo-500", Inactive: "text-gray-300" -->
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="h-5 w-5 flex-shrink-0 text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
              </div>
              <p class="sr-only">5 out of 5 stars</p>
            </div>
          </div> --}}
  
          <div class="mt-6">
            <h3 class="sr-only">Description</h3>
            <div class="space-y-6 text-base text-gray-700">
              <p>{{ $product->description }}</p>
            </div>
          </div>
  
          <form class="mt-6">
            <div class="mt-10 flex">
              <button type="submit" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-[#1c3242] px-8 py-3 text-base font-medium text-white hover:bg-[#374a56] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Ajouter au pannier</button>
            </div>
          </form>
        </div>
                {{-- <!-- Demo styles -->
          <style>
            body {
              background: #eee;
              font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
              font-size: 14px;
              color: #000;
              margin: 0;
              padding: 0;
            }

            .swiper {
              width: 100%;
              height: 300px;
              margin: 20px auto;
            }

            .swiper-slide {
              text-align: center;
              font-size: 18px;
              background: #fff;
              display: flex;
              justify-content: center;
              align-items: center;
            }

            .append-buttons {
              text-align: center;
              margin-top: 20px;
            }

            .append-buttons a {
              display: inline-block;
              border: 1px solid #007aff;
              color: #007aff;
              text-decoration: none;
              padding: 4px 10px;
              border-radius: 4px;
              margin: 0 10px;
              font-size: 13px;
            }
          </style>
        </head>

          <!-- Swiper -->
          <div class="swiper">
            <div class="swiper-wrapper"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
          
          <!-- Swiper JS -->
          <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

          <!-- Initialize Swiper -->
          <script>
            let appendNumber = 600;
            let prependNumber = 1;
            const swiper = new Swiper('.swiper', {
              slidesPerView: 3,
              centeredSlides: true,
              spaceBetween: 30,
              pagination: {
                el: '.swiper-pagination',
                type: 'fraction',
              },
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
              virtual: {
                slides: (function () {
                  const slides = [];
                  for (var i = 0; i < 600; i += 1) {
                    slides.push('Slide ' + (i + 1));
                  }
                  return slides;
                })(),
              },
            });

            document
              .querySelector('.slide-1')
              .addEventListener('click', function (e) {
                e.preventDefault();
                swiper.slideTo(0, 0);
              });

            document
              .querySelector('.slide-250')
              .addEventListener('click', function (e) {
                e.preventDefault();
                swiper.slideTo(249, 0);
              });

            document
              .querySelector('.slide-500')
              .addEventListener('click', function (e) {
                e.preventDefault();
                swiper.slideTo(499, 0);
              });

            document
              .querySelector('.prepend-1-slides')
              .addEventListener('click', function (e) {
                e.preventDefault();
                swiper.virtual.prependSlide([
                  'Slide ' + --prependNumber,
                  'Slide ' + --prependNumber,
                ]);
              });

            document
              .querySelector('.append-slide')
              .addEventListener('click', function (e) {
                e.preventDefault();
                swiper.virtual.appendSlide('Slide ' + ++appendNumber);
              });
          </script> --}}

      </div>
    </div>
  </div>
  @endsection