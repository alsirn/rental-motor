<x-layouts.app title="Riwayat Transaksi">
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-wide text-red-700">Backend</p>
            <h1 class="mt-2 text-3xl font-black">Riwayat Transaksi & Motor Disewa</h1>
        </div>
        <div class="grid gap-6 lg:grid-cols-2">
            <section class="panel p-5">
                <h2 class="font-bold">Semua Transaksi</h2>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b text-xs uppercase text-zinc-500"><tr><th class="py-2">Penyewa</th><th>Motor</th><th>Total</th><th>Status</th></tr></thead>
                        <tbody id="transaction-table" class="divide-y divide-zinc-100"></tbody>
                    </table>
                </div>
            </section>
            <section class="panel p-5">
                <h2 class="font-bold">Motor Sedang Disewa</h2>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b text-xs uppercase text-zinc-500"><tr><th class="py-2">Motor</th><th>Penyewa</th><th>Kembali</th></tr></thead>
                        <tbody id="rented-table" class="divide-y divide-zinc-100"></tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>
    <script>
        (async () => {
            const [transactions, rented] = await Promise.all([
                fetch('/api/transactions', { headers: window.rentalApp.authHeaders() }).then((res) => res.json()),
                fetch('/api/rented', { headers: window.rentalApp.authHeaders() }).then((res) => res.json()),
            ]);
            document.getElementById('transaction-table').innerHTML = transactions.length ? transactions.map((item) => `<tr><td class="py-3 font-medium">${item.penyewa.nama}</td><td>${item.motor.nama}</td><td>${window.rentalApp.money(item.total_biaya)}</td><td>${item.status}</td></tr>`).join('') : '<tr><td colspan="4" class="py-3 text-zinc-500">Belum ada transaksi.</td></tr>';
            document.getElementById('rented-table').innerHTML = rented.length ? rented.map((item) => `<tr><td class="py-3 font-medium">${item.motor.nama}</td><td>${item.penyewa.nama}</td><td>${item.tgl_kembali}</td></tr>`).join('') : '<tr><td colspan="3" class="py-3 text-zinc-500">Tidak ada motor disewa.</td></tr>';
        })();
    </script>
</x-layouts.app>
