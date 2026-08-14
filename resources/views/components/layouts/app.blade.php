<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Rental Motor' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-50 text-zinc-950 antialiased">
    <header class="border-b border-zinc-200 bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="/" class="flex items-center gap-3">
                <span class="grid size-10 place-items-center rounded bg-emerald-600 text-lg font-black text-white">RM</span>
                <span>
                    <span class="block text-sm font-semibold uppercase tracking-wide text-emerald-700">Rental Motor</span>
                    <span class="block text-xs text-zinc-500">Laravel 13 + Tailwind CSS</span>
                </span>
            </a>
            <div class="flex items-center gap-2 text-sm font-medium">
                <a class="rounded px-3 py-2 text-zinc-600 hover:bg-zinc-100 hover:text-zinc-950" href="/">Motor</a>
                <a class="rounded px-3 py-2 text-zinc-600 hover:bg-zinc-100 hover:text-zinc-950" href="/verifikasi">Verifikasi</a>
                <a class="rounded bg-zinc-950 px-3 py-2 text-white hover:bg-zinc-800" href="/backend">Backend</a>
            </div>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="border-t border-zinc-200 bg-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-6 text-sm text-zinc-500 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <p>Demo aplikasi rental motor dengan API REST, Sanctum, dan Midtrans Snap.</p>
            <p>Endpoint publik: <code class="rounded bg-zinc-100 px-1 py-0.5">/api/motors</code></p>
        </div>
    </footer>
</body>
</html>
