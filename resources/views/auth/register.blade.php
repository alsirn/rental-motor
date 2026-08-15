<x-layouts.app title="Daftar Penyewa">
    <section class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
        <form id="register-form" class="panel grid gap-4 p-6">
            <div>
                <p class="text-sm font-bold uppercase tracking-wide text-red-700">Pendaftaran penyewa</p>
                <h1 class="mt-2 text-3xl font-black">Buat akun sebelum menyewa motor.</h1>
            </div>
            <label class="grid gap-2 text-sm font-semibold">Nama <input class="field" name="name" required></label>
            <label class="grid gap-2 text-sm font-semibold">Email <input class="field" name="email" type="email" required></label>
            <label class="grid gap-2 text-sm font-semibold">No HP <input class="field" name="no_hp" required></label>
            <div class="grid gap-4 sm:grid-cols-2">
                <label class="grid gap-2 text-sm font-semibold">Password <input class="field" name="password" type="password" required></label>
                <label class="grid gap-2 text-sm font-semibold">Konfirmasi Password <input class="field" name="password_confirmation" type="password" required></label>
            </div>
            <button class="btn-primary" type="submit">Daftar</button>
            <pre id="register-result" class="hidden overflow-auto rounded bg-zinc-950 p-4 text-sm text-red-100"></pre>
        </form>
    </section>
    <script>
        document.getElementById('register-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const response = await fetch('/api/register', {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' },
                body: JSON.stringify(Object.fromEntries(new FormData(event.currentTarget))),
            });
            const json = await response.json();
            window.rentalApp.showJson(document.getElementById('register-result'), json);
            if (response.ok) {
                window.rentalApp.setSession(json);
                window.location.href = '/verifikasi';
            }
        });
    </script>
</x-layouts.app>
