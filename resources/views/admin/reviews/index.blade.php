@extends('layout-admin')
@section('pageTitle', 'Admin - Avis')
@section('admin-content')
    <div x-data="{ reviews: [], submitForm() {
        const url = `{{ route('admin.avis.destroy', ':ids') }}`.replace(':ids', this.reviews.join(','));
        this.$refs.form.action = url;
        this.$refs.form.submit();
        }}"
        class="flex h-full mt-24 bg-white p-4 flex-col border-x border-stroke dark:border-strokedark">
        <div class="sm:flex items-center mb-2">
            <p class="font-bold pr-2 ">({{ $totalReviews }})</p>
            <h1 class="text-base font-semibold leading-6 text-gray-900">Avis</h1>
            <div class="flex items-center gap-4 p-4">

                <form x-ref="form" @submit.prevent="submitForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="flex" type="submit">
                        <p x-text="reviews.length" class="text-red-500 font-semibold mr-1"></p>
                        <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="white"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="h-full">

            <table class="h-full w-full table-auto">
                <thead>
                    <tr class="flex border-y border-stroke dark:border-strokedark bg-slate-100">
                        <th class="w-2/12 py-6 pl-4 pr-4 lg:pl-10">
                            <label for="checkbox-1" class="flex cursor-pointer select-none items-center font-medium">
                                Nom Prénom
                            </label>
                        </th>
                        <th class="hidden w-1/12 px-4 py-6 xl:block">
                            <p class="text-center font-medium">Note</p>
                        </th>
                        <th class="w-4/12 py-6 pl-4 pr-4 lg:pr-10">
                            <p class="text-center font-medium">Message</p>
                        </th>
                        <th class="w-1/12 py-6 pl-4 pr-4 lg:pr-10">
                            <p class="text-center font-medium">Commande</p>
                        </th>
                        <th class="w-2/12 py-6 pl-4 pr-4 lg:pr-10">
                            <p class="text-center font-medium">Produit</p>
                        </th>
                        <th class="w-1/12 py-6 pl-4 pr-4 lg:pr-10">
                            <p class="text-center font-medium">Date</p>
                        </th>
                        <th class="w-1/12 py-6 pl-4 pr-4 lg:pr-10">
                            <p class="text-center font-medium"></p>
                        </th>
                    </tr>
                </thead>
                <tbody class="block h-full max-h-full">
                    @foreach ($reviews as $review)
                        <tr class="flex cursor-pointer items-center text-slate-600 dark:hover:bg-boxdark-2 hover:bg-slate-100">
                            <td class="w-2/12 py-6 pl-4 pr-4 lg:pl-10">
                                <label for="checkbox-1" class="flex cursor-pointer select-none items-center font-medium">
                                    <input type="checkbox"
                                        value={{$review->id}} x-model="reviews" class="box mr-4 flex h-5 w-5 items-center bg-white justify-center rounded-[3px] border-[.5px] border-stroke bg-gray-2  dark:border-strokedark dark:bg-boxdark-2">
                                    {{ $review->user->first_name }} {{ $review->user->last_name }}
                                </label>
                            </td>
                            <td class="hidden w-1/12 p-4 xl:block">
                                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                        @for ($i = 0; $i < 5; $i++)
                                            <svg
                                                class="w-4 h-4 {{ $i < $review->rating ? 'text-[#e88229]' : 'text-gray-900' }} me-1"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 22 20">
                                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                            </svg>
                                        @endfor
                                    </div>
                            </td>
                            <td class="w-4/12 py-4 pl-4 pr-4 lg:pr-10">
                                <p class="text-center text-xs xl:text-base">
                                    {{ Str::limit($review->comment, $limit = 260, $end = '...') }}
                                </p>
                            </td>

                            <td class="w-1/12 py-4 pl-4 pr-4 lg:pr-10">
                                <p class="text-center text-xs xl:text-base">
                                    @if ($review->order)
                                    <a href="{{ route('admin.orders.orderDetails', $review->order->id) }}" class="underline hover:text-[#1c3242] hover:font-semibold">#{{ $review->order->id }}</a>
                                @endif
                                </p>
                            </td>
                            <td class="w-2/12 py-4 pl-4 pr-4 lg:pr-10">
                                <p class="text-center text-xs xl:text-base">
                                    @if ($review->product)
                                        <a href="#">{{ $review->product->name }}</a>
                                    @else
                                    @endif
                                </p>
                            </td>
                            <td class="w-1/12 py-4 pl-4 pr-4 lg:pr-10">
                                <p class="text-center text-xs xl:text-base">
                                    {{ $review->created_at->format('j F Y') }}
                                </p>
                            </td>
                            <td class="w-1/12 py-4 pl-4 pr-4 lg:pr-10 text-center">
                                <form action="{{ route('admin.avis.destroy', $review->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <span class="material-icons">delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {!! $reviews->links() !!}
    </div>
    @if ($reviewessage = Session::get('success'))
        <div id="successMessage"
            class="hidden md:flex fixed top-28 right-4 w-1/3 border-l-8 border-[#34D399] bg-[#CBF5E6] px-7 py-8 shadow-md">
            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#34D399]">
                <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.2984 0.826822L15.2868 0.811827L15.2741 0.797751C14.9173 0.401867 14.3238 0.400754 13.9657 0.794406L5.91888 9.45376L2.05667 5.2868C1.69856 4.89287 1.10487 4.89389 0.747996 5.28987C0.417335 5.65675 0.417335 6.22337 0.747996 6.59026L0.747959 6.59029L0.752701 6.59541L4.86742 11.0348C5.14445 11.3405 5.52858 11.5 5.89581 11.5C6.29242 11.5 6.65178 11.3355 6.92401 11.035L15.2162 2.11161C15.5833 1.74452 15.576 1.18615 15.2984 0.826822Z"
                        fill="white" stroke="white"></path>
                </svg>
            </div>
            <div class="mt-4 text-center">
                <h5 class="mb-2 text-lg font-bold text-[#34D399]">
                   Message réponse
                </h5>
                <p class="text-sm leading-relaxed text-[#34D399]">
                   {{ $reviewessage }}
                </p>
            </div>
        </div>
        <div id="successMessage"
            class="flex md:hidden fixed top-28 ml-2 mr-2 w-full border-l-8 border-[#34D399] bg-[#CBF5E6] px-2 py-3 shadow-md">
            <div class="mr-3 flex h-8 w-8 items-center justify-center rounded-lg bg-[#34D399]">
                <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.2984 0.826822L15.2868 0.811827L15.2741 0.797751C14.9173 0.401867 14.3238 0.400754 13.9657 0.794406L5.91888 9.45376L2.05667 5.2868C1.69856 4.89287 1.10487 4.89389 0.747996 5.28987C0.417335 5.65675 0.417335 6.22337 0.747996 6.59026L0.747959 6.59029L0.752701 6.59541L4.86742 11.0348C5.14445 11.3405 5.52858 11.5 5.89581 11.5C6.29242 11.5 6.65178 11.3355 6.92401 11.035L15.2162 2.11161C15.5833 1.74452 15.576 1.18615 15.2984 0.826822Z"
                        fill="white" stroke="white"></path>
                </svg>
            </div>
            <div class="w-full">
                <h5 class="mb-2 text-lg font-bold text-[#34D399]">
                   Message réponse
                </h5>
                <p class="text-sm leading-relaxed text-[#34D399]">
                   {{ $reviewessage }}
                </p>
            </div>
        </div>
    @endif
@endsection
