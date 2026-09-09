<x-layouts.app title="Pengembalian Motor">
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-wide text-red-700">Backend Operasional</p>
                <h1 class="mt-2 text-3xl font-black text-zinc-950 dark:text-white">Pengembalian Motor</h1>
                <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400">Periksa foto bukti motor telah kembali di lokasi rental sebelum menyetujui pengembalian.</p>
            </div>
            <a href="/backend" class="btn-muted">Dashboard</a>
        </div>

        <section class="panel p-5">
            <div class="mb-4">
                <p class="text-sm font-bold uppercase tracking-wide text-red-700">Rental Online</p>
                <h2 class="mt-1 text-xl font-black">Bukti dari Penyewa</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[760px] text-left text-sm">
                    <thead class="border-b text-xs uppercase text-zinc-500 dark:text-zinc-400"><tr><th class="py-2">Penyewa</th><th>Motor</th><th>Order</th><th>Bukti Foto</th><th>Status</th><th>Aksi</th></tr></thead>
                    <tbody id="online-return-table" class="divide-y divide-zinc-100 dark:divide-zinc-800"></tbody>
                </table>
            </div>
        </section>

        <section class="auth-admin hidden mt-6 panel p-5">
            <div class="mb-4">
                <p class="text-sm font-bold uppercase tracking-wide text-red-700">Transaksi Offline</p>
                <h2 class="mt-1 text-xl font-black">Pengembalian di Lokasi Rental</h2>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Bukti foto dan persetujuan pengembalian offline hanya dikelola admin dari halaman ini.</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[800px] text-left text-sm">
                    <thead class="border-b text-xs uppercase text-zinc-500 dark:text-zinc-400"><tr><th class="py-2">Penyewa</th><th>Motor</th><th>Kontak</th><th>Bukti Foto</th><th>Status</th><th>Aksi</th></tr></thead>
                    <tbody id="offline-return-table" class="divide-y divide-zinc-100 dark:divide-zinc-800"></tbody>
                </table>
            </div>
        </section>
    </section>

    <script>
        const returnAuth = window.rentalApp.user();
        if (!returnAuth || !['admin', 'tukang'].includes(returnAuth.role)) window.location.href = '/login';

        const statusLabel = (status) => ({
            pending: '<span class="inline-flex rounded-full bg-amber-100 px-2.5 py-1 text-xs font-bold text-amber-800 dark:bg-amber-950/50 dark:text-amber-300">Menunggu persetujuan</span>',
            approved: '<span class="inline-flex rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-bold text-emerald-800 dark:bg-emerald-950/50 dark:text-emerald-300">Disetujui</span>',
            belum_diajukan: '<span class="inline-flex rounded-full bg-zinc-100 px-2.5 py-1 text-xs font-bold text-zinc-700 dark:bg-zinc-800 dark:text-zinc-300">Belum diajukan</span>',
        }[status] || status);

        async function request(url, options = {}) {
            const response = await fetch(url, { headers: window.rentalApp.authHeaders(), ...options });
            const json = await response.json();
            window.rentalApp.notifyResponse(response, json);
            return response.ok;
        }

        async function loadOnlineReturns() {
            const response = await fetch('/api/returns/online', { headers: window.rentalApp.authHeaders() });
            const rows = await response.json();
            const table = document.getElementById('online-return-table');
            if (!response.ok) {
                window.rentalApp.notifyResponse(response, rows);
                return;
            }
            table.innerHTML = rows.length ? rows.map((item) => `<tr>
                <td class="py-3 font-medium">${item.user?.name || '-' }<br><span class="text-xs text-zinc-500">${item.user?.no_hp || item.user?.email || '-'}</span></td>
                <td>${item.motor?.nama || '-'}<br><span class="text-xs text-zinc-500">${item.motor?.no_polisi || '-'}</span></td>
                <td class="text-xs text-zinc-500">${item.order_id}</td>
                <td><a class="font-semibold text-red-700 hover:underline dark:text-red-400" href="/storage/${item.foto_bukti_pengembalian}" target="_blank">Lihat foto</a></td>
                <td>${statusLabel(item.status_pengembalian)}</td>
                <td>${item.status_pengembalian === 'pending' ? `<button type="button" class="btn-primary !px-3 !py-2 !text-xs" data-approve-online="${item.id}">Setujui</button>` : '-'}</td>
            </tr>`).join('') : '<tr><td colspan="6" class="py-5 text-zinc-500">Belum ada bukti pengembalian online.</td></tr>';
            document.querySelectorAll('[data-approve-online]').forEach((button) => button.addEventListener('click', async () => {
                if (!confirm('Setujui pengembalian ini dan jadikan motor tersedia kembali?')) return;
                if (await request(`/api/returns/online/${button.dataset.approveOnline}/approve`, { method: 'PATCH' })) loadOnlineReturns();
            }));
        }

        async function loadOfflineReturns() {
            if (returnAuth.role !== 'admin') return;
            const response = await fetch('/api/offline-transactions', { headers: window.rentalApp.authHeaders() });
            const rows = await response.json();
            const table = document.getElementById('offline-return-table');
            if (!response.ok) {
                window.rentalApp.notifyResponse(response, rows);
                return;
            }
            table.innerHTML = rows.length ? rows.map((item) => {
                const proof = item.foto_bukti_pengembalian
                    ? `<a class="font-semibold text-red-700 hover:underline dark:text-red-400" href="/storage/${item.foto_bukti_pengembalian}" target="_blank">Lihat foto</a>`
                    : '<span class="text-zinc-400">Belum ada foto</span>';
                const action = item.status_pengembalian === 'approved'
                    ? '-'
                    : item.status_pengembalian === 'pending'
                        ? `<button type="button" class="btn-primary !px-3 !py-2 !text-xs" data-approve-offline="${item.id}">Setujui</button>`
                        : `<form class="flex items-center gap-2" data-offline-return="${item.id}"><input class="block w-44 text-xs" type="file" accept="image/*" required><button class="btn-muted !px-3 !py-2 !text-xs" type="submit">Kirim bukti</button></form>`;
                return `<tr><td class="py-3 font-medium">${item.nama_lengkap}</td><td>${item.motor?.nama || '-'}<br><span class="text-xs text-zinc-500">${item.motor?.no_polisi || '-'}</span></td><td>${item.nomor_whatsapp}<br><span class="text-xs text-zinc-500">${item.gmail}</span></td><td>${proof}</td><td>${statusLabel(item.status_pengembalian)}</td><td>${action}</td></tr>`;
            }).join('') : '<tr><td colspan="6" class="py-5 text-zinc-500">Belum ada transaksi offline.</td></tr>';

            document.querySelectorAll('[data-offline-return]').forEach((form) => form.addEventListener('submit', async (event) => {
                event.preventDefault();
                const file = form.querySelector('input[type=file]').files[0];
                if (!file) return;
                const payload = new FormData();
                payload.append('foto_bukti_pengembalian', file);
                const response = await fetch(`/api/offline-transactions/${form.dataset.offlineReturn}/return`, {
                    method: 'POST',
                    headers: { Accept: 'application/json', Authorization: `Bearer ${window.rentalApp.token()}` },
                    body: payload,
                });
                const json = await response.json();
                window.rentalApp.notifyResponse(response, json, 'Bukti pengembalian offline berhasil dikirim.');
                if (response.ok) loadOfflineReturns();
            }));
            document.querySelectorAll('[data-approve-offline]').forEach((button) => button.addEventListener('click', async () => {
                if (!confirm('Setujui pengembalian offline ini dan jadikan motor tersedia kembali?')) return;
                if (await request(`/api/offline-transactions/${button.dataset.approveOffline}/return/approve`, { method: 'PATCH' })) loadOfflineReturns();
            }));
        }

        loadOnlineReturns();
        loadOfflineReturns();
    </script>
</x-layouts.app>
