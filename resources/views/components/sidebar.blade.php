<div>
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-50 dark:bg-gray-800"
        aria-label="Sidebar">
        <!-- Logo Aplikasi di Atas -->
        <div
            class="absolute top-0 left-0 w-full h-24 bg-gray-50 dark:bg-gray-800 flex items-center justify-center p-4 mb-5">
            <x-application-logo
                class="grid h-20 w-full object-cover fill-current place-content-center rounded-lg bg-gray-200 dark:bg-gray-300 text-gray-600"></x-application-logo>
        </div>


        <div class="h-full overflow-y-auto px-3  pt-28 pb-24"> <!-- Sesuaikan padding bawah -->
            <ul class="space-y-2 font-medium">
                <!-- Menu Utama -->
                <li class="font-bold text-xs text-gray-500 dark:text-white">MENU UTAMA</li>
                <li>

                    <x-navlink :active="request()->routeIs('berkas')" href="{{ route('berkas') }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Beranda</span>
                    </x-navlink>
                </li>

                <li>

                    <x-navlink :active="request()->routeIs('beranda')" href="{{ route('beranda') }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Input Berkas</span>
                    </x-navlink>
                </li>

                @if (Auth::check() && Auth::user()->role == 'admin')
                    <!-- GENERAL -->
                    <li class="font-bold text-xs text-gray-500 dark:text-white">Menu Admin</li>
                    <li>
                        <x-navlink :active="request()->routeIs('amdin.dashboard')" href="{{ route('admin.dashboard') }}">
                            <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 12V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-4m5-13v4a1 1 0 0 1-1 1H5m0 6h9m0 0-2-2m2 2-2 2" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                        </x-navlink>
                    </li>

                    <li>
                        <x-navlink :active="request()->routeIs('admin.berkas')" href="{{ route('admin.berkas') }}">
                            <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 10V4a1 1 0 0 0-1-1H9.914a1 1 0 0 0-.707.293L5.293 7.207A1 1 0 0 0 5 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2M10 3v4a1 1 0 0 1-1 1H5m5 6h9m0 0-2-2m2 2-2 2" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Manajemen Berkas</span>
                        </x-navlink>
                    </li>

                    <li>
                        <x-navlink :active="request()->routeIs('admin.user')" href="{{ route('admin.user') }}">
                            <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M10 12v1h4v-1m4 7H6a1 1 0 0 1-1-1V9h14v9a1 1 0 0 1-1 1ZM4 5h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap">Manajement User</span>
                        </x-navlink>
                    </li>
                @endif

            </ul>
        </div>

        <!-- Profil User di Bawah -->
        <div class="absolute bottom-0 left-0 w-full p-4 bg-gray-50 dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <!-- User Info -->
                <div class="flex items-center space-x-3">
                    <img class="w-10 h-10 rounded-full object-cover"
                        src="{{ asset('storage/profile_photos/guest.png') }}" alt="User Profile Picture">
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white">{{ Auth::user()->name }}</h4>
                    </div>
                </div>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center p-2 text-red-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>
</div>
