<x-layouts.app title="Kelola Motor">
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-wide text-red-700">Backend</p>
            <h1 class="mt-2 text-3xl font-black">Kelola Motor</h1>
        </div>
        <div class="grid gap-6 lg:grid-cols-[0.8fr_1.2fr]">
            <form id="motor-form" class="panel grid gap-3 p-5">
                <h2 class="font-bold">Tambah Motor</h2>
                <select class="field" name="brand_id" id="brand-options" required></select>
                <input class="field" name="nama" placeholder="Nama motor" required>
                <input class="field" name="harga" type="number" placeholder="Harga per hari" required>
                <input class="field" name="no_polisi" placeholder="Nomor polisi" required>
                <textarea class="field" name="catatan" placeholder="Catatan"></textarea>
                <input class="field" type="file" name="image_motor" accept="image/*">
                <button class="btn-primary" type="submit">Simpan Motor</button>
                <pre id="motor-result" class="hidden overflow-auto rounded bg-zinc-950 p-4 text-sm text-red-100"></pre>
            </form>
            <section class="panel p-5">
                <h2 class="font-bold">Daftar Motor</h2>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b text-xs uppercase text-zinc-500"><tr><th class="py-2">Motor</th><th>Brand</th><th>Harga</th><th>Status</th><th>Aksi</th></tr></thead>
                        <tbody id="motor-table" class="divide-y divide-zinc-100"></tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>
    <script>
        async function loadMotorsPage() {
            const [brands, motors] = await Promise.all([
                fetch('/api/brands').then((res) => res.json()),
                fetch('/api/motors').then((res) => res.json()),
            ]);
            document.getElementById('brand-options').innerHTML = brands.map((brand) => `<option value="${brand.id}">${brand.nama_brand}</option>`).join('');
            document.getElementById('motor-table').innerHTML = motors.map((motor) => `<tr><td class="py-3 font-medium">${motor.nama}</td><td>${motor.kategori}</td><td>${window.rentalApp.money(motor.harga)}</td><td>${motor.status ? 'Tersedia' : 'Disewa'}</td><td><button class="text-sm font-semibold text-red-700" data-delete="${motor.id}">Hapus</button></td></tr>`).join('');
            document.querySelectorAll('[data-delete]').forEach((button) => button.addEventListener('click', async () => {
                await fetch(`/api/motors/${button.dataset.delete}`, { method: 'DELETE', headers: window.rentalApp.authHeaders() });
                loadMotorsPage();
            }));
        }
        document.getElementById('motor-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const response = await fetch('/api/motors', {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${window.rentalApp.token()}` },
                body: new FormData(event.currentTarget),
            });
            window.rentalApp.showJson(document.getElementById('motor-result'), await response.json());
            if (response.ok) {
                event.currentTarget.reset();
                loadMotorsPage();
            }
        });
        loadMotorsPage();
    </script>
</x-layouts.app>
