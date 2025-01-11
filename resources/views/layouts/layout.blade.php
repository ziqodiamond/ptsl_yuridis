<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100 dark:bg-gray-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('storage/images/logo.png') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </link>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/general_images/logo-polban.png') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ config('app.name', 'by Hadziq & Arfa') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</head>

<body class="h-full bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="min-h-full">
        @include('components.sidebar')
        <main class="flex-1 p-5 sm:ml-64 bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-gray-100">


            {{-- <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8"> --}}
            {{ $slot }}
            {{-- </div> --}}
        </main>

    </div>


</body>
<script>
    // Ambil elemen toggle dan teks toggle
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleText = document.getElementById('theme-toggle-text');

    // Cek tema dari localStorage atau preferensi tema sistem
    const currentTheme = localStorage.getItem('theme') ||
        (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

    // Atur tema awal berdasarkan hasil pengecekan
    if (currentTheme === 'dark') {
        document.documentElement.classList.add('dark');
        themeToggleBtn.checked = true;
        themeToggleText.textContent = 'Dark';
    } else {
        themeToggleText.textContent = 'Light';
    }

    // Event listener untuk toggle mode
    themeToggleBtn.addEventListener('change', () => {
        document.documentElement.classList.toggle('dark');
        const newTheme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
        localStorage.setItem('theme', newTheme);
        themeToggleText.textContent = newTheme.charAt(0).toUpperCase() + newTheme.slice(1);
    });
</script>

</html>

{{-- by hadjik & Arfa --}}
