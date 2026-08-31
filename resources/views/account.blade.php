<x-layouts.app title="Akun Saya">
    <section class="relative min-h-[calc(100vh-80px)] overflow-hidden bg-gradient-to-br from-zinc-100 via-zinc-200/50 to-white px-4 py-10 text-zinc-900 transition-colors duration-500 dark:from-zinc-950 dark:via-zinc-900 dark:to-zinc-950 dark:text-white sm:px-6 lg:px-8">
        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="absolute left-8 top-16 grid grid-cols-6 gap-3 opacity-30 dark:opacity-20">@for ($i = 0; $i < 36; $i++)<span class="block h-1.5 w-1.5 rounded-full bg-red-600"></span>@endfor</div>
            <div class="absolute -left-20 top-36 h-72 w-72 rounded-full bg-red-600/10 blur-3xl dark:bg-red-600/15"></div>
            <div class="absolute -right-20 -top-24 h-80 w-[450px] rotate-12 rounded-bl-[120px] rounded-tl-[40px] bg-gradient-to-l from-red-600 to-red-700 shadow-2xl shadow-red-950/20 dark:from-red-600 dark:to-red-900"></div>
            <div class="absolute -top-10 right-10 h-64 w-80 rounded-full bg-red-500/20 blur-3xl dark:bg-red-600/20"></div>
            <div class="absolute -bottom-20 -right-20 h-72 w-80 rounded-full bg-gradient-to-tl from-red-600/15 to-transparent blur-3xl dark:from-red-600/20"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-6xl pt-4">
            <div class="mb-8 max-w-lg">
                <p class="text-sm font-black uppercase tracking-normal text-red-600 dark:text-red-500">Area Penyewa</p>
                <h1 class="mt-1 text-3xl font-black tracking-tight text-zinc-900 dark:text-white sm:text-4xl">Akun & Riwayat Sewa</h1>
                <p class="mt-2 text-sm leading-snug text-zinc-600 dark:text-zinc-400">Kelola informasi akun dan lihat perjalanan penyewaan motor kamu.</p>
            </div>
            <div class="flex w-full justify-center">
                <section class="w-full max-w-lg overflow-hidden rounded-3xl border border-zinc-200 bg-white shadow-2xl shadow-zinc-950/10 backdrop-blur-md transition-colors duration-500 dark:border-zinc-800 dark:bg-zinc-900 dark:shadow-black/80">
                    <div class="relative h-32 overflow-hidden bg-gradient-to-br from-red-700 via-red-900 to-zinc-950 dark:from-red-900 dark:via-zinc-950 dark:to-black">
                        <div class="absolute -left-10 -top-20 h-44 w-[120%] rotate-2 rounded-[50%] bg-gradient-to-r from-red-600/40 via-red-950/50 to-transparent dark:from-red-600/30 dark:via-zinc-900/60 dark:to-black"></div>
                        <div class="absolute left-6 top-6 grid grid-cols-5 gap-2 opacity-60">@for ($i = 0; $i < 20; $i++)<span class="block h-1 w-1 rounded-full bg-white/80"></span>@endfor</div>
                    </div>
                    <div class="relative px-6 pb-7 sm:px-8">
                        <div class="-mt-10 flex justify-center">
                            <div class="flex !h-32 !w-32 shrink-0 items-center justify-center rounded-full border-[5px] border-white bg-zinc-100 shadow-xl dark:border-zinc-900 dark:bg-zinc-800">
                                <div class="flex !h-24 !w-24 shrink-0 items-center justify-center rounded-full border-2 border-red-600 bg-zinc-900 text-red-500 dark:bg-zinc-950">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor" class="!h-12 !w-12 shrink-0" style="width: 3rem !important; height: 3rem !important;"><path stroke-linecap="round"  stroke-linejoin="round"  d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0"/></svg>
                                </div>
                            </div>
                        </div>
                        <div id="profile-box" class="mt-4 text-center"><div class="animate-pulse"><div class="mx-auto h-5 w-40 rounded bg-zinc-200 dark:bg-zinc-800"></div><div class="mx-auto mt-2 h-4 w-52 rounded bg-zinc-200 dark:bg-zinc-800"></div></div></div>
                        <div id="verification-box" class="mt-6 rounded-2xl border border-zinc-200 bg-zinc-50 p-4 transition-all duration-300 dark:border-zinc-800 dark:bg-zinc-950/60">
                            <div class="flex items-center gap-3.5">
                                <div id="status-icon-wrapper" class="flex !h-10 !w-10 shrink-0 items-center justify-center rounded-full transition-colors duration-300"></div>
                                <div class="min-w-0 flex-1 text-left">
                                    <p id="status-label" class="font-bold text-zinc-900 transition-colors duration-300 dark:text-zinc-200">Memuat status...</p>
                                    <p id="status-description" class="mt-0.5 text-xs text-zinc-600 transition-colors duration-300 dark:text-zinc-400">Memuat informasi verifikasi...</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 grid grid-cols-2 gap-3">
                            <a id="verify-button" href="/verifikasi" class="flex items-center justify-center gap-2 rounded-xl bg-red-600 px-4 py-3 text-sm font-bold text-white shadow-lg shadow-red-600/30 transition hover:-translate-y-0.5 hover:bg-red-700 dark:hover:bg-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="!h-5 !w-5 shrink-0" style="width: 1.25rem !important; height: 1.25rem !important;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 4.97-3.82 8.65-9 10-5.18-1.35-9-5.03-9-10V5.5L12 2l9 3.5V12Z"/></svg>Verifikasi Akun
                            </a>
                            <a href="/katalog" class="flex items-center justify-center gap-2 rounded-xl border border-zinc-300 bg-white px-4 py-3 text-sm font-bold text-zinc-700 transition hover:-translate-y-0.5 hover:border-red-500 hover:text-red-600 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-200 dark:hover:border-red-500 dark:hover:text-red-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="!h-5 !w-5 shrink-0" style="width: 1.25rem !important; height: 1.25rem !important;"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35m1.85-5.4a7.25 7.25 0 1 1-14.5 0 7.25 7.25 0 0 1 14.5 0Z"/></svg>Cari Motor
                            </a>
                        </div>
                        <button id="history-button" type="button" class="mt-3 flex w-full items-center justify-center gap-2 rounded-xl bg-red-600 px-4 py-3 text-sm font-bold text-white shadow-lg shadow-red-600/30 transition hover:-translate-y-0.5 hover:bg-red-700 dark:hover:bg-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="!h-5 !w-5 shrink-0" style="width: 1.25rem !important; height: 1.25rem !important;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m6-2a10 10 0 1 1-3-7.75M20 4v5h-5"/></svg>Lihat Riwayat Sewa
                        </button>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <div id="history-modal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/70 p-4 backdrop-blur-sm">
        <div class="w-full max-w-4xl overflow-hidden rounded-3xl border border-zinc-200 bg-white shadow-2xl dark:border-zinc-800 dark:bg-zinc-900 dark:text-white">
            <div class="flex items-center justify-between border-b border-zinc-200 bg-gradient-to-r from-zinc-100 to-white px-5 py-4 dark:border-zinc-800 dark:from-zinc-950 dark:to-zinc-900 sm:px-6">
                <div><p class="text-xs font-bold uppercase tracking-wider text-red-600 dark:text-red-500">Rental Motor</p><h2 class="mt-1 text-xl font-black text-zinc-900 dark:text-white">Riwayat Penyewaan</h2></div>
                <button id="close-history" type="button" class="flex !h-10 !w-10 shrink-0 items-center justify-center rounded-full bg-zinc-200 text-zinc-700 transition hover:bg-red-600 hover:text-white dark:bg-zinc-800 dark:text-zinc-300 dark:hover:bg-red-600 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="!h-5 !w-5 shrink-0" style="width: 1.25rem !important; height: 1.25rem !important;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="max-h-[65vh] overflow-y-auto p-5 sm:p-6">
                <div class="overflow-hidden rounded-2xl border border-zinc-200 dark:border-zinc-800">
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[700px] text-left text-sm">
                            <thead class="bg-zinc-100 text-xs uppercase tracking-wide text-zinc-600 dark:bg-zinc-800/50 dark:text-zinc-400">
                                <tr><th class="px-4 py-4">Motor</th><th class="px-4 py-4">Tanggal</th><th class="px-4 py-4">Total</th><th class="px-4 py-4">Status</th><th class="px-4 py-4">Aksi</th></tr>
                            </thead>
                            <tbody id="rental-history" class="divide-y divide-zinc-200 dark:divide-zinc-800"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        (async () => {
            const profileBox = document.getElementById('profile-box');
            const table = document.getElementById('rental-history');
            const verifyButton = document.getElementById('verify-button');
            const statusLabel = document.getElementById('status-label');
            const statusDescription = document.getElementById('status-description');
            const verificationBox = document.getElementById('verification-box');
            const statusIconWrapper = document.getElementById('status-icon-wrapper');
            const historyButton = document.getElementById('history-button');
            const historyModal = document.getElementById('history-modal');
            const closeHistory = document.getElementById('close-history');    
            function openHistory() {
                historyModal.classList.remove('hidden');
                historyModal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            }
            function closeHistoryModal() {
                historyModal.classList.add('hidden');
                historyModal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }
            historyButton.addEventListener('click', openHistory);
            closeHistory.addEventListener('click', closeHistoryModal);
            historyModal.addEventListener('click', (event) => {
                if (event.target === historyModal) {
                    closeHistoryModal();
                }
            });
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    closeHistoryModal();
                }
            });       
            if (!window.rentalApp.token()) {
                profileBox.innerHTML = `
                    <p class="font-bold text-zinc-900 dark:text-white">Silakan login terlebih dahulu.</p>
                    <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Login untuk melihat informasi akun kamu.</p> `;

                statusLabel.textContent = 'Belum Login';
                statusDescription.textContent = 'Silakan login untuk melihat status akun.';
                verificationBox.className = 'mt-6 rounded-2xl border border-amber-200 bg-amber-50 p-4 dark:border-amber-900/60 dark:bg-amber-950/30';
                statusIconWrapper.className = 'flex !h-10 !w-10 shrink-0 items-center justify-center rounded-full bg-amber-100 text-amber-600 dark:bg-amber-900/50 dark:text-amber-400';
                statusIconWrapper.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="!h-5 !w-5 shrink-0" style="width: 1.25rem !important; height: 1.25rem !important;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>`;
                statusLabel.className = 'font-bold text-amber-700 dark:text-amber-400';
                statusDescription.className = 'mt-0.5 text-xs text-amber-700/80 dark:text-amber-300/70';
                verifyButton.classList.remove('hidden');
                table.innerHTML = `
                    <tr><td colspan="5" class="px-4 py-8 text-center text-zinc-500 dark:text-zinc-400">Belum login.</td></tr> `;
                return;
            }
            try {
                const meResponse = await fetch('/api/me', {
                    headers: window.rentalApp.authHeaders()
                });
                if (!meResponse.ok) {
                    throw new Error('Gagal mengambil data user.');
                }
                const me = await meResponse.json();
                const user = me.user;
                const verificationStatus = user.verification_status || 'unverified';
                let statusLabelText = 'Belum Diverifikasi';
                let statusDescriptionText = 'Silakan upload dokumen untuk melakukan verifikasi.';
                let iconSvg = '';
                if (verificationStatus === 'pending') {
                    statusLabelText = 'Menunggu Verifikasi';
                    statusDescriptionText = 'Dokumen kamu sedang diperiksa oleh admin.';
                    verificationBox.className = 'mt-6 rounded-2xl border border-amber-200 bg-amber-50 p-4 dark:border-amber-900/60 dark:bg-amber-950/30';
                    statusIconWrapper.className = 'flex !h-10 !w-10 shrink-0 items-center justify-center rounded-full bg-amber-100 text-amber-600 dark:bg-amber-900/50 dark:text-amber-400';
                    iconSvg = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="!h-5 !w-5 shrink-0" style="width: 1.25rem !important; height: 1.25rem !important;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg> `;
                    statusLabel.className = 'font-bold text-amber-700 dark:text-amber-400';
                    statusDescription.className = 'mt-0.5 text-xs text-amber-700/80 dark:text-amber-300/70';
                    verifyButton.classList.add('hidden');
                }
                else if (
                    verificationStatus === 'verified' ||
                    verificationStatus === 'terverifikasi'
                ) {
                    statusLabelText = 'Terverifikasi';
                    statusDescriptionText = 'Akun kamu sudah berhasil diverifikasi.';
                    verificationBox.className = 'mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 dark:border-emerald-900/60 dark:bg-emerald-950/30';
                    statusIconWrapper.className = 'flex !h-10 !w-10 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-900/50 dark:text-emerald-400';
                    iconSvg = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="!h-5 !w-5 shrink-0" style="width: 1.25rem !important; height: 1.25rem !important;"><path stroke-linecap="round" stroke-linejoin="round" d="m9 12.75 2.25 2.25L15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg> `;
                    statusLabel.className = 'font-bold text-emerald-700 dark:text-emerald-400';
                    statusDescription.className = 'mt-0.5 text-xs text-emerald-700/80 dark:text-emerald-300/70';
                    verifyButton.classList.add('hidden');
                }
                else {
                    statusLabelText = 'Belum Diverifikasi';
                    statusDescriptionText = 'Silakan upload dokumen untuk melakukan verifikasi.';
                    verificationBox.className = 'mt-6 rounded-2xl border border-zinc-200 bg-zinc-100/80 p-4 dark:border-zinc-800 dark:bg-zinc-950/50';
                    statusIconWrapper.className = 'flex !h-10 !w-10 shrink-0 items-center justify-center rounded-full bg-zinc-200 text-zinc-700 dark:bg-zinc-800 dark:text-zinc-300';
                    iconSvg = ` <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="!h-5 !w-5 shrink-0" style="width: 1.25rem !important; height: 1.25rem !important;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg> `;
                    statusLabel.className = 'font-bold text-zinc-900 dark:text-zinc-200';
                    statusDescription.className = 'mt-0.5 text-xs text-zinc-600 dark:text-zinc-400';
                    verifyButton.classList.remove('hidden');
                }
                profileBox.innerHTML = `
                    <h2 class="text-xl font-black text-zinc-900 dark:text-white">${user.name}</h2>
                    <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">${user.email}</p>
                    <div class="mt-2 flex items-center justify-center gap-2 text-sm text-zinc-500 dark:text-zinc-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="!h-4 !w-4 shrink-0 text-red-600" style="width: 1rem !important; height: 1rem !important;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.967-.852-1.093l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a1.125 1.125 0 0 1-1.21.38 12.035 12.035 0 0 1-7.212-7.212 1.125 1.125 0 0 1 .38-1.21l1.293-.97c.363-.272.53-.737.417-1.173L6.39 3.1A1.125 1.125 0 0 0 5.297 2.25H3.925A2.25 2.25 0 0 0 1.675 4.5v2.25Z"/></svg>${user.no_hp || '-'}
                    </div>`;
                statusLabel.textContent = statusLabelText;
                statusDescription.textContent = statusDescriptionText;
                statusIconWrapper.innerHTML = iconSvg;
                const rentalsResponse = await fetch('/api/my-rentals', {
                    headers: window.rentalApp.authHeaders()
                });
                if (!rentalsResponse.ok) {
                    throw new Error('Gagal mengambil riwayat.');
                }
                const rentals = await rentalsResponse.json();
                if (rentals.length) {
                    table.innerHTML = rentals.map((rental) => `
                        <tr class="transition hover:bg-zinc-50 dark:hover:bg-zinc-800/50">
                            <td class="px-4 py-4"><p class="font-bold text-zinc-900 dark:text-white">${rental.motor.nama}</p><p class="mt-1 text-xs text-zinc-400">Rental Motor</p></td>
                            <td class="px-4 py-4 text-zinc-600 dark:text-zinc-300">${rental.tanggal_mulai} <span class="mx-1 text-zinc-400">→</span>${rental.tanggal_selesai}</td>
                            <td class="px-4 py-4 font-bold text-zinc-900 dark:text-white">${window.rentalApp.money(rental.total_biaya)}</td>
                            <td class="px-4 py-4"><span class="inline-flex rounded-full bg-zinc-100 px-3 py-1 text-xs font-bold text-zinc-800 dark:bg-zinc-800 dark:text-zinc-300">${rental.status}</span></td>
                            <td class="px-4 py-4"> ${ rental.status === 'pending' ? ` <button type="button" class="text-sm font-semibold text-red-700 transition hover:text-red-900 dark:text-red-400 dark:hover:text-red-300" data-sync-payment="${rental.order_id}">Sinkronkan</button>`: '-' }</td>
                        </tr>
                    `).join('');
                } else {
                    table.innerHTML = `
                        <tr>
                            <td colspan="5" class="px-4 py-12 text-center">
                                <div class="mx-auto flex !h-14 !w-14 items-center justify-center rounded-full bg-zinc-100 text-zinc-500 dark:bg-zinc-800 dark:text-zinc-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="!h-7 !w-7 shrink-0" style="width: 1.75rem !important; height: 1.75rem !important;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                </div>
                                <p class="mt-3 font-bold text-zinc-700 dark:text-zinc-300">Belum ada riwayat penyewaan.</p>
                                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Yuk, mulai cari dan sewa motor impianmu sekarang!</p></td>
                        </tr> `;
                }
                document.querySelectorAll('[data-sync-payment]').forEach((button) => {
                    button.addEventListener('click', async () => {
                        button.disabled = true;
                        button.textContent = 'Menyinkronkan...';
                        try {
                            const response = await fetch('/api/payments/sync', {
                                method: 'POST',
                                headers: {
                                    ...window.rentalApp.authHeaders(),
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    order_id: button.dataset.syncPayment
                                }),
                            });
                            const json = await response.json();
                            window.rentalApp.notifyResponse(
                                response,
                                json,
                                'Status pembayaran berhasil diperbarui.'
                            );
                            if (response.ok) {
                                window.setTimeout(() => {
                                    window.location.reload();
                                }, 800);
                            } else {
                                button.disabled = false;
                                button.textContent = 'Sinkronkan';
                            }
                        } catch (error) {
                            console.error(error);
                            button.disabled = false;
                            button.textContent = 'Sinkronkan';
                        }
                    });
                });
            } catch (error) {
                console.error(error);
                profileBox.innerHTML = ` <p class="font-bold text-red-600">Gagal memuat data akun.</p><p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Silakan coba refresh halaman.</p> `;
                table.innerHTML = ` <tr><td colspan="5" class="px-4 py-8 text-center text-red-500">Gagal mengambil riwayat penyewaan.</td></tr>`;
            }
        })();
    </script>
</x-layouts.app>
