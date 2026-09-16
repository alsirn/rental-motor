<x-layouts.app title="Transaksi Offline">
<section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-sm font-black uppercase tracking-[.18em] text-red-600 dark:text-red-700">Backend</p>
            <h1 class="mt-2 text-3xl font-black text-zinc-950 dark:text-white">Transaksi Offline</h1>
            <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Input penyewaan langsung dari toko dan pilih motor yang masih tersedia.</p>
        </div>
        <button onclick="history.back()" class="rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-bold text-zinc-700 shadow-sm transition hover:-translate-y-0.5 hover:border-red-200 hover:bg-red-50 hover:text-red-600 dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-300">Kembali</button>
    </div>
    <div class="grid gap-6 lg:grid-cols-[.85fr_1.15fr]">
        <section class="rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
            <div class="border-b border-zinc-200 px-5 py-4 dark:border-zinc-800">
                <h2 class="font-bold text-red-600 dark:text-red-700">Tambah Transaksi Offline</h2>
                <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">Masukkan data penyewa dan pilih motor.</p>
            </div>
            <form id="offline-form" class="grid gap-4 p-5">
                <div>
                    <label class="mb-1.5 block text-xs font-semibold text-zinc-600 dark:text-zinc-400">Nama Lengkap</label>
                    <input class="field w-full" name="nama_lengkap" placeholder="Nama lengkap" required>
                </div>
                <div>
                    <label class="mb-1.5 block text-xs font-semibold text-zinc-600 dark:text-zinc-400">Nomor WhatsApp</label>
                    <input class="field w-full" name="nomor_whatsapp" placeholder="Nomor WhatsApp" required>
                </div>
                <div>
                    <label class="mb-1.5 block text-xs font-semibold text-zinc-600 dark:text-zinc-400">Gmail</label>
                    <input class="field w-full" type="email" name="gmail" placeholder="nama@gmail.com" required>
                </div>
                <div>
                    <p class="mb-2 text-xs font-semibold text-zinc-600 dark:text-zinc-400">Dokumen Penyewa</p>
                    <div class="grid gap-3 sm:grid-cols-3">
                        @foreach ([['KTP','foto_ktp'],['KK','foto_kk'],['STNK','foto_stnk']] as [$label,$name])
                            <label class="rounded-lg border border-dashed border-zinc-300 p-3 text-center text-xs font-semibold text-zinc-500 transition hover:border-red-700 hover:bg-red-50 dark:border-zinc-700 dark:text-zinc-400 dark:hover:border-red-600 dark:hover:bg-red-950/20">
                                <span class="block text-zinc-700 dark:text-zinc-300">{{ $label }}</span>
                                <input class="mt-2 w-full text-xs" type="file" name="{{ $name }}" accept="image/*">
                            </label>
                        @endforeach
                    </div>
                </div>
                <div>
                    <label class="mb-1.5 block text-xs font-semibold text-zinc-600 dark:text-zinc-400">Brand Motor</label>
                    <select class="field w-full" name="brand_id" id="offline-brand" required></select>
                </div>
                <div>
                    <label class="mb-1.5 block text-xs font-semibold text-zinc-600 dark:text-zinc-400">Pilih Motor</label>
                    <select class="field w-full" name="motor_id" id="offline-motor" required></select>
                </div>
                <button class="btn-primary mt-1 w-full transition hover:-translate-y-0.5 hover:shadow-md active:scale-[.98]" type="submit">Simpan Transaksi</button>
            </form>
        </section>
        <section class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
            <div class="border-b border-zinc-200 p-5 dark:border-zinc-800">
                <h2 class="font-bold text-red-600 dark:text-red-700">Daftar Transaksi Offline</h2>
                <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">Cari berdasarkan nama motor atau nomor polisi.</p>
                <input id="offline-search" class="field mt-4 w-full" type="search" placeholder="Cari motor / nomor polisi...">
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b bg-zinc-50 text-xs uppercase text-zinc-500 dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-400">
                        <tr>
                            <th class="px-5 py-3">Penyewa</th>
                            <th class="py-3">Kontak</th>
                            <th class="py-3">Motor</th>
                            <th class="py-3">Dokumen</th>
                            <th class="px-5 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="offline-table" class="divide-y divide-zinc-100 dark:divide-zinc-800"></tbody>
                </table>
            </div>
        </section>
    </div>
