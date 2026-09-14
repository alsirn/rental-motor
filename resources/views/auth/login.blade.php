<x-layouts.app title="Masuk">
    <section class="min-h-[calc(100vh-80px)] bg-zinc-100 dark:bg-zinc-950">
        <div class="mx-auto flex min-h-[calc(100vh-80px)] max-w-md items-center px-4 py-10">
            <div class="w-full rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
                <div class="border-b border-zinc-200 px-6 py-7 text-center dark:border-zinc-800">
                    <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Masuk</h1>
                    <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400">Masuk ke akun Rental Motor Anda</p>
                </div>
                <form id="login-form" class="grid gap-5 p-6">
                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Email</label>
                        <input id="email" name="email" type="email" placeholder="nama@email.com" required class="field w-full">
                    </div>
                    <div>
                        <label for="password" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Password</label>
                        <input id="password" name="password" type="password" placeholder="Masukkan password" required class="field w-full">
                    </div>
                    <button type="submit" class="btn-primary w-full transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md active:scale-[.98]">Masuk</button>
                </form>
                <div class="border-t border-zinc-200 px-6 py-4 text-center dark:border-zinc-800">
                    <p class="text-xs text-zinc-400">Gunakan Gmail dan password yang telah terdaftar.</p>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('login-form').addEventListener('submit', async e => {
            e.preventDefault();
            const form = new FormData(e.currentTarget);
            const response = await fetch('/api/login', {
                method: 'POST',
                headers: {'Accept': 'application/json', 'Content-Type': 'application/json'},
                body: JSON.stringify({email: form.get('email'), password: form.get('password')})
            });
            const json = await response.json();
            if (!response.ok) {
                window.rentalApp.notifyResponse(response, json, 'Login berhasil.');
                return;
            }
            window.rentalApp.setSession(json);
            window.location.href = json.user.role === 'user' ? '/akun' : '/backend';
        });
    </script>
</x-layouts.app>