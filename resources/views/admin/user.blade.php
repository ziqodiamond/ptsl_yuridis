<x-layout>
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Manajemen Pengguna</h1>
            <div class="flex space-x-2">
                <button id="addButton" data-modal-target="addModal" data-modal-toggle="addModal"
                    class="flex items-center px-4 py-2 bg-blue-500 rounded-lg text-white text-xs hover:bg-blue-600 transition duration-200 ease-in-out">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Tambah Pengguna
                </button>
            </div>
        </div>

        <x-modal-view id="addModal">
            <!-- Modal content -->
            <div class="bg-white w-full max-w-lg mx-auto rounded-lg shadow-lg p-6 dark:bg-gray-800">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Tambah</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="addModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close Modal</span>
                    </button>
                </div>
                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf
                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                            value="{{ old('name') }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                            value="{{ old('email') }}" required autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Role -->
                    <div class="mb-4">
                        <label for="role"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role</label>
                        <select id="role" name="role"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                            required autocomplete="off">
                            <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                            required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                            Minimal 8 karakter.
                        </p>
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
                            <div class="flex space-x-2 justify-center">
                                <button id="editButton" data-modal-target="editModal{{ $user->id }}"
                                    data-modal-toggle="editModal{{ $user->id }}"
                                    class="flex items-center px-4 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition duration-200 ease-in-out dark:bg-yellow-500 dark:hover:bg-yellow-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0l-8.586 8.586a1 1 0 00-.293.707v2.586a1 1 0 001 1h2.586a1 1 0 00.707-.293l8.586-8.586a2 2 0 000-2.828zM4 13h1v1H4v-1zm2 0h1v1H6v-1zm2 0h1v1H8v-1zm2 0h1v1h-1v-1zm2 0h1v1h-1v-1zm2 0h1v1h-1v-1zm2 0h1v1h-1v-1z" />
                                    </svg>
                                    Edit
                                </button>
                                <x-modal-view id="editModal{{ $user->id }}">
                                    <!-- Modal content -->
                                    <div
                                        class="bg-white w-full max-w-lg mx-auto rounded-lg shadow-lg p-6 dark:bg-gray-800">
                                        <div class="flex justify-between items-center mb-4">
                                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Edit</h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="editModal{{ $user->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414 1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close Modal</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <!-- Name -->
                                            <div class="mb-4">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                                                <input type="text" id="name" name="name"
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                                    value="{{ old('name', $user->name) }}" required>
                                            </div>

                                            <!-- Email -->
                                            <div class="mb-4">
                                                <label for="email"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                                <input type="email" id="email" name="email"
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                                    value="{{ old('email', $user->email) }}" required
                                                    autocomplete="username">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <!-- Role -->
                                            <div class="mb-4">
                                                <label for="role"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role</label>
                                                <select id="role" name="role"
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                                    required autocomplete="off">
                                                    <option value="user"
                                                        {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>
                                                        User
                                                    </option>
                                                    <option value="admin"
                                                        {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>
                                                        Admin
                                                    </option>
                                                </select>
                                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                            </div>

                                            <!-- Password -->
                                            <div class="mb-4">
                                                <label for="password"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                                                <input type="password" id="password" name="password"
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                                    autocomplete="new-password">
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                                    Kosongkan jika tidak ingin mengubah password.
                                                </p>
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

                                <form action="{{ route('admin.user.destroy', $user) }}" method="POST"
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
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-layout>
