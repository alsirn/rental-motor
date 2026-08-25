<x-layouts.app title="Rental Motor">
    <section class="reveal-up border-b border-zinc-200 bg-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-10 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:px-8 lg:py-14">
            <div class="flex flex-col justify-center">
                <p class="mb-3 text-sm font-bold uppercase tracking-wide text-red-700">Rental motor online</p>
                <h1 class="max-w-3xl text-4xl font-black leading-tight text-zinc-950 sm:text-5xl">Website rental motor by zahran yang ganteng ini kaya cwo anime anime real no fek fek</h1>
                <p class="mt-5 max-w-2xl text-base leading-7 text-zinc-600">Alur aplikasi mengikuti PRD: user menyewa dari katalog, admin mengelola seluruh data, dan tukang rental membantu operasional tanpa akses hapus histori.</p>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="/register" class="auth-guest btn-primary">Daftar Penyewa</a>
                    <a href="/login" class="auth-guest btn-dark">Masuk</a>
                    <a href="/akun" class="auth-user hidden btn-primary">Lihat Akun</a>
                    <a href="/backend" class="auth-backend hidden btn-dark">Buka Backend</a>
                </div>
            </div>
            <div class="relative min-h-72 overflow-hidden rounded border border-zinc-200 bg-zinc-950 shadow-2xl">
                @if ($heroBanner)
                    <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('storage/'.$heroBanner) }}" alt="Banner motor rental">
                @else
                    <div class="absolute inset-0 bg-gradient-to-br from-zinc-950 via-zinc-800 to-red-800"></div>
                    <div class="absolute inset-0 grid place-items-center px-8 text-center text-white">
                        <div>
                            <p class="text-sm font-bold uppercase tracking-wide text-red-100">Banner Motor</p>
                            <p class="mt-2 text-3xl font-black">Upload gambar dari Backend</p>
                        </div>
                    </div>
                @endif
                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/75 to-transparent p-5 text-white ">
                    <p class="text-sm font-bold uppercase tracking-wide text-red-100">Rental Motor</p>
                    <p class="mt-1 text-2xl font-black">Sewa cepat, tampilan makin keren.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-6 grid gap-4 lg:grid-cols-[1fr_auto] lg:items-end">
            <div>
                <h2 class="text-2xl font-black text-zinc-950">Katalog Motor</h2>
                <p class="mt-1 text-sm text-zinc-500">Filter berdasarkan brand, status ketersediaan, atau kata kunci.</p>
            </div>
            <div class="flex flex-wrap justify-start gap-2 lg:justify-end">
                <button class="brand-filter rounded bg-zinc-950 px-3 py-2 text-sm font-semibold text-white" data-brand="all" type="button">Semua Brand</button>
                @foreach ($brands as $brand)
                    <button class="brand-filter rounded border border-zinc-300 bg-white px-3 py-2 text-sm font-semibold text-zinc-700 hover:border-red-300 hover:text-red-700" data-brand="{{ $brand->nama_brand }}" type="button">{{ $brand->nama_brand }}</button>
                @endforeach
            </div>
        </div>

        <div class="panel mb-6 grid gap-3 p-4 md:grid-cols-[1fr_auto] md:items-center">
            <label class="grid gap-2 text-sm font-semibold">
                Cari motor
                <input id="motor-search" class="field" type="search" placeholder="Cari nama motor, plat nomor, brand, atau catatan...">
            </label>
            <div class="flex flex-wrap gap-2 self-end">
                <button class="status-filter btn-dark" data-status="all" type="button">Semua Status</button>
                <button class="status-filter btn-muted" data-status="tersedia" type="button">Tersedia</button>
                <button class="status-filter btn-muted" data-status="disewa" type="button">Disewa</button>
            </div>
        </div>

        <p id="filter-empty" class="panel mb-4 hidden p-4 text-sm font-semibold text-zinc-600">Tidak ada motor yang sesuai filter.</p>

        <div class="relative grid gap-4 md:grid-cols-2 xl:grid-cols-3" id="motor-grid">
            @foreach ($motors as $motor)
                <article class="motor-card card-hover reveal-up panel overflow-hidden" data-brand="{{ $motor->brand->nama_brand }}" data-status="{{ $motor->status ? 'tersedia' : 'disewa' }}" data-keywords="{{ strtolower($motor->nama.' '.$motor->brand->nama_brand.' '.$motor->no_polisi.' '.$motor->catatan) }}" style="animation-delay: {{ $loop->index * 45 }}ms">
                    <div class="motor-visual grid h-40 place-items-center text-white transition duration-300 {{ $motor->image_motor ? 'has-image' : '' }}">
                        @if ($motor->image_motor)
                            <img class="motor-visual-image" src="{{ asset('storage/'.$motor->image_motor) }}" alt="{{ $motor->nama }}">
                        @endif
                        <div class="motor-visual-gradient grid place-items-center bg-gradient-to-br from-zinc-950 via-zinc-800 to-red-800">
                            <div class="text-center">
                                <p class="text-xs font-bold uppercase tracking-wide text-red-100">{{ $motor->brand->nama_brand }}</p>
                                <p class="mt-1 text-2xl font-black">{{ $motor->nama }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="text-lg font-bold text-zinc-950">{{ $motor->nama }}</h3>
                                <p class="mt-1 text-sm text-zinc-500">{{ $motor->no_polisi }} · {{ $motor->catatan }}</p>
                            </div>
                            <span class="status-pill {{ $motor->status ? 'bg-red-50 text-red-700' : 'bg-zinc-200 text-zinc-600 grayscale' }}">{{ $motor->status ? 'Tersedia' : 'Disewa' }}</span>
                        </div>
                        <div class="mt-5 flex items-center justify-between">
                            <p class="font-black text-zinc-950">Rp{{ number_format($motor->harga, 0, ',', '.') }}<span class="text-sm font-medium text-zinc-500"> / hari</span></p>
                            <a href="/checkout/{{ $motor->id }}" class="{{ $motor->status ? 'btn-primary' : 'btn-muted pointer-events-none opacity-50 grayscale' }}">Sewa</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <script>
        const filterState = { brand: 'all', status: 'all', query: '' };
        const emptyState = document.getElementById('filter-empty');

        function applyMotorFilters() {
            let visibleCount = 0;
            document.querySelectorAll('.motor-card').forEach((card) => {
                const matchesBrand = filterState.brand === 'all' || card.dataset.brand === filterState.brand;
                const matchesStatus = filterState.status === 'all' || card.dataset.status === filterState.status;
                const matchesQuery = !filterState.query || card.dataset.keywords.includes(filterState.query);
                const isVisible = matchesBrand && matchesStatus && matchesQuery;

                card.classList.toggle('hidden', !isVisible);
                card.classList.toggle('is-filtered-out', !isVisible);

                if (isVisible) {
                    visibleCount++;
                    card.animate([
                        { opacity: 0, transform: 'translateY(10px) scale(.98)', filter: 'blur(4px)' },
                        { opacity: 1, transform: 'translateY(0) scale(1)', filter: 'blur(0)' },
                    ], { duration: 220, easing: 'ease-out' });
                }
            });

            emptyState.classList.toggle('hidden', visibleCount !== 0);
        }

        function setActiveButton(buttons, activeButton, activeClass, inactiveClass) {
            buttons.forEach((item) => item.className = inactiveClass);
            activeButton.className = activeClass;
        }

        document.querySelectorAll('.brand-filter').forEach((button) => {
            button.addEventListener('click', () => {
                filterState.brand = button.dataset.brand;
                setActiveButton(
                    document.querySelectorAll('.brand-filter'),
                    button,
                    'brand-filter rounded bg-zinc-950 px-3 py-2 text-sm font-semibold text-white',
                    'brand-filter rounded border border-zinc-300 bg-white px-3 py-2 text-sm font-semibold text-zinc-700 hover:border-red-300 hover:text-red-700'
                );
                applyMotorFilters();
            });
        });

        document.querySelectorAll('.status-filter').forEach((button) => {
            button.addEventListener('click', () => {
                filterState.status = button.dataset.status;
                setActiveButton(
                    document.querySelectorAll('.status-filter'),
                    button,
                    'status-filter btn-dark',
                    'status-filter btn-muted'
                );
                applyMotorFilters();
            });
        });

        document.getElementById('motor-search').addEventListener('input', (event) => {
            filterState.query = event.target.value.trim().toLowerCase();
            applyMotorFilters();
        });
    </script>
</x-layouts.app>
