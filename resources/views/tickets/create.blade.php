@extends('layouts.app')

@section('title', 'Tambah Ticket')
@section('header', '➕ Tambah Ticket')

@section('content')

<div class="max-w-2xl bg-white shadow-xl rounded-2xl p-8">

<form action="{{ route('tickets.store') }}" method="POST" class="space-y-6">
    @csrf

    <div>
        <label class="block text-sm font-semibold mb-2">Judul</label>
        <input type="text" name="title"
               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block text-sm font-semibold mb-2">Deskripsi</label>
        <textarea name="description"
                  class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
    </div>

    <div>
        <label class="block text-sm font-semibold mb-2">Priority</label>
        <select name="priority"
                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">
        Simpan
    </button>

</form>

</div>

@endsection
