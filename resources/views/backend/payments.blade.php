<x-layouts.app title="Riwayat Pembayaran">
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-wide text-red-700">Backend</p>
            <h1 class="mt-2 text-3xl font-black">Riwayat Pembayaran</h1>
        </div>
        <section class="panel p-5">
            <div class="mb-4 flex flex-wrap items-center gap-2">
                <button class="payment-filter btn-dark" data-status="">Semua</button>
                <button class="payment-filter btn-muted" data-status="pending">Pending</button>
                <button class="payment-filter btn-muted" data-status="settlement">Paid</button>
                <button class="payment-filter btn-muted" data-status="cancel">Cancel</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b text-xs uppercase text-zinc-500"><tr><th class="py-2">Order</th><th>Penyewa</th><th>Motor</th><th>Total</th><th>Status</th><th>Aksi</th></tr></thead>
                    <tbody id="payment-table" class="divide-y divide-zinc-100"></tbody>
                </table>
            </div>
        </section>
    </section>
    <script>
        async function loadPayments(status = '') {
            const url = status ? `/api/payments?status=${status}` : '/api/payments';
            const payments = await fetch(url, { headers: window.rentalApp.authHeaders() }).then((res) => res.json());
            document.getElementById('payment-table').innerHTML = payments.length ? payments.map((payment) => `<tr><td class="py-3 font-medium">${payment.order_id}</td><td>${payment.rental?.user?.name || '-'}</td><td>${payment.rental?.motor?.nama || '-'}</td><td>${window.rentalApp.money(payment.gross_amount)}</td><td>${payment.transaction_status}</td><td><button class="text-sm font-semibold text-red-700" data-delete="${payment.id}">Hapus</button></td></tr>`).join('') : '<tr><td colspan="6" class="py-3 text-zinc-500">Tidak ada pembayaran.</td></tr>';
            document.querySelectorAll('[data-delete]').forEach((button) => button.addEventListener('click', async () => {
                await fetch(`/api/payments/${button.dataset.delete}`, { method: 'DELETE', headers: window.rentalApp.authHeaders() });
                loadPayments(status);
            }));
        }
        document.querySelectorAll('.payment-filter').forEach((button) => button.addEventListener('click', () => loadPayments(button.dataset.status)));
        loadPayments();
    </script>
</x-layouts.app>