</section>
<script>
    const auth=window.rentalApp.user();
    if(!auth||auth.role!=='admin')location.href='/backend';
    let allMotors=[];
    async function loadOfflineOptions(){
        const [brands,motors]=await Promise.all([
            fetch('/api/brands').then(r=>r.json()),
            fetch('/api/motors').then(r=>r.json())
        ]);
        allMotors=motors.filter(m=>m.status);
        document.getElementById('offline-brand').innerHTML=brands.map(b=>`<option value="${b.id}">${b.nama_brand}</option>`).join('');
        syncMotorOptions();
    }
    function syncMotorOptions(){
        const brandId=Number(document.getElementById('offline-brand').value);
        const motors=allMotors.filter(m=>Number(m.brand_id)===brandId);
        document.getElementById('offline-motor').innerHTML=motors.length
            ?motors.map(m=>`<option value="${m.id}">${m.nama} - ${m.no_polisi}</option>`).join('')
            :'<option value="">Tidak ada motor tersedia</option>';
    }
    async function loadOfflineTransactions(q=''){
        const url=q?`/api/offline-transactions?q=${encodeURIComponent(q)}`:'/api/offline-transactions';
        const response=await fetch(url,{headers:window.rentalApp.authHeaders()});
        const data=await response.json();
        if(!response.ok){
            window.rentalApp.notifyResponse(response,data,'Data transaksi offline gagal dimuat.');
            return;
        }
        document.getElementById('offline-table').innerHTML=data.length?data.map(item=>{
            const docs=[['KTP',item.foto_ktp],['KK',item.foto_kk],['STNK',item.foto_stnk]]
                .map(([label,path])=>path
                    ?`<a class="font-semibold text-red-600 hover:underline" href="/storage/${path}" target="_blank">${label}</a>`
                    :`<span class="text-zinc-400">${label}</span>`
                ).join(' · ');
            return `<tr class="transition hover:bg-zinc-50 dark:hover:bg-zinc-800/50">
                <td class="px-5 py-4 font-semibold text-zinc-900 dark:text-white">${item.nama_lengkap}</td>
                <td class="py-4 text-zinc-600 dark:text-zinc-300">${item.nomor_whatsapp}<br><span class="text-xs text-zinc-500">${item.gmail}</span></td>
                <td class="py-4 text-zinc-600 dark:text-zinc-300">${item.motor?.nama||'-'}<br><span class="text-xs text-zinc-500">${item.motor?.no_polisi||'-'}</span></td>
                <td class="py-4 text-xs">${docs}</td>
                <td class="px-5 py-4"><button class="rounded-lg px-3 py-1.5 text-xs font-semibold text-red-600 transition hover:bg-red-600 hover:text-white" data-delete="${item.id}">Hapus</button></td>
            </tr>`;
        }).join(''):'<tr><td colspan="5" class="px-5 py-10 text-center text-sm text-zinc-500">Belum ada transaksi offline.</td></tr>';
        document.querySelectorAll('[data-delete]').forEach(button=>button.onclick=async()=>{
            if(!confirm('Hapus transaksi offline ini? Motor akan tersedia kembali.'))return;
            const response=await fetch(`/api/offline-transactions/${button.dataset.delete}`,{
                method:'DELETE',headers:window.rentalApp.authHeaders()
            });
            const json=await response.json();
            window.rentalApp.notifyResponse(response,json,'Transaksi offline berhasil dihapus.');
            if(response.ok){
                loadOfflineOptions();
                loadOfflineTransactions(document.getElementById('offline-search').value);
            }
        });
    }
    document.getElementById('offline-brand').onchange=syncMotorOptions;
    document.getElementById('offline-search').oninput=e=>loadOfflineTransactions(e.target.value.trim());
    document.getElementById('offline-form').onsubmit=async e=>{
        e.preventDefault();
        const response=await fetch('/api/offline-transactions',{
            method:'POST',
            headers:{'Accept':'application/json','Authorization':`Bearer ${window.rentalApp.token()}`},
            body:new FormData(e.currentTarget)
        });
        const json=await response.json();
        window.rentalApp.notifyResponse(response,json,'Transaksi offline berhasil disimpan.');
        if(response.ok){
            e.currentTarget.reset();
            await loadOfflineOptions();
            await loadOfflineTransactions();
        }
    };
    loadOfflineOptions();
    loadOfflineTransactions();
</script>
</x-layouts.app>