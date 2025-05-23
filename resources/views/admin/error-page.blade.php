<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>خطأ - الصفحة غير موجودة</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            direction: rtl;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen bg-white">

    <div class="text-center">
        <h1 class="mb-6 font-bold text-red-600 text-7xl">404</h1>
        <h2 class="mb-4 text-3xl font-semibold text-gray-800">عذرًا! الصفحة غير موجودة</h2>

        {{-- Display the error message if available --}}
        @if (session('error'))
            <p class="mb-6 text-lg text-gray-600">
                {{ session('error') }}
            </p>
        @else
            <p class="mb-6 text-lg text-gray-600">
                الصفحة التي تبحث عنها قد تمت إزالتها أو غير متاحة مؤقتًا.
            </p>
        @endif

        <a href="{{ route('admin.dashboard.index') }}" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
            العودة إلى لوحة التحكم
        </a>
    </div>

</body>
</html>
