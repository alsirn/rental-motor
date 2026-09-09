<x-layouts.app title="Tentang Kami">
<style>
@keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
@keyframes pulse-wa{0%,100%{transform:scale(1);box-shadow:0 8px 25px rgba(34,197,94,.25)}50%{transform:scale(1.08);box-shadow:0 12px 35px rgba(34,197,94,.4)}}
@keyframes heroText{from{opacity:0;transform:translateX(-25px)}to{opacity:1;transform:translateX(0)}}
.reveal{opacity:0;transform:translateY(30px);transition:.8s ease}.reveal.show{opacity:1;transform:translateY(0)}
.hero-text{animation:heroText .8s ease both}.wa-float{animation:pulse-wa 2.5s ease-in-out infinite}
.about-page{width:100%;max-width:100%;overflow-x:hidden}.about-page img,.about-page iframe{max-width:100%}
.break-address{overflow-wrap:anywhere;word-break:normal}.map-label{max-width:calc(100% - 2rem)}.responsive-button{max-width:100%;white-space:normal;text-align:center}
@media(max-width:639px){
    .hero-slide{min-height:290px!important}.hero-slide h1{font-size:2rem!important;line-height:1.15!important}
    .hero-slide p{font-size:.875rem!important;line-height:1.6!important}.hero-indicator{height:4px!important}
    .about-story-image{height:280px!important}.about-contact-map,.about-contact-map iframe{min-height:360px!important}
    .wa-float{width:56px!important;height:56px!important;right:1rem!important;bottom:1rem!important;border-width:3px!important}
    .wa-float img{width:30px!important;height:30px!important}
}
@media(min-width:640px) and (max-width:1023px){.about-contact-map,.about-contact-map iframe{min-height:420px!important}}
</style>
<div class="about-page">
    <section class="relative overflow-hidden border-b border-red-950/50 bg-[#080808]">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_85%_50%,rgba(220,38,38,.28),transparent_35%),radial-gradient(circle_at_10%_100%,rgba(127,29,29,.2),transparent_35%)]"></div>
        <div class="absolute inset-0 opacity-[.05]" style="background-image:linear-gradient(rgba(255,255,255,.5) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.5) 1px,transparent 1px);background-size:45px 45px"></div>
        <div class="absolute -right-20 top-1/2 h-56 w-56 -translate-y-1/2 rounded-full border border-red-500/10"></div>
        <div class="absolute right-0 top-1/2 h-36 w-36 -translate-y-1/2 rounded-full bg-red-600/10 blur-2xl"></div>
        <div class="relative mx-auto max-w-7xl px-5 py-10 sm:px-8 lg:px-10">
            <div id="hero-slider" class="relative min-h-[250px]">
                <div class="hero-slide hero-text flex min-h-[250px] flex-col justify-center" data-slide="0">
                    <div class="flex items-center gap-2"><span class="h-1.5 w-1.5 shrink-0 rounded-full bg-red-500"></span><span class="text-[10px] font-black uppercase tracking-[.25em] text-red-400">Tentang Kami</span></div>
                    <h1 class="mt-4 max-w-3xl text-3xl font-black leading-tight tracking-tight text-white sm:text-5xl">Teman perjalananmu,<span class="text-red-500"> di setiap jalan.</span></h1>
                    <p class="mt-4 max-w-xl text-sm leading-6 text-zinc-400">Mengenal lebih dekat layanan rental motor yang hadir untuk memberikan perjalanan yang mudah, aman, dan nyaman.</p>
                </div>
                <div class="hero-slide hidden min-h-[250px] flex-col justify-center" data-slide="1">
                    <div class="flex items-center gap-2"><span class="h-1.5 w-1.5 shrink-0 rounded-full bg-red-500"></span><span class="text-[10px] font-black uppercase tracking-[.25em] text-red-400">Rental Mudah</span></div>
                    <h1 class="mt-4 max-w-3xl text-3xl font-black leading-tight tracking-tight text-white sm:text-5xl">Rental mudah,<span class="text-red-500"> perjalanan nyaman.</span></h1>
                    <p class="mt-4 max-w-xl text-sm leading-6 text-zinc-400">Pilih motor sesuai kebutuhanmu, lakukan pemesanan dengan mudah, lalu nikmati perjalanan tanpa proses yang rumit.</p>
                </div>
                <div class="hero-slide hidden min-h-[250px] flex-col justify-center" data-slide="2">
                    <div class="flex items-center gap-2"><span class="h-1.5 w-1.5 shrink-0 rounded-full bg-red-500"></span><span class="text-[10px] font-black uppercase tracking-[.25em] text-red-400">Siap Berangkat</span></div>
                    <h1 class="mt-4 max-w-3xl text-3xl font-black leading-tight tracking-tight text-white sm:text-5xl">Pilih motor,<span class="text-red-500"> langsung berangkat.</span></h1>
                    <p class="mt-4 max-w-xl text-sm leading-6 text-zinc-400">Temukan kendaraan yang tepat untuk bekerja, berwisata, maupun menjelajahi berbagai tempat bersama rental motor kami.</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button type="button" data-indicator="0" aria-label="Slide 1" class="hero-indicator h-1 w-16 rounded-full bg-red-500 shadow-lg shadow-red-500/30 transition-all duration-500"></button>
                <button type="button" data-indicator="1" aria-label="Slide 2" class="hero-indicator h-1 w-4 rounded-full bg-white/20 transition-all duration-500"></button>
                <button type="button" data-indicator="2" aria-label="Slide 3" class="hero-indicator h-1 w-4 rounded-full bg-white/20 transition-all duration-500"></button>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 h-px w-full bg-gradient-to-r from-transparent via-red-600/60 to-transparent"></div>
    </section>
    <section class="bg-zinc-50 py-14 dark:bg-zinc-900 sm:py-20">
        <div class="reveal mx-auto grid max-w-7xl items-center gap-10 px-5 sm:gap-12 sm:px-8 lg:grid-cols-2 lg:px-10">
            <div>
                <p class="text-xs font-black uppercase tracking-[.2em] text-red-600 dark:text-red-500">Cerita Kami</p>
                <h2 class="mt-3 text-3xl font-black leading-tight text-zinc-950 dark:text-white sm:text-4xl">Lebih dari sekadar <span class="text-red-600 dark:text-red-500">rental motor.</span></h2>
                <div class="mt-6 space-y-4 text-sm leading-7 text-zinc-500 dark:text-zinc-400">
                    <p>Kami menyediakan layanan rental motor bagi kamu yang membutuhkan kendaraan praktis untuk bekerja, berwisata, maupun menjelajahi berbagai tempat.</p>
                    <p>Setiap motor yang kami sediakan diperhatikan kondisinya agar pelanggan dapat berkendara dengan lebih nyaman dan aman.</p>
                    <p>Kami percaya bahwa proses rental seharusnya sederhana. Karena itu, kami membuat proses pemesanan menjadi lebih mudah dan transparan.</p>
                </div>
                <div class="mt-8 flex flex-wrap items-center gap-3"><span class="h-1 w-12 rounded-full bg-red-600"></span><span class="text-xs font-bold uppercase tracking-widest text-zinc-400">Rental Motor Terpercaya</span></div>
            </div>
            <div class="group relative overflow-hidden rounded-[2rem] border border-zinc-200 bg-white p-2 shadow-xl dark:border-zinc-800 dark:bg-zinc-950">
                <img src="{{ asset('images/') }}" alt="Rental Motor" class="about-story-image h-[350px] w-full rounded-[1.5rem] object-cover transition duration-700 group-hover:scale-105">
                <div class="absolute inset-x-7 bottom-7 rounded-2xl bg-black/70 p-5 backdrop-blur-md">
                    <p class="text-[10px] font-bold uppercase tracking-[.2em] text-red-400">Rental Motor</p>
                    <p class="mt-1 text-lg font-black text-white">Siap menemani perjalananmu.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="relative overflow-hidden bg-white py-14 dark:bg-zinc-950 sm:py-20">
        <div class="absolute -left-32 top-1/2 h-80 w-80 -translate-y-1/2 rounded-full bg-red-100/60 blur-3xl dark:bg-red-950/10"></div>
        <div class="absolute -right-32 -top-20 h-80 w-80 rounded-full bg-red-100/50 blur-3xl dark:bg-red-950/10"></div>
        <div class="reveal relative mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <div class="mb-8 max-w-2xl sm:mb-10">
                <p class="text-xs font-black uppercase tracking-[.2em] text-red-600 dark:text-red-500">Pelayanan Kami</p>
                <h2 class="mt-3 text-3xl font-black leading-tight text-zinc-950 dark:text-white sm:text-4xl">Sederhana dalam proses, <span class="text-red-600 dark:text-red-500">nyaman dalam perjalanan.</span></h2>
                <p class="mt-4 text-sm leading-7 text-zinc-500 dark:text-zinc-400">Kami berusaha memberikan pengalaman rental yang jelas, cepat, dan tetap memperhatikan keamanan pelanggan.</p>
            </div>
            <div class="overflow-hidden rounded-[2rem] border border-zinc-200 bg-white shadow-xl shadow-zinc-200/60 dark:border-zinc-800 dark:bg-zinc-900 dark:shadow-black/20">
                <div class="grid md:grid-cols-3">
                    <div class="group relative p-6 transition duration-500 hover:bg-red-50/70 dark:hover:bg-red-950/20 sm:p-8">
                        <div class="absolute right-6 top-6 h-20 w-20 rounded-full bg-red-100/70 blur-2xl dark:bg-red-950/20"></div>
                        <div class="relative flex items-center gap-5">
                            <div class="grid h-14 w-14 shrink-0 place-items-center rounded-2xl bg-red-50 text-red-600 transition duration-500 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/40 dark:text-red-400"><span class="text-2xl">✓</span></div>
                            <div class="min-w-0"><p class="text-3xl font-black text-red-600 dark:text-red-400">100%</p><p class="mt-1 text-sm font-black text-zinc-900 dark:text-white">Proses Transparan</p><p class="mt-1 text-xs leading-5 text-zinc-500 dark:text-zinc-400">Informasi sewa jelas sejak awal.</p></div>
                        </div>
                    </div>
                    <div class="group relative border-t border-zinc-200 p-6 transition duration-500 hover:bg-red-50/70 dark:border-zinc-800 dark:hover:bg-red-950/20 md:border-l md:border-t-0 sm:p-8">
                        <div class="absolute right-6 top-6 h-20 w-20 rounded-full bg-red-100/70 blur-2xl dark:bg-red-950/20"></div>
                        <div class="relative flex items-center gap-5">
                            <div class="grid h-14 w-14 shrink-0 place-items-center rounded-2xl bg-red-600 text-white shadow-lg shadow-red-600/20 transition duration-500 group-hover:scale-110 group-hover:bg-red-700"><span class="text-2xl">ϟ</span></div>
                            <div class="min-w-0"><p class="text-3xl font-black text-red-600 dark:text-red-400">Cepat</p><p class="mt-1 text-sm font-black text-zinc-900 dark:text-white">Booking Lebih Mudah</p><p class="mt-1 text-xs leading-5 text-zinc-500 dark:text-zinc-400">Tidak perlu proses berbelit.</p></div>
                        </div>
                    </div>
                    <div class="group relative border-t border-zinc-200 p-6 transition duration-500 hover:bg-red-50/70 dark:border-zinc-800 dark:hover:bg-red-950/20 md:border-l md:border-t-0 sm:p-8">
                        <div class="absolute right-6 top-6 h-20 w-20 rounded-full bg-red-100/70 blur-2xl dark:bg-red-950/20"></div>
                        <div class="relative flex items-center gap-5">
                            <div class="grid h-14 w-14 shrink-0 place-items-center rounded-2xl bg-red-50 text-red-600 transition duration-500 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/40 dark:text-red-400"><span class="text-2xl">◎</span></div>
                            <div class="min-w-0"><p class="text-3xl font-black text-red-600 dark:text-red-400">Aman</p><p class="mt-1 text-sm font-black text-zinc-900 dark:text-white">Data Terjaga</p><p class="mt-1 text-xs leading-5 text-zinc-500 dark:text-zinc-400">Privasi pelanggan diperhatikan.</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-zinc-50 py-14 dark:bg-zinc-900 sm:py-20">
        <div class="reveal mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <div class="mb-8 max-w-2xl sm:mb-10">
                <p class="text-xs font-black uppercase tracking-[.2em] text-red-600 dark:text-red-500">Alamat & Kontak</p>
                <h2 class="mt-3 text-3xl font-black leading-tight text-zinc-950 dark:text-white sm:text-4xl">Kami siap melayani <span class="text-red-600 dark:text-red-500">kebutuhan rental motor kamu.</span></h2>
            </div>
            <div class="grid gap-6 lg:grid-cols-[.8fr_1.2fr]">
                <div class="rounded-[2rem] border border-zinc-200 bg-white p-6 shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-zinc-800 dark:bg-zinc-950 sm:p-9">
                    <p class="text-xs font-black uppercase tracking-widest text-red-600">Hubungi Kami</p>
                    <h3 class="mt-2 text-2xl font-black text-zinc-950 dark:text-white">Informasi Rental</h3>
                    <div class="mt-8 space-y-7">
                        <div class="group flex gap-4"><span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-red-50 text-red-600 transition duration-300 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/40">⌖</span><div class="min-w-0"><p class="text-sm font-black text-zinc-900 dark:text-white">Alamat</p><p class="break-address mt-1 text-sm leading-6 text-zinc-500 dark:text-zinc-400">Jl. Siliran Lor No.24, Panembahan, Kecamatan Kraton, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55131</p></div></div>
                        <div class="group flex gap-4"><span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-red-50 text-red-600 transition duration-300 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/40">◷</span><div class="min-w-0"><p class="text-sm font-black text-zinc-900 dark:text-white">Jam Operasional</p><p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Senin - Minggu · 08.00 - 21.00</p></div></div>
                        <div class="group flex gap-4"><span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-red-50 text-red-600 transition duration-300 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/40">◉</span><div class="min-w-0"><p class="text-sm font-black text-zinc-900 dark:text-white">WhatsApp</p><p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">+62 812 3456 7890</p></div></div>
                        <div class="group flex gap-4"><span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-red-50 text-red-600 transition duration-300 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white dark:bg-red-950/40">✉</span><div class="min-w-0"><p class="text-sm font-black text-zinc-900 dark:text-white">Email</p><p class="mt-1 break-all text-sm text-zinc-500 dark:text-zinc-400">rentalmotor@gmail.com</p></div></div>
                    </div>
                    <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Siliran+Lor+No.24,+Panembahan,+Kecamatan+Kraton,+Kota+Yogyakarta,+Daerah+Istimewa+Yogyakarta+55131" target="_blank" rel="noopener" class="responsive-button mt-9 inline-flex w-full items-center justify-center gap-3 rounded-xl bg-red-600 px-5 py-3 text-sm font-black text-white shadow-lg shadow-red-600/20 transition duration-300 hover:-translate-y-1 hover:bg-red-700 hover:shadow-red-600/30 active:scale-95 sm:w-auto">⌖ Lihat di Google Maps</a>
                </div>
                <div class="rounded-[2rem] border border-zinc-200 bg-white p-2 shadow-lg dark:border-zinc-800 dark:bg-zinc-950">
                    <div class="about-contact-map relative h-full min-h-[360px] overflow-hidden rounded-[1.5rem] bg-zinc-200 dark:bg-zinc-800">
                        <iframe class="h-full min-h-[360px] w-full border-0 sm:min-h-[450px]" src="https://www.google.com/maps?q=Jl.+Siliran+Lor+No.24,+Panembahan,+Kecamatan+Kraton,+Kota+Yogyakarta,+Daerah+Istimewa+Yogyakarta+55131&output=embed" loading="lazy" allowfullscreen></iframe>
                        <div class="map-label pointer-events-none absolute left-4 top-4 rounded-xl bg-white/95 px-4 py-3 shadow-lg dark:bg-zinc-900/95 sm:left-5 sm:top-5"><p class="text-[10px] font-black uppercase tracking-widest text-red-600">Lokasi Kami</p><p class="mt-1 text-xs font-black leading-5 text-zinc-900 dark:text-white sm:text-sm">Jl. Siliran Lor No.24, Panembahan, Kecamatan Kraton, Kota Yogyakarta</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative mx-4 mb-20 mt-10 overflow-hidden rounded-[2rem] bg-zinc-950 shadow-2xl sm:mx-8 sm:mb-28 sm:mt-14 lg:mx-auto lg:max-w-7xl">
        <div class="absolute inset-0 bg-gradient-to-r from-black via-red-950 to-red-700"></div>
        <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-red-500/30 blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 h-60 w-60 rounded-full bg-red-600/20 blur-3xl"></div>
        <div class="relative flex flex-col gap-8 px-6 py-10 sm:px-10 sm:py-12 md:flex-row md:items-center md:justify-between lg:px-14 lg:py-14">
            <div class="text-white">
                <p class="text-xs font-black uppercase tracking-[.2em] text-red-400">Siap Berangkat?</p>
                <h2 class="mt-2 text-2xl font-black leading-tight sm:text-3xl lg:text-4xl">Pilih motor dan mulai perjalananmu.</h2>
                <p class="mt-3 max-w-xl text-sm leading-6 text-zinc-300">Temukan motor yang sesuai kebutuhanmu dan nikmati proses rental yang mudah.</p>
            </div>
            <a href="/katalog" class="group inline-flex w-full shrink-0 items-center justify-center gap-3 rounded-xl bg-white px-7 py-3.5 text-sm font-black text-red-700 shadow-xl transition duration-300 hover:-translate-y-1 hover:bg-red-50 hover:shadow-2xl active:scale-95 sm:w-auto">Lihat Katalog</a>
        </div>
    </section>
    <a href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20menanyakan%20rental%20motor" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp" class="wa-float fixed bottom-6 right-6 z-[999] flex h-16 w-16 items-center justify-center rounded-full border-4 border-white bg-[#25D366] shadow-2xl transition duration-300 hover:scale-110 hover:bg-[#20bd5a] dark:border-zinc-900 sm:bottom-8 sm:right-8">
        <img src="{{ asset('storage/motors/wa.png') }}" alt="WhatsApp" class="h-9 w-9 object-contain">
        <span class="absolute inset-0 -z-10 animate-ping rounded-full bg-[#25D366]/30"></span>
    </a>
