<x-layouts.app title="Checkout Rental">
    <section class="mx-auto grid max-w-7xl gap-8 px-4 py-10 sm:px-6 lg:grid-cols-[0.8fr_1.2fr] lg:px-8">
        <aside class="rounded border border-zinc-200 bg-white p-6">
            <div class="mb-5 grid h-44 place-items-center rounded bg-zinc-100 text-sm font-semibold text-zinc-400">{{ $motor->brand->nama_brand }}</div>
            <h1 class="text-2xl font-bold">{{ $motor->nama }}</h1>
            <p class="mt-2 text-sm text-zinc-500">{{ $motor->no_polisi }} · {{ $motor->catatan }}</p>
            <p class="mt-5 text-3xl font-black text-emerald-700">Rp{{ number_format($motor->harga, 0, ',', '.') }}<span class="text-sm font-medium text-zinc-500"> / hari</span></p>
        </aside>

        <div class="rounded border border-zinc-200 bg-white p-6">
            <h2 class="text-xl font-bold">Checkout & Pembayaran Midtrans</h2>
            <form id="checkout-form" class="mt-6 grid gap-4">
                <label class="grid gap-2 text-sm font-medium">
                    Bearer token user
                    <input name="token" class="rounded border border-zinc-300 px-3 py-2" placeholder="Login via /api/login lalu tempel token di sini">
                </label>
                <div class="grid gap-4 sm:grid-cols-2">
                    <label class="grid gap-2 text-sm font-medium">
                        Tanggal mulai
                        <input type="date" name="tanggal_mulai" class="rounded border border-zinc-300 px-3 py-2" required>
                    </label>
                    <label class="grid gap-2 text-sm font-medium">
                        Tanggal selesai
                        <input type="date" name="tanggal_selesai" class="rounded border border-zinc-300 px-3 py-2" required>
                    </label>
                </div>
                <button class="rounded bg-zinc-950 px-4 py-3 font-semibold text-white hover:bg-zinc-800" type="submit">Buat Snap Token</button>
            </form>
            <pre id="checkout-result" class="mt-5 hidden overflow-auto rounded bg-zinc-950 p-4 text-sm text-emerald-200"></pre>
        </div>
    </section>

    <script src="{{ config('services.midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script>
        document.getElementById('checkout-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const form = new FormData(event.currentTarget);
            const result = document.getElementById('checkout-result');

            const response = await fetch('/api/rentals', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${form.get('token')}`,
                },
                body: JSON.stringify({
                    motor_id: {{ $motor->id }},
                    tanggal_mulai: form.get('tanggal_mulai'),
                    tanggal_selesai: form.get('tanggal_selesai'),
                }),
            });

            const json = await response.json();
            result.classList.remove('hidden');
            result.textContent = JSON.stringify(json, null, 2);

            if (json.snap_token && window.snap && !json.snap_token.startsWith('demo-')) {
                window.snap.pay(json.snap_token);
            }
        });
    </script>
</x-layouts.app>
