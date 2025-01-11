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
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-800"
        aria-label="Sidebar">
        <div class="absolute top-0 left-0 w-full h-24 bg-gray-800 flex items-center justify-center p-4 mb-5">
            <x-application-logo
                class="grid h-20 w-full object-cover fill-current place-content-center rounded-lg bg-gray-800 text-gray-600"></x-application-logo>
        </div>


        <div class="h-full overflow-y-auto px-3  pt-28 pb-24"> <!-- Sesuaikan padding bawah -->
            <ul class="space-y-2  ">
                <!-- Menu Utama -->
                <li class="font-bold text-xs text-white ">MENU UTAMA</li>
                <li>
                    <x-navlink :active="request()->routeIs('beranda')" href="{{ route('beranda') }}">
                        <span class="ms-3">Beranda</span>
                    </x-navlink>
                </li>

                <li>

                    <x-navlink :active="request()->routeIs('berkas')" href="{{ route('berkas') }}">
                        <span class="ms-3">Input Berkas</span>
                    </x-navlink>
                </li>

                @if (Auth::check() && Auth::user()->role == 'admin')
                    <!-- GENERAL -->
                    <li class="font-bold text-xs text-white">MENU ADMIN</li>
                    <li>
                        <x-navlink :active="request()->routeIs('amdin.dashboard')" href="{{ route('admin.dashboard') }}">

                            <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                        </x-navlink>
                    </li>

                    <li>
                        <x-navlink :active="request()->routeIs('admin.berkas')" href="{{ route('admin.berkas') }}">

                            <span class="flex-1 ms-3 whitespace-nowrap">Manajemen Berkas</span>
                        </x-navlink>
                    </li>

                    <li>
                        <x-navlink :active="request()->routeIs('admin.user')" href="{{ route('admin.user') }}">


                            <span class="flex-1 ms-3 whitespace-nowrap">Manajemen Pengguna</span>
                        </x-navlink>
                    </li>
                @endif

            </ul>
        </div>

        <!-- Profil User di Bawah -->
        <div class="absolute bottom-0 left-0 w-full p-4 bg-gray-800">
            <div class="flex items-center justify-between">
                <!-- User Info -->
                <div class="flex items-center space-x-3">
                    {{-- <img class="w-10 h-10 rounded-full object-cover"
                        src="{{ asset('storage/profile_photos/guest.png') }}" alt="User Profile Picture"> --}}
                    <div>
                        <h4 class="font-bold text-white">{{ Auth::user()->name }}</h4>
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
