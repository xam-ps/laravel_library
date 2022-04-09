<x-app-layout>
    <x-slot name="page_id">
        {{ __('customer_page') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <h2>
                            {{ $customer->full_name }}
                        </h2>
                
                        <h3>Booklist</h3>
                        <ul>
                            @foreach ($books as $book)
                            <li>
                                    <p>{{ $book->name }}</p>
                                    <form action="{{ route('customers.checkin', ['customerId' => $customer->id, 'bookId' => $book->id]) }}" method="POST">
                                        @csrf
                                        <x-button class="ml-3">
                                            {{ __('Return Book') }}
                                        </x-button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
