<x-layouts.app title="Rental Motor">
   <style>@keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-12px); } }</style>
    <section class="relative w-full overflow-hidden border-b border-zinc-800 bg-[radial-gradient(circle_at_75%_50%,#b91c1c_0%,#7f1d1d_35%,#450a0a_65%,#09090b_100%)] px-6 py-14 sm:py-18">
        <div class="mx-auto flex max-w-7xl flex-col lg:flex-row items-center justify-between gap-10">
            <div class="flex w-full max-w-2xl flex-1 flex-col gap-5">
                <div><span class="inline-block rounded-md border border-red-400/50 bg-red-500/25 px-3.5 py-1.5 text-[11px] font-extrabold uppercase tracking-widest text-red-200">Rental Motor</span></div>
                <h1 class="text-4xl font-black leading-tight tracking-tight text-white sm:text-5xl">Sewa Motor<br><span class="text-red-500 drop-shadow-[0_0_20px_rgba(239,68,68,0.4)]">Mudah, Cepat</span><br>& Terpercaya</h1>
                <p class="max-w-xl text-sm leading-6 text-zinc-300">Temukan motor terbaik untuk setiap perjalananmu.Proses cepat, aman, dan harga bersahabat.</p>
                <div class="mt-2 flex flex-wrap items-center gap-3">
                    <a href="/katalog" class="inline-flex items-center justify-center rounded-lg bg-red-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-red-600/30 transition duration-300 hover:-translate-y-1 hover:bg-red-500 hover:shadow-red-600/50 active:scale-95">Lihat Katalog</a>
                    <a href="/register" class="auth-guest inline-flex items-center justify-center rounded-lg border border-white/30 bg-black/30 px-6 py-3 text-sm font-bold text-white transition duration-300 hover:-translate-y-1 hover:bg-black/50 active:scale-95">Daftar Sewa</a>
                    <a href="/login" class="auth-guest inline-flex items-center justify-center rounded-lg border border-white/30 bg-black/30 px-6 py-3 text-sm font-bold text-white transition duration-300 hover:-translate-y-1 hover:bg-black/50 active:scale-95">Masuk</a>
                    <a href="/akun" class="auth-user hidden inline-flex items-center justify-center rounded-lg bg-red-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-red-600/30 transition duration-300 hover:-translate-y-1 hover:bg-red-500 active:scale-95">Lihat Akun</a>
                    <a href="/backend" class="auth-backend hidden inline-flex items-center justify-center rounded-lg border border-white/30 bg-black/30 px-6 py-3 text-sm font-bold text-white transition duration-300 hover:-translate-y-1 hover:bg-black/50 active:scale-95">Buka Backend</a>
                </div>
                <div class="mt-4 grid grid-cols-1 gap-4 border-t border-white/15 pt-5 sm:grid-cols-3">
                    <div class="group flex items-start gap-3 transition duration-300 hover:-translate-y-1">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-red-500 bg-red-600/30 text-white transition duration-300 group-hover:scale-110 group-hover:bg-red-600">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <div><h4 class="text-xs font-bold text-white">Aman & Terpercaya</h4><p class="mt-0.5 text-[10px] text-zinc-400">Data aman & terjamin.</p></div>
                    </div>
                    <div class="group flex items-start gap-3 transition duration-300 hover:-translate-y-1">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-red-500 bg-red-600/30 text-white transition duration-300 group-hover:scale-110 group-hover:bg-red-600">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <div><h4 class="text-xs font-bold text-white">Proses Cepat</h4><p class="mt-0.5 text-[10px] text-zinc-400">Sewa hitungan menit.</p></div>
                    </div>
                    <div class="group flex items-start gap-3 transition duration-300 hover:-translate-y-1">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-red-500 bg-red-600/30 text-white transition duration-300 group-hover:scale-110 group-hover:bg-red-600">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <div><h4 class="text-xs font-bold text-white">Harga Terbaik</h4><p class="mt-0.5 text-[10px] text-zinc-400">Harga bersaing.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative flex min-h-[300px] w-full flex-1 items-center justify-center lg:min-h-[380px]">
                <div class="absolute inset-4 rotate-[-4deg] rounded-2xl border-2 border-red-500/70 shadow-[0_0_20px_rgba(239,68,68,0.3)] transition duration-500 hover:rotate-0 hover:shadow-[0_0_45px_rgba(239,68,68,0.6)]"></div>
                <div class="relative z-10 w-full animate-[float_4s_ease-in-out_infinite] text-center">
                    @if ($heroBanner)
                        <img src="{{ asset('storage/'.$heroBanner) }}" alt="Banner motor rental" class="mx-auto max-h-[420px] max-w-full object-contain drop-shadow-[0_20px_30px_rgba(0,0,0,0.7)] transition duration-500 hover:scale-105">
                    @else
                        <div class="p-5 text-center"><p class="text-xs font-bold uppercase text-red-300">Banner Motor</p><p class="text-lg font-black text-white">Upload PNG via Backend</p></div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white px-4 py-10 dark:bg-zinc-950 sm:px-6">
        <div class="mx-auto max-w-6xl">
            <div class="scroll-animate grid grid-cols-1 overflow-hidden rounded-3xl border border-zinc-200 bg-white shadow-[0_15px_50px_rgba(0,0,0,0.06)] dark:border-zinc-800 dark:bg-zinc-900 md:grid-cols-3">
                <div class="group flex items-center gap-4 border-b border-zinc-200 p-6 transition-all duration-300 hover:bg-red-50/50 dark:border-zinc-800 dark:hover:bg-red-950/10 md:border-b-0 md:border-r">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-red-100 text-red-600 transition duration-300 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/50 dark:text-red-400">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-red-600 dark:text-red-400">100%</p>
                        <p class="text-sm font-bold text-zinc-900 dark:text-white">Proses Transparan</p>
                        <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">Informasi sewa jelas sejak awal.</p>
                    </div>
                </div>
                <div class="group flex items-center gap-4 border-b border-zinc-200 p-6 transition-all duration-300 hover:bg-red-50/50 dark:border-zinc-800 dark:hover:bg-red-950/10 md:border-b-0 md:border-r">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-red-100 text-red-600 transition duration-300 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/50 dark:text-red-400">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-red-600 dark:text-red-400">Cepat</p>
                        <p class="text-sm font-bold text-zinc-900 dark:text-white">Booking Lebih Mudah</p>
                        <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">Tidak perlu proses berbelit.</p>
                    </div>
                </div>
                <div class="group flex items-center gap-4 p-6 transition-all duration-300 hover:bg-red-50/50 dark:hover:bg-red-950/10">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-red-100 text-red-600 transition duration-300 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/50 dark:text-red-400">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m0 4a9 9 0 100-18 9 9 0 000 18zm0-6a3 3 0 100-6 3 3 0 000 6z"/></svg>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-red-600 dark:text-red-400">Aman</p>
                        <p class="text-sm font-bold text-zinc-900 dark:text-white">Data Terjaga</p>
                        <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">Privasi pelanggan diperhatikan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-zinc-50 px-4 py-16 dark:bg-zinc-900 sm:px-6">
        <div class="mx-auto max-w-6xl">
            <div class="scroll-animate mb-10 text-center">
                <span class="inline-flex rounded-full bg-red-50 px-4 py-2 text-[11px] font-black uppercase tracking-[0.18em] text-red-600 dark:bg-red-950/40 dark:text-red-400">Kenapa Kami?</span>
                <h2 class="mt-4 text-3xl font-black tracking-tight text-zinc-900 dark:text-white sm:text-4xl">Lebih Dari Sekadar Rental Motor</h2>
                <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-zinc-500 dark:text-zinc-400">Kami menghadirkan pengalaman penyewaan yang praktis, nyaman, dan dapat diandalkan untuk berbagai kebutuhan perjalananmu.</p>
            </div>
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="scroll-animate rental-card group rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-xl dark:border-zinc-800 dark:bg-zinc-950">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-red-50 text-red-600 transition duration-300 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/40 dark:text-red-400">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="mt-5 text-base font-black text-zinc-900 dark:text-white">Motor Terawat</h3>
                    <p class="mt-2 text-sm leading-6 text-zinc-500 dark:text-zinc-400">Setiap motor dipersiapkan agar nyaman digunakan.</p>
                </div>
                <div class="scroll-animate rental-card group rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-xl dark:border-zinc-800 dark:bg-zinc-950">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-red-50 text-red-600 transition duration-300 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/40 dark:text-red-400">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="mt-5 text-base font-black text-zinc-900 dark:text-white">Proses Praktis</h3>
                    <p class="mt-2 text-sm leading-6 text-zinc-500 dark:text-zinc-400">Proses penyewaan dibuat sederhana dan cepat.</p>
                </div>
                <div class="scroll-animate rental-card group rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-xl dark:border-zinc-800 dark:bg-zinc-950">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-red-50 text-red-600 transition duration-300 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/40 dark:text-red-400">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="mt-5 text-base font-black text-zinc-900 dark:text-white">Harga Bersahabat</h3>
                    <p class="mt-2 text-sm leading-6 text-zinc-500 dark:text-zinc-400">Pilihan harga kompetitif dengan kualitas kendaraan terjaga.</p>
                </div>
                <div class="scroll-animate rental-card group rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-xl dark:border-zinc-800 dark:bg-zinc-950">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-red-50 text-red-600 transition duration-300 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/40 dark:text-red-400">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m0 4a9 9 0 100-18 9 9 0 000 18zm0-6a3 3 0 100-6 3 3 0 000 6z"/></svg>
                    </div>
                    <h3 class="mt-5 text-base font-black text-zinc-900 dark:text-white">Lebih Terpercaya</h3>
                    <p class="mt-2 text-sm leading-6 text-zinc-500 dark:text-zinc-400">Informasi kendaraan dan proses sewa dibuat jelas.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white px-4 py-16 dark:bg-zinc-950 sm:px-6">
        <div class="mx-auto max-w-6xl">
            <div class="grid items-center gap-10 lg:grid-cols-2">
                <div class="scroll-animate">
                    <span class="inline-flex rounded-full bg-red-50 px-4 py-2 text-[11px] font-black uppercase tracking-[0.18em] text-red-600 dark:bg-red-950/40 dark:text-red-400">Pengalaman Lebih Baik</span>
                    <h2 class="mt-5 text-3xl font-black leading-tight tracking-tight text-zinc-900 dark:text-white sm:text-4xl">Semua yang Kamu Butuhkan,<span class="text-red-600 dark:text-red-400">Ada di Sini.</span></h2>
                    <p class="mt-5 max-w-xl text-sm leading-7 text-zinc-500 dark:text-zinc-400">Mulai dari mencari kendaraan, melakukan booking, hingga mengelola akun semuanya dirancang agar lebih mudah dan nyaman digunakan.</p>
                    <div class="mt-8 grid gap-4 sm:grid-cols-3">
                        <div class="group rounded-2xl border border-zinc-200 bg-zinc-50 p-4 transition duration-300 hover:-translate-y-1 hover:border-red-200 dark:border-zinc-800 dark:bg-zinc-900">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-red-600 text-xs font-black text-white">01</div>
                            <h3 class="mt-4 text-sm font-black text-zinc-900 dark:text-white">Pilihan Kendaraan</h3>
                            <p class="mt-2 text-xs leading-5 text-zinc-500 dark:text-zinc-400">Temukan kendaraan sesuai kebutuhanmu.</p>
                        </div>
                        <div class="group rounded-2xl border border-zinc-200 bg-zinc-50 p-4 transition duration-300 hover:-translate-y-1 hover:border-red-200 dark:border-zinc-800 dark:bg-zinc-900">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-red-600 text-xs font-black text-white">02</div>
                            <h3 class="mt-4 text-sm font-black text-zinc-900 dark:text-white">Booking Mudah</h3>
                            <p class="mt-2 text-xs leading-5 text-zinc-500 dark:text-zinc-400">Tentukan tanggal dan lakukan booking.</p>
                        </div>
                        <div class="group rounded-2xl border border-zinc-200 bg-zinc-50 p-4 transition duration-300 hover:-translate-y-1 hover:border-red-200 dark:border-zinc-800 dark:bg-zinc-900">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-red-600 text-xs font-black text-white">03</div>
                            <h3 class="mt-4 text-sm font-black text-zinc-900 dark:text-white">Siap Digunakan</h3>
                            <p class="mt-2 text-xs leading-5 text-zinc-500 dark:text-zinc-400">Motor siap menemani perjalananmu.</p>
                        </div>
                    </div>
                </div>
                <div class="scroll-animate relative">
                    <div class="absolute -inset-4 rounded-[2rem] bg-red-100/70 blur-2xl dark:bg-red-950/20"></div>
                    <div class="relative overflow-hidden rounded-[2rem] border border-zinc-200 bg-zinc-50 p-6 shadow-xl dark:border-zinc-800 dark:bg-zinc-900">
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rental-card rounded-2xl border border-zinc-200 bg-white p-5 transition hover:-translate-y-1 hover:shadow-lg dark:border-zinc-800 dark:bg-zinc-950">
                                <p class="text-2xl font-black text-red-600 dark:text-red-400">24/7</p>
                                <p class="mt-1 text-sm font-bold text-zinc-900 dark:text-white">Akses Mudah</p>
                                <p class="mt-1 text-xs leading-5 text-zinc-500 dark:text-zinc-400">Kelola kebutuhan rental dengan fleksibel.</p>
                            </div>
                            <div class="rental-card rounded-2xl border border-zinc-200 bg-white p-5 transition hover:-translate-y-1 hover:shadow-lg dark:border-zinc-800 dark:bg-zinc-950">
                                <p class="text-2xl font-black text-red-600 dark:text-red-400">Aman</p>
                                <p class="mt-1 text-sm font-bold text-zinc-900 dark:text-white">Data Terjaga</p>
                                <p class="mt-1 text-xs leading-5 text-zinc-500 dark:text-zinc-400">Informasi pelanggan diperhatikan.</p>
                            </div>
                            <div class="rental-card rounded-2xl border border-zinc-200 bg-white p-5 transition hover:-translate-y-1 hover:shadow-lg dark:border-zinc-800 dark:bg-zinc-950">
                                <p class="text-2xl font-black text-red-600 dark:text-red-400">Mudah</p>
                                <p class="mt-1 text-sm font-bold text-zinc-900 dark:text-white">Proses Sederhana</p>
                                <p class="mt-1 text-xs leading-5 text-zinc-500 dark:text-zinc-400">Tidak perlu proses yang rumit.</p>
                            </div>
                            <div class="rental-card rounded-2xl border border-zinc-200 bg-white p-5 transition hover:-translate-y-1 hover:shadow-lg dark:border-zinc-800 dark:bg-zinc-950">
                                <p class="text-2xl font-black text-red-600 dark:text-red-400">Ready</p>
                                <p class="mt-1 text-sm font-bold text-zinc-900 dark:text-white">Motor Siap Jalan</p>
                                <p class="mt-1 text-xs leading-5 text-zinc-500 dark:text-zinc-400">Kendaraan siap menemani perjalananmu.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-zinc-50 px-4 py-16 dark:bg-zinc-900 sm:px-6">
        <div class="mx-auto max-w-6xl">
            <div class="scroll-animate mx-auto mb-10 max-w-2xl text-center">
                <span class="inline-flex rounded-full bg-red-50 px-4 py-2 text-[11px] font-black uppercase tracking-[0.18em] text-red-600 dark:bg-red-950/40 dark:text-red-400">Cara Sewa</span>
                <h2 class="mt-4 text-3xl font-black tracking-tight text-zinc-900 dark:text-white sm:text-4xl">Sewa Motor Tanpa Ribet</h2>
                <p class="mt-4 text-sm leading-7 text-zinc-500 dark:text-zinc-400">Hanya beberapa langkah sederhana untuk mendapatkan kendaraan yang kamu butuhkan.</p>
            </div>
            <div class="grid gap-5 md:grid-cols-3">
                <div class="scroll-animate rental-card group rounded-3xl border border-zinc-200 bg-white p-7 text-center shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-xl dark:border-zinc-800 dark:bg-zinc-950">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-red-600 text-lg font-black text-white shadow-lg shadow-red-600/20 transition duration-300 group-hover:scale-110">01</div>
                    <h3 class="mt-5 text-lg font-black text-zinc-900 dark:text-white">Tentukan Kebutuhan</h3>
                    <p class="mt-2 text-sm leading-6 text-zinc-500 dark:text-zinc-400">Pilih kendaraan dan sesuaikan dengan kebutuhan perjalananmu.</p>
                </div>
                <div class="scroll-animate rental-card group rounded-3xl border border-zinc-200 bg-white p-7 text-center shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-xl dark:border-zinc-800 dark:bg-zinc-950">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-red-600 text-lg font-black text-white shadow-lg shadow-red-600/20 transition duration-300 group-hover:scale-110">02</div>
                    <h3 class="mt-5 text-lg font-black text-zinc-900 dark:text-white">Lakukan Booking</h3>
                    <p class="mt-2 text-sm leading-6 text-zinc-500 dark:text-zinc-400">Tentukan tanggal dan selesaikan proses booking melalui akunmu.</p>
                </div>
                <div class="scroll-animate rental-card group rounded-3xl border border-zinc-200 bg-white p-7 text-center shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-xl dark:border-zinc-800 dark:bg-zinc-950">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-red-600 text-lg font-black text-white shadow-lg shadow-red-600/20 transition duration-300 group-hover:scale-110">03</div>
                    <h3 class="mt-5 text-lg font-black text-zinc-900 dark:text-white">Nikmati Perjalanan</h3>
                    <p class="mt-2 text-sm leading-6 text-zinc-500 dark:text-zinc-400">Motor siap digunakan. Tinggal berangkat dan nikmati perjalananmu.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-zinc-50 px-4 pb-16 pt-2 dark:bg-zinc-900 sm:px-6">
        <div class="scroll-animate relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-red-950 via-red-800 to-red-600 px-6 py-16 shadow-2xl sm:px-10">
            <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-32 -left-20 h-80 w-80 rounded-full bg-black/10"></div>
            <div class="relative mx-auto max-w-4xl text-center">
                <span class="inline-flex rounded-full border border-white/20 bg-white/10 px-4 py-2 text-[11px] font-black uppercase tracking-[0.18em] text-red-100">Siap Berangkat?</span>
                <h2 class="mt-5 text-3xl font-black tracking-tight text-white sm:text-4xl">Perjalananmu Dimulai Dari Sini</h2>
                <p class="mx-auto mt-4 max-w-xl text-sm leading-7 text-red-100">Tidak perlu menunggu lama. Temukan kendaraan yang sesuai, lakukan booking, dan nikmati perjalanan dengan lebih nyaman.</p>
                <div class="mt-8 flex flex-wrap justify-center gap-3">
                    <a href="/katalog" class="rounded-xl bg-white px-6 py-3 text-sm font-black text-red-700 shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-red-50 active:scale-95">Lihat Katalog</a>
                    <a href="/register" class="auth-guest rounded-xl border border-white/30 bg-black/15 px-6 py-3 text-sm font-black text-white transition duration-300 hover:-translate-y-1 hover:bg-black/25 active:scale-95">Buat Akun</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        function initRentalAnimations() {
            const elements = document.querySelectorAll('.scroll-animate');
            if (!elements.length) return;
            const observer = new IntersectionObserver(
                (entries, observer) => {
                    entries.forEach(entry => {
                        if (!entry.isIntersecting) return;
                        entry.target.classList.remove( 'opacity-0', 'translate-y-12' );
                        entry.target.classList.add( 'opacity-100', 'translate-y-0' );
                        observer.unobserve(entry.target);
                    });
                },
                {
                    threshold: 0.12,
                    rootMargin: '0px 0px -40px 0px'
                }
            );
            elements.forEach((element, index) => {
                element.classList.add( 'opacity-0', 'translate-y-12', 'transition-all', 'duration-700', 'ease-out' );
                element.style.transitionDelay = `${Math.min(index * 80, 400)}ms`;
                observer.observe(element);
            });
            document.querySelectorAll('.rental-card').forEach(card => {
                card.addEventListener('click', function () {
                    this.classList.remove('scale-95');
                    this.classList.add( 'scale-[0.97]', 'ring-2', 'ring-red-500/30' );
                    setTimeout(() => {
                        this.classList.remove( 'scale-[0.97]', 'ring-2', 'ring-red-500/30' );
                    }, 180);
                });
            });
        }
        document.addEventListener( 'DOMContentLoaded', initRentalAnimations );
        document.addEventListener( 'livewire:navigated', initRentalAnimations );
    </script>
</x-layouts.app>