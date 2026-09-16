<x-layouts.app title="Verifikasi Penyewa">
<section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-sm font-black uppercase tracking-[.18em] text-red-600 dark:text-red-700">Backend</p>
            <h1 class="mt-2 text-3xl font-bold text-zinc-950 dark:text-white">Verifikasi Akun Penyewa</h1>
            <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Periksa dokumen dan verifikasi akun penyewa.</p>
        </div>
        <button onclick="history.back()" class="rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-bold text-zinc-700 shadow-sm transition hover:-translate-y-0.5 hover:border-red-200 hover:bg-red-50 hover:text-red-600 dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-300">Kembali</button>
    </div>
    <section class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
        <div class="border-b border-zinc-200 p-5 dark:border-zinc-800">
            <h2 class="font-bold text-red-600 dark:text-red-700">Daftar Penyewa</h2>
            <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">Kelola status verifikasi akun dan dokumen penyewa.</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-zinc-200 bg-zinc-50 text-xs uppercase text-zinc-500 dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-400">
                    <tr>
                        <th class="px-5 py-3 font-semibold">Nama</th><th class="py-3 font-semibold">Email</th><th class="py-3 font-semibold">No HP</th><th class="py-3 font-semibold">Dokumen</th><th class="py-3 font-semibold">Status</th><th class="px-5 py-3 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody id="verification-table" class="divide-y divide-zinc-100 dark:divide-zinc-800"></tbody>
            </table>
        </div>
    </section>
</section>

<script>
    async function loadVerifications(){
        const response=await fetch('/api/verifications',{headers:window.rentalApp.authHeaders()});
        const users=await response.json();
        if(!response.ok){
            window.rentalApp.notifyResponse(response,users,'Data verifikasi gagal dimuat.');
            return;
        }
        document.getElementById('verification-table').innerHTML=users.length?users.map(user=>{
            const docs=[
                ['KTP',user.foto_ktp],
                ['KK',user.foto_kk],
                ['SIM',user.foto_sim]
            ].map(([label,path])=>path
                ?`<a class="font-semibold text-red-600 hover:underline" href="/storage/${path}" target="_blank">${label}</a>`
                :`<span class="text-zinc-400">${label}</span>`
            ).join(' · ');
            const status=user.verification_status;
            return `
                <tr class="transition hover:bg-zinc-50 dark:hover:bg-zinc-800/50">
                    <td class="px-5 py-4 font-semibold text-zinc-900 dark:text-white">${user.name}</td>
                    <td class="py-4 text-zinc-600 dark:text-zinc-300">${user.email}</td>
                    <td class="py-4 text-zinc-600 dark:text-zinc-300">${user.no_hp||'-'}</td>
                    <td class="py-4 text-xs">${docs}</td>
                    <td class="py-4">
                        <span class="inline-flex rounded-full px-2.5 py-1 text-xs font-semibold ${status==='verified'
                            ?'bg-emerald-50 text-emerald-600 dark:bg-emerald-950/40 dark:text-emerald-400'
                            :status==='rejected'
                                ?'bg-red-50 text-red-600 dark:bg-red-950/40 dark:text-red-700'
                                :'bg-amber-50 text-amber-600 dark:bg-amber-950/40 dark:text-amber-400'}">
                            ${status}
                        </span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex flex-wrap gap-2">
                            <button class="rounded-lg px-3 py-1.5 text-xs font-semibold text-emerald-600 transition hover:bg-emerald-600 hover:text-white" data-id="${user.id}" data-status="verified">Setujui</button>
                            <button class="rounded-lg px-3 py-1.5 text-xs font-semibold text-red-600 transition hover:bg-red-600 hover:text-white" data-id="${user.id}" data-status="rejected">Tolak</button>
                        </div>
                    </td>
                </tr>`;
        }).join(''):'<tr><td colspan="6" class="px-5 py-10 text-center text-sm text-zinc-500">Belum ada data penyewa yang masuk.</td></tr>';
        document.querySelectorAll('[data-status]').forEach(button=>button.addEventListener('click',async()=>{
            const response=await fetch(`/api/verifications/${button.dataset.id}`,{
                method:'PATCH',
                headers:window.rentalApp.authHeaders(),
                body:JSON.stringify({verification_status:button.dataset.status})
            });
            const json=await response.json();
            window.rentalApp.notifyResponse(response,json,'Status verifikasi berhasil diperbarui.');
            if(response.ok)loadVerifications();
        }));
    }
    loadVerifications();
</script>
</x-layouts.app>