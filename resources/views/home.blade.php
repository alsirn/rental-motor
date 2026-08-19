<x-layouts.app title="Rental Motor">
    <section class="border-b border-zinc-200 bg-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-10 sm:px-6 lg:grid-cols-[1.1fr_0.9fr] lg:px-8 lg:py-14">
            <div class="flex flex-col justify-center">
                <p class="mb-3 text-sm font-bold uppercase tracking-wide text-red-700">Rental motor online</p>
                <h1 class="max-w-3xl text-4xl font-black leading-tight text-zinc-950 sm:text-5xl">Pilih motor, verifikasi akun, checkout, lalu bayar dengan Midtrans.</h1>
                <p class="mt-5 max-w-2xl text-base leading-7 text-zinc-600">Alur aplikasi mengikuti PRD: user menyewa dari katalog, admin mengelola seluruh data, dan tukang rental membantu operasional tanpa akses hapus histori.</p>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="/register" class="auth-guest btn-primary">Daftar Penyewa</a>
                    <a href="/login" class="auth-guest btn-dark">Masuk</a>
                    <a href="/akun" class="auth-user hidden btn-primary">Lihat Akun</a>
                    <a href="/backend" class="auth-backend hidden btn-dark">Buka Backend</a>
                </div>
            </div>
            <div class="grid min-h-80 place-items-center rounded bg-zinc-950 p-6 text-white">
                <div class="w-full max-w-md rounded border border-white/10 bg-white/10 p-5 shadow-2xl">
                    <div class="mb-5 flex items-center justify-between">
                        <span class="rounded bg-red-600 px-3 py-1 text-sm font-bold">Snap Ready</span>
                        <span class="text-sm text-zinc-300">REST API + Sanctum</span>
                    </div>
                    <div class="grid gap-3">
                        <div class="rounded bg-white p-4 text-zinc-950">
                            <p class="font-bold">1. Login / registrasi</p>
                            <p class="text-sm text-zinc-500">Token disimpan untuk checkout dan upload dokumen.</p>
                        </div>
                        <div class="rounded bg-white p-4 text-zinc-950">
                            <p class="font-bold">2. Verifikasi e-KTP, KK, SIM</p>
                            <p class="text-sm text-zinc-500">Admin menyetujui akun sebelum penyewaan.</p>
                        </div>
                        <div class="rounded bg-white p-4 text-zinc-950">
                            <p class="font-bold">3. Checkout & pembayaran</p>
                            <p class="text-sm text-zinc-500">Backend membuat order_id dan snap_token.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-6 grid gap-4 lg:grid-cols-[1fr_auto] lg:items-end">
            <div>
                <h2 class="text-2xl font-black text-zinc-950">Katalog Motor</h2>
                <p class="mt-1 text-sm text-zinc-500">Filter berdasarkan brand dan status ketersediaan.</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <button class="brand-filter rounded bg-zinc-950 px-3 py-2 text-sm font-semibold text-white" data-brand="all" type="button">Semua</button>
                @foreach ($brands as $brand)
                    <button class="brand-filter rounded border border-zinc-300 bg-white px-3 py-2 text-sm font-semibold text-zinc-700 hover:border-red-300 hover:text-red-700" data-brand="{{ $brand->nama_brand }}" type="button">{{ $brand->nama_brand }}</button>
                @endforeach
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3" id="motor-grid">
            @foreach ($motors as $motor)
                <article class="motor-card panel overflow-hidden" data-brand="{{ $motor->brand->nama_brand }}">
                    <div class="grid h-40 place-items-center bg-gradient-to-br from-zinc-950 via-zinc-800 to-red-800 text-white">
                        <div class="text-center">
                            <p class="text-xs font-bold uppercase tracking-wide text-red-100">{{ $motor->brand->nama_brand }}</p>
                            <p class="mt-1 text-2xl font-black">{{ $motor->nama }}</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="text-lg font-bold text-zinc-950">{{ $motor->nama }}</h3>
                                <p class="mt-1 text-sm text-zinc-500">{{ $motor->no_polisi }} · {{ $motor->catatan }}</p>
                            </div>
                            <span class="status-pill {{ $motor->status ? 'bg-red-50 text-red-700' : 'bg-zinc-200 text-zinc-600' }}">{{ $motor->status ? 'Tersedia' : 'Disewa' }}</span>
                        </div>
                        <div class="mt-5 flex items-center justify-between">
                            <p class="font-black text-zinc-950">Rp{{ number_format($motor->harga, 0, ',', '.') }}<span class="text-sm font-medium text-zinc-500"> / hari</span></p>
                            <a href="/checkout/{{ $motor->id }}" class="{{ $motor->status ? 'btn-primary' : 'btn-muted pointer-events-none opacity-50' }}">Sewa</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <script>
        document.querySelectorAll('.brand-filter').forEach((button) => {
            button.addEventListener('click', () => {
                const brand = button.dataset.brand;
                document.querySelectorAll('.motor-card').forEach((card) => {
                    card.classList.toggle('hidden', brand !== 'all' && card.dataset.brand !== brand);
                });
                document.querySelectorAll('.brand-filter').forEach((item) => {
                    item.className = 'brand-filter rounded border border-zinc-300 bg-white px-3 py-2 text-sm font-semibold text-zinc-700 hover:border-red-300 hover:text-red-700';
                });
                button.className = 'brand-filter rounded bg-zinc-950 px-3 py-2 text-sm font-semibold text-white';
            });
        });
    </script>
</x-layouts.app>
