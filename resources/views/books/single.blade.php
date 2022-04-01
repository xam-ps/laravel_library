<x-app-layout>
    <x-slot name="page_id">
        {{ __('book_page') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $book->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>{{ $book->name }}</h2>
                    <h3>{{ $book->author }}</h3>
                    <br>

                    @if ($book->customer_id == null)
                        <form action="{{ route('customers.checkout', ['bookId' => $book->id]) }}" method="POST"
                            class="book">
                            @csrf
                            Checkout Book to
                            <select name="customer">
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                                @endforeach
                            </select>
                            <x-button class="ml-3">
                                {{ __('Checkout') }}
                            </x-button>
                        </form>
                    @endif


                    <br>
                    <form action="{{ route('books.delete', ['id' => $book->id]) }}" method="POST"
                        class="book"
                        onSubmit="return confirm('Are you sure you want to delete &quot;{{ $book->name }}&quot;?');">
                        @method('DELETE')
                        @csrf
                        <x-button class="ml-3">
                            {{ __('Delete Book') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
