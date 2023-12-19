@extends('layout-admin')
@section('admin-content')

<div x-data="{ activeTab: 1 }" class="md:ml-28 md:mr-8">
    <ul class="flex justify-center space-x-4 mt-20">
        <li x-on:click="activeTab = 1" :class="{ 'bg-[#D8A48F] text-white shadow-md cursor-pointer': activeTab === 1, 'bg-white text-black shadow-md cursor-pointer': activeTab !== 1 }" class="hover:bg-[#E4C8AF] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full sm:w-auto px-5 py-2.5 text-center">
            Produits
        </li>
        <li x-on:click="activeTab = 2" :class="{ 'bg-[#D8A48F] text-white shadow-md cursor-pointer': activeTab === 2, 'bg-white text-black shadow-md cursor-pointer': activeTab !== 2 }" class="hover:bg-[#E4C8AF] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full sm:w-auto px-5 py-2.5 text-center">
            Catégories
        </li>
    </ul>
    <div class="px-4 sm:px-6 lg:px-8 mt-20" x-show="activeTab === 1">
        <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Produits</h1>
            <p class="mt-2 text-sm text-gray-700">La liste de tous les produits</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="/admin/products/create" class="block rounded-md bg-[#D8A48F] px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-[#E4C8AF] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter un produit</a>
        </div>
        </div>
        <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <table class="min-w-full divide-y divide-gray-300">
                <thead>
                <tr>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Id</th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Nom</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Prix</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Promo</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Statut</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                    <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                <tr>
                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                        <div class="flex items-center">
                        <div class="ml-4">
                            <div class="font-medium text-gray-900">1</div>
                        </div>
                        </div>
                    </td>
                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                    <div class="flex items-center">
                        <div class="h-11 w-11 flex-shrink-0">
                        <img class="h-11 w-11 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="ml-4">
                        <div class="font-medium text-gray-900">Bicarbonate</div>  
                        </div>
                    </div>
                    </td>
                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                    <div class="text-gray-900">10 €</div>
                    </td>
                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                    <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>
                    </td>
                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>
                    </td>
                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a>
                    </td>
                </tr>
    
                <!-- More people... -->
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
  @endsection