<x-layouts.app title="Akun Saya">
    <section class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-wide text-red-700">Area penyewa</p>
            <h1 class="mt-2 text-3xl font-black">Akun & Riwayat Sewa</h1>
        </div>
        <div class="grid gap-6 lg:grid-cols-[0.8fr_1.2fr]">
            <section class="panel p-5">
                <h2 class="font-bold">Profil</h2>
                <div id="profile-box" class="mt-4 text-sm text-zinc-600">Memuat profil...</div>
                <div class="mt-5 flex gap-2">
                    <a href="/verifikasi" class="btn-primary">Verifikasi Akun</a>
                    <a href="/" class="btn-muted">Cari Motor</a>
                </div>
            </section>
            <section class="panel p-5">
                <h2 class="font-bold">Riwayat Penyewaan</h2>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b text-xs uppercase text-zinc-500"><tr><th class="py-2">Motor</th><th>Tanggal</th><th>Total</th><th>Status</th></tr></thead>
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
            if (!window.rentalApp.token()) {
                profileBox.textContent = 'Silakan login terlebih dahulu.';
                table.innerHTML = '<tr><td colspan="4" class="py-3 text-zinc-500">Belum login.</td></tr>';
                return;
            }
            const me = await fetch('/api/me', { headers: window.rentalApp.authHeaders() }).then((res) => res.json());
            profileBox.innerHTML = `<p class="font-semibold text-zinc-950">${me.user.name}</p><p>${me.user.email}</p><p>${me.user.no_hp || '-'}</p><p class="mt-3"><span class="status-pill bg-red-50 text-red-700">${me.user.verification_status}</span></p>`;
            const rentals = await fetch('/api/my-rentals', { headers: window.rentalApp.authHeaders() }).then((res) => res.json());
            table.innerHTML = rentals.length ? rentals.map((rental) => `<tr><td class="py-3 font-medium">${rental.motor.nama}</td><td>${rental.tanggal_mulai} - ${rental.tanggal_selesai}</td><td>${window.rentalApp.money(rental.total_biaya)}</td><td>${rental.status}</td></tr>`).join('') : '<tr><td colspan="4" class="py-3 text-zinc-500">Belum ada transaksi.</td></tr>';
        })();
    </script>
</x-layouts.app>
