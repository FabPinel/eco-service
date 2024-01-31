@extends('layout-admin')
@section('title', 'Admin - DIY')
@section('admin-content')
<div class="md:ml-28 md:mr-8">
    <div class="px-4 sm:px-6 lg:px-8 mt-20" x-show="activeTab === 3">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">DIY</h1>
                <p class="mt-2 text-sm text-gray-700">La liste de tous les diy</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                 <a href="{{ route('admin.diy.create') }}" class="block rounded-md bg-[#1c3242] px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-[#374a56] cursor-pointer focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter un DIY</a>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Id
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Titre</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Description</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 w-12">
                                    <span class="sr-only">Edit</span>
                                </th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 w-12">
                                    <span class="sr-only">Show</span>
                                </th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 w-12">
                                    <span class="sr-only">Delete</span>
                                </th>
                            </tr>
                        </thead>
                        @foreach ($diy as $d)
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">{{ $d->id }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <div class="text-gray-900">{{ $d->title }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <div class="text-gray-900">{{ $d->description }}</div>
                                    </td>
                                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <a href="{{ route('admin.diy.edit', $d->id) }}" class="text-slate-400 hover:text-slate-900">
                                            <span class="material-icons">
                                                edit
                                            </span>
                                        </a>
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-800"><span
                                                class="material-icons">
                                                visibility
                                            </span></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.diy.destroy', $d->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <span class="material-icons">delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
            {{-- {!! $diy->links() !!} --}}
        </div>
    </div>
</div>
@endsection