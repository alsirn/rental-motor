<x-layouts.app title="Riwayat Transaksi">
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-black uppercase tracking-[.18em] text-red-600 dark:text-red-700">Backend</p>
                <h1 class="mt-2 text-3xl font-black text-zinc-950 dark:text-white">Riwayat Transaksi</h1>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Pantau seluruh transaksi dan motor yang sedang disewa.</p>
            </div>
            <button onclick="history.back()" class="rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-bold text-zinc-700 shadow-sm transition hover:-translate-y-0.5 hover:border-red-200 hover:bg-red-50 hover:text-red-600 dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-300">Kembali</button>
        </div>
        <div class="mb-6 grid gap-4 sm:grid-cols-2">
            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Total Transaksi</p>
                        <p id="total-transactions" class="mt-2 text-3xl font-semibold text-zinc-950 dark:text-white">0</p>
                    </div>
                    <div class="grid h-11 w-11 place-items-center rounded-lg bg-red-50 text-lg text-red-600 dark:bg-red-950/40 dark:text-red-700">↗</div>
                </div>
            </div>
            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Motor Sedang Disewa</p>
                        <p id="total-rented" class="mt-2 text-3xl font-semibold text-zinc-950 dark:text-white">0</p>
                    </div>
                    <div class="grid h-11 w-11 place-items-center rounded-lg bg-red-50 text-lg text-red-600 dark:bg-red-950/40 dark:text-red-700">◉</div>
                </div>
            </div>
        </div>
        <div class="grid gap-6 lg:grid-cols-2">
            <section class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
                <div class="border-b border-zinc-200 px-5 py-4 dark:border-zinc-800">
                    <h2 class="font-bold text-red-600 dark:text-red-700">Semua Transaksi</h2>
                    <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">Daftar seluruh transaksi rental.</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b bg-zinc-50 text-xs uppercase text-zinc-500 dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-400">
                            <tr><th class="px-5 py-3">Penyewa</th><th class="py-3">Motor</th><th class="py-3">Total</th><th class="px-5 py-3">Status</th></tr>
                        </thead>
                        <tbody id="transaction-table" class="divide-y divide-zinc-100 dark:divide-zinc-800"></tbody>
                    </table>
                </div>
            </section>
            <section class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
                <div class="border-b border-zinc-200 px-5 py-4 dark:border-zinc-800">
                    <h2 class="font-bold text-red-600 dark:text-red-700">Motor Sedang Disewa</h2>
                    <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">Motor yang masih digunakan oleh penyewa.</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b bg-zinc-50 text-xs uppercase text-zinc-500 dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-400">
                            <tr><th class="px-5 py-3">Motor</th><th class="py-3">Penyewa</th><th class="px-5 py-3">Kembali</th></tr>
                        </thead>
                        <tbody id="rented-table" class="divide-y divide-zinc-100 dark:divide-zinc-800"></tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>
    <script>
        (async () => {
            try {
                const [a, b] = await Promise.all([
                    fetch('/api/transactions', {headers: window.rentalApp.authHeaders()}),
                    fetch('/api/rented', {headers: window.rentalApp.authHeaders()})
                ]);
                const [transactions, rented] = await Promise.all([a.json(), b.json()]);
                document.getElementById('total-transactions').textContent = transactions.length;
                document.getElementById('total-rented').textContent = rented.length;
                document.getElementById('transaction-table').innerHTML = transactions.length
                    ? transactions.map(i => `
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/50">
                            <td class="px-5 py-3 font-semibold text-zinc-900 dark:text-white">${i.penyewa.nama}</td>
                            <td class="py-3 text-zinc-600 dark:text-zinc-300">${i.motor.nama}</td>
                            <td class="py-3 font-semibold text-zinc-900 dark:text-white">${window.rentalApp.money(i.total_biaya)}</td>
                            <td class="px-5 py-3"><span class="rounded-full bg-red-50 px-2.5 py-1 text-xs font-semibold text-red-600 dark:bg-red-950/40 dark:text-red-700">${i.status}</span></td>
                        </tr>`).join('')
                    : '<tr><td colspan="4" class="px-5 py-8 text-center text-zinc-500">Belum ada transaksi.</td></tr>';
                document.getElementById('rented-table').innerHTML = rented.length
                    ? rented.map(i => `
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/50">
                            <td class="px-5 py-3 font-semibold text-zinc-900 dark:text-white">${i.motor.nama}</td>
                            <td class="py-3 text-zinc-600 dark:text-zinc-300">${i.penyewa.nama}</td>
                            <td class="px-5 py-3 text-zinc-600 dark:text-zinc-300">${i.tgl_kembali}</td>
                        </tr>`).join('')
                    : '<tr><td colspan="3" class="px-5 py-8 text-center text-zinc-500">Tidak ada motor yang sedang disewa.</td></tr>';
            } catch (error) {
                console.error(error);
            }
        })();
    </script>
</x-layouts.app>