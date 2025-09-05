<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شركة الصرافة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container text-center py-5">
        <!-- Logo -->
        <div class="mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" style="max-height: 100px;">
        </div>

        <!-- Title -->
        <h2 class="mb-4">أسعار الصرف اليوم</h2>

        <!-- Currency Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped shadow">
                <thead class="table-dark">
                    <tr>
                        <th>العملة</th>
                        <th>الرمز</th>
                        <th>سعر الشراء</th>
                        <th>سعر المبيع</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($currencies as $currency)
                        <tr>
                            <td>{{ $currency->name }}</td>
                            <td>{{ $currency->code }}</td>
                            <td>{{ number_format($currency->buy_value, 2) }}</td>
                            <td>{{ number_format($currency->sell_value, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
