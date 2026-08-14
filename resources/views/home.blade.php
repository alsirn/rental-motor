<x-layouts.app title="Rental Motor">
    <section class="bg-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-10 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:px-8 lg:py-14">
            <div class="flex flex-col justify-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-wide text-emerald-700">Sewa motor cepat dan rapi</p>
                <h1 class="max-w-3xl text-4xl font-black leading-tight text-zinc-950 sm:text-5xl">Pilih motor, checkout tanggal sewa, bayar lewat Midtrans Snap.</h1>
                <p class="mt-5 max-w-2xl text-base leading-7 text-zinc-600">Website ini mengikuti rancangan di dokumen: pengguna melihat katalog dan menyewa, admin mengelola backend penuh, sedangkan tukang rental membantu operasional tanpa akses hapus histori.</p>
                <div class="mt-7 grid gap-3 sm:grid-cols-3">
                    <div class="rounded border border-zinc-200 bg-zinc-50 p-4">
                        <p class="text-2xl font-bold text-zinc-950">{{ $motors->where('status', true)->count() }}</p>
                        <p class="text-sm text-zinc-500">Motor tersedia</p>
                    </div>
                    <div class="rounded border border-zinc-200 bg-zinc-50 p-4">
                        <p class="text-2xl font-bold text-zinc-950">{{ $brands->count() }}</p>
                        <p class="text-sm text-zinc-500">Brand aktif</p>
                    </div>
                    <div class="rounded border border-zinc-200 bg-zinc-50 p-4">
                        <p class="text-2xl font-bold text-zinc-950">Snap</p>
                        <p class="text-sm text-zinc-500">Pembayaran</p>
                    </div>
                </div>
            </div>
            <div class="grid min-h-80 place-items-center rounded bg-zinc-950 p-8 text-white">
                <div class="w-full max-w-sm">
                    <div class="rounded bg-white p-5 text-zinc-950 shadow-2xl">
                        <div class="mb-4 h-40 rounded bg-gradient-to-br from-emerald-500 via-sky-500 to-zinc-900"></div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-bold">Yamaha Nmax 155</p>
                                <p class="text-sm text-zinc-500">Rp150.000 / hari</p>
                            </div>
                            <span class="rounded bg-emerald-100 px-2 py-1 text-xs font-semibold text-emerald-700">Tersedia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-zinc-950">Daftar Motor</h2>
                <p class="mt-1 text-sm text-zinc-500">Data diambil dari model Eloquent dan siap dipakai oleh endpoint API.</p>
            </div>
            <div class="flex flex-wrap gap-2">
                @foreach ($brands as $brand)
                    <span class="rounded border border-zinc-200 bg-white px-3 py-1 text-sm text-zinc-600">{{ $brand->nama_brand }} ({{ $brand->motors_count }})</span>
                @endforeach
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($motors as $motor)
                <article class="rounded border border-zinc-200 bg-white p-5 shadow-sm">
                    <div class="mb-4 grid h-36 place-items-center rounded bg-zinc-100 text-sm font-semibold text-zinc-400">
                        {{ $motor->brand->nama_brand }}
                    </div>
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-bold text-zinc-950">{{ $motor->nama }}</h3>
                            <p class="mt-1 text-sm text-zinc-500">{{ $motor->no_polisi }} · {{ $motor->catatan }}</p>
                        </div>
                        <span class="rounded px-2 py-1 text-xs font-semibold {{ $motor->status ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">{{ $motor->status ? 'Tersedia' : 'Disewa' }}</span>
                    </div>
                    <div class="mt-5 flex items-center justify-between">
                        <p class="font-bold text-zinc-950">Rp{{ number_format($motor->harga, 0, ',', '.') }}<span class="text-sm font-normal text-zinc-500"> / hari</span></p>
                        <a href="/checkout/{{ $motor->id }}" class="rounded bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700 {{ $motor->status ? '' : 'pointer-events-none opacity-50' }}">Sewa</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</x-layouts.app>
