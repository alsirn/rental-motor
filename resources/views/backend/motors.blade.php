<x-layouts.app title="Kelola Motor">
<section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="mb-8 flex items-start justify-between gap-4">
        <div>
            <p class="text-sm font-black uppercase tracking-[.18em] text-red-600 dark:text-red-400">Backend</p>
            <h1 class="mt-2 text-3xl font-black tracking-tight text-zinc-900 dark:text-white">Kelola Motor</h1>
            <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400">Kelola data motor, harga, status, dan informasi kendaraan rental.</p>
        </div>
        <button type="button" onclick="history.back()" class="rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-bold text-zinc-700 shadow-sm transition duration-150 hover:-translate-y-0.5 hover:border-red-200 hover:bg-red-50 hover:text-red-600 hover:shadow-md active:translate-y-0.5 active:scale-[0.97] dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-300">Kembali</button>
    </div>
    <div class="mb-6 grid grid-cols-2 gap-4 lg:grid-cols-4">
        @foreach([
            ['stat-total','Total Motor','unit','text-zinc-900 dark:text-white'],
            ['stat-available','Tersedia','aktif','text-emerald-600 dark:text-emerald-400'],
            ['stat-rented','Disewa','sedang disewa','text-amber-600 dark:text-amber-400'],
            ['stat-brands','Jumlah Merek','merek','text-red-600 dark:text-red-400']
        ] as [$id,$title,$suffix,$color])
            <div class="cursor-pointer rounded-2xl border border-zinc-200 bg-white p-5 shadow-sm transition duration-150 hover:-translate-y-1 hover:shadow-md active:translate-y-1 active:scale-[0.98] dark:border-zinc-800 dark:bg-zinc-900">
                <p class="text-xs font-bold uppercase tracking-wider text-zinc-400">{{ $title }}</p>
                <div class="mt-2 flex items-end justify-between">
                    <p id="{{ $id }}" class="text-3xl font-black {{ $color }}">0</p>
                    <span class="text-xs font-semibold text-zinc-400">{{ $suffix }}</span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="grid items-start gap-6 lg:grid-cols-[.8fr_1.2fr]">
        <form id="motor-form" enctype="multipart/form-data" class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
            <div class="mb-6 flex items-start justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-red-600 dark:text-red-400">Data Motor</p>
                    <h2 id="motor-form-title" class="mt-1 text-xl font-black text-zinc-900 dark:text-white">Tambah Motor</h2>
                    <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Isi data motor yang ingin ditambahkan.</p>
                </div>
                <button id="cancel-edit" type="button" class="hidden rounded-lg px-3 py-2 text-xs font-bold text-zinc-500 hover:bg-red-50 hover:text-red-600">Batal</button>
            </div>
            <input type="hidden" id="editing-motor-id">
            <div class="space-y-4">
                <select id="brand-options" name="brand_id" class="field w-full dark:border-zinc-700 dark:bg-zinc-950 dark:text-white" required></select>
                <input id="motor-name" name="nama" type="text" class="field w-full dark:border-zinc-700 dark:bg-zinc-950 dark:text-white" placeholder="Contoh: Nmax 155" required>
                <input id="motor-price" name="harga" type="number" min="0" class="field w-full dark:border-zinc-700 dark:bg-zinc-950 dark:text-white" placeholder="150000" required>
                <input id="motor-plate" name="no_polisi" type="text" class="field w-full uppercase dark:border-zinc-700 dark:bg-zinc-950 dark:text-white" placeholder="Contoh: B 1234 XYZ" required>
                <select id="motor-status" name="status" class="field w-full dark:border-zinc-700 dark:bg-zinc-950 dark:text-white">
                    <option value="1">Tersedia</option>
                    <option value="0">Disewa</option>
                </select>
                <textarea id="motor-note" name="catatan" class="field min-h-[100px] w-full resize-none dark:border-zinc-700 dark:bg-zinc-950 dark:text-white" placeholder="Contoh: Kondisi motor sangat baik..."></textarea>
                <div>
                    <div class="grid gap-3 sm:grid-cols-3">
                        <label>
                            <span class="mb-1 block text-xs font-bold text-zinc-500">Foto Depan</span>
                            <input name="image_motor_1" type="file" accept="image/*" class="field w-full cursor-pointer dark:bg-zinc-950">
                        </label>
                        <label>
                            <span class="mb-1 block text-xs font-bold text-zinc-500">Foto Samping</span>
                            <input name="image_motor_2" type="file" accept="image/*" class="field w-full cursor-pointer dark:bg-zinc-950">
                        </label>
                        <label>
                            <span class="mb-1 block text-xs font-bold text-zinc-500">Foto Belakang</span>
                            <input name="image_motor_3" type="file" accept="image/*" class="field w-full cursor-pointer dark:bg-zinc-950">
                        </label>
                    </div>
                    <p class="mt-2 text-xs text-zinc-400">Maksimal 3 foto: depan, samping, belakang.</p>
                </div>
            </div>
           <button id="motor-submit-label" type="submit" class="mt-6 w-full rounded-xl bg-red-600 px-5 py-3 text-sm font-black text-white transition duration-150 hover:-translate-y-0.5 hover:bg-red-700 hover:shadow-md active:translate-y-0.5 active:scale-[0.98]">Simpan Motor</button>
        </form>
        <section class="min-w-0 overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
            <div class="border-b border-zinc-200 p-6 dark:border-zinc-800">
                <p class="text-xs font-bold uppercase tracking-wider text-red-600 dark:text-red-400">Inventaris</p>
                <h2 class="mt-1 text-xl font-black text-zinc-900 dark:text-white">Daftar Motor</h2>
                <p class="mt-1 text-sm text-zinc-500">Kelola seluruh motor yang tersedia.</p>
                <div class="mt-5 grid gap-3 sm:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-zinc-500">Filter Merek</label>
                        <select id="brand-filter" class="field w-full dark:bg-zinc-950 dark:text-white"><option value="all">Semua Merek</option></select>
                    </div>
                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-zinc-500">Cari Motor</label>
                        <input id="motor-search" type="search" class="field w-full dark:bg-zinc-950 dark:text-white" placeholder="Nama atau nomor polisi...">
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[700px] text-left">
                    <thead class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-800 dark:bg-zinc-950">
                        <tr class="text-xs uppercase tracking-wider text-zinc-500">
                            <th class="px-6 py-4">Motor</th>
                            <th class="px-4 py-4">Merek</th>
                            <th class="px-4 py-4">Harga</th>
                            <th class="px-4 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="motor-table" class="divide-y divide-zinc-100 dark:divide-zinc-800"></tbody>
                </table>
            </div>
            <div id="empty-state" class="hidden px-6 py-14 text-center">
                <h3 class="font-black text-zinc-900 dark:text-white">Motor tidak ditemukan</h3>
                <p class="mt-1 text-sm text-zinc-500">Coba pilih merek lain atau gunakan pencarian berbeda.</p>
            </div>
        </section>
    </div>
