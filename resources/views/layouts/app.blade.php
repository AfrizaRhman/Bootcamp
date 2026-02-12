<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('warning'))
<script>
    Swal.fire({
        icon: 'warning',
        title: 'Akses Ditolak',
        text: "{{ session('warning') }}",
        confirmButtonColor: '#f59e0b'
    })
</script>
@endif

</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- ================= SIDEBAR ================= -->
        <aside class="w-64 bg-white text-gray flex flex-col">

            <div class="p-6 text-2xl font-bold border-b border-gray-700">
                🎫 Ticket App
            </div>

            <nav class="flex-1 p-4 space-y-2">

                <a href="{{ route('tickets.index') }}"
                    class="block px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                    📋 Data Ticket
                </a>

                <a href="{{ route('tickets.create') }}"
                    class="block px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                    ➕ Tambah Ticket
                </a>

            </nav>

            <div class="p-4 border-t border-gray-700 text-sm text-black-400">
                © {{ date('Y') }} Ticket System
            </div>
        </aside>


        <!-- ================= MAIN CONTENT ================= -->
        <div class="flex-1 flex flex-col">

            <!-- NAVBAR -->
            <nav class="bg-white shadow-md px-6 py-4">
                <div class="flex items-center justify-between">

                    <!-- LEFT SIDE (Logo / Title) -->
                    <div class="flex items-center gap-3">
                        <span class="text-xl font-bold text-gray-800">
                            🎫 Ticketing System
                        </span>
                    </div>

                    <!-- RIGHT SIDE (User & Logout) -->
                    <div class="flex items-center gap-4">

                        <!-- User Info -->
                        <div class="flex items-center gap-3 bg-gray-50 px-3 py-2 rounded-lg">

                            <!-- Avatar -->
                            <div class="w-9 h-9 flex items-center justify-center 
                            bg-blue-100 text-blue-600 
                            rounded-full font-semibold">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>

                            <!-- Username -->
                            <span class="text-gray-700 text-sm font-medium">
                                {{ auth()->user()->name }}
                            </span>
                        </div>

                        <!-- Logout -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 
                           text-white px-4 py-2 
                           rounded-lg text-sm 
                           shadow-sm transition duration-200">
                                Logout
                            </button>
                        </form>

                    </div>

                </div>
            </nav>

            <!-- CONTENT -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>

        </div>

    </div>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ addslashes(session('success')) }}",
            confirmButtonColor: '#2563eb'
        });
    </script>
    @endif

</body>

</html>