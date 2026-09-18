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
        /* * { transition-property: background-color, border-color, color, box-shadow, opacity, transform, filter; transition-duration: 180ms; ; } */
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
<body class="flex min-h-screen flex-col text-zinc-950 antialiased">
    <header class="sticky top-0 z-30 border-b border-zinc-200/70 bg-white/90 backdrop-blur-xl dark:border-zinc-800/70 dark:bg-zinc-950/90">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-3 sm:px-8 lg:px-10">
            <a href="/" class="group flex items-center gap-3">
                <span class="grid size-10 place-items-center rounded-xl bg-red-700 text-sm font-black text-white transition-transform group-hover:scale-105">RM</span>
                <span><span class="block text-sm font-extrabold uppercase tracking-wide text-red-700">Rental Motor</span><span class="block text-[11px] text-zinc-500 dark:text-zinc-400">Sewa cepat, data rapi</span></span>
            </a>
            <div class="flex items-center gap-1 text-sm font-semibold">
                <a href="/katalog" class="rounded-lg px-3 py-2 transition {{ request()->is('katalog') ? 'bg-red-50 text-red-700 dark:bg-red-950/40 dark:text-red-400' : 'text-zinc-600 hover:bg-zinc-100 hover:text-red-700 dark:text-zinc-300 dark:hover:bg-zinc-900 dark:hover:text-red-400' }}">Katalog</a>
                <a href="/about-us" class="rounded-lg px-3 py-2 transition {{ request()->is('about-us') ? 'bg-red-50 text-red-700 dark:bg-red-950/40 dark:text-red-400' : 'text-zinc-600 hover:bg-zinc-100 hover:text-red-700 dark:text-zinc-300 dark:hover:bg-zinc-900 dark:hover:text-red-400' }}">Tentang Kami</a>
                <a href="/akun" class="auth-user hidden rounded-lg px-3 py-2 transition {{ request()->is('akun') ? 'bg-red-50 text-red-700 dark:bg-red-950/40 dark:text-red-400' : 'text-zinc-600 hover:bg-zinc-100 hover:text-red-700 dark:text-zinc-300 dark:hover:bg-zinc-900 dark:hover:text-red-400' }}">Akun</a>
                <a href="/verifikasi" class="auth-verification hidden rounded-lg px-3 py-2 transition {{ request()->is('verifikasi') ? 'bg-red-50 text-red-700 dark:bg-red-950/40 dark:text-red-400' : 'text-zinc-600 hover:bg-zinc-100 hover:text-red-700 dark:text-zinc-300 dark:hover:bg-zinc-900 dark:hover:text-red-400' }}">Verifikasi</a>
                <a href="/backend" class="auth-backend hidden rounded-lg px-3 py-2 transition {{ request()->is('backend') ? 'bg-red-50 text-red-700 dark:bg-red-950/40 dark:text-red-400' : 'text-zinc-600 hover:bg-zinc-100 hover:text-red-700 dark:text-zinc-300 dark:hover:bg-zinc-900 dark:hover:text-red-400' }}">Backend</a>
                <a href="/login" class="auth-guest ml-2 rounded-lg bg-red-700 px-4 py-2 font-bold text-white transition hover:-translate-y-0.5 hover:bg-red-800 hover:shadow-lg">Masuk</a>
                <button id="logout-button" class="auth-user hidden ml-2 rounded-lg bg-zinc-950 px-4 py-2 font-bold text-white transition hover:bg-zinc-800 dark:bg-white dark:text-zinc-950 dark:hover:bg-zinc-200" type="button">Keluar</button>
                <button id="theme-toggle" class="theme-toggle ml-2" type="button" aria-label="Ganti tema"><span id="theme-label">Dark</span></button>
            </div>
        </nav>
    </header>

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
    </script>

    <main class="flex-1">
        {{ $slot }}
    </main>

    <div id="toast-stack" class="toast-stack" aria-live="polite" aria-atomic="true"></div>
        <footer class="mt-16 border-t border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-950">
            <div class="mx-auto max-w-7xl px-5 py-14 sm:px-8 lg:px-10">
                <div class="grid gap-12 lg:grid-cols-[1.5fr_1fr_1fr_1.2fr]">
                    <div>
                        <a href="/" class="inline-flex items-center gap-3">                            
                            <span>
                                <span class="block text-sm font-extrabold uppercase tracking-wide text-red-700">Rental Motor</span>
                                <span class="block text-xs text-zinc-500 dark:text-zinc-400">Sewa cepat, data rapi.</span>
                            </span>
                        </a>
                        <p class="mt-5 max-w-sm text-sm leading-7 text-zinc-500 dark:text-zinc-400">Temukan motor pilihanmu dan nikmati proses rental yang mudah, aman, dan nyaman untuk perjalananmu.</p>
                        <div class="mt-6 flex items-center gap-2">
                            <a href="#" aria-label="Facebook" class="grid size-10 place-items-center rounded-lg border border-zinc-200 text-sm font-black text-zinc-600 transition-all duration-200 hover:-translate-y-1 hover:border-red-600 hover:bg-red-600 hover:text-white dark:border-zinc-800 dark:text-zinc-400 dark:hover:border-red-600 dark:hover:bg-red-600 dark:hover:text-white">f</a>
                            <a href="#" aria-label="TikTok" class="grid size-10 place-items-center rounded-lg border border-zinc-200 text-sm font-black text-zinc-600 transition-all duration-200 hover:-translate-y-1 hover:border-red-600 hover:bg-red-600 hover:text-white dark:border-zinc-800 dark:text-zinc-400 dark:hover:border-red-600 dark:hover:bg-red-600 dark:hover:text-white">♪</a>
                            <a href="#" aria-label="Instagram" class="grid size-10 place-items-center rounded-lg border border-zinc-200 text-sm font-black text-zinc-600 transition-all duration-200 hover:-translate-y-1 hover:border-red-600 hover:bg-red-600 hover:text-white dark:border-zinc-800 dark:text-zinc-400 dark:hover:border-red-600 dark:hover:bg-red-600 dark:hover:text-white">◎</a>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-black uppercase tracking-wider text-zinc-950 dark:text-white">Navigasi</h3>
                        <nav class="mt-5 grid gap-3">
                            <a href="/" class="w-fit text-sm text-zinc-500 transition-all duration-200 hover:translate-x-1 hover:text-red-600 dark:text-zinc-400 dark:hover:text-red-500">Beranda</a>
                            <a href="/katalog" class="w-fit text-sm text-zinc-500 transition-all duration-200 hover:translate-x-1 hover:text-red-600 dark:text-zinc-400 dark:hover:text-red-500">Katalog Motor</a>
                            <a href="/about-us" class="w-fit text-sm text-zinc-500 transition-all duration-200 hover:translate-x-1 hover:text-red-600 dark:text-zinc-400 dark:hover:text-red-500">Tentang Kami</a>
                            <a href="/akun" class="auth-user hidden w-fit text-sm text-zinc-500 transition-all duration-200 hover:translate-x-1 hover:text-red-600 dark:text-zinc-400 dark:hover:text-red-500">Akun Saya</a>
                            <a href="/verifikasi" class="auth-verification hidden w-fit text-sm text-zinc-500 transition-all duration-200 hover:translate-x-1 hover:text-red-600 dark:text-zinc-400 dark:hover:text-red-500">Verifikasi</a>
                        </nav>
                    </div>
                    <div>
                        <h3 class="text-sm font-black uppercase tracking-wider text-zinc-950 dark:text-white">Layanan</h3>
                        <nav class="mt-5 grid gap-3">
                            <a href="/katalog" class="w-fit text-sm text-zinc-500 transition-all duration-200 hover:translate-x-1 hover:text-red-600 dark:text-zinc-400 dark:hover:text-red-500">Sewa Motor</a>
                            <a href="/about-us" class="w-fit text-sm text-zinc-500 transition-all duration-200 hover:translate-x-1 hover:text-red-600 dark:text-zinc-400 dark:hover:text-red-500">Lokasi Rental</a>
                            <a href="/backend" class="auth-backend hidden w-fit text-sm text-zinc-500 transition-all duration-200 hover:translate-x-1 hover:text-red-600 dark:text-zinc-400 dark:hover:text-red-500">Backend</a>
                        </nav>
                    </div>
                    <div>
                        <h3 class="text-sm font-black uppercase tracking-wider text-zinc-950 dark:text-white">Hubungi Kami</h3>
                        <div class="mt-5 grid gap-4">
                            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener" class="group flex items-start gap-3">
                                <span class="grid size-9 shrink-0 place-items-center rounded-lg bg-red-50 text-red-700 transition-colors group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/40 dark:text-red-400 dark:group-hover:bg-red-600 dark:group-hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-4.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75A2.25 2.25 0 0 1 4.5 4.5h1.386a2.25 2.25 0 0 1 2.045 1.316l.99 2.227a2.25 2.25 0 0 1-.491 2.486l-.913.913a12.04 12.04 0 0 0 5.041 5.041l.913-.913a2.25 2.25 0 0 1 2.486-.491l2.227.99a2.25 2.25 0 0 1 1.316 2.045V19.5a2.25 2.25 0 0 1-2.25 2.25C10.44 21.75 2.25 13.56 2.25 3.75v3Z"/>
                                    </svg>
                                </span>
                                <span class="pt-1 text-sm leading-5 text-zinc-500 transition-colors group-hover:text-red-600 dark:text-zinc-400 dark:group-hover:text-red-500">+62 812 3456 7890</span>
                            </a>
                            <a href="mailto:rentalmotor@gmail.com" class="group flex items-start gap-3">
                                <span class="grid size-9 shrink-0 place-items-center rounded-lg bg-red-50 text-red-700 transition-colors group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/40 dark:text-red-400 dark:group-hover:bg-red-600 dark:group-hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-4.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0-8.69 5.43a2.25 2.25 0 0 1-2.38 0L2.25 6.75"/>
                                    </svg>
                                </span>
                                <span class="pt-1 text-sm leading-5 text-zinc-500 transition-colors group-hover:text-red-600 dark:text-zinc-400 dark:group-hover:text-red-500">rentalmotor@gmail.com</span>
                            </a>
                            <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Siliran+Lor+No.24,+Panembahan,+Kecamatan+Kraton,+Kota+Yogyakarta" target="_blank" rel="noopener" class="group flex items-start gap-3">
                                <span class="grid size-9 shrink-0 place-items-center rounded-lg bg-red-50 text-red-700 transition-colors group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/40 dark:text-red-400 dark:group-hover:bg-red-600 dark:group-hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-4.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                                    </svg>
                                </span>
                                <span class="pt-1 text-sm leading-5 text-zinc-500 transition-colors group-hover:text-red-600 dark:text-zinc-400 dark:group-hover:text-red-500">Jl. Siliran Lor No.24, Panembahan, Kraton, Yogyakarta</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-12 flex flex-col gap-4 border-t border-zinc-200 pt-6 dark:border-zinc-800 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-xs text-zinc-500 dark:text-zinc-500">© {{ date('Y') }} Rental Motor. All rights reserved.</p>
                    <div class="flex items-center gap-2 text-xs text-zinc-400 dark:text-zinc-600"><span class="size-1.5 rounded-full bg-red-600"></span><span>Rental Motor System</span></div>
                </div>
            </div>
        </footer>
    </div>
    <script>
        const authUser = window.rentalApp.user();
        const badge = document.getElementById('auth-badge');
        const logout = document.getElementById('logout-button');
        const themeToggle = document.getElementById('theme-toggle');
        const themeLabel = document.getElementById('theme-label');
        const isBackendUser = authUser && ['admin', 'tukang'].includes(authUser.role);
        const isAdminUser = authUser && authUser.role === 'admin';
        const needsVerification = authUser && authUser.role === 'user' && !['verified', 'terverifikasi'].includes(authUser.verification_status);

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

        document.querySelectorAll('.auth-admin').forEach((item) => {
            item.classList.toggle('hidden', !isAdminUser);
        });

        document.querySelectorAll('.auth-verification').forEach((item) => {
            item.classList.toggle('hidden', !needsVerification);
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

        if (window.location.pathname.startsWith('/backend/transaksi-offline') && !isAdminUser) {
            window.location.href = '/backend';
        }
    </script>
</body>
</html>