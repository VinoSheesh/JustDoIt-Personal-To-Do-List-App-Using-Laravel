@vite('resources/css/app.css')
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<x-app-layout>
<div class="max-w-4xl mx-auto p-6 bg-white">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Daftar Tugas</h1>

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 mb-6">
        <span class="mr-2">+</span>
        Tambah Tugas
    </a>

    <div class="bg-gray-50 rounded-lg p-6">
        @forelse ($tasks as $task)
            <div class="flex items-center justify-between p-4 bg-white rounded-lg shadow-sm border border-gray-200 mb-3 last:mb-0">
                <div class="flex items-center flex-1">
                    <span class="text-gray-700 {{ $task->is_done ? 'line-through text-gray-400' : '' }}">
                        {{ $task->title }}
                    </span>
                </div>
                
                <div class="flex items-center space-x-2 ml-4">
                    <!-- Tombol Tugas Selesai -->
                    @if (!$task->is_done)
                    <form method="POST" action="{{ route('tasks.done', $task->id) }}" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="flex items-center px-3 py-1.5 bg-green-100 hover:bg-green-200 text-green-700 text-sm font-medium rounded-md transition-colors duration-200">
                            <span class="mr-1">✔️</span>
                            Selesai
                        </button>
                    </form>
                    @endif

                    <!-- Edit -->
                    <a href="{{ route('tasks.edit', $task->id) }}" class="flex items-center px-3 py-1.5 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-sm font-medium rounded-md transition-colors duration-200">
                        <span class="mr-1">✏️</span>
                        Edit
                    </a>

                    <!-- Hapus -->
                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-700 text-sm font-medium rounded-md transition-colors duration-200">
                            <span class="mr-1">🗑️</span>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-12">
                <div class="text-gray-400 text-lg mb-2">📝</div>
                <p class="text-gray-500">Belum ada tugas.</p>
            </div>
        @endforelse
    </div>
</div>
</x-app-layout>