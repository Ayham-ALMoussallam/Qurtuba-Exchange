<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Currencies Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <a href="{{ route('currencies.create') }}" class="px-4 py-2 bg-green-600 text-white rounded mb-3 inline-block hover:bg-green-700 transition-colors duration-150">Add Currency</a>

                    @if(session('success'))
                        <div class="mb-3 p-2 bg-green-200 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Code</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Buy Value</th>
                                <th class="border px-4 py-2">Sell Value</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($currencies as $currency)
                                <tr>
                                    <td class="border px-4 py-2">{{ $currency->code }}</td>
                                    <td class="border px-4 py-2">{{ $currency->name }}</td>
                                    <td class="border px-4 py-2">{{ $currency->buy_value }}</td>
                                    <td class="border px-4 py-2">{{ $currency->sell_value }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('currencies.edit', $currency) }}" class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</a>
                                        <form action="{{ route('currencies.destroy', $currency) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Delete this currency?')" class="px-2 py-1 bg-red-600 text-white rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
