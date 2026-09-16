<x-layouts.app title="Verifikasi Akun">
<section class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-red-600 dark:text-red-700">Verifikasi Dokumen</h1>
        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Lengkapi dokumen untuk memverifikasi akun Anda.</p>
    </div>
    <form id="verify-form" class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
        <div class="border-b border-zinc-200 p-5 dark:border-zinc-800">
            <h2 class="font-bold text-red-600 dark:text-red-700">Upload Dokumen</h2>
            <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">Upload e-KTP, KK, dan SIM. Setelah dikirim, dokumen akan diperiksa oleh admin.</p>
        </div>
        <div class="grid gap-5 p-5">
            <label class="grid gap-2 text-sm font-semibold text-zinc-700 dark:text-zinc-300">Foto KTP<input class="field w-full" type="file" name="foto_ktp" accept="image/*" required></label>
            <label class="grid gap-2 text-sm font-semibold text-zinc-700 dark:text-zinc-300">Foto KK<input class="field w-full" type="file" name="foto_kk" accept="image/*" required></label>
            <label class="grid gap-2 text-sm font-semibold text-zinc-700 dark:text-zinc-300">Foto SIM<input class="field w-full" type="file" name="foto_sim" accept="image/*" required></label>
            <div class="rounded-lg border border-red-100 bg-red-50 p-3 text-xs leading-5 text-red-600 dark:border-red-950/50 dark:bg-red-950/20 dark:text-red-700">Pastikan semua dokumen yang diunggah dapat dibaca dengan jelas sebelum mengirim verifikasi.</div>
            <button class="btn-primary w-full transition hover:-translate-y-0.5 hover:shadow-md active:scale-[.98]" type="submit">Kirim Verifikasi</button>
        </div>
    </form>
</section>
<script>
    document.getElementById('verify-form').addEventListener('submit',async e=>{
        e.preventDefault();
        const r=await fetch('/api/verify-account',{
            method:'POST',
            headers:{'Accept':'application/json','Authorization':`Bearer ${window.rentalApp.token()}`},
            body:new FormData(e.currentTarget)
        }),j=await r.json();
        window.rentalApp.notifyResponse(r,j,'Dokumen berhasil dikirim dan menunggu verifikasi.');
        if(r.ok){
            const u=window.rentalApp.user();
            if(u){
                u.verification_status='pending';
                localStorage.setItem('auth_user',JSON.stringify(u));
            }
            window.location.href='/akun';
        }
    });
</script>
</x-layouts.app>