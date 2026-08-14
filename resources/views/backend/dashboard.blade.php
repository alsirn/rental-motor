<x-layouts.app title="Backend Rental">
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-8">
            <p class="text-sm font-semibold uppercase tracking-wide text-emerald-700">Backend Admin & Tukang Rental</p>
            <h1 class="mt-2 text-3xl font-black text-zinc-950">Dashboard Operasional</h1>
        </div>

        <div class="grid gap-4 md:grid-cols-5">
            @foreach ($stats as $label => $value)
                <div class="rounded border border-zinc-200 bg-white p-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500">{{ str_replace('_', ' ', $label) }}</p>
                    <p class="mt-2 text-2xl font-black text-zinc-950">{{ is_numeric($value) && str_contains($label, 'sales') ? 'Rp'.number_format($value, 0, ',', '.') : $value }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-8 grid gap-6 lg:grid-cols-2">
            <section class="rounded border border-zinc-200 bg-white p-5">
                <h2 class="font-bold">Tambah Motor</h2>
                <form class="mt-4 grid gap-3" method="post" action="/api/motors" enctype="multipart/form-data">
                    <select class="rounded border border-zinc-300 px-3 py-2" name="brand_id">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->nama_brand }}</option>
                        @endforeach
                    </select>
                    <input class="rounded border border-zinc-300 px-3 py-2" name="nama" placeholder="Nama motor">
                    <input class="rounded border border-zinc-300 px-3 py-2" name="harga" placeholder="Harga per hari">
                    <input class="rounded border border-zinc-300 px-3 py-2" name="no_polisi" placeholder="Nomor polisi">
                    <textarea class="rounded border border-zinc-300 px-3 py-2" name="catatan" placeholder="Catatan"></textarea>
                </form>
            </section>

            <section class="rounded border border-zinc-200 bg-white p-5">
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

            <section class="rounded border border-zinc-200 bg-white p-5">
                <h2 class="font-bold">Riwayat Transaksi</h2>
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

            <section class="rounded border border-zinc-200 bg-white p-5">
                <h2 class="font-bold">Riwayat Pembayaran</h2>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b text-xs uppercase text-zinc-500"><tr><th class="py-2">Order</th><th>Total</th><th>Status</th></tr></thead>
                        <tbody class="divide-y divide-zinc-100">
                            @forelse ($payments as $payment)
                                <tr><td class="py-3 font-medium">{{ $payment->order_id }}</td><td>Rp{{ number_format($payment->gross_amount, 0, ',', '.') }}</td><td>{{ $payment->transaction_status }}</td></tr>
                            @empty
                                <tr><td class="py-3 text-zinc-500" colspan="3">Belum ada pembayaran.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>
</x-layouts.app>
