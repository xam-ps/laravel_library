<x-app-layout>
    <x-slot name="page_id">
        {{ __('customers_page') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Existing customers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Add new customer</h3>
                    <form method="POST" action="customers" class="add_form">
                        <input type="text" placeholder="Firstname" name="firstname">
                        <input type="text" placeholder="Lastname" name="lastname">
                        {{-- <button type="submit">Add customer</button> --}}
                        <x-button class="ml-3">
                            {{ __('Add customer') }}
                        </x-button>
                        @csrf
                    </form>

                    <ul>
                        @foreach ($customers as $customer)
                            <a href="{{ route('customers.show', ['id' => $customer->id]) }}">
                                <li>
                                    {{ $customer->full_name }}
                                </li>
                            </a>
                            <br>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
