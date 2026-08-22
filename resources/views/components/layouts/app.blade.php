<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Rental Motor' }}</title>
    <script>
        (() => {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            document.documentElement.classList.toggle('dark', savedTheme === 'dark' || (!savedTheme && prefersDark));
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html { color-scheme: light; scroll-behavior: smooth; }
        html.dark { color-scheme: dark; }
        * { transition-property: background-color, border-color, color, box-shadow, opacity, transform, filter; transition-duration: 180ms; transition-timing-function: ease-out; }
        body {
            background: radial-gradient(circle at top left, rgb(254 226 226 / .9), transparent 34rem), linear-gradient(180deg, #fff 0%, #f4f4f5 42%, #fff 100%);
        }
        html.dark body { background: radial-gradient(circle at top left, rgb(127 29 29 / .42), transparent 34rem), linear-gradient(180deg, #09090b 0%, #18181b 44%, #09090b 100%); color: #f4f4f5; }
        main { animation: page-rise .32s ease-out; }
        .btn-primary { display: inline-flex; align-items: center; justify-content: center; border-radius: .25rem; background: #b91c1c; padding: .5rem 1rem; font-size: .875rem; font-weight: 700; color: #fff; box-shadow: 0 1px 2px rgb(127 29 29 / .1); }
        .btn-primary:hover { background: #991b1b; transform: translateY(-2px); box-shadow: 0 14px 28px rgb(127 29 29 / .18); }
        .btn-dark { display: inline-flex; align-items: center; justify-content: center; border-radius: .25rem; background: #09090b; padding: .5rem 1rem; font-size: .875rem; font-weight: 700; color: #fff; }
        .btn-dark:hover { background: #27272a; transform: translateY(-2px); box-shadow: 0 14px 28px rgb(0 0 0 / .18); }
        .btn-muted { display: inline-flex; align-items: center; justify-content: center; border: 1px solid #d4d4d8; border-radius: .25rem; background: #fff; padding: .5rem 1rem; font-size: .875rem; font-weight: 700; color: #27272a; }
        .btn-muted:hover { border-color: #a1a1aa; background: #fafafa; transform: translateY(-2px); }
        .field { width: 100%; border: 1px solid #d4d4d8; border-radius: .25rem; background: #fff; padding: .5rem .75rem; font-size: .875rem; color: #09090b; outline: none; }
        .field:focus { border-color: #dc2626; box-shadow: 0 0 0 3px rgb(254 202 202 / .7); }
        .panel { border: 1px solid #e4e4e7; border-radius: .25rem; background: #fff; box-shadow: 0 1px 2px rgb(0 0 0 / .04); animation: reveal-up .38s ease-out both; }
        .panel:hover { box-shadow: 0 16px 42px rgb(0 0 0 / .08); }
        html.dark .panel, html.dark .toast { border-color: #27272a; background: #18181b; color: #f4f4f5; box-shadow: 0 18px 45px rgb(0 0 0 / .36); }
        html.dark header, html.dark footer, html.dark section.bg-white { border-color: #27272a; background-color: rgb(9 9 11 / .94); }
        html.dark .field, html.dark .btn-muted { border-color: #3f3f46; background: #09090b; color: #f4f4f5; }
        html.dark .btn-muted:hover { border-color: #991b1b; background: #18181b; }
        html.dark .btn-dark { background: #f4f4f5; color: #09090b; }
        html.dark .btn-dark:hover { background: #d4d4d8; }
        html.dark .text-zinc-950, html.dark .text-zinc-800, html.dark .text-zinc-700, html.dark .text-zinc-600 { color: #f4f4f5; }
        html.dark .text-zinc-500 { color: #a1a1aa; }
        html.dark .border-zinc-200, html.dark .border-zinc-300 { border-color: #27272a; }
        html.dark .bg-white { background-color: #18181b; }
        html.dark .bg-zinc-50, html.dark .bg-zinc-100 { background-color: #27272a; }
        html.dark .bg-red-50 { background-color: rgb(127 29 29 / .3); }
        .status-pill { display: inline-flex; align-items: center; border-radius: .25rem; padding: .25rem .5rem; font-size: .75rem; font-weight: 700; }
        .toast-stack { position: fixed; top: 1rem; right: 1rem; z-index: 60; display: grid; gap: .75rem; width: min(24rem, calc(100vw - 2rem)); }
        .toast { border: 1px solid #e4e4e7; border-left-width: 4px; border-radius: .375rem; background: #fff; padding: 1rem; box-shadow: 0 18px 45px rgb(0 0 0 / .16); animation: toast-in .18s ease-out; backdrop-filter: blur(12px) saturate(1.2); }
        .toast-success { border-left-color: #16a34a; }
        .toast-error { border-left-color: #dc2626; }
        .toast-info { border-left-color: #52525b; }
        .toast-title { font-weight: 800; color: #09090b; }
        .toast-message { margin-top: .25rem; font-size: .875rem; line-height: 1.45; color: #52525b; }
        html.dark .toast-title { color: #fff; }
        html.dark .toast-message, html.dark .toast-close { color: #d4d4d8; }
        .toast-close { position: absolute; top: .55rem; right: .65rem; color: #71717a; font-weight: 800; }
        .theme-toggle { display: inline-flex; align-items: center; gap: .45rem; border: 1px solid #d4d4d8; border-radius: 999px; background: rgb(255 255 255 / .82); padding: .45rem .75rem; font-size: .875rem; font-weight: 800; color: #27272a; backdrop-filter: blur(10px) saturate(1.15); }
        .theme-toggle:hover { border-color: #dc2626; color: #b91c1c; transform: translateY(-2px); }
        html.dark .theme-toggle { border-color: #3f3f46; background: rgb(24 24 27 / .82); color: #f4f4f5; }
        .motor-visual { position: relative; overflow: hidden; }
        .motor-visual-gradient, .motor-visual-image { position: absolute; inset: 0; }
        .motor-visual-gradient { z-index: 1; }
        .motor-visual-image { z-index: 2; opacity: 0; transform: scale(1.06); filter: saturate(1.05) contrast(1.03); object-fit: cover; width: 100%; height: 100%; }
        .motor-visual.has-image:hover .motor-visual-image { opacity: 1; transform: scale(1); }
        .motor-visual.has-image:hover .motor-visual-gradient { opacity: 0; transform: scale(.98); filter: blur(5px); }
        .motor-visual.has-image:hover::after { content: ''; position: absolute; inset: 0; z-index: 3; background: linear-gradient(180deg, transparent 34%, rgb(0 0 0 / .58)); pointer-events: none; }
        .reveal-up { animation: reveal-up .45s ease-out both; }
        .card-hover:hover { transform: translateY(-6px) scale(1.01); filter: saturate(1.08) contrast(1.02); }
        .is-filtered-out { opacity: 0; transform: scale(.96); filter: grayscale(1) blur(2px); pointer-events: none; position: absolute; }
        @keyframes toast-in { from { opacity: 0; transform: translateY(-.35rem); } to { opacity: 1; transform: translateY(0); } }
        @keyframes page-rise { from { opacity: .86; transform: translateY(.35rem); } to { opacity: 1; transform: translateY(0); } }
        @keyframes reveal-up { from { opacity: 0; transform: translateY(1rem); filter: blur(6px); } to { opacity: 1; transform: translateY(0); filter: blur(0); } }
        @media (prefers-reduced-motion: reduce) { *, main, .reveal-up, .toast { animation: none !important; transition-duration: 1ms !important; } }
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
                <button id="theme-toggle" class="theme-toggle" type="button" aria-label="Ganti tema">
                    <span id="theme-label">Dark</span>
                </button>
            </div>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

    <div id="toast-stack" class="toast-stack" aria-live="polite" aria-atomic="true"></div>

    <footer class="border-t border-zinc-200 bg-white">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 py-8 text-sm text-zinc-500 sm:px-6 lg:grid-cols-[1.2fr_1fr_auto] lg:items-start lg:px-8">
            <div>
                <p class="font-semibold text-zinc-700">Rental Motor</p>
                <p class="mt-2 max-w-xl">Rental Motor berbasis Laravel 13, Sanctum, Tailwind CSS, dan Midtrans Snap.</p>
            </div>
            <nav class="grid gap-2 sm:grid-cols-2">
                <a class="hover:text-red-700" href="/">Katalog</a>
                <a class="auth-user hidden hover:text-red-700" href="/akun">Akun Saya</a>
                <a class="auth-user hidden hover:text-red-700" href="/verifikasi">Verifikasi</a>
                <a class="auth-backend hidden hover:text-red-700" href="/backend">Dashboard Backend</a>
                <a class="auth-backend hidden hover:text-red-700" href="/backend/motor">Kelola Motor</a>
                <a class="auth-backend hidden hover:text-red-700" href="/backend/pembayaran">Pembayaran</a>
            </nav>
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
            messageFrom: (data, fallback = 'Permintaan selesai diproses.') => {
                if (!data) return fallback;
                if (typeof data === 'string') return data;
                if (data.message) return data.message;
                if (data.error) return data.error;
                if (data.errors) return Object.values(data.errors).flat().join(' ');
                return fallback;
            },
            notify: ({ type = 'info', title = 'Informasi', message = '' }) => {
                const stack = document.getElementById('toast-stack');
                if (!stack) return window.alert(`${title}\n${message}`);

                const toast = document.createElement('div');
                toast.className = `toast toast-${type} relative`;
                const close = document.createElement('button');
                const toastTitle = document.createElement('p');
                const toastMessage = document.createElement('p');
                close.className = 'toast-close';
                close.type = 'button';
                close.setAttribute('aria-label', 'Tutup');
                close.textContent = 'x';
                toastTitle.className = 'toast-title';
                toastTitle.textContent = title;
                toastMessage.className = 'toast-message';
                toastMessage.textContent = message;
                close.addEventListener('click', () => toast.remove());
                toast.append(close, toastTitle, toastMessage);
                stack.appendChild(toast);
                window.setTimeout(() => toast.remove(), 4200);
            },
            notifyResponse: (response, data, successMessage = 'Data berhasil diproses.') => {
                const ok = response && response.ok;
                window.rentalApp.notify({
                    type: ok ? 'success' : 'error',
                    title: ok ? 'Berhasil' : 'Gagal',
                    message: window.rentalApp.messageFrom(data, ok ? successMessage : 'Permintaan gagal diproses.'),
                });
            },
            showJson: (target, data) => {
                window.rentalApp.notify({
                    type: data?.error || data?.errors ? 'error' : 'success',
                    title: data?.error || data?.errors ? 'Gagal' : 'Berhasil',
                    message: window.rentalApp.messageFrom(data),
                });
            },
        };

        const authUser = window.rentalApp.user();
        const badge = document.getElementById('auth-badge');
        const logout = document.getElementById('logout-button');
        const themeToggle = document.getElementById('theme-toggle');
        const themeLabel = document.getElementById('theme-label');
        const isBackendUser = authUser && ['admin', 'tukang'].includes(authUser.role);

        const syncThemeButton = () => {
            const isDark = document.documentElement.classList.contains('dark');
            if (themeLabel) themeLabel.textContent = isDark ? 'Light' : 'Dark';
        };

        syncThemeButton();

        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                const isDark = !document.documentElement.classList.contains('dark');
                document.documentElement.classList.toggle('dark', isDark);
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
                syncThemeButton();
            });
        }

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
