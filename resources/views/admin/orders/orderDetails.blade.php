@extends('layout-admin')
@section('title', 'Admin - Orders')
@section('admin-content')
<div class="mt-24 mx-4">
    <h2 class="text-xl">Commande <span class="font-bold">#{{ $order->id}}</span> de {{ $order->user->first_name}} {{ $order->user->last_name }} 
        <span class="text-base font-medium text-gray-50 bg-gray-500 ring-1 ring-inset ring-gray-600/20 rounded-lg p-1">{{ $order->total }}€</span> 
        le {{ $order->created_at->format('d/m/Y') }}</h2>
    <div class="flex w-full mt-4">
        <div class="w-1/3 mx-2 border border-purple-500 rounded-lg">
            <div class="w-full border-slate-200 bg-gray-100 rounded-lg">
                <p class="text-xl border-b border-gray-300 py-2 pl-1 font-semibold">Client</p>
            </div>
            <div class="font-medium">
                <div class="flex">
                    <p class="text-lg px-2">{{ $order->user->first_name }}  {{ $order->user->last_name }} </p>
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
                <p>Adresse de livraison</p>
                <p>Rue...</p>
                <div class="flex">
                    <p>Code postal</p>
                    <p>Ville</p>
                </div>
                <p>France</p>
               </div>
            </div>
        </div>
        <div class="w-2/3 border border-slate-200 rounded-sm mx-2">
            <div class="w-full border-slate-200 bg-gray-100">
                <p class="text-xl border-b border-gray-300 py-2 pl-1 font-semibold">Nombre produits ({{ $totalItemOrder }})</p>
            </div>
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
                            <th scope="col" class="px-6 py-3">
                                Date
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
                                    <p class="text-lg font-bold">{{ $orderItem->product->price }}€</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="w-fit px-2 py-1 text-lg font-semibold rounded-md bg-amber-50 text-amber-500 ring-1 ring-inset ring-amber-600/20">{{ $orderItem->quantity }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-lg font-bold">{{ $orderItem->product->quantity }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $orderItem->quantity * $orderItem->product->price }}€</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $orderItem->created_at }}</a>
                                </td>
                            </tr>
                        @endforeach
                            
                    </tbody>
                </table>
            </div>
            <div class="flex justify-evenly">
                <div>
                    <p>Produits :</p>
                    <p>{{ $order->total }}€</p>
                </div>
                <div>
                    <p>Réductions :</p>
                    <p>-10€</p>

                </div>
                <div>
                    <p>Total : </p>
                    <p>{{ $order->total - 10}}€</p>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection