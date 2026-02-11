<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Ticket</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-2xl bg-white shadow-xl rounded-2xl p-8">

        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">✏️ Edit Ticket</h1>
            <p class="text-gray-500 mt-1">Perbarui data ticket di bawah ini.</p>
        </div>

        <!-- Error Validation -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Judul Ticket
                </label>
                <input type="text"
                       name="title"
                       value="{{ old('title', $ticket->title) }}"
                       class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi
                </label>
                <textarea name="description"
                          rows="4"
                          class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('description', $ticket->description) }}</textarea>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Status
                </label>
                <select name="status"
                        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <!-- Priority -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Priority
                </label>
                <select name="priority"
                        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="low" {{ $ticket->priority == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ $ticket->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ $ticket->priority == 'high' ? 'selected' : '' }}>High</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center pt-4">

                <a href="{{ route('tickets.index') }}"
                   class="text-gray-600 hover:text-gray-800 font-medium">
                    ← Kembali
                </a>

                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow-md transition">
                    Update Ticket
                </button>
            </div>

        </form>

    </div>

</body>
</html>
