<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Currency
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">

                <form action="{{ route('currencies.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="code" class="block font-medium text-gray-700">Code</label>
                        <input type="text" name="code" id="code" class="mt-1 block w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="name" class="block font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="buy_value" class="block font-medium text-gray-700">Buy Value</label>
                        <input type="number" step="0.01" name="buy_value" id="buy_value" class="mt-1 block w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="sell_value" class="block font-medium text-gray-700">Sell Value</label>
                        <input type="number" step="0.01" name="sell_value" id="sell_value" class="mt-1 block w-full border-gray-300 rounded" required>
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('currencies.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
