<x-layouts.app title="Kelola Brand">
    <section class="relative overflow-hidden">
        <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-red-100/50 dark:bg-red-950/20 blur-3xl"></div>
            <div class="absolute -left-32 bottom-0 h-80 w-80 rounded-full bg-red-50 dark:bg-red-950/10 blur-3xl"></div>
            <div class="absolute right-10 top-24 grid grid-cols-6 gap-3 opacity-30">
                @for ($i = 0; $i < 30; $i++)
                    <span class="h-1 w-1 rounded-full bg-red-300 dark:bg-red-800"></span>
                @endfor
            </div>
        </div>
        <div class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="mb-6">
                <div class="flex items-center gap-3"><p class="text-xs font-extrabold uppercase tracking-[0.2em] text-red-600 dark:text-red-500">Backend</p></div>
                <h1 class="mt-2 text-2xl font-black tracking-tight text-zinc-950 dark:text-white sm:text-3xl">Kelola Brand / Tipe</h1>
                <p class="mt-1.5 max-w-xl text-sm leading-6 text-zinc-500 dark:text-zinc-400">Kelola data brand motor dengan mudah dan terstruktur.</p>
            </div>
            <div class="grid gap-6 lg:grid-cols-[0.85fr_1.15fr]">
                <form id="brand-form" class="group relative overflow-hidden rounded-3xl border border-zinc-200/80 bg-white dark:border-zinc-800 dark:bg-zinc-900 p-6 shadow-[0_15px_45px_rgba(0,0,0,0.06)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_20px_55px_rgba(0,0,0,0.09)] sm:p-7">
                    <div class="absolute -right-16 -top-16 h-40 w-40 rounded-full bg-red-50 dark:bg-red-950/30 transition duration-500 group-hover:scale-125"></div>
                    <div class="relative">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-red-50 dark:bg-red-950/50 text-red-600 dark:text-red-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-extrabold text-zinc-900 dark:text-white">Tambah Brand</h2>
                                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Tambahkan brand motor baru ke sistem.</p>
                            </div>
                        </div>
                        <div class="my-6 h-px bg-zinc-100 dark:bg-zinc-800"></div>
                        <div>
                            <label for="nama_brand" class="mb-2 block text-sm font-bold text-zinc-800 dark:text-zinc-200">Nama Brand</label>
                            <input id="nama_brand" class="w-full rounded-xl border border-zinc-200 bg-zinc-50/50 dark:border-zinc-800 dark:bg-zinc-800/50 px-4 py-3.5 text-sm font-medium text-zinc-900 dark:text-white outline-none transition placeholder:text-zinc-400 dark:placeholder:text-zinc-500 focus:border-red-500 focus:bg-white dark:focus:bg-zinc-800 focus:ring-4 focus:ring-red-500/10" name="nama_brand" placeholder="Contoh: Yamaha" required>
                        </div>
                        <button class="mt-6 flex w-full items-center justify-center gap-2 rounded-xl bg-red-600 px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-red-600/20 transition duration-200 hover:bg-red-700 hover:shadow-red-600/30 active:scale-[0.98]" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2M8 7h8"/></svg>Simpan Brand
                        </button>
                        <div class="mt-5 rounded-2xl bg-zinc-50 dark:bg-zinc-800/50 p-4 border border-zinc-100 dark:border-zinc-800">
                            <div class="flex gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <p class="text-xs leading-relaxed text-zinc-500 dark:text-zinc-400">Pastikan nama brand diketik dengan benar. Brand yang sudah ditambahkan nantinya bisa langsung dipilih saat menambahkan data motor baru.</p>
                            </div>
                        </div>
                    </div>
                </form>
                <section class="relative overflow-hidden rounded-3xl border border-zinc-200/80 bg-white dark:border-zinc-800 dark:bg-zinc-900 p-6 shadow-[0_15px_45px_rgba(0,0,0,0.06)] sm:p-7">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-red-50 dark:bg-red-950/50 text-red-600 dark:text-red-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-extrabold text-zinc-900 dark:text-white">Daftar Brand</h2>
                                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Kelola daftar brand yang telah ditambahkan.</p>
                            </div>
                        </div>
                    </div>
                    <div id="brand-list" class="mt-6 grid gap-3"></div>
                </section>
            </div>
        </div>
    </section>
    <script>
        async function loadBrands() {
            const brands = await fetch('/api/brands').then((res) => res.json());
            document.getElementById('brand-list').innerHTML = brands.map((brand) => `
                <div class="group flex items-center justify-between rounded-2xl border border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-900 px-4 py-4 transition duration-200 hover:-translate-y-0.5 hover:border-red-200 dark:hover:border-red-900 hover:bg-red-50/30 dark:hover:bg-red-950/20 hover:shadow-md">
                    <div class="flex min-w-0 items-center gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-red-50 dark:bg-red-950/50 text-sm font-black text-red-600 dark:text-red-400">${brand.nama_brand.charAt(0).toUpperCase()}</div>
                        <div class="min-w-0">
                            <p class="truncate font-extrabold text-zinc-900 dark:text-white">${brand.nama_brand}</p>
                            <div class="mt-1 flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-red-500"></span><p class="text-sm text-zinc-500 dark:text-zinc-400">${brand.motors.length} motor</p></div>
                        </div>
                    </div>
                    <button class="ml-4 flex shrink-0 items-center gap-1.5 rounded-lg px-3 py-2 text-sm font-bold text-red-600 dark:text-red-400 transition hover:bg-red-100 dark:hover:bg-red-950/50" data-delete="${brand.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h14"/></svg>Hapus
                    </button>
                </div>
            `).join('');
            document.querySelectorAll('[data-delete]').forEach((button) =>
                button.addEventListener('click', async () => {
                    if (!confirm('Hapus brand ini? Motor di bawah brand ini juga akan ikut terhapus.')) return;
                    const response = await fetch(
                        `/api/brands/${button.dataset.delete}`,
                        {
                            method: 'DELETE',
                            headers: window.rentalApp.authHeaders()
                        }
                    );
                    const json = await response.json();
                    window.rentalApp.notifyResponse(
                        response,
                        json,
                        'Brand berhasil dihapus.'
                    );
                    if (response.ok) loadBrands();
                })
            );
        }
        document.getElementById('brand-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const data = Object.fromEntries(
                new FormData(event.currentTarget)
            );
            const response = await fetch('/api/brands', {
                method: 'POST',
                headers: window.rentalApp.authHeaders(),
                body: JSON.stringify(data)
            });
            window.rentalApp.notifyResponse(
                response,
                await response.json(),
                'Brand berhasil ditambahkan.'
            );
            if (response.ok) {
                event.currentTarget.reset();
                loadBrands();
            }
        });
        loadBrands();
    </script>
</x-layouts.app>