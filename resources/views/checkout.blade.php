<x-layouts.app title="Checkout Rental">
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-8">
            <p class="text-sm font-bold uppercase tracking-wide text-red-700">Checkout Rental</p>
            <h1 class="mt-1 text-3xl font-black text-zinc-950 sm:text-4xl">Selesaikan Pesananmu</h1>
            <p class="mt-2 text-sm text-zinc-500">Tentukan tanggal rental dan cek total biaya sebelum melanjutkan pembayaran.</p>
        </div>
        <div class="grid gap-6 lg:grid-cols-[0.8fr_1.2fr]">
            <aside class="panel overflow-hidden">
                <div class="relative grid h-48 place-items-center overflow-hidden bg-gradient-to-br from-zinc-950 via-zinc-800 to-red-800">
                    @if ($motor->image_motor)
                        <img src="{{ asset('storage/'.$motor->image_motor) }}" alt="{{ $motor->nama }}" class="relative z-10 h-40 w-3/5 object-contain drop-shadow-2xl mix-blend-multiply">
                        <div class="relative z-10 text-center text-white">
                            <p class="text-xs font-bold uppercase tracking-wide text-red-100">{{ $motor->brand->nama_brand }}</p>
                            <p class="mt-1 text-3xl font-black">{{ $motor->nama }}</p>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wide text-red-700">{{ $motor->brand->nama_brand }}</p>
                            <h2 class="mt-1 text-2xl font-black text-zinc-950">{{ $motor->nama }}</h2>
                        </div>
                        <span class="status-pill shrink-0 bg-red-50 text-red-700">{{ $motor->status ? 'Tersedia' : 'Disewa' }}</span>
                    </div>
                    <p class="mt-2 text-sm text-zinc-500">{{ $motor->no_polisi }} · {{ $motor->catatan }}</p>
                    <div class="my-5 border-t border-zinc-200"></div>
                    <div class="grid gap-3 text-sm">
                        <div class="flex items-center justify-between gap-4"><span class="text-zinc-500">Brand</span><span class="font-semibold text-zinc-900">{{ $motor->brand->nama_brand }}</span></div>
                        <div class="flex items-center justify-between gap-4"><span class="text-zinc-500">Nomor Polisi</span><span class="font-semibold text-zinc-900">{{ $motor->no_polisi }}</span></div>
                        <div class="flex items-center justify-between gap-4"><span class="text-zinc-500">Keterangan</span><span class="text-right font-semibold text-zinc-900">{{ $motor->catatan }}</span></div>
                    </div>
                    <div class="my-5 border-t border-zinc-200"></div>
                    <p class="text-sm font-medium text-zinc-500">Harga sewa</p>
                    <p class="mt-1 text-3xl font-black text-red-700">Rp{{ number_format($motor->harga, 0, ',', '.') }}<span class="text-sm font-medium text-zinc-500">/ hari</span></p>
                </div>
            </aside>
            <div class="panel p-6 sm:p-8">
                <div class="mb-7 flex items-start gap-4">
                    <div class="grid size-12 shrink-0 place-items-center rounded-xl bg-red-50 text-red-700"><i class="fa-regular fa-calendar text-xl"></i></div>
                    <div>
                        <h2 class="text-xl font-black text-zinc-950">Atur Jadwal Rental</h2>
                        <p class="mt-1 text-sm text-zinc-500">Pilih kapan kamu mulai dan selesai menggunakan motor.</p>
                    </div>
                </div>
                <form id="checkout-form" class="grid gap-6">
                    <div class="grid gap-5 sm:grid-cols-2">
                        <label class="grid gap-2 text-sm font-bold text-zinc-800">Tanggal mulai
                            <input type="date" name="tanggal_mulai" class="field" required>
                            <span class="text-xs font-normal text-zinc-500">Hari pertama rental</span>
                        </label>
                        <label class="grid gap-2 text-sm font-bold text-zinc-800">Tanggal selesai
                            <input type="date" name="tanggal_selesai" class="field" required>
                            <span class="text-xs font-normal text-zinc-500">Hari terakhir rental</span>
                        </label>
                    </div>
                    <div class="rounded-lg border border-zinc-200 bg-zinc-50 p-5 dark:border-zinc-800 dark:bg-zinc-900">
                        <h3 class="font-black text-zinc-950 dark:text-zinc-100">Ringkasan Rental</h3>
                        <div class="mt-4 grid gap-3 text-sm">
                            <div class="flex items-center justify-between gap-4"><span class="text-zinc-500 dark:text-zinc-400">Harga per hari</span><span class="font-semibold text-zinc-900 dark:text-zinc-100">Rp{{ number_format($motor->harga, 0, ',', '.') }}</span></div>
                            <div class="flex items-center justify-between gap-4"><span class="text-zinc-500 dark:text-zinc-400">Lama rental</span><span id="rental-days" class="font-semibold text-zinc-900 dark:text-zinc-100">-</span></div>
                            <div class="flex items-center justify-between gap-4"><span class="text-zinc-500 dark:text-zinc-400">Tanggal</span><span id="rental-date" class="text-right font-semibold text-zinc-900 dark:text-zinc-100">Belum dipilih</span></div>
                        </div>
                        <div class="my-4 border-t border-zinc-200 dark:border-zinc-800"></div>
                        <div class="flex items-center justify-between"><span class="font-black text-zinc-950 dark:text-zinc-100">Total pembayaran</span><span id="rental-total" class="text-2xl font-black text-red-700">Rp0</span></div>
                    </div>
                    <div class="flex gap-3 rounded-lg bg-red-50 p-4">
                        <div class="mt-0.5 shrink-0 text-red-700"><i class="fa-solid fa-circle-info"></i></div>
                        <div>
                            <p class="text-sm font-bold text-red-900">Sebelum membayar</p>
                            <p class="mt-1 text-xs leading-5 text-red-800">Pastikan tanggal rental sudah benar. Setelah transaksi dibuat, kamu akan diarahkan ke pembayaran Midtrans.</p>
                        </div>
                    </div>
                    <button class="btn-primary w-full py-3 text-base" type="submit"><i class="fa-regular fa-credit-card mr-2"></i> Buat Transaksi & Lanjut Bayar</button>
                </form>
            </div>
        </div>
    </section>
    <script src="{{ config('services.midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script>
        const checkoutForm = document.getElementById('checkout-form');
        const startInput = checkoutForm.querySelector(
            '[name="tanggal_mulai"]'
        );
        const endInput = checkoutForm.querySelector(
            '[name="tanggal_selesai"]'
        );
        const rentalDays = document.getElementById('rental-days');
        const rentalDate = document.getElementById('rental-date');
        const rentalTotal = document.getElementById('rental-total');
        const pricePerDay = {{ $motor->harga }};
        function updateRentalSummary() {
            if (!startInput.value || !endInput.value) {
                rentalDays.textContent = '-';
                rentalDate.textContent = 'Belum dipilih';
                rentalTotal.textContent = 'Rp0';
                return;
            }
            const start = new Date(startInput.value);
            const end = new Date(endInput.value);
            const difference =
                Math.floor(
                    (end - start) /
                    (1000 * 60 * 60 * 24)
                );
            if (difference <= 0) {
                rentalDays.textContent = '-';
                rentalDate.textContent =
                    'Tanggal tidak valid';
                rentalTotal.textContent =
                    'Rp0';
                return;
            }
            const total =
                difference * pricePerDay;
            rentalDays.textContent =
                `${difference} hari`;
            rentalDate.textContent =
                `${startInput.value} → ${endInput.value}`;
            rentalTotal.textContent =
                new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    maximumFractionDigits: 0
                }).format(total);
        }
        startInput.addEventListener('change', () => {
            if (startInput.value) {
                endInput.min = startInput.value;
            }
            updateRentalSummary();
        });
        endInput.addEventListener(
            'change',
            updateRentalSummary
        );
        checkoutForm.addEventListener(
            'submit',
            async (event) => {
                event.preventDefault();
                const form =
                    new FormData(event.currentTarget);
                const response =
                    await fetch('/api/rentals', {
                        method: 'POST',
                        headers:
                            window.rentalApp.authHeaders(),
                        body: JSON.stringify({
                            motor_id: {{ $motor->id }},
                            tanggal_mulai:
                                form.get('tanggal_mulai'),
                            tanggal_selesai:
                                form.get('tanggal_selesai'),
                        }),
                    });
                const json =
                    await response.json();
                window.rentalApp.notifyResponse(
                    response,
                    json,
                    'Transaksi berhasil dibuat. Lanjutkan pembayaran.'
                );
                if (
                    json.snap_token &&
                    window.snap &&
                    !json.snap_token.startsWith('demo-')
                ) {
                    const syncPayment = async (result = {}) => {
                        const syncResponse = await fetch('/api/payments/sync', {
                            method: 'POST',
                            headers: window.rentalApp.authHeaders(),
                            body: JSON.stringify({
                                order_id: result.order_id || json.order_id,
                                transaction_status: result.transaction_status,
                                payment_type: result.payment_type,
                            }),
                        });
                        const syncJson = await syncResponse.json();
                        window.rentalApp.notifyResponse(syncResponse, syncJson, 'Status pembayaran berhasil diperbarui.');
                        if (syncResponse.ok) {
                            window.setTimeout(() => window.location.href = '/akun', 900);
                        }
                    };
                    window.snap.pay(
                        json.snap_token,
                        {
                            onSuccess: syncPayment,
                            onPending: syncPayment,
                            onError: (result) => {
                                window.rentalApp.notify({
                                    type: 'error',
                                    title: 'Pembayaran gagal',
                                    message: result?.status_message || 'Pembayaran belum berhasil diproses.',
                                });
                            },
                            onClose: () => {
                                window.rentalApp.notify({
                                    type: 'info',
                                    title: 'Pembayaran belum selesai',
                                    message: 'Kamu bisa cek atau sinkronkan status pembayaran dari halaman akun.',
                                });
                            },
                        }
                    );
                }
            }
        );
    </script>
</x-layouts.app>
