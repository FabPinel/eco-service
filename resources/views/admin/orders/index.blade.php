@extends('layout-admin')
@section('title', 'Admin - Orders')
@section('admin-content')
<div class="mt-96">
   
    <div class="px-4 sm:px-6 lg:px-8 mt-20" x-show="activeTab === 1">
        <div class="sm:items-center">
            <div class="sm:flex">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Commandes</h1>
                <p>(255)</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:flex-none w-fit ml-auto">
                <a href="{{ route('admin.products.create') }}"
                    class="block rounded-md bg-[#1c3242] px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-[#374a56] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter un produit</a>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Id</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Client</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Total</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    État</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Date</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 w-12">
                                    <span class="sr-only">Show</span>
                                </th>
                            </tr>
                        </thead>
                        @foreach ($orders as $product)
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">{{ $product->id }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-3 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="flex items-center">
                                            <div class="h-14 w-14 flex-shrink-0">
                                                <img class="h-14 w-14 rounded-md object-contain"
                                                    src="{{ asset('storage/images/' . $product->media) }}"
                                                    alt="{{ $product->name }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <div class="text-gray-900">{{ $product->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <div class="text-gray-900">{{ $product->price }}€</div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <div class="text-gray-900">{{ $product->quantity }}</div>
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-800"><span
                                                class="material-icons">
                                                visibility
                                            </span></a>
                                    </td>
                                </tr>

                                <!-- More people... -->
                            </tbody>
                        @endforeach

                    </table>
                </div>
            </div>

            {{-- {!! $orders->links() !!} --}}

        </div>
    </div>
</div>
@endsection