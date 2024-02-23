@extends('layout-admin')
@section('title', 'Admin - Orders')
@section('admin-content')
    <div class="mt-10 rounded-sm border border-stroke bg-white shadow-default">
        <div class="px-4 sm:px-6 lg:px-8 mt-20">
            <div class="sm:items-center">
                <div class="sm:flex">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Commandes</h1>
                    <p class="font-bold pl-2 ">({{ $totalOrders }})</p>
                </div>

            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class=" border-b border-stroke py-3.5 pl-5 pr-6 uppercase bg-slate-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-medium text-black">
                                id
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium text-black">
                                client
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium text-black">
                                total
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium text-black">
                                état
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium text-black">
                                date
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium text-black">
                                voir
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $o)
                            <tr class="bg-white border-b h-8 dark:border-gray-700 cursor-pointer hover:bg-slate-50">

                                <td class="border-b border-stroke py-3.5 pl-5 pr-6"
                                    onclick="window.location='{{ route('admin.orders.orderDetails', $o->id) }}';">
                                    <p class="text-base font-bold">{{ $o->id }}</p>
                                </td>
                                <td class="border-b border-stroke py-3.5 pl-5 pr-6"
                                    onclick="window.location='{{ route('admin.orders.orderDetails', $o->id) }}';">
                                    <p class="text-base font-bold">{{ $o->user->username }}</p>
                                </td>
                                <td class="border-b border-stroke py-3.5 pl-5 pr-6">
                                    <p
                                        class="w-fit px-2 py-1 text-base font-semibold rounded-md bg-amber-50 text-amber-500 ring-1 ring-inset ring-amber-600/20">
                                        {{ $o->total }}€</p>
                                </td>
                                <form id="statusForm_{{ $o->id }}"
                                    action="{{ route('admin.orders.toggle-status', $o->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_status" id="selectedStatusId_{{ $o->id }}"
                                        value="{{ $o->status->id }}">
                                    <td x-data="{ open: false, selected: '' }" class="border-b border-stroke py-3.5 pl-5 pr-6"
                                        @click.away="open = false">
                                        <p @click="open = !open"
                                            class="w-fit px-4 py-2 flex items-center justify-between rounded-md text-base font-medium ring-1 ring-inset cursor-pointer"
                                            :class="{
                                                'bg-cyan-50 text-cyan-500 ring-cyan-600/20': '{{ $o->status->id }}'
                                                === '1',
                                                'bg-orange-50 text-orange-500 ring-rose-600/20': '{{ $o->status->id }}'
                                                === '2',
                                                'bg-green-50 text-green-500 ring-green-600/20': '{{ $o->status->id }}'
                                                === '3',
                                                'bg-red-50 text-red-500 ring-red-600/20': '{{ $o->status->id }}'
                                                === '4',
                                                'bg-fuchsia-50 text-fuchsia-500 ring-fuchsia-600/20': '{{ $o->status->id }}'
                                                === '5',
                                            }">
                                            <span class="max-w-[120px] overflow-hidden"
                                                x-text="selected === '' ? '{{ $o->status->status }}' : selected"></span>
                                        </p>
                                        <div x-show="open" class="absolute w-full z-10" x-cloak>
                                            <ul class="w-fit border border-slate-400">
                                                @foreach ($status as $s)
                                                    <li @click="selected = '{{ $s->status }}'; document.getElementById('selectedStatusId_{{ $o->id }}').value = '{{ $s->id }}'; document.getElementById('statusForm_{{ $o->id }}').submit();"
                                                        class="cursor-pointer w-full text-base px-4 py-1 bg-slate-100 text-black list-none hover:bg-white">
                                                        {{ $s->status }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </td>
                                </form>
                                <td class="border-b border-stroke py-3.5 pl-5 pr-6"
                                    onclick="window.location='{{ route('admin.orders.orderDetails', $o->id) }}';">
                                    <p class="text-base font-bold">{{ $o->created_at->format('d/m/Y') }}</p>
                                </td>
                                <td class="border-b border-stroke py-3.5 pl-5 pr-6">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Voir</a>
                                </td>
                            </tr>
                        @endforeach




                    </tbody>
                </table>
                {!! $orders->links() !!}

            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div id="successMessage"
            class="fixed top-20 right-4 w-1/3 flex border-l-8  border-[#34D399] bg-[#34D399] bg-opacity-40 px-7 py-8 shadow-md md:p-9">
            <div class="mr-5 flex h-9 w-full max-w-[36px] items-center justify-center rounded-lg bg-[#34D399]">
                <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.2984 0.826822L15.2868 0.811827L15.2741 0.797751C14.9173 0.401867 14.3238 0.400754 13.9657 0.794406L5.91888 9.45376L2.05667 5.2868C1.69856 4.89287 1.10487 4.89389 0.747996 5.28987C0.417335 5.65675 0.417335 6.22337 0.747996 6.59026L0.747959 6.59029L0.752701 6.59541L4.86742 11.0348C5.14445 11.3405 5.52858 11.5 5.89581 11.5C6.29242 11.5 6.65178 11.3355 6.92401 11.035L15.2162 2.11161C15.5833 1.74452 15.576 1.18615 15.2984 0.826822Z"
                        fill="white" stroke="white"></path>
                </svg>
            </div>
            <div class="w-full">
                <h5 class="mb-3 text-lg font-bold text-black dark:text-[#34D399]">
                    Connexion réussie
                </h5>
                <p class="text-base leading-relaxed text-body">
                    {{ $message }}
                </p>
            </div>
        </div>
    @endif
@endsection
