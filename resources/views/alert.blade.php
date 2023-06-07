{{-- Create Message --}}
@if (Session::has('created_message'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <span class="font-medium">{{ session('created_message') }}</span>
    </div>
@endif

{{-- Update Message --}}
@if (Session::has('updated_message'))
    <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
        role="alert">
        <span class="font-medium">{{ session('updated_message') }}</span>
    </div>
@endif

{{-- Delete Message --}}
@if (Session::has('deleted_message'))
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">{{ session('deleted_message') }}</span>
    </div>
@endif
