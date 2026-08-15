<x-layouts.app title="Backend Rental">
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-wide text-red-700">Backend Admin & Tukang Rental</p>
                <h1 class="mt-2 text-3xl font-black text-zinc-950">Dashboard Operasional</h1>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="/backend/motor" class="btn-primary">Kelola Motor</a>
                <a href="/backend/brand" class="btn-muted">Brand</a>
                <a href="/backend/transaksi" class="btn-muted">Transaksi</a>
                <a href="/backend/pembayaran" class="btn-muted">Pembayaran</a>
                <a href="/backend/verifikasi" class="btn-dark">Verifikasi</a>
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-5">
            @foreach ($stats as $label => $value)
                <div class="panel p-4">
                    <p class="text-xs font-bold uppercase tracking-wide text-zinc-500">{{ str_replace('_', ' ', $label) }}</p>
                    <p class="mt-2 text-2xl font-black text-zinc-950">{{ is_numeric($value) && str_contains($label, 'sales') ? 'Rp'.number_format($value, 0, ',', '.') : $value }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-8 grid gap-6 lg:grid-cols-2">
            <section class="panel p-5">
                <h2 class="font-bold">Motor Terbaru</h2>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b text-xs uppercase text-zinc-500"><tr><th class="py-2">Motor</th><th>Brand</th><th>Harga</th><th>Status</th></tr></thead>
                        <tbody class="divide-y divide-zinc-100">
                            @foreach ($motors as $motor)
                                <tr><td class="py-3 font-medium">{{ $motor->nama }}</td><td>{{ $motor->brand->nama_brand }}</td><td>Rp{{ number_format($motor->harga, 0, ',', '.') }}</td><td>{{ $motor->status ? 'Tersedia' : 'Disewa' }}</td></tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="panel p-5">
                <h2 class="font-bold">Transaksi Terakhir</h2>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b text-xs uppercase text-zinc-500"><tr><th class="py-2">Penyewa</th><th>Motor</th><th>Total</th><th>Status</th></tr></thead>
                        <tbody class="divide-y divide-zinc-100">
                            @forelse ($rentals as $rental)
                                <tr><td class="py-3 font-medium">{{ $rental->user->name }}</td><td>{{ $rental->motor->nama }}</td><td>Rp{{ number_format($rental->total_biaya, 0, ',', '.') }}</td><td>{{ $rental->status }}</td></tr>
                            @empty
                                <tr><td class="py-3 text-zinc-500" colspan="4">Belum ada transaksi.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>
</x-layouts.app>
