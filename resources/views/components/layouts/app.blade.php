<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Rental Motor' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: radial-gradient(circle at top left, rgb(254 226 226 / .9), transparent 34rem), linear-gradient(180deg, #fff 0%, #f4f4f5 42%, #fff 100%);
        }
        .btn-primary { display: inline-flex; align-items: center; justify-content: center; border-radius: .25rem; background: #b91c1c; padding: .5rem 1rem; font-size: .875rem; font-weight: 700; color: #fff; }
        .btn-primary:hover { background: #991b1b; }
        .btn-dark { display: inline-flex; align-items: center; justify-content: center; border-radius: .25rem; background: #09090b; padding: .5rem 1rem; font-size: .875rem; font-weight: 700; color: #fff; }
        .btn-dark:hover { background: #27272a; }
        .btn-muted { display: inline-flex; align-items: center; justify-content: center; border: 1px solid #d4d4d8; border-radius: .25rem; background: #fff; padding: .5rem 1rem; font-size: .875rem; font-weight: 700; color: #27272a; }
        .btn-muted:hover { border-color: #a1a1aa; background: #fafafa; }
        .field { width: 100%; border: 1px solid #d4d4d8; border-radius: .25rem; background: #fff; padding: .5rem .75rem; font-size: .875rem; color: #09090b; outline: none; }
        .field:focus { border-color: #dc2626; box-shadow: 0 0 0 3px rgb(254 202 202 / .7); }
        .panel { border: 1px solid #e4e4e7; border-radius: .25rem; background: #fff; box-shadow: 0 1px 2px rgb(0 0 0 / .04); }
        .status-pill { display: inline-flex; align-items: center; border-radius: .25rem; padding: .25rem .5rem; font-size: .75rem; font-weight: 700; }
        .hidden { display: none !important; }
    </style>
</head>
<body class="min-h-screen text-zinc-950 antialiased">
    <header class="sticky top-0 z-30 border-b border-zinc-200/80 bg-white/95 backdrop-blur">
        <nav class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
            <a href="/" class="flex items-center gap-3">
                <span class="grid size-10 place-items-center rounded bg-red-700 text-lg font-black text-white">RM</span>
                <span>
                    <span class="block text-sm font-semibold uppercase tracking-wide text-red-700">Rental Motor</span>
                    <span class="block text-xs text-zinc-500">Sewa cepat, data rapi</span>
                </span>
            </a>
            <div class="flex flex-wrap items-center gap-2 text-sm font-medium">
                <a class="rounded px-3 py-2 text-zinc-600 hover:bg-zinc-100 hover:text-zinc-950" href="/">Katalog</a>
                <a class="auth-user hidden rounded px-3 py-2 text-zinc-600 hover:bg-zinc-100 hover:text-zinc-950" href="/akun">Akun</a>
                <a class="auth-user hidden rounded px-3 py-2 text-zinc-600 hover:bg-zinc-100 hover:text-zinc-950" href="/verifikasi">Verifikasi</a>
                <a class="auth-backend hidden rounded px-3 py-2 text-zinc-600 hover:bg-zinc-100 hover:text-zinc-950" href="/backend">Backend</a>
                <a class="auth-guest btn-muted" href="/login">Masuk</a>
                <button id="logout-button" class="auth-user hidden rounded bg-zinc-950 px-3 py-2 text-white hover:bg-zinc-800" type="button">Keluar</button>
            </div>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="border-t border-zinc-200 bg-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-6 text-sm text-zinc-500 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <p>Rental Motor berbasis Laravel 13, Sanctum, Tailwind CSS, dan Midtrans Snap.</p>
            <p><span id="auth-badge" class="rounded bg-zinc-100 px-2 py-1">Belum login</span></p>
        </div>
    </footer>

    <script>
        window.rentalApp = {
            token: () => localStorage.getItem('api_token') || '',
            user: () => JSON.parse(localStorage.getItem('auth_user') || 'null'),
            setSession: (payload) => {
                localStorage.setItem('api_token', payload.token);
                localStorage.setItem('auth_user', JSON.stringify(payload.user));
            },
            clearSession: () => {
                localStorage.removeItem('api_token');
                localStorage.removeItem('auth_user');
            },
            authHeaders: () => ({
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('api_token') || ''}`,
            }),
            money: (value) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(value || 0),
            showJson: (target, data) => {
                target.classList.remove('hidden');
                target.textContent = typeof data === 'string' ? data : JSON.stringify(data, null, 2);
            },
        };

        const authUser = window.rentalApp.user();
        const badge = document.getElementById('auth-badge');
        const logout = document.getElementById('logout-button');
        const isBackendUser = authUser && ['admin', 'tukang'].includes(authUser.role);

        if (authUser && badge) {
            badge.textContent = `${authUser.name} · ${authUser.role}`;
            badge.className = 'rounded bg-red-50 px-2 py-1 font-medium text-red-700';
        }

        document.querySelectorAll('.auth-guest').forEach((item) => {
            item.classList.toggle('hidden', Boolean(authUser));
        });

        document.querySelectorAll('.auth-user').forEach((item) => {
            item.classList.toggle('hidden', !authUser);
        });

        document.querySelectorAll('.auth-backend').forEach((item) => {
            item.classList.toggle('hidden', !isBackendUser);
        });

        if (logout) {
            logout.addEventListener('click', async () => {
                try {
                    await fetch('/api/logout', { method: 'POST', headers: window.rentalApp.authHeaders() });
                } finally {
                    window.rentalApp.clearSession();
                    window.location.href = '/login';
                }
            });
        }

        if (window.location.pathname.startsWith('/backend') && !isBackendUser) {
            window.location.href = '/login';
        }
    </script>
</body>
</html>
