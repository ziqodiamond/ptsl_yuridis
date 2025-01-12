<x-layout>
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Manajemen Berkas</h1>
            <div class="flex space-x-2">
                <a href="{{ route('berkas') }}"
                    class="flex items-center px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-md">
                    <svg class="w-6 h-6 mr-2 text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>Tambah Berkas</span>
                </a>
                <button id="cetakButton" data-modal-target="cetakModal" data-modal-toggle="cetakModal"
                    class="flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 transition duration-200 ease-in-out dark:bg-yellow-500 dark:hover:bg-yellow-600">

                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M8 3a2 2 0 0 0-2 2v3h12V5a2 2 0 0 0-2-2H8Zm-3 7a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h1v-4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4h1a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H5Zm4 11a1 1 0 0 1-1-1v-4h8v4a1 1 0 0 1-1 1H9Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2"> Cetak Laporan</span>

                </button>
            </div>
        </div>

        <x-modal-view id="cetakModal">
            <div class="bg-white w-full max-w-lg mx-auto rounded-lg shadow-lg p-6 dark:bg-gray-800">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Cetak Laporan Berkas</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="cetakModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close Modal</span>
                    </button>
                </div>

                <form action="{{ route('admin.berkas.cetak') }}" method="POST">
                    @csrf
                    <!-- Bulan -->
                    <div class="mb-4">
                        <label for="bulan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih
                            Bulan</label>
                        <select name="bulan" id="bulan"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                            required>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>

                    <!-- Tahun -->
                    <div class="mb-4">
                        <label for="tahun" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih
                            Tahun</label>
                        <select name="tahun" id="tahun"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                            required>
                            @for ($i = 2020; $i <= date('Y'); $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-500">
                            Cetak Laporan
                        </button>
                    </div>
                </form>
            </div>
        </x-modal-view>


        <div class="mb-4">
            <form action="{{ route('admin.berkas') }}" method="GET" class="flex w-full">
                <input type="text" name="search" placeholder="Cari berdasarkan nama, nik, alamat, dll."
                    class="flex-grow px-4 py-2 border border-gray-300 rounded-md" value="{{ request('search') }}">
                <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-md">Cari</button>
            </form>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border bg-gray-50 border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">No Berkas</th>
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
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $item->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->nama }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->nik }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->alamat }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->nomer_hak }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->luas_tanah }} m²</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->tanggal_pengajuan }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->user->name ?? 'tidak ditemukan' }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <div class="flex space-x-2 justify-center">
                                    <button id="editButton" data-modal-target="editModal{{ $item->id }}"
                                        data-modal-toggle="editModal{{ $item->id }}"
                                        class="flex items-center px-4 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition duration-200 ease-in-out dark:bg-yellow-500 dark:hover:bg-yellow-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0l-8.586 8.586a1 1 0 00-.293.707v2.586a1 1 0 001 1h2.586a1 1 0 00.707-.293l8.586-8.586a2 2 0 000-2.828zM4 13h1v1H4v-1zm2 0h1v1H6v-1zm2 0h1v1H8v-1zm2 0h1v1h-1v-1zm2 0h1v1h-1v-1zm2 0h1v1h-1v-1zm2 0h1v1h-1v-1z" />
                                        </svg>
                                        Edit
                                    </button>
                                    <x-modal-view id="editModal{{ $item->id }}">
                                        <div
                                            class="bg-white w-full max-w-lg mx-auto rounded-lg shadow-lg p-6 dark:bg-gray-800">
                                            <div class="flex justify-between items-center mb-4">
                                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Edit Berkas
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="editModal{{ $item->id }}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close Modal</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.berkas.update', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')

                                                <!-- Nama -->
                                                <div class="mb-4">
                                                    <label for="nama"
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                                                    <input type="text" id="nama" name="nama"
                                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                                        value="{{ old('nama', $item->nama) }}" required>
                                                </div>

                                                <!-- NIK -->
                                                <div class="mb-4">
                                                    <label for="nik"
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIK</label>
                                                    <input type="text" id="nik" name="nik"
                                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                                        value="{{ old('nik', $item->nik) }}" required>
                                                </div>

                                                <!-- Alamat -->
                                                <div class="mb-4">
                                                    <label for="alamat"
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                                                    <textarea id="alamat" name="alamat"
                                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                                        required>{{ old('alamat', $item->alamat) }}</textarea>
                                                </div>

                                                <!-- Nomor Hak -->
                                                <div class="mb-4">
                                                    <label for="nomer_hak"
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor
                                                        Hak</label>
                                                    <input type="text" id="nomer_hak" name="nomer_hak"
                                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                                        value="{{ old('nomer_hak', $item->nomer_hak) }}" required>
                                                </div>

                                                <!-- Luas Tanah -->
                                                <div class="mb-4">
                                                    <label for="luas_tanah"
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Luas
                                                        Tanah</label>
                                                    <input type="number" id="luas_tanah" name="luas_tanah"
                                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                                        value="{{ old('luas_tanah', $item->luas_tanah) }}" required>
                                                </div>

                                                <!-- Tanggal Pengajuan -->
                                                <div class="mb-4">
                                                    <label for="tanggal_pengajuan"
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                                        Pengajuan</label>
                                                    <input type="date" id="tanggal_pengajuan"
                                                        name="tanggal_pengajuan"
                                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                                        value="{{ old('tanggal_pengajuan', $item->tanggal_pengajuan) }}"
                                                        required>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="flex justify-end">
                                                    <button type="submit"
                                                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-500">
                                                        SIMPAN
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </x-modal-view>

                                    <form action="{{ route('admin.berkas.destroy', $item) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200 ease-in-out ">
                                            <svg class="w-6 h-6 text-white mr-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $berkas->links() }}
        </div>
    </div>
</x-layout>
