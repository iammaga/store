@extends('layout.index')

@section('title', 'Marketplaces')

@section('content')
    <div class="container w-8/12 mx-auto">
        <h1 class="text-4xl font-bold mt-8 mb-8">Companies</h1>
        @include('alert')
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
            <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900 p-4">
                <a href="{{ route('company-create') }}">
                    <button type="button"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create
                        Company</button>
                </a>

                <form action="{{ route('companies') }}">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search-users" name="name"
                            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for users">
                    </div>
                </form>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
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
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $company->id }}
                            </td>
                            <td class="w-20 m-2 h-full">
                                <div class="flex">
                                    <img src="{{ $company->image ? asset('storage/' . $company->image) : asset('/images/user.png') }}"
                                        alt="company" class="w-20 rounded-full  ml-2 my-2">
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                <a href="/companies/{{ $company->id }}">
                                    <div>
                                        <div class="text-base font-semibold">{{ $company->name }}</div>
                                        <div class="font-normal text-gray-300">{{ $company->email }}</div>
                                    </div>
                                </a>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $company->description }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $company->created_at }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="/companies/{{ $company->id }}/edit" class="px-1"><i
                                        class="fa-solid fa-pen-to-square font-medium text-blue-600 dark:text-blue-500 hover:underline"></i>
                                </a>
                                <a href="/companies/{{ $company->id }}/delete"><i
                                        class="fa-solid fa-trash-can font-medium text-red-500 dark:text-red-500 hover:underline"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="mt-4">{{ $companies->links() }}</p>
    </div>
@endsection
