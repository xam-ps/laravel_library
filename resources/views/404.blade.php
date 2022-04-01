<x-guest-layout>
    <x-slot name="page_id">
        {{ __('404') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('404 not found') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>404 | Page not found</h2>
                    <div style="margin-top: 20px; text-align: center;">
                        <a href="{{ route('books.index') }}">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
