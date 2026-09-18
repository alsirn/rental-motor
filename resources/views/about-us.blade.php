<x-layouts.app title="Tentang Kami">
<style>
@keyframes pulseGlow{0%,100%{opacity:.35;transform:scale(1)}50%{opacity:.6;transform:scale(1.08)}}
@keyframes shine{0%{transform:translateX(-120%)}100%{transform:translateX(120%)}}
@keyframes bounceIcon{0%,100%{transform:translateY(0)}50%{transform:translateY(-5px)}}
@keyframes circleTop{0%,100%{transform:translate(0,0)}50%{transform:translate(10px,-8px)}}
@keyframes circleBottom{0%,100%{transform:translate(0,0)}50%{transform:translate(-10px,8px)}}
.pulse-glow{animation:pulseGlow 4s ease-in-out infinite}
.bounce-icon{animation:bounceIcon 2s ease-in-out infinite}
.corner-circle{position:absolute;border:2px solid rgba(248,113,113,.55);border-radius:9999px;z-index:20;pointer-events:none}
.circle-top{width:58px;height:58px;top:14px;left:20px;animation:circleTop 4s ease-in-out infinite}
.circle-bottom{width:42px;height:42px;right:14px;bottom:14px;background:rgba(239,68,68,.08);animation:circleBottom 5s ease-in-out infinite}
.shine-card{position:relative;overflow:hidden}
.shine-card::after{content:"";position:absolute;top:0;left:0;width:45%;height:100%;background:linear-gradient(90deg,transparent,rgba(255,255,255,.12),transparent);transform:translateX(-120%);pointer-events:none}
.shine-card:hover::after{animation:shine .8s ease}
</style>
<section class="relative overflow-hidden border-b border-red-900/50 bg-[#1c1214] px-6 py-14 sm:py-16">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_50%,rgba(220,38,38,.42),transparent_42%)]"></div>
    <div class="absolute -right-32 -top-32 h-80 w-80 rounded-full bg-red-700/15 blur-3xl"></div>
    <div class="absolute -bottom-32 left-1/3 h-72 w-72 rounded-full bg-red-800/10 blur-3xl"></div>
    <div class="relative mx-auto grid max-w-6xl items-center gap-10 lg:grid-cols-2">
        <div class="scroll-animate">
            <span class="inline-block rounded-md border border-red-400/40 bg-red-600/20 px-3.5 py-1.5 text-[11px] font-extrabold uppercase tracking-widest text-red-200">Tentang Kami</span>
            <h1 class="mt-5 text-4xl font-black leading-tight tracking-tight text-white sm:text-5xl">Rental Motor <br> <span class="text-red-500">Mudah & Terpercaya</span>
            </h1>
            <p class="mt-5 max-w-xl text-base leading-7 text-red-100/65">Kami menyediakan layanan rental motor dengan proses yang sederhana, informasi yang jelas, dan pengelolaan data yang teratur.</p>
            <div class="mt-7 flex flex-wrap gap-3">
                <div class="flex items-center gap-3 rounded-xl border border-red-900/50 bg-[#29191b] px-4 py-3 transition duration-300 hover:border-red-700 hover:bg-red-950/60">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-red-600 text-white shadow-lg shadow-red-900/30">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">Proses Cepat</p>
                        <p class="text-xs text-red-100/50">Praktis dan sederhana</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-xl border border-red-900/50 bg-[#29191b] px-4 py-3 transition duration-300 hover:border-red-700 hover:bg-red-950/60">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-red-600 text-white shadow-lg shadow-red-900/30">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">Data Teratur</p>
                        <p class="text-xs text-red-100/50">Informasi lebih rapi</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-animate flex justify-center lg:justify-end">
            <div class="relative w-full max-w-md">
                <div class="absolute -inset-5 rounded-[2rem] bg-red-600/20 blur-2xl"></div>
                <div class="relative overflow-hidden rounded-[2rem] border border-red-900/50 bg-[#241719] p-8 shadow-2xl shadow-red-950/30">
                    <div class="absolute right-0 top-0 h-32 w-32 rounded-full bg-red-600/15 blur-2xl"></div>
                    <div class="relative flex min-h-[280px] flex-col items-center justify-center">
                        <div class="flex h-24 w-24 items-center justify-center rounded-2xl bg-gradient-to-br from-red-500 to-red-700 shadow-xl shadow-red-950/50"><span class="text-4xl font-black text-white">RM</span></div>
                        <h2 class="mt-6 text-2xl font-black text-white">Rental Motor</h2>
                        <p class="mt-2 text-sm text-red-100/50">Sewa Cepat • Data Rapi</p>
                        <div class="mt-7 h-px w-24 bg-red-500/60"></div>
                        <p class="mt-5 text-center text-sm leading-6 text-red-100/60">Solusi rental motor yang praktis untuk kebutuhan perjalananmu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-white px-4 py-10 dark:bg-zinc-950 sm:px-6">
    <div class="scroll-animate mx-auto grid max-w-6xl overflow-hidden rounded-3xl border border-zinc-200 bg-white shadow-[0_15px_50px_rgba(0,0,0,0.06)] dark:border-zinc-800 dark:bg-zinc-900 md:grid-cols-3">
        @foreach([
            ['title'=>'Cepat','text'=>'Proses penyewaan'],
            ['title'=>'Rapi','text'=>'Pengelolaan data'],
            ['title'=>'Praktis','text'=>'Pengalaman pelanggan']
        ] as $item)
            <div class="group border-b border-zinc-200 p-8 text-center transition duration-300 hover:bg-red-50 dark:border-zinc-800 dark:hover:bg-red-950/20 md:border-b-0 md:border-r last:border-0">
                <div class="text-3xl font-black text-red-600 transition duration-300 group-hover:scale-110">{{ $item['title'] }}</div>
                <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400">{{ $item['text'] }}</p>
            </div>
        @endforeach
    </div>
</section>
<section class="bg-zinc-50 px-6 py-16 dark:bg-zinc-900">
    <div class="mx-auto grid max-w-6xl items-center gap-12 lg:grid-cols-2">
        <div class="scroll-animate">
            <span class="rounded-full bg-red-50 px-4 py-2 text-sm font-semibold text-red-600 dark:bg-red-950/40 dark:text-red-700">Cerita Kami</span>
            <h2 class="mt-6 text-3xl font-black text-zinc-900 dark:text-white sm:text-4xl">Dibangun Untuk Membuat <span class="text-red-600">Rental Lebih Teratur</span></h2>
            <p class="mt-5 leading-7 text-zinc-600 dark:text-zinc-400">Rental motor bukan hanya tentang menyediakan kendaraan. Proses penyewaan, informasi kendaraan, pelanggan, transaksi, hingga data rental juga perlu dikelola dengan baik.</p>
            <p class="mt-4 leading-7 text-zinc-600 dark:text-zinc-400">Karena itu, kami mengusung konsep <strong class="text-red-600">Sewa Cepat • Data Rapi</strong> sebagai dasar dalam memberikan layanan rental motor.</p>
        </div>
        <div class="scroll-animate">
            <div class="grid grid-cols-2 gap-4">
                <div class="shine-card group rounded-3xl bg-red-600 p-7 text-white shadow-xl transition duration-500 hover:-translate-y-2 hover:rotate-1">
                    <div class="text-3xl font-black">01</div>
                    <h3 class="mt-8 font-bold">Sewa Cepat</h3>
                    <p class="mt-2 text-sm leading-6 text-red-100">Proses dibuat agar pelanggan dapat melakukan rental dengan lebih praktis.</p>
                </div>
                <div class="shine-card mt-8 rounded-3xl border border-zinc-200 bg-white p-7 shadow-sm transition duration-500 hover:-translate-y-2 hover:-rotate-1 dark:border-zinc-800 dark:bg-zinc-950">
                    <div class="text-3xl font-black text-red-600">02</div>
                    <h3 class="mt-8 font-bold text-zinc-900 dark:text-white">Data Rapi</h3>
                    <p class="mt-2 text-sm leading-6 text-zinc-500 dark:text-zinc-400">Data kendaraan dan transaksi tersusun lebih terorganisir.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-white px-6 py-16 dark:bg-zinc-950">
    <div class="mx-auto max-w-6xl">
        <div class="scroll-animate text-center">
            <span class="rounded-full bg-red-50 px-4 py-2 text-sm font-semibold text-red-600 dark:bg-red-950/40 dark:text-red-700">Keunggulan Kami</span>
            <h2 class="mt-6 text-3xl font-black text-zinc-900 dark:text-white sm:text-4xl">Rental Yang <span class="text-red-600">Lebih Terorganisir</span></h2>
            <p class="mx-auto mt-4 max-w-2xl text-zinc-500 dark:text-zinc-400">Setiap bagian dirancang untuk membuat proses rental menjadi lebih sederhana dan teratur.</p>
        </div>
        <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
           @foreach([
                ['icon'=>'<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m13 2-9 12h7l-1 8 9-12h-7l1-8Z"/></svg>','title'=>'Sewa Cepat','text'=>'Proses rental yang praktis dan tidak berbelit.'],
                ['icon'=>'<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/></svg>','title'=>'Data Rapi','text'=>'Informasi rental tersusun dan mudah dikelola.'],
                ['icon'=>'<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m8 12 2.5 2.5L16 9"/></svg>','title'=>'Informasi Jelas','text'=>'Detail kendaraan dan rental ditampilkan dengan jelas.'],
                ['icon'=>'<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20.8 8.8c0 5.4-8.8 10.2-8.8 10.2S3.2 14.2 3.2 8.8A4.8 4.8 0 0 1 12 6a4.8 4.8 0 0 1 8.8 2.8Z"/></svg>','title'=>'Nyaman','text'=>'Mengutamakan pengalaman pelanggan dalam setiap proses.']
            ] as $item)
                <div class="shine-card rental-card scroll-animate group rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm transition duration-500 hover:-translate-y-3 hover:border-red-200 hover:shadow-2xl dark:border-zinc-800 dark:bg-zinc-900 dark:hover:border-red-900">
                    <div class="bounce-icon flex h-12 w-12 items-center justify-center rounded-2xl bg-red-100 text-red-600 transition duration-300 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/50">{!! $item['icon'] !!}</div>
                    <h3 class="mt-5 font-bold text-zinc-900 dark:text-white">{{ $item['title'] }}</h3>
                    <p class="mt-2 text-sm leading-6 text-zinc-500 dark:text-zinc-400">{{ $item['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="bg-zinc-50 px-6 py-16 dark:bg-zinc-900">
    <div class="mx-auto max-w-6xl">
        <div class="scroll-animate text-center">
            <span class="rounded-full bg-red-50 px-4 py-2 text-sm font-semibold text-red-600 dark:bg-red-950/40 dark:text-red-700">Cara Kami Bekerja</span>
            <h2 class="mt-6 text-3xl font-black text-zinc-900 dark:text-white sm:text-4xl">Cepat Dalam Proses, <span class="text-red-600">Rapi Dalam Data</span></h2>
        </div>
        <div class="mt-10 grid gap-5 md:grid-cols-3">
            @foreach([
                ['no'=>'01','title'=>'Pilih Motor','text'=>'Pilih kendaraan yang sesuai dengan kebutuhan perjalananmu.'],
                ['no'=>'02','title'=>'Data Tercatat','text'=>'Informasi rental dan pelanggan dicatat secara teratur.'],
                ['no'=>'03','title'=>'Siap Digunakan','text'=>'Setelah proses selesai, motor siap menemani perjalananmu.']
            ] as $item)
                <div class="scroll-animate group rounded-3xl border border-zinc-200 bg-white p-7 shadow-sm transition duration-500 hover:-translate-y-3 hover:shadow-xl dark:border-zinc-800 dark:bg-zinc-950">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-red-600 font-black text-white transition duration-300 group-hover:scale-110 group-hover:rotate-6">{{ $item['no'] }}</div>
                        <span class="text-3xl font-black text-zinc-100 dark:text-zinc-800">→</span>
                    </div>
                    <h3 class="mt-6 text-lg font-bold text-zinc-900 dark:text-white">{{ $item['title'] }}</h3>
                    <p class="mt-2 text-sm leading-6 text-zinc-500 dark:text-zinc-400">{{ $item['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="bg-white px-6 py-16 dark:bg-zinc-950">
    <div class="mx-auto grid max-w-6xl gap-8 lg:grid-cols-2">
        <div class="scroll-animate">
            <span class="rounded-full bg-red-50 px-4 py-2 text-sm font-semibold text-red-600 dark:bg-red-950/40 dark:text-red-700">Hubungi Kami</span>
            <h2 class="mt-6 text-3xl font-black text-zinc-900 dark:text-white sm:text-4xl">Butuh Informasi <span class="text-red-600">Rental?</span></h2>
            <div class="mt-8 space-y-5">
                @foreach([
                    ['icon'=>'<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.5 5.5A2 2 0 0 1 4.5 3.5h2A1.5 1.5 0 0 1 8 4.7l1 2.4a1.5 1.5 0 0 1-.3 1.6l-1.1 1.1a12 12 0 0 0 5.6 5.6l1.1-1.1a1.5 1.5 0 0 1 1.6-.3l2.4 1a1.5 1.5 0 0 1 1.2 1.5v2a2 2 0 0 1-2 2C9.8 20.5 3.5 14.2 3.5 6.5"/></svg>','title'=>'Telepon','text'=>'+62 812 3456 7890'],
                    ['icon'=>'<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect width="18" height="14" x="3" y="5" rx="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m3 7 9 6 9-6"/></svg>','title'=>'Email','text'=>'rentalmotor@gmail.com'],
                    ['icon'=>'<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>','title'=>'Alamat','text'=>'Jl. Siliran Lor No.24, Panembahan, Kraton, Yogyakarta']
                ] as $item)
                    <div class="group flex gap-4 transition duration-300 hover:translate-x-2">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600 transition group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/50">{!! $item['icon'] !!}</div>
                        <div>
                            <p class="font-bold text-zinc-900 dark:text-white">{{ $item['title'] }}</p>
                            <p class="mt-1 text-sm leading-6 text-zinc-500 dark:text-zinc-400">{{ $item['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="scroll-animate overflow-hidden rounded-3xl border border-zinc-200 shadow-xl dark:border-zinc-800"><iframe src="https://www.google.com/maps?q=Jl.+Siliran+Lor+No.24,+Panembahan,+Kecamatan+Kraton,+Kota+Yogyakarta&output=embed" class="h-[350px] w-full border-0" loading="lazy"></iframe></div>
    </div>
</section>
<a href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20menanyakan%20rental%20motor" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp" class="wa-float fixed bottom-6 right-6 z-[999] flex h-16 w-16 items-center justify-center rounded-full border-4 border-white bg-[#25D366] shadow-2xl transition duration-300 hover:scale-110 hover:bg-[#20bd5a] dark:border-zinc-900 sm:bottom-8 sm:right-8">
    <img src="{{ asset('storage/motors/wa.png') }}" alt="WhatsApp" class="h-9 w-9 object-contain">
    <span class="absolute inset-0 -z-10 animate-ping rounded-full bg-[#25D366]/30"></span>
</a>

<script>
    function initAboutAnimations(){
        const elements=document.querySelectorAll('.scroll-animate');
        if(!elements.length)return;
        const observer=new IntersectionObserver((entries,observer)=>{
            entries.forEach(entry=>{
                if(!entry.isIntersecting)return;
                entry.target.classList.remove('opacity-0','translate-y-12');
                entry.target.classList.add('opacity-100','translate-y-0');
                observer.unobserve(entry.target);
            });
        },{threshold:.12,rootMargin:'0px 0px -40px 0px'});
        elements.forEach((element,index)=>{
            element.classList.add('opacity-0','translate-y-12','transition-all','duration-700','ease-out');
            element.style.transitionDelay=`${Math.min(index*80,400)}ms`;
            observer.observe(element);
        });
        document.querySelectorAll('.rental-card').forEach(card=>{
            card.addEventListener('click',function(){
                this.classList.add('scale-[0.97]','ring-2','ring-red-500/30');
                setTimeout(()=>this.classList.remove('scale-[0.97]','ring-2','ring-red-500/30'),180);
            });
        });
    }
    document.addEventListener('DOMContentLoaded',initAboutAnimations);
    document.addEventListener('livewire:navigated',initAboutAnimations);
</script>
</x-layouts.app>