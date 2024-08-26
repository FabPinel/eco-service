@extends('layout')
@section('pageTitle', "Laissez un avis !")
@section('content')

<div class="max-w-3xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-semibold text-gray-900">Laissez un avis sur vos produits</h1>
    @foreach ($orderItems as $orderItem)
        @php
            $reviewToken = \App\Models\ReviewToken::where('token', $orderItem->reviewToken)->first();
        @endphp

        <div x-data="{ submitted: {{ $reviewToken->used ? 'true' : 'false' }} }" class="mt-8 bg-white border border-gray-200 rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <img src="{{ asset('/storage/images/' . $orderItem->product->media) }}"
                     alt="{{ $orderItem->product->name }}"
                     class="h-20 w-20 rounded-lg object-cover object-center">
                <div class="ml-4">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $orderItem->product->name }}</h2>
                    <p class="text-gray-700">{{ $orderItem->product->price }}€</p>
                </div>
            </div>

            <!-- Formulaire de soumission -->
            <form x-show="!submitted" action="{{ route('reviews.submit', $orderItem->reviewToken) }}" method="POST" class="mt-6">
                @csrf
                <!-- Note de 1 à 5 étoiles avec Alpine.js -->
                <div x-data="{ rating: 0, hover: 0 }" @mouseleave="hover = 0" class="flex items-center mb-4">
                    <label class="block text-gray-700 font-medium mr-4">Note :</label>
                    <div class="flex">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg
                                @click="rating = {{ $i }}"
                                @mouseover="hover = {{ $i }}"
                                :class="(rating >= {{ $i }} || hover >= {{ $i }}) ? 'text-yellow-500' : 'text-gray-400'"
                                class="w-6 h-6 cursor-pointer"
                                fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                        @endfor
                    </div>
                    <!-- Champ caché pour stocker la note -->
                    <input type="hidden" name="rating" :value="rating">
                    <input type="hidden" name="user_id" value="{{ $order->user->id }}">
                    <input type="hidden" name="product_id" value="{{ $orderItem->product->id }}">
                </div>

                <!-- Commentaire -->
                <div class="mb-4">
                    <label for="comment_{{ $orderItem->id }}" class="block text-gray-700 font-medium mb-2">Votre commentaire :</label>
                    <textarea id="comment_{{ $orderItem->id }}" name="comment" rows="4" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Partagez votre expérience avec ce produit..."></textarea>
                </div>

                <!-- Bouton soumettre -->
                <div class="text-right">
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">
                        Soumettre
                    </button>
                </div>
            </form>

            <!-- Message de remerciement -->
            <div x-show="submitted" class="mt-4 text-green-500">
                Merci pour votre avis ! Votre avis a bien été pris en compte.
            </div>
        </div>
    @endforeach
</div>

@endsection
