<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Rates</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <header class="bg-white shadow mb-6">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-gray-800">Currency Rates</h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Code</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Buy Value</th>
                        <th class="border px-4 py-2">Sell Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($currencies as $currency)
                        <tr>
                            <td class="border px-4 py-2">{{ $currency->code }}</td>
                            <td class="border px-4 py-2">{{ $currency->name }}</td>
                            <td class="border px-4 py-2">{{ $currency->buy_value }}</td>
                            <td class="border px-4 py-2">{{ $currency->sell_value }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </main>

</body>
</html>
