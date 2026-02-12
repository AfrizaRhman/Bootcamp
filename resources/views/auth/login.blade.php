<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8">

    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">🔐 Login</h1>
        <p class="text-gray-500">Masuk ke sistem ticket</p>
    </div>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-300 text-red-700 p-3 rounded-lg">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-semibold mb-2">Email</label>
            <input type="email" name="email"
                   value="{{ old('email') }}"
                   class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Password</label>
            <input type="password" name="password"
                   class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg shadow transition">
            Login
        </button>
    </form>

</div>

</body>
</html>
