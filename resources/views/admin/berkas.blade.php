<x-layout>
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Manajemen Berkas</h1>
            <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-md">Tambah Berkas</a>
        </div>
        <div class="mb-4">
            <form action="{{ route('admin.berkas') }}" method="GET" class="flex w-full">
                <input type="text" name="search" placeholder="Cari berdasarkan nama, nik, alamat, dll."
                    class="flex-grow px-4 py-2 border border-gray-300 rounded-md" value="{{ request('search') }}">
                <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-md">Cari</button>
            </form>
        </div>
        <table class="w-full border-collapse border bg-gray-50 border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                    <th class="border border-gray-300 px-4 py-2">NIK</th>
                    <th class="border border-gray-300 px-4 py-2">Alamat</th>
                    <th class="border border-gray-300 px-4 py-2">Nomer Hak</th>
                    <th class="border border-gray-300 px-4 py-2">Luas Tanah</th>
                    <th class="border border-gray-300 px-4 py-2">Tanggal Pengajuan</th>
                    <th class="border border-gray-300 px-4 py-2">Akun</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($berkas as $item)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->nama }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->nik }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->alamat }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->nomer_hak }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->luas_tanah }} m²</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->tanggal_pengajuan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('admin.berkas.edit', $item) }}"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md">Edit</a>
                            <form action="{{ route('admin.berkas.destroy', $item) }}" method="POST" class="inline">
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
            {{ $berkas->links() }}
        </div>
    </div>
</x-layout>
