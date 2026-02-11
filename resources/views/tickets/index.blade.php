<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Ticket</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="max-w-6xl mx-auto py-10 px-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">🎫 Data Ticket</h1>

            <a href="{{ route('tickets.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow transition">
                + Tambah Ticket
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Card -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Title</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Priority</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse($tickets as $ticket)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $ticket->title }}
                            </td>

                            <!-- STATUS BADGE -->
                            <td class="px-6 py-4 text-sm">
                                @if($ticket->status == 'open')
                                    <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                        Open
                                    </span>
                                @elseif($ticket->status == 'pending')
                                    <span class="px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full">
                                        Pending
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">
                                        Closed
                                    </span>
                                @endif
                            </td>

                            <!-- PRIORITY BADGE -->
                            <td class="px-6 py-4 text-sm">
                                @if($ticket->priority == 'high')
                                    <span class="px-3 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">
                                        High
                                    </span>
                                @elseif($ticket->priority == 'medium')
                                    <span class="px-3 py-1 text-xs font-semibold bg-orange-100 text-orange-700 rounded-full">
                                        Medium
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-700 rounded-full">
                                        Low
                                    </span>
                                @endif
                            </td>

                            <!-- ACTION BUTTONS -->
                            <td class="px-6 py-4 text-center space-x-2">

                                <a href="{{ route('tickets.edit', $ticket->id) }}"
                                   class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 text-sm rounded-lg shadow transition">
                                    Edit
                                </a>

                                <form action="{{ route('tickets.destroy', $ticket->id) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Yakin ingin hapus ticket ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 text-sm rounded-lg shadow transition">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-8 text-gray-500">
                                Belum ada data ticket 🚫
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</body>
</html>
