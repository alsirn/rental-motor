<x-layouts.app title="Kelola Brand">
    <section class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-wide text-red-700">Backend</p>
            <h1 class="mt-2 text-3xl font-black">Kelola Brand / Tipe</h1>
        </div>
        <div class="grid gap-6 lg:grid-cols-[0.8fr_1.2fr]">
            <form id="brand-form" class="panel grid gap-3 p-5">
                <h2 class="font-bold">Tambah Brand</h2>
                <input class="field" name="nama_brand" placeholder="Contoh: Yamaha" required>
                <button class="btn-primary" type="submit">Simpan Brand</button>
            </form>
            <section class="panel p-5">
                <h2 class="font-bold">Daftar Brand</h2>
                <div id="brand-list" class="mt-4 grid gap-3"></div>
            </section>
        </div>
    </section>
    <script>
        async function loadBrands() {
            const brands = await fetch('/api/brands').then((res) => res.json());
            document.getElementById('brand-list').innerHTML = brands.map((brand) => `<div class="flex items-center justify-between rounded border border-zinc-200 p-3"><div><p class="font-semibold">${brand.nama_brand}</p><p class="text-sm text-zinc-500">${brand.motors.length} motor</p></div><button class="text-sm font-semibold text-red-700" data-delete="${brand.id}">Hapus</button></div>`).join('');
            document.querySelectorAll('[data-delete]').forEach((button) => button.addEventListener('click', async () => {
                if (!confirm('Hapus brand ini? Motor di bawah brand ini juga akan ikut terhapus.')) return;
                const response = await fetch(`/api/brands/${button.dataset.delete}`, { method: 'DELETE', headers: window.rentalApp.authHeaders() });
                const json = await response.json();
                window.rentalApp.notifyResponse(response, json, 'Brand berhasil dihapus.');
                if (response.ok) loadBrands();
            }));
        }
        document.getElementById('brand-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const data = Object.fromEntries(new FormData(event.currentTarget));
            const response = await fetch('/api/brands', { method: 'POST', headers: window.rentalApp.authHeaders(), body: JSON.stringify(data) });
            window.rentalApp.notifyResponse(response, await response.json(), 'Brand berhasil ditambahkan.');
            if (response.ok) {
                event.currentTarget.reset();
                loadBrands();
            }
        });
        loadBrands();
    </script>
</x-layouts.app>
