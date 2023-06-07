@extends('layout.index')

@section('title', 'Product')

@section('content')
    <div class="container w-8/12 mx-auto">
        <h1 class="text-4xl font-bold mt-8 mb-8">Product {{ $product->name }}</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-start bg-white dark:bg-gray-900 p-6">
                <a href="/marketplaces">
                    <i class="fa-solid fa-arrow-left text-white"></i>
                </a>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Company
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $product->id }}
                        </td>
                        <td>
                            <img class="rounded-full w-20 m-2"
                                src="{{ $product->image ? asset('storage/' . $product->image) : asset('/images/user.png') }}"
                                alt="image">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <div>
                                <div class="text-base font-semibold">{{ $product->name }}</div>
                                <div class="font-normal text-gray-300">{{ $product->email }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $product->company->name }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            ${{ $product->price }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
