<x-layouts.app title="Verifikasi Akun">
    <section class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="rounded border border-zinc-200 bg-white p-6">
            <h1 class="text-2xl font-bold">Verifikasi Akun Penyewa</h1>
            <p class="mt-2 text-sm leading-6 text-zinc-500">Upload e-KTP, KK, dan SIM melalui endpoint <code class="rounded bg-zinc-100 px-1 py-0.5">POST /api/verify-account</code>. Form ini disiapkan untuk token Sanctum.</p>
            <form class="mt-6 grid gap-4" method="post" action="/api/verify-account" enctype="multipart/form-data">
                <label class="grid gap-2 text-sm font-medium">Bearer token <input class="rounded border border-zinc-300 px-3 py-2" name="token" placeholder="Gunakan Postman/fetch dengan Authorization header"></label>
                <label class="grid gap-2 text-sm font-medium">Foto KTP <input class="rounded border border-zinc-300 px-3 py-2" type="file" name="foto_ktp" accept="image/*"></label>
                <label class="grid gap-2 text-sm font-medium">Foto KK <input class="rounded border border-zinc-300 px-3 py-2" type="file" name="foto_kk" accept="image/*"></label>
                <label class="grid gap-2 text-sm font-medium">Foto SIM <input class="rounded border border-zinc-300 px-3 py-2" type="file" name="foto_sim" accept="image/*"></label>
            </form>
        </div>
    </section>
</x-layouts.app>
