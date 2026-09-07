<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Dashboard - POS Barokah Mart</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-sm">
        <h1 class="text-2xl font-semibold mb-4">Dashboard POS Barokah Mart</h1>
        <p class="text-gray-700 mb-4">Selamat datang, {{ Auth::user()->name ?? 'Pengguna' }}! Anda login sebagai <strong>{{ Auth::user()->role ?? '-' }}</strong>.</p>
        
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md">Logout</button>
        </form>
    </div>
</body>
</html>