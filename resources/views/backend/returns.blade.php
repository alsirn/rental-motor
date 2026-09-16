<x-layouts.app title="Pengembalian Motor">
<section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-sm font-black uppercase tracking-[.18em] text-red-600 dark:text-red-700">Backend Operasional</p>
            <h1 class="mt-2 text-3xl font-bold text-zinc-950 dark:text-white">Pengembalian Motor</h1>
            <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Periksa bukti foto motor telah kembali sebelum menyetujui pengembalian.</p>
        </div>
        <button onclick="history.back()" class="rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-bold text-zinc-700 shadow-sm transition hover:-translate-y-0.5 hover:border-red-200 hover:bg-red-50 hover:text-red-600 dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-300">Kembali</button>
    </div>
    <section class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
        <div class="border-b border-zinc-200 p-5 dark:border-zinc-800">
            <p class="text-xs font-bold uppercase tracking-wider text-red-600 dark:text-red-700">Rental Online</p>
            <h2 id="motor-form-title" class="mt-1 text-xl font-black text-zinc-900 dark:text-white">Bukti dari Penyewa</h2>
            <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">Periksa bukti foto sebelum menyetujui pengembalian motor.</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] text-left text-sm">
                <thead class="border-b bg-zinc-50 text-xs uppercase text-zinc-500 dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-400">
                    <tr>
                        <th class="px-5 py-3">Penyewa</th><th class="py-3">Motor</th><th class="py-3">Order</th>
                        <th class="py-3">Bukti Foto</th><th class="py-3">Status</th><th class="px-5 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody id="online-return-table" class="divide-y divide-zinc-100 dark:divide-zinc-800"></tbody>
            </table>
        </div>
    </section>
    <section class="auth-admin hidden mt-6 overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
        <div class="border-b border-zinc-200 p-5 dark:border-zinc-800">
            <p class="text-xs font-bold uppercase tracking-wider text-red-600 dark:text-red-700">Transaksi Offline</p>
            <h2 id="motor-form-title" class="mt-1 text-xl font-black text-zinc-900 dark:text-white">Pengembalian di Lokasi Rental</h2>
            <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">Kelola bukti foto dan persetujuan pengembalian transaksi offline.</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[850px] text-left text-sm">
                <thead class="border-b bg-zinc-50 text-xs uppercase text-zinc-500 dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-400">
                    <tr>
                        <th class="px-5 py-3">Penyewa</th><th class="py-3">Motor</th><th class="py-3">Kontak</th>
                        <th class="py-3">Bukti Foto</th><th class="py-3">Status</th><th class="px-5 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody id="offline-return-table" class="divide-y divide-zinc-100 dark:divide-zinc-800"></tbody>
            </table>
        </div>
    </section>
</section>

