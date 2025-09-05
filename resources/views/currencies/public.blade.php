<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>أسعار الصرف</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-green-50 font-sans antialiased">

    <!-- Header -->
    <header class="bg-gradient-to-r from-green-700 to-green-500 shadow-lg py-6">
        <div class="max-w-7xl mx-auto text-center">
            <img src="images/logo.png" alt="Logo" class="mx-auto mb-3 max-h-20">
            <h1 class="text-4xl font-extrabold text-white">أسعار الصرف اليوم</h1>
        </div>
    </header>

    <!-- Main Table -->
    <main class="flex justify-center mt-12 px-4">
        <div class="w-full max-w-5xl bg-white shadow-2xl rounded-2xl p-8">
            <h2 class="text-3xl font-bold text-green-800 mb-6 text-center">جدول أسعار الصرف</h2>

            <div class="overflow-x-auto">
                <table id="currency-table" class="min-w-full border-collapse border border-gray-200 text-center">
                    <thead class="bg-gradient-to-r from-green-300 to-green-200 text-green-900">
                        <tr>
                            <th class="border px-6 py-3">الرمز</th>
                            <th class="border px-6 py-3">العملة</th>
                            <th class="border px-6 py-3">سعر الشراء</th>
                            <th class="border px-6 py-3">سعر المبيع</th>
                        </tr>
                    </thead>
                    <tbody id="currency-body">
                        <!-- Rows injected by JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Auto Refresh Script -->
  <!-- Auto Refresh Script -->
<script>
    function fetchCurrencies() {
        axios.get('/api/currencies') // تأكد من وجود route API
            .then(response => {
                const tbody = document.getElementById('currency-body');
                tbody.innerHTML = '';
                response.data.forEach(currency => {
                    tbody.innerHTML += `
                        <tr class="hover:bg-green-50 transition-transform duration-200">
                            <td class="border px-6 py-3 font-semibold">${currency.code}</td>
                            <td class="border px-6 py-3">${currency.name}</td>
                            <td class="border px-6 py-3 text-green-700 font-bold">${parseFloat(currency.buy_value).toFixed(2)}</td>
                            <td class="border px-6 py-3 text-green-700 font-bold">${parseFloat(currency.sell_value).toFixed(2)}</td>
                        </tr>
                    `;
                });
            })
            .catch(console.error);
    }

    // Fetch initially
    fetchCurrencies();

    // تحديث تلقائي كل 5 ثواني
    setInterval(fetchCurrencies, 500);
</script>


</body>
</html>
