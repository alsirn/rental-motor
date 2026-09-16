<x-layouts.app title="Kelola Brand">
    <section class="bg-zinc-50 dark:bg-zinc-950">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-black uppercase tracking-[.18em] text-red-600 dark:text-red-700">Backend</p>
                    <h1 class="mt-2 text-3xl font-black text-zinc-950 dark:text-white">Kelola Brand / Tipe</h1>
                    <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Kelola data brand motor yang tersedia di sistem.</p>
                </div>
                <button type="button" onclick="history.back()" class="rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-bold text-zinc-700 shadow-sm transition duration-150 hover:-translate-y-0.5 hover:border-red-200 hover:bg-red-50 hover:text-red-600 hover:shadow-md active:translate-y-0.5 active:scale-[0.97] dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-300">Kembali</button>
            </div>
            <div class="grid gap-6 lg:grid-cols-[360px_1fr]">
                <div class="rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
                    <div class="border-b border-zinc-200 px-5 py-4 dark:border-zinc-800">
                        <h2 class="text-base font-bold text-red-600 dark:text-red-700">Tambah Brand</h2>
                        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Tambahkan brand motor baru.</p>
                    </div>
                    <form id="brand-form" class="p-5">
                        <label for="nama_brand" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Nama Brand</label>
                        <input id="nama_brand" name="nama_brand" type="text" placeholder="Contoh: Yamaha" required class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2.5 text-sm text-zinc-900 outline-none transition placeholder:text-zinc-400 focus:border-red-500 focus:ring-2 focus:ring-red-500/10 dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:placeholder:text-zinc-500">
                        <button type="submit" class="mt-4 w-full rounded-lg bg-red-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:bg-red-700 hover:shadow-md active:scale-[.98]">Simpan Brand</button>
                        <div class="mt-4 rounded-lg border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-800 dark:bg-zinc-800/50">
                            <p class="text-xs leading-5 text-zinc-500 dark:text-zinc-400">Brand yang ditambahkan dapat dipilih saat membuat atau mengelola data motor.</p>
                        </div>
                    </form>
                </div>
                <div class="rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
                    <div class="border-b border-zinc-200 px-5 py-4 dark:border-zinc-800">
                        <h2 class="text-base font-bold text-red-600 dark:text-red-700">Daftar Brand</h2>
                        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Daftar brand motor yang telah ditambahkan.</p>
                    </div>
                    <div id="brand-list" class="divide-y divide-zinc-100 dark:divide-zinc-800"></div>
                </div>
            </div>
        </div>
    </section>
    <script>
        async function loadBrands() {
            const brands = await fetch('/api/brands').then(res => res.json());
            document.getElementById('brand-list').innerHTML = brands.map(brand => `
                <div class="flex items-center justify-between gap-4 px-5 py-4 transition hover:bg-zinc-50 dark:hover:bg-zinc-800/50">
                    <div class="flex min-w-0 items-center gap-3">
                        <div class="grid h-10 w-10 shrink-0 place-items-center rounded-lg bg-red-50 text-sm font-bold text-red-600 dark:bg-red-950/40 dark:text-red-700">${brand.nama_brand.charAt(0).toUpperCase()}</div>
                        <div class="min-w-0">
                            <p class="truncate text-sm font-semibold text-zinc-900 dark:text-white">${brand.nama_brand}</p>
                            <p class="mt-0.5 text-xs text-zinc-500 dark:text-zinc-400">${brand.motors.length} motor</p>
                        </div>
                    </div>
                    <button type="button" data-delete="${brand.id}" class="shrink-0 rounded-lg px-3 py-2 text-xs font-semibold text-red-600 transition-all duration-200 hover:-translate-y-0.5 hover:bg-red-600 hover:text-white hover:shadow-sm active:scale-95 dark:text-red-700 dark:hover:bg-red-600 dark:hover:text-white">Hapus</button>
                </div>
            `).join('');
            document.querySelectorAll('[data-delete]').forEach(button =>
                button.onclick = async () => {
                    if (!confirm('Hapus brand ini? Motor di bawah brand ini juga akan ikut terhapus.')) return;
                    const response = await fetch(`/api/brands/${button.dataset.delete}`, {
                        method: 'DELETE',
                        headers: window.rentalApp.authHeaders()
                    });
                    const json = await response.json();
                    window.rentalApp.notifyResponse(response, json, 'Brand berhasil dihapus.');
                    if (response.ok) await loadBrands();
                }
            );
        }
        document.getElementById('brand-form').onsubmit = async event => {
            event.preventDefault();
            const form = event.currentTarget;
            const response = await fetch('/api/brands', {
                method: 'POST',
                headers: {
                    ...window.rentalApp.authHeaders(),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(Object.fromEntries(new FormData(form)))
            });
            const json = await response.json();
            window.rentalApp.notifyResponse(response, json, 'Brand berhasil ditambahkan.');
            if (response.ok) {
                form.reset();
                await loadBrands();
            }
        };
        loadBrands();
    </script>
</x-layouts.app>