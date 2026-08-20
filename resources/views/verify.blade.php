<x-layouts.app title="Verifikasi Akun">
    <section class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
        <form id="verify-form" class="panel grid gap-4 p-6">
            <div>
                <p class="text-sm font-bold uppercase tracking-wide text-red-700">Verifikasi dokumen</p>
                <h1 class="mt-2 text-3xl font-black">Upload e-KTP, KK, dan SIM.</h1>
                <p class="mt-2 text-sm text-zinc-600">Setelah dikirim, status akun berubah menjadi menunggu verifikasi admin.</p>
            </div>
            <label class="grid gap-2 text-sm font-semibold">Foto KTP <input class="field" type="file" name="foto_ktp" accept="image/*" required></label>
            <label class="grid gap-2 text-sm font-semibold">Foto KK <input class="field" type="file" name="foto_kk" accept="image/*" required></label>
            <label class="grid gap-2 text-sm font-semibold">Foto SIM <input class="field" type="file" name="foto_sim" accept="image/*" required></label>
            <button class="btn-primary" type="submit">Kirim Verifikasi</button>
        </form>
    </section>
    <script>
        document.getElementById('verify-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const response = await fetch('/api/verify-account', {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${window.rentalApp.token()}` },
                body: new FormData(event.currentTarget),
            });
            window.rentalApp.notifyResponse(response, await response.json(), 'Dokumen berhasil dikirim dan menunggu verifikasi.');
        });
    </script>
</x-layouts.app>
