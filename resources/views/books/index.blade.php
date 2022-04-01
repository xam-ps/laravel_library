<x-app-layout>
    <x-slot name="page_id">
        {{ __('books_page') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Create new book</h3>
                    <form method="POST" action="books" class="add_form">
                        @csrf
                        <input type="text" placeholder="title" name="name">
                        <input type="text" placeholder="author" name="author">
                        <x-button class="ml-3">
                            {{ __('Save book') }}
                        </x-button>
                    </form>

                    <div class="books">
                        @foreach ($books as $book)
                            <a href="{{ route('books.single', ['id' => $book->id]) }}"
                                class="book @if ($book->customer_id != null) not_available @endif">
                                {{ $book->name }}
                                <div style="font-size: 0.7em;">{{ $book->author }}</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
