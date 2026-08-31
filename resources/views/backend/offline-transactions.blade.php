<x-layouts.app title="Transaksi Offline">
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-wide text-red-700">Backend Admin</p>
                <h1 class="mt-2 text-3xl font-black text-zinc-950">Transaksi Offline</h1>
                <p class="mt-2 text-sm text-zinc-500">Input penyewaan langsung dari toko dan pilih motor yang masih tersedia.</p>
            </div>
            <a href="/backend" class="btn-muted">Dashboard</a>
        </div>

        <div class="grid gap-6 lg:grid-cols-[0.85fr_1.15fr]">
            <form id="offline-form" class="panel grid gap-3 p-5">
                <h2 class="font-bold">Tambah Transaksi Offline</h2>
                <input class="field" name="nama_lengkap" placeholder="Nama lengkap" required>
                <input class="field" name="nomor_whatsapp" placeholder="Nomor WhatsApp" required>
                <input class="field" type="email" name="gmail" placeholder="Gmail" required>
                <div class="grid gap-3 sm:grid-cols-3">
                    <label class="grid gap-2 text-xs font-bold uppercase text-zinc-500">KTP <input class="field" type="file" name="foto_ktp" accept="image/*"></label>
                    <label class="grid gap-2 text-xs font-bold uppercase text-zinc-500">KK <input class="field" type="file" name="foto_kk" accept="image/*"></label>
                    <label class="grid gap-2 text-xs font-bold uppercase text-zinc-500">STNK <input class="field" type="file" name="foto_stnk" accept="image/*"></label>
                </div>
                <select class="field" name="brand_id" id="offline-brand" required></select>
                <select class="field" name="motor_id" id="offline-motor" required></select>
                <button class="btn-primary" type="submit">Simpan Transaksi Offline</button>
            </form>

            <section class="panel p-5">
                <div class="mb-4 grid gap-3 md:grid-cols-[1fr_auto] md:items-end">
                    <div>
                        <h2 class="font-bold">Daftar Transaksi Offline</h2>
                        <p class="mt-1 text-sm text-zinc-500">Cari berdasarkan nama motor atau nomor polisi.</p>
                    </div>
                    <input id="offline-search" class="field md:w-80" type="search" placeholder="Cari motor / nomor polisi...">
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b text-xs uppercase text-zinc-500">
                            <tr><th class="py-2">Penyewa</th><th>Kontak</th><th>Motor</th><th>Dokumen</th><th>Aksi</th></tr>
                        </thead>
                        <tbody id="offline-table" class="divide-y divide-zinc-100"></tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>

    <script>
        const auth = window.rentalApp.user();
        if (!auth || auth.role !== 'admin') window.location.href = '/backend';

        let allMotors = [];

        async function loadOfflineOptions() {
            const [brands, motors] = await Promise.all([
                fetch('/api/brands').then((res) => res.json()),
                fetch('/api/motors').then((res) => res.json()),
            ]);
            allMotors = motors.filter((motor) => motor.status);
            document.getElementById('offline-brand').innerHTML = brands.map((brand) => `<option value="${brand.id}">${brand.nama_brand}</option>`).join('');
            syncMotorOptions();
        }

        function syncMotorOptions() {
            const brandId = Number(document.getElementById('offline-brand').value);
            const motors = allMotors.filter((motor) => Number(motor.brand_id) === brandId);
            document.getElementById('offline-motor').innerHTML = motors.length
                ? motors.map((motor) => `<option value="${motor.id}">${motor.nama} - ${motor.no_polisi}</option>`).join('')
                : '<option value="">Tidak ada motor tersedia</option>';
        }

        async function loadOfflineTransactions(q = '') {
            const url = q ? `/api/offline-transactions?q=${encodeURIComponent(q)}` : '/api/offline-transactions';
            const response = await fetch(url, { headers: window.rentalApp.authHeaders() });
            const data = await response.json();
            if (!response.ok) {
                window.rentalApp.notifyResponse(response, data, 'Data transaksi offline gagal dimuat.');
                return;
            }

            document.getElementById('offline-table').innerHTML = data.length ? data.map((item) => {
                const docs = [
                    ['KTP', item.foto_ktp],
                    ['KK', item.foto_kk],
                    ['STNK', item.foto_stnk],
                ].map(([label, path]) => path ? `<a class="font-semibold text-red-700 hover:underline" href="/storage/${path}" target="_blank">${label}</a>` : `<span class="text-zinc-400">${label}</span>`).join(' · ');

                return `<tr><td class="py-3 font-medium">${item.nama_lengkap}</td><td>${item.nomor_whatsapp}<br><span class="text-zinc-500">${item.gmail}</span></td><td>${item.motor?.nama || '-'}<br><span class="text-zinc-500">${item.motor?.no_polisi || '-'}</span></td><td>${docs}</td><td><button class="text-sm font-semibold text-red-700" data-delete="${item.id}">Hapus</button></td></tr>`;
            }).join('') : '<tr><td colspan="5" class="py-3 text-zinc-500">Belum ada transaksi offline.</td></tr>';

            document.querySelectorAll('[data-delete]').forEach((button) => button.addEventListener('click', async () => {
                if (!confirm('Hapus transaksi offline ini? Motor akan tersedia kembali.')) return;
                const response = await fetch(`/api/offline-transactions/${button.dataset.delete}`, { method: 'DELETE', headers: window.rentalApp.authHeaders() });
                const json = await response.json();
                window.rentalApp.notifyResponse(response, json, 'Transaksi offline berhasil dihapus.');
                if (response.ok) {
                    loadOfflineOptions();
                    loadOfflineTransactions(document.getElementById('offline-search').value);
                }
            }));
        }

        document.getElementById('offline-brand').addEventListener('change', syncMotorOptions);
        document.getElementById('offline-search').addEventListener('input', (event) => loadOfflineTransactions(event.target.value.trim()));
        document.getElementById('offline-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const response = await fetch('/api/offline-transactions', {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${window.rentalApp.token()}` },
                body: new FormData(event.currentTarget),
            });
            const json = await response.json();
            window.rentalApp.notifyResponse(response, json, 'Transaksi offline berhasil disimpan.');
            if (response.ok) {
                event.currentTarget.reset();
                await loadOfflineOptions();
                await loadOfflineTransactions();
            }
        });

        loadOfflineOptions();
        loadOfflineTransactions();
    </script>
</x-layouts.app>