<script>
    const auth=window.rentalApp.user();
    if(!auth||!['admin','tukang'].includes(auth.role))location.href='/login';
    const statusLabel=s=>({
        pending:'<span class="inline-flex rounded-full bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-600 dark:bg-amber-950/40 dark:text-amber-400">Menunggu persetujuan</span>',
        approved:'<span class="inline-flex rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-600 dark:bg-emerald-950/40 dark:text-emerald-400">Disetujui</span>',
        belum_diajukan:'<span class="inline-flex rounded-full bg-zinc-100 px-2.5 py-1 text-xs font-semibold text-zinc-600 dark:bg-zinc-800 dark:text-zinc-400">Belum diajukan</span>'
    }[s]||s);
    async function req(url,opt={}){
        const r=await fetch(url,{headers:window.rentalApp.authHeaders(),...opt}),d=await r.json();
        window.rentalApp.notifyResponse(r,d); return r.ok;
    }
    async function loadOnlineReturns(){
        const r=await fetch('/api/returns/online',{headers:window.rentalApp.authHeaders()}),rows=await r.json(),t=document.getElementById('online-return-table');
        if(!r.ok)return window.rentalApp.notifyResponse(r,rows);
        t.innerHTML=rows.length?rows.map(i=>`
            <tr class="transition hover:bg-zinc-50 dark:hover:bg-zinc-800/50">
                <td class="px-5 py-4 font-semibold text-zinc-900 dark:text-white">${i.user?.name||'-'}<br><span class="text-xs font-normal text-zinc-500">${i.user?.no_hp||i.user?.email||'-'}</span></td>
                <td class="py-4 text-zinc-600 dark:text-zinc-300">${i.motor?.nama||'-'}<br><span class="text-xs text-zinc-500">${i.motor?.no_polisi||'-'}</span></td>
                <td class="py-4 text-xs text-zinc-500">${i.order_id}</td>
                <td class="py-4"><a class="font-semibold text-red-600 hover:underline dark:text-red-400" href="/storage/${i.foto_bukti_pengembalian}" target="_blank">Lihat foto</a></td>
                <td class="py-4">${statusLabel(i.status_pengembalian)}</td>
                <td class="px-5 py-4">${i.status_pengembalian==='pending'?`<button class="rounded-lg bg-emerald-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-emerald-700" data-approve-online="${i.id}">Setujui</button>`:'-'}</td>
            </tr>
        `).join(''):'<tr><td colspan="6" class="px-5 py-10 text-center text-zinc-500">Belum ada bukti pengembalian online.</td></tr>';
        document.querySelectorAll('[data-approve-online]').forEach(b=>b.onclick=async()=>{
            if(!confirm('Setujui pengembalian ini dan jadikan motor tersedia kembali?'))return;
            if(await req(`/api/returns/online/${b.dataset.approveOnline}/approve`,{method:'PATCH'}))loadOnlineReturns();
        });
    }
    async function loadOfflineReturns(){
        if(auth.role!=='admin')return;
        const r=await fetch('/api/offline-transactions',{headers:window.rentalApp.authHeaders()}),rows=await r.json(),t=document.getElementById('offline-return-table');
        if(!r.ok)return window.rentalApp.notifyResponse(r,rows);
        t.innerHTML=rows.length?rows.map(i=>{
            const proof=i.foto_bukti_pengembalian
                ?`<a class="font-semibold text-red-600 hover:underline dark:text-red-400" href="/storage/${i.foto_bukti_pengembalian}" target="_blank">Lihat foto</a>`
                :'<span class="text-zinc-400">Belum ada foto</span>';
            const action=i.status_pengembalian==='approved'
                ?'-'
                :i.status_pengembalian==='pending'
                    ?`<button class="rounded-lg bg-emerald-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-emerald-700" data-approve-offline="${i.id}">Setujui</button>`
                    :`<form class="flex items-center gap-2" data-offline-return="${i.id}"><input class="w-44 text-xs" type="file" accept="image/*" required><button class="rounded-lg border border-zinc-200 px-3 py-1.5 text-xs font-semibold hover:border-red-600 hover:bg-red-600 hover:text-white dark:border-zinc-700">Kirim bukti</button></form>`;
            return `
                <tr class="transition hover:bg-zinc-50 dark:hover:bg-zinc-800/50">
                    <td class="px-5 py-4 font-semibold text-zinc-900 dark:text-white">${i.nama_lengkap}</td>
                    <td class="py-4 text-zinc-600 dark:text-zinc-300">${i.motor?.nama||'-'}<br><span class="text-xs text-zinc-500">${i.motor?.no_polisi||'-'}</span></td>
                    <td class="py-4 text-zinc-600 dark:text-zinc-300">${i.nomor_whatsapp}<br><span class="text-xs text-zinc-500">${i.gmail}</span></td>
                    <td class="py-4 text-xs">${proof}</td>
                    <td class="py-4">${statusLabel(i.status_pengembalian)}</td>
                    <td class="px-5 py-4">${action}</td>
                </tr>`;
        }).join(''):'<tr><td colspan="6" class="px-5 py-10 text-center text-zinc-500">Belum ada transaksi offline.</td></tr>';
        document.querySelectorAll('[data-offline-return]').forEach(f=>f.onsubmit=async e=>{
            e.preventDefault();
            const file=f.querySelector('input').files[0]; if(!file)return;
            const data=new FormData(); data.append('foto_bukti_pengembalian',file);
            const r=await fetch(`/api/offline-transactions/${f.dataset.offlineReturn}/return`,{
                method:'POST',
                headers:{Accept:'application/json',Authorization:`Bearer ${window.rentalApp.token()}`},
                body:data
            }),d=await r.json();
            window.rentalApp.notifyResponse(r,d,'Bukti pengembalian offline berhasil dikirim.');
            if(r.ok)loadOfflineReturns();
        });
        document.querySelectorAll('[data-approve-offline]').forEach(b=>b.onclick=async()=>{
            if(!confirm('Setujui pengembalian offline ini dan jadikan motor tersedia kembali?'))return;
            if(await req(`/api/offline-transactions/${b.dataset.approveOffline}/return/approve`,{method:'PATCH'}))loadOfflineReturns();
        });
    }
    loadOnlineReturns();
    loadOfflineReturns();
</script>
</x-layouts.app>