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
            <section class="panel p-5 lg:col-span-2">
                <div class="grid gap-5 lg:grid-cols-[1fr_1.1fr] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-wide text-red-700">Tampilan Frontend</p>
                        <h2 class="mt-2 text-2xl font-black text-zinc-950">Banner Homepage</h2>
                        <p class="mt-2 text-sm leading-6 text-zinc-500">Ganti gambar banner yang tampil di samping judul utama halaman katalog.</p>
                        <form id="hero-banner-form" class="mt-4 grid gap-3">
                            <input class="field" type="file" name="hero_banner" accept="image/*" required>
                            <button class="btn-primary" type="submit">Simpan Banner</button>
                        </form>
                    </div>
                    <div class="relative min-h-56 overflow-hidden rounded border border-zinc-200 bg-zinc-950">
                        @if ($heroBanner)
                            <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('storage/'.$heroBanner) }}" alt="Preview banner homepage">
                        @else
                            <div class="absolute inset-0 bg-gradient-to-br from-zinc-950 via-zinc-800 to-red-800"></div>
                            <div class="absolute inset-0 grid place-items-center px-6 text-center text-white">
                                <p class="font-black">Belum ada banner. Upload gambar motor di form ini.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </section>

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
    <script>
        document.getElementById('hero-banner-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const response = await fetch('/api/site-settings/hero-banner', {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${window.rentalApp.token()}` },
                body: new FormData(event.currentTarget),
            });
            const json = await response.json();
            window.rentalApp.notifyResponse(response, json, 'Banner berhasil diperbarui.');
            if (response.ok) window.setTimeout(() => window.location.reload(), 650);
        });
    </script>
</x-layouts.app>
