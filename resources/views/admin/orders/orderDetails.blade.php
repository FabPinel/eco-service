@extends('layout-admin')
@section('title', 'Admin - Orders')
@section('admin-content')
<div class="mt-24">
    <h2>Commande #{{ $order->id}} de {{ $order->user->first_name}} {{ $order->user->last_name }} {{ $order->total }} {{ $order->created_at }}</h2>
    <div class="flex w-full">
        <div class="w-1/2 border border-slate-200 rounded-sm">
            <p class="border-b border-2 w-full">Client</p>
            <div>
                <div class="flex">
                    <p>{{ $order->user->first_name }}  {{ $order->user->last_name }} </p>
                    <p>#{{ $order->id }}</p>
                </div>
                <div class="flex">
                    <p>{{ $order->user->email }}</p>
                    <p>{{ $order->user->phone }}</p>
                </div>
                <div class="flex">
                    <p>Compte créé le : {{ $order->user->created_at }}</p>
                    <p>Nombre de commandes : {{ $totalUserOrders }}</p>
                </div>
               <div>
                <p>Adresse</p>
                <p>Rue...</p>
                <div class="flex">
                    <p>Code postal</p>
                    <p>Ville</p>
                </div>
                <p>France</p>
               </div>
            </div>
        </div>
        <div class="w-1/2 border border-slate-200 rounded-sm">
            <p>Nombre Produits ({{ $totalItemOrder }})</p>
            <div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Produit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Prix unitaire
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantité
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stock
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $orderItem)

                            <tr class="bg-white border-b h-14 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <p class="text-lg font-bold">{{ $orderItem->product->name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-lg font-bold">Prix unitaire</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="w-fit px-2 py-1 text-lg font-semibold rounded-md bg-amber-50 text-amber-500 ring-1 ring-inset ring-amber-600/20">Quantité</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-lg font-bold">Stock dispo</p>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Total</a>
                                </td>
                            </tr>
                        @endforeach
                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

@endsection