</div>
<script>
document.addEventListener('DOMContentLoaded',()=>{
    const slides=document.querySelectorAll('.hero-slide'),indicators=document.querySelectorAll('.hero-indicator');
    let currentSlide=0,sliderInterval;
    function showSlide(index){
        if(!slides.length)return;
        slides.forEach((slide,i)=>{
            slide.classList.toggle('hidden',i!==index);
            slide.classList.toggle('hero-text',i===index);
        });
        indicators.forEach((indicator,i)=>{
            indicator.classList.toggle('w-16',i===index);
            indicator.classList.toggle('w-4',i!==index);
            indicator.classList.toggle('bg-red-500',i===index);
            indicator.classList.toggle('bg-white/20',i!==index);
        });
        currentSlide=index;
    }
    function startSlider(){
        clearInterval(sliderInterval);
        sliderInterval=setInterval(()=>showSlide((currentSlide+1)%slides.length),4000);
    }
    indicators.forEach((indicator,index)=>{
        indicator.addEventListener('click',()=>{showSlide(index);startSlider()});
    });
    showSlide(0);startSlider();
    const revealItems=document.querySelectorAll('.reveal');
    if('IntersectionObserver' in window){
        const observer=new IntersectionObserver(entries=>{
            entries.forEach(entry=>{
                if(entry.isIntersecting){
                    entry.target.classList.add('show');
                    observer.unobserve(entry.target);
                }
            });
        },{threshold:.12});
        revealItems.forEach(item=>observer.observe(item));
    }else revealItems.forEach(item=>item.classList.add('show'));
});
</script>
</x-layouts.app>