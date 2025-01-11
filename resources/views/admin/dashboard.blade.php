<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Total Berkas</h2>
                <p class="text-3xl">{{ $totalBerkas }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Total Pengguna</h2>
                <p class="text-3xl">{{ $totalUsers }}</p>
            </div>
        </div>
    </div>
</x-layout>
