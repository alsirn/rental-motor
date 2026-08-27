<x-layouts.app title="Akun Saya"> 
    <section class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8"> 
        <div class="mb-6"><p class="text-sm font-bold uppercase tracking-wide text-red-700">Area penyewa</p><h1 class="mt-2 text-3xl font-black">Akun & Riwayat Sewa</h1> </div> 
        <div class="grid gap-6 lg:grid-cols-[0.8fr_1.2fr]">
            <section class="panel p-5">
                <h2 class="font-bold">Profil</h2>
                    <div id="profile-box" class="mt-4 text-sm text-zinc-600">Memuat profil...</div>
                    <div class="mt-5 flex gap-2"><a id="verify-button" href="/verifikasi" class="btn-primary">Verifikasi Akun</a><a href="/" class="btn-muted">Cari Motor</a></div>
            </section>
            <section class="panel p-5">
                <h2 class="font-bold">Riwayat Penyewaan</h2>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b text-xs uppercase text-zinc-500"><tr><th class="py-2">Motor</th><th>Tanggal</th><th>Total</th><th>Status</th><th>Aksi</th></tr></thead>
                        <tbody id="rental-history" class="divide-y divide-zinc-100"></tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>

    <script>
        (async () => {
            const profileBox = document.getElementById('profile-box');
            const table = document.getElementById('rental-history');
            const verifyButton = document.getElementById('verify-button');
            if (!window.rentalApp.token()) {
                profileBox.textContent = 'Silakan login terlebih dahulu.';
                table.innerHTML = `
                    <tr><td colspan="4" class="py-3 text-zinc-500">Belum login.</td></tr> `;
                return;
            }
            try {
                const meResponse = await fetch('/api/me', {
                    headers: window.rentalApp.authHeaders()
                });
                const me = await meResponse.json();
                const user = me.user;
                const verificationStatus = user.verification_status || 'unverified';
                let statusLabel = 'Belum Diverifikasi';
                let statusDescription = 'Silakan upload dokumen untuk melakukan verifikasi.';
                let showVerifyButton = true;
                if (verificationStatus === 'pending') {
                    statusLabel = 'Menunggu Verifikasi';
                    statusDescription = 'Dokumen kamu sedang diperiksa oleh admin.';
                }
                if (
                    verificationStatus === 'verified' ||
                    verificationStatus === 'terverifikasi'
                ) {
                    statusLabel = 'Terverifikasi';
                    statusDescription = 'Akun kamu sudah berhasil diverifikasi.';
                    showVerifyButton = false;
                }
                profileBox.innerHTML = `
                    <p class="font-semibold text-zinc-950">${user.name}</p>
                    <p>${user.email}</p>
                    <p>${user.no_hp || '-'}</p>
                    <div class="mt-4">
                        <p class="text-xs font-semibold text-zinc-500">Status Verifikasi</p>
                        <span class="status-pill mt-1 bg-red-50 text-red-700">${statusLabel}</span>
                        <p class="mt-2 text-xs leading-5 text-zinc-500">${statusDescription}</p>
                    </div>`;
                verifyButton.classList.toggle('hidden', !showVerifyButton);
                const rentalsResponse = await fetch('/api/my-rentals', {
                    headers: window.rentalApp.authHeaders()
                });
                const rentals = await rentalsResponse.json();
                table.innerHTML = rentals.length
                    ? rentals.map((rental) => `
                        <tr>
                            <td class="py-3 font-medium">${rental.motor.nama}</td>
                            <td>${rental.tanggal_mulai} - ${rental.tanggal_selesai}</td>
                            <td>${window.rentalApp.money(rental.total_biaya)}</td>
                            <td>${rental.status}</td>
                            <td>${rental.status === 'pending' ? `<button class="text-sm font-semibold text-red-700" data-sync-payment="${rental.order_id}">Sinkronkan</button>` : '-'}</td>
                        </tr>
                    `).join('') : `<tr><td colspan="5" class="py-3 text-zinc-500">Belum ada transaksi.</td></tr> `;

                document.querySelectorAll('[data-sync-payment]').forEach((button) => button.addEventListener('click', async () => {
                    const response = await fetch('/api/payments/sync', {
                        method: 'POST',
                        headers: window.rentalApp.authHeaders(),
                        body: JSON.stringify({ order_id: button.dataset.syncPayment }),
                    });
                    const json = await response.json();
                    window.rentalApp.notifyResponse(response, json, 'Status pembayaran berhasil diperbarui.');
                    if (response.ok) window.setTimeout(() => window.location.reload(), 800);
                }));
            } catch (error) {
                profileBox.textContent = 'Gagal memuat data akun.';
                table.innerHTML = `<tr><td colspan="4" class="py-3 text-zinc-500">Gagal memuat riwayat penyewaan.</td></tr>`;
            }
        })();
    </script>
</x-layouts.app>
