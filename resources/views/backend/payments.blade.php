<x-layouts.app title="Riwayat Pembayaran">
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-black uppercase tracking-[.18em] text-red-600 dark:text-red-700">Backend</p>
                <h1 class="mt-2 text-3xl font-black text-zinc-950 dark:text-white">Riwayat Pembayaran</h1>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Pantau seluruh riwayat pembayaran transaksi rental.</p>
            </div>
            <button onclick="history.back()" class="rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-bold text-zinc-700 shadow-sm transition hover:-translate-y-0.5 hover:border-red-200 hover:bg-red-50 hover:text-red-600 dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-300">Kembali</button>
        </div>
        <section class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
            <div class="border-b border-zinc-200 p-5 dark:border-zinc-800">
                <div class="flex flex-wrap gap-2">
                    @foreach ([['','Semua'],['pending','Pending'],['settlement','Paid'],['cancel','Cancel']] as [$status,$label])
                        <button class="payment-filter rounded-lg px-4 py-2 text-sm font-semibold transition-all duration-200 {{ $status === '' ? 'bg-red-600 text-white shadow-sm' : 'border border-zinc-200 bg-white text-zinc-600 hover:border-red-600 hover:bg-red-50 hover:text-red-600 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300 dark:hover:border-red-600 dark:hover:bg-red-950/30 dark:hover:text-red-700' }}" data-status="{{ $status }}">{{ $label }}</button>
                    @endforeach
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-zinc-200 bg-zinc-50 text-xs uppercase text-zinc-500 dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-400">
                        <tr>
                            <th class="px-5 py-3 font-semibold">Order</th>
                            <th class="py-3 font-semibold">Penyewa</th>
                            <th class="py-3 font-semibold">Motor</th>
                            <th class="py-3 font-semibold">Total</th>
                            <th class="py-3 font-semibold">Status</th>
                            <th class="px-5 py-3 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="payment-table" class="divide-y divide-zinc-100 dark:divide-zinc-800"></tbody>
                </table>
            </div>
        </section>
    </section>
    <script>
        async function loadPayments(status = '') {
            const url = status ? `/api/payments?status=${status}` : '/api/payments';
            const response = await fetch(url, { headers: window.rentalApp.authHeaders() });
            const payments = await response.json();
            if (!response.ok) {
                window.rentalApp.notifyResponse(response, payments, 'Data pembayaran gagal dimuat.');
                return;
            }
            document.getElementById('payment-table').innerHTML = payments.length
                ? payments.map(payment => `
                    <tr class="transition hover:bg-zinc-50 dark:hover:bg-zinc-800/50">
                        <td class="px-5 py-4 font-semibold text-zinc-900 dark:text-white">${payment.order_id}</td>
                        <td class="py-4 text-zinc-600 dark:text-zinc-300">${payment.rental?.user?.name || '-'}</td>
                        <td class="py-4 text-zinc-600 dark:text-zinc-300">${payment.rental?.motor?.nama || '-'}</td>
                        <td class="py-4 font-semibold text-zinc-900 dark:text-white">${window.rentalApp.money(payment.gross_amount)}</td>
                        <td class="py-4"><span class="inline-flex rounded-full bg-red-50 px-2.5 py-1 text-xs font-semibold text-red-600 dark:bg-red-950/40 dark:text-red-700">${payment.transaction_status}</span></td>
                        <td class="px-5 py-4">
                            <div class="flex flex-wrap gap-2"> ${payment.transaction_status === 'pending' ? `<button class="rounded-lg px-3 py-1.5 text-xs font-semibold text-red-600 transition hover:bg-red-600 hover:text-white" data-sync-payment="${payment.order_id}">Sinkronkan</button>` : '' }<button class="rounded-lg px-3 py-1.5 text-xs font-semibold text-red-600 transition hover:bg-red-600 hover:text-white" data-delete="${payment.id}">Hapus</button></div>
                        </td>
                    </tr>
                `).join('')
                : `<tr><td colspan="6" class="px-5 py-10 text-center text-sm text-zinc-500">Tidak ada pembayaran.</td></tr>`;
            document.querySelectorAll('[data-sync-payment]').forEach(button =>
                button.addEventListener('click', async () => {
                    const response = await fetch('/api/payments/sync', {
                        method: 'POST',
                        headers: window.rentalApp.authHeaders(),
                        body: JSON.stringify({ order_id: button.dataset.syncPayment })
                    });
                    const json = await response.json();
                    window.rentalApp.notifyResponse(response, json, 'Status pembayaran berhasil diperbarui.');
                    if (response.ok) loadPayments(status);
                })
            );
            document.querySelectorAll('[data-delete]').forEach(button =>
                button.addEventListener('click', async () => {
                    if (!confirm('Hapus histori pembayaran ini?')) return;
                    const response = await fetch(`/api/payments/${button.dataset.delete}`, {
                        method: 'DELETE',
                        headers: window.rentalApp.authHeaders()
                    });
                    const json = await response.json();
                    window.rentalApp.notifyResponse(response, json, 'Histori pembayaran berhasil dihapus.');
                    if (response.ok) loadPayments(status);
                })
            );
        }
        document.querySelectorAll('.payment-filter').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.payment-filter').forEach(btn => {
                    btn.className = 'payment-filter rounded-lg border border-zinc-200 bg-white px-4 py-2 text-sm font-semibold transition-all duration-200 hover:border-red-600 hover:bg-red-50 hover:text-red-600 active:scale-95 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300 dark:hover:border-red-600 dark:hover:bg-red-950/30 dark:hover:text-red-400';
                });
                button.className = 'payment-filter rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:bg-red-700 active:scale-95';
                loadPayments(button.dataset.status);
            });
        });
        loadPayments();
    </script>
</x-layouts.app>