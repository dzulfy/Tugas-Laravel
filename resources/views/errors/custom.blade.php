<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Ditolak</title>

    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center">

    <div class="bg-white p-10 rounded-xl text-center shadow-lg">

        <div class="text-6xl font-bold text-red-600">
            403
        </div>

        <h2 class="text-2xl font-semibold text-gray-800 mt-3">
            Akses Ditolak
        </h2>

        <p class="text-gray-600 mt-2">
            Maaf, Anda tidak memiliki hak akses
            untuk membuka halaman ini.
        </p>

        <a href="{{ url('/dashboard') }}"
           class="inline-block mt-5 px-5 py-2.5 bg-blue-600 text-white
                  font-medium rounded-md hover:bg-blue-700
                  transition duration-200">
            Kembali ke Dashboard
        </a>

    </div>

</body>
</html>
