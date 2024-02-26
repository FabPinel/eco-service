@extends('layout')
@section('content')
    <main class="mx-auto max-w-7xl px-4 pb-24 pt-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <h1 class="sr-only">Checkout</h1>

            <form action="/session" method="post" class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                <!-- Informations de livraison à gauche -->
                <div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Vos informations</h2>

                        <div class="mt-4">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">Adresse email</label>
                            <div class="mt-1">
                                <input type="email" id="email-address" name="email-address" autocomplete="email"
                                    class="block w-full py-1 px-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    @auth value="{{ auth()->user()->email }}" @endauth>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ selectedAddress: {{ $userAddress && $userAddress->default == 1 ? $userAddress->toJson() : '{}' }} }">
                        <div class="mt-10 border-t border-gray-200 pt-10">
                            <h2 class="text-lg font-medium text-gray-900">Informations de livraison</h2>
                            <label for="user-address" class="block text-sm font-medium my-2 text-gray-700">Adresse de
                                livraison</label>
                            <div class="flex items-center my-2 gap-2">
                                <svg class="w-6 h-6 text-blue-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 11h2v5m-2 0h4m-2.6-8.5h0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <p class="font-seminold text-lg">Toute nouvelle adresse est enregistrée sur votre compte.
                                </p>

                            </div>
                            <div class="mt-1" x-show="{{ $userAddress ? 'true' : 'false' }}">
                                <select id="user-address" name="user-address" autocomplete="address-line"
                                    class="block w-full py-1 px-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    x-on:change="selectedAddress = JSON.parse($event.target.value)">
                                    @foreach ($allUserAddresses as $address)
                                        <option value="{{ $address->toJson() }}"
                                            @if ($userAddress && $userAddress->id == $address->id) selected @elseif($address->default == 1) selected @endif>
                                            {{ $address->address_line }}, {{ $address->city }}, {{ $address->postalCode }},
                                            {{ $address->country }}
                                            @if ($address->default == 1)
                                                (Par défaut)
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                <div>
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">Prénom</label>
                                    <div class="mt-1">
                                        <input type="text" id="first-name" name="first-name" autocomplete="given-name"
                                            class="block w-full py-1 px-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            x-model="selectedAddress.first_name">
                                    </div>
                                </div>

                                <div>
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Nom</label>
                                    <div class="mt-1">
                                        <input type="text" id="last-name" name="last-name" autocomplete="family-name"
                                            class="block w-full py-1 px-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            x-model="selectedAddress.last_name">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                                    <div class="mt-1">
                                        <input type="text" name="address" id="address" autocomplete="street-address"
                                            class="block w-full py-1 px-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            x-model="selectedAddress.address_line">
                                    </div>
                                </div>

                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
                                    <div class="mt-1">
                                        <input type="text" name="city" id="city" autocomplete="address-level2"
                                            class="block w-full py-1 px-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            x-model="selectedAddress.city">
                                    </div>
                                </div>

                                <div>
                                    <label for="country" class="block text-sm font-medium text-gray-700">Pays</label>
                                    <div class="mt-1">
                                        <input id="country" name="country" autocomplete="country-name"
                                            class="block w-full py-1 px-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            x-model="selectedAddress.country">
                                    </div>
                                </div>

                                <div>
                                    <label for="postal-code" class="block text-sm font-medium text-gray-700">Code
                                        postal</label>
                                    <div class="mt-1">
                                        <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code"
                                            class="block w-full py-1 px-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            x-model="selectedAddress.postalCode">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Numéro de
                                        téléphone</label>
                                    <div class="mt-1">
                                        <input type="text" name="phone" id="phone" autocomplete="tel"
                                            class="block w-full py-1 px-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            x-model="selectedAddress.phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 border-t border-gray-200 pt-10">
                        <fieldset>
                            <legend class="text-lg font-medium text-gray-900">Méthode de livraison</legend>

                            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                <!--
                                                              Checked: "border-transparent", Not Checked: "border-gray-300"
                                                              Active: "ring-2 ring-indigo-500"
                                                            -->
                                <label
                                    class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none">
                                    <input type="radio" name="delivery-method" value="Standard" class="sr-only"
                                        aria-labelledby="delivery-method-0-label"
                                        aria-describedby="delivery-method-0-description-0 delivery-method-0-description-1">
                                    <span class="flex flex-1">
                                        <span class="flex flex-col">
                                            <span id="delivery-method-0-label"
                                                class="block text-sm font-medium text-gray-900">Standard</span>
                                            <span id="delivery-method-0-description-0"
                                                class="mt-1 flex items-center text-sm text-gray-500">3–4 jours
                                                ouvrables</span>
                                            <span id="delivery-method-0-description-1"
                                                class="mt-6 text-sm font-medium text-gray-900">4.99€</span>
                                        </span>
                                    </span>
                                    <!-- Not Checked: "hidden" -->
                                    <svg class="h-5 w-5 text-[#EEA25F]" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <!--
                                                                Active: "border", Not Active: "border-2"
                                                                Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                              -->
                                    <span class="pointer-events-none absolute -inset-px rounded-lg border-2"
                                        aria-hidden="true"></span>
                                </label>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <!-- Order summary -->
                <div class="mt-10 lg:mt-0">
                    <h2 class="text-lg font-medium text-gray-900">Résumé de votre commande</h2>

                    <div class="mt-4 rounded-lg border border-gray-200 bg-white shadow-sm">
                        <h3 class="sr-only">Articles dans votre panier</h3>
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach (session('cart', []) as $productId => $item)
                                <li class="flex px-4 py-6 sm:px-6">
                                    <div class="flex-shrink-0">
                                        <img src="{{ $item['image_url'] }}" alt="Front of men&#039;s Basic Tee in black."
                                            class="w-20 rounded-md">
                                    </div>

                                    <div class="ml-6 flex flex-1 flex-col">
                                        <div class="flex">
                                            <div class="min-w-0 flex-1">
                                                <h4 class="text-sm">
                                                    <a href="{{ route('shop.productName', $item['product_id']) }}"
                                                        class="font-medium text-gray-700 hover:text-gray-800">{{ $item['name'] }}</a>
                                                </h4>
                                            </div>
                                        </div>

                                        <div class="flex flex-1 items-end justify-between pt-2">
                                            <p class="mt-1 text-sm font-medium text-gray-900">{{ $item['price'] }} €</p>

                                            <div class="ml-4">
                                                <p class="mt-1 text-sm text-gray-500">x {{ $item['quantity'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <dl class="space-y-6 border-t border-gray-200 px-4 py-6 sm:px-6">
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Sous-total</dt>
                                <dd class="text-sm font-medium text-gray-900" name="subtotal">
                                    {{ number_format($subtotal, 2) }}€</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Frais de livraison</dt>
                                <dd class="text-sm font-medium text-gray-900">4.99€</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">TVA (20%)</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ number_format($subtotal * 0.2, 2) }}€
                                </dd>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                                <dt class="text-base font-medium">Total (TTC)</dt>
                                <dd class="text-base font-medium text-gray-900" name="total">
                                    {{ number_format($total, 2) }}€</dd>
                            </div>
                        </dl>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                            <button type="submit"
                                class="w-full rounded-md border border-transparent bg-[#1c3242] px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-[#374a56] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">Payer
                                avec Stripe</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
