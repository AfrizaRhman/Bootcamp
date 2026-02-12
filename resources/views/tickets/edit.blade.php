@extends('layouts.app')

@section('title', 'Edit Ticket')
@section('header', '✏️ Edit Ticket')

@section('content')

<div class="max-w-2xl bg-white shadow-xl rounded-2xl p-8">

<form action="{{ route('tickets.update',$ticket->id) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-sm font-semibold mb-2">Judul</label>
        <input type="text" name="title"
               value="{{ $ticket->title }}"
               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block text-sm font-semibold mb-2">Deskripsi</label>
        <textarea name="description"
                  class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">{{ $ticket->description }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-semibold mb-2">Priority</label>
        <select name="priority"
                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
            <option value="low" {{ $ticket->priority == 'low' ? 'selected' : '' }}>Low</option>
            <option value="medium" {{ $ticket->priority == 'medium' ? 'selected' : '' }}>Medium</option>
            <option value="high" {{ $ticket->priority == 'high' ? 'selected' : '' }}>High</option>
        </select>
    </div>

    <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">
        Update
    </button>

</form>

</div>

@endsection
