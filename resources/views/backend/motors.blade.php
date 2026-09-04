<x-layouts.app title="Kelola Motor">
    <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-black uppercase tracking-[0.18em] text-red-600 dark:text-red-400">Backend</p>
                <h1 class="mt-2 text-3xl font-black tracking-tight text-zinc-900 dark:text-white">Kelola Motor</h1>
                <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400">Kelola data motor, harga, status, dan informasi kendaraan rental.</p>
            </div>
        </div>
        <div class="mb-6 grid grid-cols-2 gap-4 lg:grid-cols-4">
            <div onclick="setStatusFilter('all')" class="cursor-pointer rounded-2xl border border-zinc-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md dark:border-zinc-800 dark:bg-zinc-900">
                <p class="text-xs font-bold uppercase tracking-wider text-zinc-400 dark:text-zinc-500">Total Motor</p>
                <div class="mt-2 flex items-end justify-between">
                    <p id="stat-total" class="text-3xl font-black text-zinc-900 dark:text-white">0</p>
                    <span class="text-xs font-semibold text-zinc-400 dark:text-zinc-500"> unit</span>
                </div>
            </div>
            <div onclick="setStatusFilter('all')" class="cursor-pointer rounded-2xl border border-zinc-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md dark:border-zinc-800 dark:bg-zinc-900">
                <p class="text-xs font-bold uppercase tracking-wider text-zinc-400 dark:text-zinc-500">Tersedia</p>
                <div class="mt-2 flex items-end justify-between">
                    <p id="stat-available" class="text-3xl font-black text-emerald-600 dark:text-emerald-400">0</p>
                    <span class="text-xs font-semibold text-emerald-500 dark:text-emerald-400">aktif</span>
                </div>
            </div>
            <div onclick="setStatusFilter('all')" class="cursor-pointer rounded-2xl border border-zinc-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md dark:border-zinc-800 dark:bg-zinc-900">
                <p class="text-xs font-bold uppercase tracking-wider text-zinc-400 dark:text-zinc-500">Disewa</p>
                <div class="mt-2 flex items-end justify-between">
                    <p id="stat-rented" class="text-3xl font-black text-amber-600 dark:text-amber-400">0</p>
                    <span class="text-xs font-semibold text-amber-500 dark:text-amber-400">sedang disewa</span>
                </div>
            </div>
            <div onclick="setStatusFilter('all')" class="cursor-pointer rounded-2xl border border-zinc-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md dark:border-zinc-800 dark:bg-zinc-900">
                <p class="text-xs font-bold uppercase tracking-wider text-zinc-400 dark:text-zinc-500">Jumlah Merek</p>
                <div class="mt-2 flex items-end justify-between">
                    <p id="stat-brands" class="text-3xl font-black text-red-600 dark:text-red-400">0</p>
                    <span class="text-xs font-semibold text-red-500 dark:text-red-400">merek</span>
                </div>
            </div>
        </div>
        <div class="grid items-start gap-6 lg:grid-cols-[0.8fr_1.2fr]">
            <form id="motor-form" class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
                <div class="mb-6 flex items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-red-600 dark:text-red-400">Data Motor</p>
                        <h2 id="motor-form-title" class="mt-1 text-xl font-black text-zinc-900 dark:text-white">Tambah Motor</h2>
                        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Isi data motor yang ingin ditambahkan.</p>
                    </div>
                    <button id="cancel-edit" type="button" class="hidden rounded-lg px-3 py-2 text-xs font-bold text-zinc-500 transition hover:bg-red-50 hover:text-red-600 dark:text-zinc-400 dark:hover:bg-red-950/30 dark:hover:text-red-400">Batal</button>
                </div>
                <input type="hidden" id="editing-motor-id" value="">
                <div class="mb-4"><select id="brand-options" name="brand_id" class="field w-full dark:border-zinc-700 dark:bg-zinc-950 dark:text-white" required></select></div>
                <div class="mb-4"><input id="motor-name" name="nama" type="text" class="field w-full dark:border-zinc-700 dark:bg-zinc-950 dark:text-white dark:placeholder:text-zinc-500" placeholder="Contoh: Nmax 155" required></div>
                <div class="mb-4"><div class="relative"><input id="motor-price" name="harga" type="number" min="0" class="field w-full pl-12 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white dark:placeholder:text-zinc-500" placeholder="150000" required></div></div>
                <div class="mb-4"><input id="motor-plate" name="no_polisi" type="text" class="field w-full uppercase dark:border-zinc-700 dark:bg-zinc-950 dark:text-white dark:placeholder:text-zinc-500" placeholder="Contoh: B 1234 XYZ" required></div>
                <div class="mb-4">
                    <select id="motor-status" name="status" class="field w-full dark:border-zinc-700 dark:bg-zinc-950 dark:text-white">
                        <option value="1">Tersedia</option>
                        <option value="0">Disewa</option>
                    </select>
                </div>
                <div class="mb-4"><textarea id="motor-note" name="catatan" class="field min-h-[100px] w-full resize-none dark:border-zinc-700 dark:bg-zinc-950 dark:text-white dark:placeholder:text-zinc-500" placeholder="Contoh: Kondisi motor sangat baik..."></textarea></div>
                <div class="mb-6"><input id="motor-image" name="image_motor" type="file" accept="image/*" class="field w-full cursor-pointer dark:border-zinc-700 dark:bg-zinc-950 dark:text-zinc-300"></div>
                <button id="motor-submit-label" type="submit" class="w-full rounded-xl bg-red-600 px-5 py-3 text-sm font-black text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-red-700 hover:shadow-md active:translate-y-0 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-900">Simpan Motor</button>            
            </form>
            <section class="min-w-0 overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
                <div class="border-b border-zinc-200 p-6 dark:border-zinc-800">
                    <p class="text-xs font-bold uppercase tracking-wider text-red-600 dark:text-red-400">Inventaris</p>
                    <h2 class="mt-1 text-xl font-black text-zinc-900 dark:text-white">Daftar Motor</h2>
                    <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Kelola seluruh motor yang tersedia.</p>
                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        <div>
                            <label for="brand-filter" class="mb-2 block text-xs font-bold uppercase tracking-wider text-zinc-500 dark:text-zinc-400">Filter Merek</label>
                            <select id="brand-filter" class="field w-full dark:border-zinc-700 dark:bg-zinc-950 dark:text-white"><option value="all">Semua Merek</option></select>
                        </div>
                        <div>
                            <label for="motor-search" class="mb-2 block text-xs font-bold uppercase tracking-wider text-zinc-500 dark:text-zinc-400">Cari Motor</label>
                            <input id="motor-search" type="search" class="field w-full dark:border-zinc-700 dark:bg-zinc-950 dark:text-white dark:placeholder:text-zinc-500" placeholder="Nama atau nomor polisi...">
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[700px] text-left">
                        <thead class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-800 dark:bg-zinc-950">
                            <tr class="text-xs uppercase tracking-wider text-zinc-500 dark:text-zinc-400">
                                <th class="px-6 py-4 font-bold">Motor</th>
                                <th class="px-4 py-4 font-bold">Merek</th>
                                <th class="px-4 py-4 font-bold">Harga</th>
                                <th class="px-4 py-4 font-bold">Status</th>
                                <th class="px-6 py-4 text-right font-bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="motor-table" class="divide-y divide-zinc-100 dark:divide-zinc-800"></tbody>
                    </table>
                </div>
                <div id="empty-state" class="hidden px-6 py-14 text-center">
                    <div class="mx-auto h-10 w-10 rounded-full border-2 border-zinc-200 dark:border-zinc-700"></div>
                    <h3 class="mt-4 font-black text-zinc-900 dark:text-white">Motor tidak ditemukan</h3>
                    <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Coba pilih merek lain atau gunakan kata pencarian berbeda.</p>
                </div>
            </section>
        </div>
    </section>
    <script>
        let allMotors = [], allBrands = [];
        const $ = (id) => document.getElementById(id);
        const form = $('motor-form');
        const brandFilter = $('brand-filter');
        const search = $('motor-search');
        async function loadMotorsPage() {
            try {
                const [brandsRes, motorsRes] = await Promise.all([
                    fetch('/api/brands'),
                    fetch('/api/motors')
                ]);
                if (!brandsRes.ok || !motorsRes.ok) throw new Error('Gagal mengambil data.');
                allBrands = await brandsRes.json();
                allMotors = await motorsRes.json();
                $('brand-options').innerHTML = allBrands.map(b =>
                    `<option value="${b.id}">${b.nama_brand}</option>`
                ).join('');
                brandFilter.innerHTML = `
                    <option value="all">Semua Merek</option>
                    ${allBrands.map(b => `<option value="${b.id}">${b.nama_brand}</option>`).join('')}
                `;
                updateStatistics();
                renderMotors();
            } catch (error) {
                console.error(error);
                window.rentalApp?.notify?.('Gagal memuat data motor.');
            }
        }
        function updateStatistics() {
            $('stat-total').textContent = allMotors.length;
            $('stat-available').textContent = allMotors.filter(m => Boolean(m.status)).length;
            $('stat-rented').textContent = allMotors.filter(m => !Boolean(m.status)).length;
            $('stat-brands').textContent = new Set(allMotors.map(m => m.brand_id)).size;
        }
        function renderMotors() {
            const selectedBrand = brandFilter.value;
            const keyword = search.value.trim().toLowerCase();
            const motors = allMotors.filter(m => {
                const brandMatch = selectedBrand === 'all' || String(m.brand_id) === String(selectedBrand);
                const text = `${m.nama || ''} ${m.no_polisi || ''} ${m.kategori || ''}`.toLowerCase();
                return brandMatch && text.includes(keyword);
            });
            const table = $('motor-table');
            $('empty-state').classList.toggle('hidden', motors.length > 0);
            if (!motors.length) {
                table.innerHTML = '';
                return;
            }
            table.innerHTML = motors.map(m => {
                const brand = allBrands.find(b => String(b.id) === String(m.brand_id));
                const brandName = brand?.nama_brand || m.kategori || '-';
                const status = Boolean(m.status)
                    ? `<span class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700 dark:bg-emerald-950/50 dark:text-emerald-400"><span class="mr-2 h-1.5 w-1.5 rounded-full bg-emerald-500"></span>Tersedia</span>`
                    : `<span class="inline-flex items-center rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700 dark:bg-amber-950/50 dark:text-amber-400"><span class="mr-2 h-1.5 w-1.5 rounded-full bg-amber-500"></span>Disewa</span>`;
                return `
                    <tr class="transition hover:bg-zinc-50 dark:hover:bg-zinc-800/50">
                        <td class="px-6 py-4">
                            <p class="font-bold text-zinc-900 dark:text-white">${m.nama}</p>
                            <p class="mt-1 text-xs text-zinc-400 dark:text-zinc-500">${m.no_polisi || 'No. polisi belum diisi'}</p>
                        </td>
                        <td class="px-4 py-4 font-semibold text-zinc-700 dark:text-zinc-300">${brandName}</td>
                        <td class="px-4 py-4">
                            <p class="font-bold text-zinc-900 dark:text-white">${window.rentalApp.money(m.harga)}</p>
                            <p class="mt-0.5 text-xs text-zinc-400 dark:text-zinc-500">per hari</p>
                        </td>
                        <td class="px-4 py-4">${status}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-2">
                                <button type="button" data-edit="${encodeURIComponent(JSON.stringify(m))}" class="rounded-lg border border-zinc-200 px-3 py-2 text-xs font-bold text-zinc-600 transition hover:bg-zinc-100 hover:text-zinc-900 dark:border-zinc-700 dark:text-zinc-300 dark:hover:bg-zinc-800 dark:hover:text-white">Edit</button>
                                <button type="button" data-delete="${m.id}" class="rounded-lg border border-red-100 bg-red-50 px-3 py-2 text-xs font-bold text-red-600 transition hover:bg-red-100 dark:border-red-900/50 dark:bg-red-950/30 dark:text-red-400 dark:hover:bg-red-950/60">Hapus</button>
                            </div>
                        </td>
                    </tr>
                `;
            }).join('');
            document.querySelectorAll('[data-edit]').forEach(btn => {
                btn.onclick = () => startEditMotor(JSON.parse(decodeURIComponent(btn.dataset.edit)));
            });
            document.querySelectorAll('[data-delete]').forEach(btn => {
                btn.onclick = () => deleteMotor(btn.dataset.delete);
            });
        }
        async function deleteMotor(id) {
            if (!confirm('Hapus motor ini?')) return;
            try {
                const res = await fetch(`/api/motors/${id}`, {
                    method: 'DELETE',
                    headers: window.rentalApp.authHeaders()
                });
                const json = await res.json();
                window.rentalApp.notifyResponse(res, json, 'Motor berhasil dihapus.');
                if (res.ok) loadMotorsPage();
            } catch (error) {
                console.error(error);
                window.rentalApp.notify?.('Terjadi kesalahan saat menghapus motor.');
            }
        }
        function resetMotorForm() {
            form.reset();
            $('editing-motor-id').value = '';
            $('motor-form-title').textContent = 'Tambah Motor';
            $('motor-submit-label').textContent = 'Simpan Motor';
            $('cancel-edit').classList.add('hidden');
        }
        function startEditMotor(motor) {
            $('editing-motor-id').value = motor.id;
            $('motor-form-title').textContent = `Edit ${motor.nama}`;
            $('motor-submit-label').textContent = 'Update Motor';
            $('cancel-edit').classList.remove('hidden');
            form.elements.brand_id.value = motor.brand_id;
            form.elements.nama.value = motor.nama;
            form.elements.harga.value = motor.harga;
            form.elements.no_polisi.value = motor.no_polisi;
            form.elements.status.value = motor.status ? '1' : '0';
            form.elements.catatan.value = motor.catatan || '';
            form.elements.image_motor.value = '';
            form.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        $('cancel-edit').onclick = resetMotorForm;
        brandFilter.onchange = renderMotors;
        search.oninput = renderMotors;
        form.onsubmit = async (event) => {
            event.preventDefault();
            const editId = $('editing-motor-id').value;
            try {
                const res = await fetch(
                    editId ? `/api/motors/${editId}` : '/api/motors',
                    {
                        method: 'POST',
                        headers: {
                            Accept: 'application/json',
                            Authorization: `Bearer ${window.rentalApp.token()}`
                        },
                        body: new FormData(form)
                    }
                );
                const json = await res.json();
                window.rentalApp.notifyResponse(
                    res,
                    json,
                    editId ? 'Motor berhasil diperbarui.' : 'Motor berhasil ditambahkan.'
                );
                if (res.ok) {
                    resetMotorForm();
                    loadMotorsPage();
                }
            } catch (error) {
                console.error(error);
                window.rentalApp.notify?.('Terjadi kesalahan saat menyimpan motor.');
            }
        };
        loadMotorsPage();
    </script>
</x-layouts.app>