</section>
<script>
let allMotors=[],allBrands=[];
const $=id=>document.getElementById(id);
const form=$('motor-form'),brandFilter=$('brand-filter'),search=$('motor-search');
async function loadMotorsPage(){
    try{
        const [br,mr]=await Promise.all([fetch('/api/brands'),fetch('/api/motors')]);
        if(!br.ok||!mr.ok)throw new Error('Gagal mengambil data.');
        allBrands=await br.json();
        allMotors=await mr.json();
        $('brand-options').innerHTML=allBrands.map(b=>`<option value="${b.id}">${b.nama_brand}</option>`).join('');
        brandFilter.innerHTML='<option value="all">Semua Merek</option>'+allBrands.map(b=>`<option value="${b.id}">${b.nama_brand}</option>`).join('');
        updateStatistics();
        renderMotors();
    }catch(e){
        console.error(e);
        window.rentalApp?.notify?.('Gagal memuat data motor.');
    }
}
function updateStatistics(){
    $('stat-total').textContent=allMotors.length;
    $('stat-available').textContent=allMotors.filter(m=>Boolean(m.status)).length;
    $('stat-rented').textContent=allMotors.filter(m=>!Boolean(m.status)).length;
    $('stat-brands').textContent=new Set(allMotors.map(m=>m.brand_id)).size;
}
function renderMotors(){
    const selected=brandFilter.value,keyword=search.value.trim().toLowerCase();
    const motors=allMotors.filter(m=>{
        const brandOk=selected==='all'||String(m.brand_id)===String(selected);
        const text=`${m.nama||''} ${m.no_polisi||''} ${m.kategori||''}`.toLowerCase();
        return brandOk&&text.includes(keyword);
    });
    $('empty-state').classList.toggle('hidden',motors.length>0);
    if(!motors.length){
        $('motor-table').innerHTML='';
        return;
    }
    $('motor-table').innerHTML=motors.map(m=>{
        const brand=allBrands.find(b=>String(b.id)===String(m.brand_id));
        const status=Boolean(m.status)
            ? `<span class="inline-flex rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">● Tersedia</span>`
            : `<span class="inline-flex rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">● Disewa</span>`;
        return `
        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/50">
            <td class="px-6 py-4">
                <p class="font-bold text-zinc-900 dark:text-white">${m.nama}</p>
                <p class="mt-1 text-xs text-zinc-400">${m.no_polisi||'No. polisi belum diisi'}</p>
            </td>
            <td class="px-4 py-4 font-semibold text-zinc-700 dark:text-zinc-300">${brand?.nama_brand||m.kategori||'-'}</td>
            <td class="px-4 py-4">
                <p class="font-bold text-zinc-900 dark:text-white">${window.rentalApp.money(m.harga)}</p>
                <p class="text-xs text-zinc-400">per hari</p>
            </td>
            <td class="px-4 py-4">${status}</td>
            <td class="px-6 py-4">
                <div class="flex justify-end gap-2">
                    <button type="button" data-edit="${encodeURIComponent(JSON.stringify(m))}" class="edit-btn rounded-lg border px-3 py-2 text-xs font-bold transition duration-150 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0.5 active:scale-[0.97]">Edit</button>                    
                    <button type="button" data-delete="${m.id}" class="rounded-lg border border-red-100 bg-red-50 px-3 py-2 text-xs font-bold text-red-600 transition duration-150 hover:-translate-y-0.5 hover:bg-red-100 hover:shadow-md active:translate-y-0.5 active:scale-[0.97]">Hapus</button>
                </div>
            </td>
        </tr>`;
    }).join('');
    document.querySelectorAll('[data-edit]').forEach(btn=>{
        btn.onclick=()=>startEditMotor(JSON.parse(decodeURIComponent(btn.dataset.edit)));
    });
    document.querySelectorAll('[data-delete]').forEach(btn=>{
        btn.onclick=()=>deleteMotor(btn.dataset.delete);
    });
}
async function deleteMotor(id){
    if(!confirm('Hapus motor ini?'))return;
    try{
        const res=await fetch(`/api/motors/${id}`,{
            method:'DELETE',
            headers:window.rentalApp.authHeaders()
        });
        const json=await res.json();
        window.rentalApp.notifyResponse(res,json,'Motor berhasil dihapus.');
        if(res.ok)await loadMotorsPage();
    }catch(e){
        console.error(e);
        window.rentalApp.notify?.('Terjadi kesalahan saat menghapus motor.');
    }
}
function resetMotorForm(){
    form.reset();
    $('editing-motor-id').value='';
    $('motor-form-title').textContent='Tambah Motor';
    $('motor-submit-label').textContent='Simpan Motor';
    $('cancel-edit').classList.add('hidden');
}
function startEditMotor(m){
    document.querySelectorAll('.edit-btn').forEach(btn=>{
        btn.classList.remove('bg-red-600','text-white','border-red-600');
        btn.classList.add('border-zinc-200','dark:border-zinc-700');
    });
    const btn=document.querySelector(`[data-edit="${encodeURIComponent(JSON.stringify(m))}"]`);
    if(btn){
        btn.classList.remove('border-zinc-200','dark:border-zinc-700');
        btn.classList.add('bg-red-600','text-white','border-red-600');
    }
    $('editing-motor-id').value=m.id;
    $('motor-form-title').textContent=`Edit ${m.nama}`;
    $('motor-submit-label').textContent='Update Motor';
    $('cancel-edit').classList.remove('hidden');
    form.elements.brand_id.value=m.brand_id;
    form.elements.nama.value=m.nama;
    form.elements.harga.value=m.harga;
    form.elements.no_polisi.value=m.no_polisi;
    form.elements.status.value=m.status?'1':'0';
    form.elements.catatan.value=m.catatan||'';
    form.elements.image_motor_1.value='';
    form.elements.image_motor_2.value='';
    form.elements.image_motor_3.value='';
    form.scrollIntoView({behavior:'smooth',block:'center'});
}
$('cancel-edit').onclick=resetMotorForm;
brandFilter.onchange=renderMotors;
search.oninput=renderMotors;
form.onsubmit=async e=>{
    e.preventDefault();
    const id=$('editing-motor-id').value;
    try{
        const res=await fetch(id?`/api/motors/${id}`:'/api/motors',{
            method:'POST',
            headers:{
                Accept:'application/json',
                Authorization:`Bearer ${window.rentalApp.token()}`
            },
            body:new FormData(form)
        });
        const json=await res.json();
        window.rentalApp.notifyResponse(
            res,
            json,
            id?'Motor berhasil diperbarui.':'Motor berhasil ditambahkan.'
        );
        if(res.ok){
            resetMotorForm();
            await loadMotorsPage();
        }
    }catch(e){
        console.error(e);
        window.rentalApp.notify?.('Terjadi kesalahan saat menyimpan motor.');
    }
};
loadMotorsPage();
</script>
</x-layouts.app>