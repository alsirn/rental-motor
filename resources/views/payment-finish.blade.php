<x-layouts.app title="Status Pembayaran">
    <section class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8">
        <div class="panel p-6 text-center">
            <p class="text-sm font-bold uppercase tracking-wide text-red-700">Midtrans</p>
            <h1 class="mt-2 text-3xl font-black text-zinc-950">Memeriksa status pembayaran</h1>
            <p id="payment-finish-message" class="mt-3 text-sm leading-6 text-zinc-500">Tunggu sebentar, status transaksi sedang disinkronkan ke sistem rental.</p>
            <div class="mt-6 flex justify-center gap-3">
                <a href="/akun" class="btn-primary">Lihat Akun</a>
                <a href="/" class="btn-muted">Katalog Motor</a>
            </div>
        </div>
    </section>
    <script>
        (async () => {
            const params = new URLSearchParams(window.location.search);
            const orderId = params.get('order_id');
            const transactionStatus = params.get('transaction_status');
            const message = document.getElementById('payment-finish-message');

            if (!orderId || !window.rentalApp.token()) {
                message.textContent = 'Transaksi tidak ditemukan atau sesi login sudah habis.';
                return;
            }

            const response = await fetch('/api/payments/sync', {
                method: 'POST',
                headers: window.rentalApp.authHeaders(),
                body: JSON.stringify({
                    order_id: orderId,
                    transaction_status: transactionStatus,
                }),
            });
            const json = await response.json();
            window.rentalApp.notifyResponse(response, json, 'Status pembayaran berhasil diperbarui.');
            message.textContent = window.rentalApp.messageFrom(json, 'Status pembayaran berhasil diperbarui.');
            if (response.ok) {
                window.setTimeout(() => window.location.href = '/akun', 1400);
            }
        })();
    </script>
</x-layouts.app>
