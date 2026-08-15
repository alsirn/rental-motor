<x-layouts.app title="Checkout Rental">
    <section class="mx-auto grid max-w-7xl gap-8 px-4 py-10 sm:px-6 lg:grid-cols-[0.8fr_1.2fr] lg:px-8">
        <aside class="panel overflow-hidden">
            <div class="grid h-52 place-items-center bg-gradient-to-br from-zinc-950 via-zinc-800 to-red-800 text-white">
                <div class="text-center">
                    <p class="text-xs font-bold uppercase tracking-wide text-red-100">{{ $motor->brand->nama_brand }}</p>
                    <p class="mt-1 text-3xl font-black">{{ $motor->nama }}</p>
                </div>
            </div>
            <div class="p-6">
                <h1 class="text-2xl font-black">{{ $motor->nama }}</h1>
                <p class="mt-2 text-sm text-zinc-500">{{ $motor->no_polisi }} · {{ $motor->catatan }}</p>
                <p class="mt-5 text-3xl font-black text-red-700">Rp{{ number_format($motor->harga, 0, ',', '.') }}<span class="text-sm font-medium text-zinc-500"> / hari</span></p>
            </div>
        </aside>

        <div class="panel p-6">
            <h2 class="text-xl font-black">Checkout & Pembayaran Midtrans</h2>
            <p class="mt-2 text-sm text-zinc-600">Pastikan akun sudah berstatus verified. Backend akan membuat order_id, gross_amount, dan snap_token.</p>
            <form id="checkout-form" class="mt-6 grid gap-4">
                <div class="grid gap-4 sm:grid-cols-2">
                    <label class="grid gap-2 text-sm font-semibold">Tanggal mulai <input type="date" name="tanggal_mulai" class="field" required></label>
                    <label class="grid gap-2 text-sm font-semibold">Tanggal selesai <input type="date" name="tanggal_selesai" class="field" required></label>
                </div>
                <button class="btn-primary" type="submit">Buat Transaksi</button>
            </form>
            <pre id="checkout-result" class="mt-5 hidden overflow-auto rounded bg-zinc-950 p-4 text-sm text-red-100"></pre>
        </div>
    </section>

    <script src="{{ config('services.midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script>
        document.getElementById('checkout-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const form = new FormData(event.currentTarget);
            const response = await fetch('/api/rentals', {
                method: 'POST',
                headers: window.rentalApp.authHeaders(),
                body: JSON.stringify({
                    motor_id: {{ $motor->id }},
                    tanggal_mulai: form.get('tanggal_mulai'),
                    tanggal_selesai: form.get('tanggal_selesai'),
                }),
            });
            const json = await response.json();
            window.rentalApp.showJson(document.getElementById('checkout-result'), json);
            if (json.snap_token && window.snap && !json.snap_token.startsWith('demo-')) {
                window.snap.pay(json.snap_token);
            }
        });
    </script>
</x-layouts.app>
