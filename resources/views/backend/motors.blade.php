<x-layouts.app title="Kelola Motor">
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-wide text-red-700">Backend</p>
            <h1 class="mt-2 text-3xl font-black">Kelola Motor</h1>
        </div>
        <div class="grid gap-6 lg:grid-cols-[0.8fr_1.2fr]">
            <form id="motor-form" class="panel grid gap-3 p-5">
                <div class="flex items-center justify-between gap-3">
                    <h2 id="motor-form-title" class="font-bold">Tambah Motor</h2>
                    <button id="cancel-edit" class="hidden text-sm font-semibold text-zinc-500 hover:text-red-700" type="button">Batal edit</button>
                </div>
                <input type="hidden" id="editing-motor-id" value="">
                <select class="field" name="brand_id" id="brand-options" required></select>
                <input class="field" name="nama" placeholder="Nama motor" required>
                <input class="field" name="harga" type="number" placeholder="Harga per hari" required>
                <input class="field" name="no_polisi" placeholder="Nomor polisi" required>
                <select class="field" name="status" id="motor-status">
                    <option value="1">Tersedia</option>
                    <option value="0">Disewa</option>
                </select>
                <textarea class="field" name="catatan" placeholder="Catatan"></textarea>
                <input class="field" type="file" name="image_motor" accept="image/*">
                <button id="motor-submit-label" class="btn-primary" type="submit">Simpan Motor</button>
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
            document.getElementById('motor-table').innerHTML = motors.map((motor) => `<tr><td class="py-3 font-medium">${motor.nama}</td><td>${motor.kategori}</td><td>${window.rentalApp.money(motor.harga)}</td><td>${motor.status ? 'Tersedia' : 'Disewa'}</td><td><div class="flex flex-wrap gap-3"><button class="text-sm font-semibold text-zinc-500 hover:text-red-700" data-edit="${encodeURIComponent(JSON.stringify(motor))}">Edit</button><button class="text-sm font-semibold text-red-700" data-delete="${motor.id}">Hapus</button></div></td></tr>`).join('');
            document.querySelectorAll('[data-edit]').forEach((button) => button.addEventListener('click', () => {
                startEditMotor(JSON.parse(decodeURIComponent(button.dataset.edit)));
            }));
            document.querySelectorAll('[data-delete]').forEach((button) => button.addEventListener('click', async () => {
                if (!confirm('Hapus motor ini?')) return;
                const response = await fetch(`/api/motors/${button.dataset.delete}`, { method: 'DELETE', headers: window.rentalApp.authHeaders() });
                const json = await response.json();
                window.rentalApp.notifyResponse(response, json, 'Motor berhasil dihapus.');
                if (response.ok) loadMotorsPage();
            }));
        }

        function resetMotorForm() {
            const form = document.getElementById('motor-form');
            form.reset();
            document.getElementById('editing-motor-id').value = '';
            document.getElementById('motor-form-title').textContent = 'Tambah Motor';
            document.getElementById('motor-submit-label').textContent = 'Simpan Motor';
            document.getElementById('cancel-edit').classList.add('hidden');
        }

        function startEditMotor(motor) {
            const form = document.getElementById('motor-form');
            document.getElementById('editing-motor-id').value = motor.id;
            document.getElementById('motor-form-title').textContent = `Edit ${motor.nama}`;
            document.getElementById('motor-submit-label').textContent = 'Update Motor';
            document.getElementById('cancel-edit').classList.remove('hidden');
            form.elements.brand_id.value = motor.brand_id;
            form.elements.nama.value = motor.nama;
            form.elements.harga.value = motor.harga;
            form.elements.no_polisi.value = motor.no_polisi;
            form.elements.status.value = motor.status ? '1' : '0';
            form.elements.catatan.value = motor.catatan || '';
            form.elements.image_motor.value = '';
            form.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        document.getElementById('cancel-edit').addEventListener('click', resetMotorForm);

        document.getElementById('motor-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const editId = document.getElementById('editing-motor-id').value;
            const response = await fetch(editId ? `/api/motors/${editId}` : '/api/motors', {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${window.rentalApp.token()}` },
                body: new FormData(event.currentTarget),
            });
            window.rentalApp.notifyResponse(response, await response.json(), editId ? 'Motor berhasil diperbarui.' : 'Motor berhasil ditambahkan.');
            if (response.ok) {
                resetMotorForm();
                loadMotorsPage();
            }
        });
        loadMotorsPage();
    </script>
</x-layouts.app>
