@extends('layouts.app')

@section('title', 'Data Ticket')
@section('header', '📋 Data Ticket')

@section('content')

<div class="bg-white shadow-lg rounded-xl overflow-hidden">

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Title</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Priority</th>
                <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-100 bg-white">
            @forelse($tickets as $ticket)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                <td class="px-6 py-4">{{ $ticket->title }}</td>

                <td class="px-6 py-4">
                    <span class="px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-700 rounded-full">
                        {{ ucfirst($ticket->priority) }}
                    </span>
                </td>

                <td class="px-6 py-4 text-center space-x-2">
                    <a href="{{ route('tickets.edit', $ticket->id) }}"
                       class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 text-sm rounded-lg">
                        Edit
                    </a>

                    <form action="{{ route('tickets.destroy', $ticket->id) }}"
                          method="POST"
                          class="inline-block"
                          onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 text-sm rounded-lg">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-6 text-gray-500">
                    Belum ada data
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
