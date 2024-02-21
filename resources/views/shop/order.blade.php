@extends('layout')
@section('content')
<div class="bg-white">
    <div class="mx-auto max-w-3xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
      <div class="max-w-xl">
        <h1 class="text-base font-medium text-[#e88229]">Merci!</h1>
        <p class="mt-2 text-4xl font-bold tracking-tight sm:text-5xl">Votre commande est en chemin !</p>
        <p class="mt-2 text-base text-gray-500">Votre commande #14034056 sera bientôt avec vous.</p>
      </div>
  
      <div class="mt-10 border-t border-gray-200">
        <h2 class="sr-only">Votre commande</h2>
  
        <h3 class="sr-only">Articles</h3>
        @foreach($orderDetails['orderItems'] as $orderItem)
            <div class="flex space-x-6 border-b border-gray-200 py-10">
                <img src="{{ asset('storage/images/' . $orderItem->product->media) }}" alt="{{ $orderItem->product->name }}" class="h-20 w-20 flex-none rounded-lg bg-gray-100 object-cover object-center sm:h-40 sm:w-40">
                <div class="flex flex-auto flex-col">
                    <div>
                        <h4 class="font-medium text-gray-900">
                            <a href="#">{{ $orderItem->product->name }}</a>
                        </h4>
                    </div>
                    <div class="mt-6 flex flex-1 items-end">
                        <dl class="flex space-x-4 divide-x divide-gray-200 text-sm sm:space-x-6">
                            <div class="flex">
                                <dt class="font-medium text-gray-900">Quantité</dt>
                                <dd class="ml-2 text-gray-700">{{ $orderItem->quantity }}</dd>
                            </div>
                            <div class="flex pl-4 sm:pl-6">
                                <dt class="font-medium text-gray-900">Prix</dt>
                                <dd class="ml-2 text-gray-700">{{ $orderItem->product->price }}€</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        @endforeach
    
        <div class="sm:ml-40 sm:pl-6">
          <h3 class="sr-only">Vos informations</h3>
  
          <h4 class="sr-only">Addresse</h4>
          <dl class="grid grid-cols-2 gap-x-6 py-10 text-sm">
            <div>
              <dt class="font-medium text-gray-900">Adresse de livraison</dt>
              <dd class="mt-2 text-gray-700">
                <address class="not-italic">
                    <span class="block">{{ $orderDetails['orderAddress']->address }}</span>
                    <span class="block">{{ $orderDetails['orderAddress']->postal_code }}, {{ $orderDetails['orderAddress']->city }}</span>
                    <span class="block">{{ $orderDetails['orderAddress']->country }}</span>
                </address>
            </dd>
            </div>
          </dl>
  

          <h3 class="sr-only">Summary</h3>
  
          <dl class="space-y-6 border-t border-gray-200 pt-10 text-sm">
            <div class="flex justify-between">
                <dt class="font-medium text-gray-900">Sous-total</dt>
                <dd class="text-gray-700">{{ $orderDetails['subtotal'] }}€</dd>
            </div>
            <div class="flex justify-between">
              <dt class="flex font-medium text-gray-900">
                Code promo
                <span class="ml-2 rounded-full bg-gray-200 px-2 py-0.5 text-xs text-gray-600">STUDENT50</span>
              </dt>
              <dd class="text-gray-700">-18.00€</dd>
            </div>
            <div class="flex justify-between">
              <dt class="font-medium text-gray-900">Frais de livraison</dt>
              <dd class="text-gray-700">4.99€</dd>
            </div>
            <div class="flex justify-between">
                <dt class="font-medium text-gray-900">Total</dt>
                <dd class="text-gray-900">{{ $orderDetails['total'] }}€</dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </div>
  
@endsection