<x-layout>
    <div class="bg-gray-100 min-h-screen">
        <!-- Header -->
        <header class="bg-gray-800 text-white p-6 mb-4">
            <div class="container mx-auto">
                <h1 class="text-3xl font-bold">PTSL Yuridis</h1>
                <p class="text-sm">Aplikasi Pengelolaan Berkas Pertanahan</p>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="bg-cover bg-center h-64 flex items-center justify-center"
            style="background-image: url('{{ asset('storage/images/benner.jpg') }}');">
            <div class="bg-black bg-opacity-70 p-6 rounded-md text-white text-center">
                <h2 class="text-2xl font-bold">Selamat Datang di Aplikasi PTSL Yuridis</h2>
                <p class="mt-2">Badan Pertanahan Nasional Kabupaten Bandung Barat</p>
                <a href="{{ route('berkas') }}"
                    class="mt-4 inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">
                    Mulai Input Berkas
                </a>
            </div>
        </section>

        <!-- About Section -->
        <section class="container mx-auto py-10 px-6">
            <h3 class="text-xl font-bold mb-4 text-gray-600">Sejarah Singkat</h3>
            <p class="text-gray-700 leading-relaxed">
                Badan Pertanahan Nasional (BPN) Kabupaten Bandung Barat memiliki sejarah yang dimulai dari pendirian
                Akademi Agraria di Yogyakarta pada tahun 1963. Akademi ini kemudian menjadi cikal bakal pengelolaan
                pertanahan modern di Indonesia. Pada tahun 1988, BPN menjadi lembaga pemerintah yang bertanggung jawab
                langsung kepada Presiden, memperkuat peran dalam kebijakan pertanahan nasional.
                Kantor Pertanahan Kabupaten Bandung Barat resmi beroperasi pada 24 September 2007 dan kini
                berlokasi di Jalan Raya Batujajar-Cimareme untuk meningkatkan pelayanan kepada masyarakat.
            </p>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-4">
            <div class="container mx-auto text-center">
                <p>&copy; 2025 PTSL Yuridis - Badan Pertanahan Nasional Kabupaten Bandung Barat. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</x-layout>
