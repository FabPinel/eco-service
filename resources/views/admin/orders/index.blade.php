@extends('layout-admin')
@section('title', 'Admin - Orders')
@section('admin-content')
<div class="mt-10">
    <div class="px-4 sm:px-6 lg:px-8 mt-20" x-show="activeTab === 1">
        <div class="sm:items-center">
            <div class="sm:flex">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Commandes</h1>
                <p class="font-bold pl-2 ">({{$totalOrders}})</p>
            </div>
        
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            client
                        </th>
                        <th scope="col" class="px-6 py-3">
                            total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            état
                        </th>
                        <th scope="col" class="px-6 py-3">
                            date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            voir
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($orders as $o)
                        <tr class="bg-white border-b h-28 dark:border-gray-700 cursor-pointer hover:bg-slate-50" onclick="window.location='{{ route('admin.orders.orderDetails', $o->id) }}';">>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <p class="text-lg font-bold">{{ $o->id }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-lg font-bold">{{ $o->user->username }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="w-fit px-2 py-1 text-lg font-semibold rounded-md bg-amber-50 text-amber-500 ring-1 ring-inset ring-amber-600/20">{{ $o->total }}€</p>
                        </td>
                        <form id="statusForm_{{ $o->id }}" action="{{ route('admin.orders.toggle-status', $o->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_status" id="selectedStatusId_{{ $o->id }}" value="{{ $o->status->id }}">
                            <td x-data="{ open: false, selected: ''}" class="px-6 py-4" @click.away="open = false">
                                <p @click="open = !open"
                                    class="w-fit px-4 py-2 flex items-center justify-between rounded-md text-base font-medium ring-1 ring-inset cursor-pointer"
                                    :class="{
                                        'bg-cyan-50 text-cyan-500 ring-cyan-600/20': '{{ $o->status->id }}' === '1',
                                        'bg-emerald-50 text-emerald-500 ring-emerald-600/20': '{{ $o->status->id }}' === '2',
                                        'bg-green-50 text-green-500 ring-green-600/20': '{{ $o->status->id }}' === '3', 
                                        'bg-red-50 text-red-500 ring-red-600/20': '{{ $o->status->id }}' === '4',
                                        'bg-fuchsia-50 text-fuchsia-500 ring-fuchsia-600/20': '{{ $o->status->id }}' === '5',

                                    }">
                                    <span class="max-w-[120px] overflow-hidden" x-text="selected === '' ? '{{ $o->status->status }}' : selected"></span>
                                </p>
                                <div x-show="open" class="absolute mt-2 w-full z-10" x-cloak>
                                    <ul>
                                        @foreach ($status as $s)
                                            <li @click="selected = '{{ $s->status }}'; document.getElementById('selectedStatusId_{{ $o->id }}').value = '{{ $s->id }}'; document.getElementById('statusForm_{{ $o->id }}').submit();"
                                                class="cursor-pointer py-1 text-base list-none">
                                                {{ $s->status }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                            
                        </form>
                        
                        

                        <td class="px-6 py-4">
                            <p class="text-lg font-bold">{{ $o->created_at }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Voir</a>
                        </td>
                    </tr>
                        @endforeach
                        
                  
                    
                </tbody>
            </table>
        </div>
</div>
@endsection

