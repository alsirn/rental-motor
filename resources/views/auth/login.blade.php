<x-layouts.app title="Masuk">
    <section class="mx-auto grid max-w-5xl gap-8 px-4 py-10 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
        <div>
            <p class="text-sm font-bold uppercase tracking-wide text-red-700">Autentikasi Sanctum</p>
            <h1 class="mt-2 text-3xl font-black">Masuk ke akun rental motor.</h1>
            <p class="mt-3 text-sm leading-6 text-zinc-600">Akun demo: admin@rental.test, tukang@rental.test, atau user@rental.test dengan password <strong>password</strong>.</p>
        </div>
        <form id="login-form" class="panel grid gap-4 p-6">
            <label class="grid gap-2 text-sm font-semibold">Email <input class="field" name="email" type="email" required></label>
            <label class="grid gap-2 text-sm font-semibold">Password <input class="field" name="password" type="password" required></label>
            <button class="btn-primary" type="submit">Masuk</button>
        </form>
    </section>
    <script>
        document.getElementById('login-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const form = new FormData(event.currentTarget);
            const response = await fetch('/api/login', {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' },
                body: JSON.stringify({ email: form.get('email'), password: form.get('password') }),
            });
            const json = await response.json();
            if (!response.ok) {
                window.rentalApp.notifyResponse(response, json, 'Login berhasil.');
            }
            if (response.ok) {
                window.rentalApp.setSession(json);
                window.location.href = json.user.role === 'user' ? '/akun' : '/backend';
            }
        });
    </script>
</x-layouts.app>
