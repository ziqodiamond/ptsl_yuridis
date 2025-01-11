<x-layout>
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Manajemen Pengguna</h1>
            <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-md">Tambah Pengguna</a>
        </div>
        <div class="mb-4">
            <form action="{{ route('admin.user') }}" method="GET" class="flex">
                <input type="text" name="search" placeholder="Cari pengguna..."
                    class="flex-grow px-4 py-2 border border-gray-300 rounded-md" value="{{ request('search') }}">
                <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-md">Cari</button>
            </form>
        </div>
        <table class="w-full border-collapse border bg-gray-50 border-gray-300">
            <thead class="">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Role</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->role }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('admin.user.edit', $user) }}"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md">Edit</a>
                            <form action="{{ route('admin.user.destroy', $user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-layout>
