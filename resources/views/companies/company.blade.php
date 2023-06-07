@extends('layout.index')

@section('title', 'Company')

@section('content')
    <div class="container w-8/12 mx-auto">
        <h1 class="text-4xl font-bold mt-8 mb-8">Company {{ $company->name }}</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-start bg-white dark:bg-gray-900 p-6">
                <a href="/companies">
                    <i class="fa-solid fa-arrow-left text-white"></i>
                </a>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Company
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $company->id }}
                        </td>
                        <td>
                            <img class="rounded-full w-20 m-2"
                                src="{{ $company->image ? asset('storage/' . $company->image) : asset('/images/user.png') }}"
                                alt="image">
                        </td>
                        <th scope="row" class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <div class="">
                                <div class="text-base font-semibold">{{ $company->name }}</div>
                                <div class="font-normal text-gray-300">{{ $company->email }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $company->description }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $company->created_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
