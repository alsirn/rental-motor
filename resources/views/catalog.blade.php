<x-layouts.app title="Katalog Motor">
<section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
    <div class="mb-8 grid gap-5 lg:grid-cols-[1fr_auto] lg:items-end">
        <div>
            <p class="text-sm font-bold uppercase tracking-widest text-red-600">Katalog Motor</p>
            <h1 class="mt-2 text-3xl font-black text-zinc-950 dark:text-white sm:text-4xl">Pilih Motor yang Tersedia</h1>
            <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400">Temukan motor yang sesuai untuk perjalananmu.</p>
        </div>
        <div class="flex flex-wrap gap-2 lg:justify-end">
            <button class="brand-filter rounded-full bg-zinc-950 px-4 py-2 text-sm font-semibold text-white transition-all duration-200 hover:-translate-y-1 hover:shadow-lg active:translate-y-0 active:scale-95 dark:bg-white dark:text-zinc-950" data-brand="all" type="button">Semua Brand</button>
            @foreach($brands as $brand)
                <button class="brand-filter rounded-full border border-zinc-300 bg-white px-4 py-2 text-sm font-semibold text-zinc-700 transition-all duration-200 hover:-translate-y-1 hover:border-red-500 hover:text-red-600 active:translate-y-0 active:scale-95 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300" data-brand="{{ $brand->nama_brand }}" type="button">{{ $brand->nama_brand }}</button>
            @endforeach
        </div>
    </div>
    <div class="mb-8 grid gap-4 rounded-2xl border border-zinc-200 bg-white p-4 shadow-sm dark:border-zinc-800 dark:bg-zinc-900 md:grid-cols-[1fr_auto] md:items-end">
        <label class="grid gap-2 text-sm font-semibold text-zinc-800 dark:text-zinc-200">Cari motor
            <input id="motor-search" class="field" type="search" placeholder="Cari nama motor, plat nomor, brand...">
        </label>
        <div class="flex flex-wrap gap-2">
            <button class="status-filter btn-dark" data-status="all" type="button">Semua Status</button>
            <button class="status-filter btn-muted" data-status="tersedia" type="button">Tersedia</button>
            <button class="status-filter btn-muted" data-status="disewa" type="button">Disewa</button>
        </div>
    </div>
    <p id="filter-empty" class="mb-4 hidden rounded-2xl border border-zinc-200 bg-white p-5 text-sm font-semibold text-zinc-600 dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-400">Tidak ada motor yang sesuai filter.</p>
    <div id="motor-grid" class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
        @foreach($motors as $motor)
            @php
                $images = json_decode($motor->image_motor, true);
                if (!is_array($images)) $images = $motor->image_motor ? [$motor->image_motor] : [];
                $images = collect($images)->filter()->take(3)->map(fn($i) => asset('storage/'.$i))->values()->toArray();
            @endphp
            <article class="motor-card overflow-hidden rounded-[28px] border border-zinc-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-zinc-800 dark:bg-zinc-900" data-brand="{{ $motor->brand->nama_brand }}" data-status="{{ $motor->status ? 'tersedia' : 'disewa' }}" data-keywords="{{ strtolower($motor->nama.' '.$motor->brand->nama_brand.' '.$motor->no_polisi.' '.$motor->catatan) }}">
                <div class="relative aspect-video w-full overflow-hidden bg-zinc-100 dark:bg-zinc-800" data-slider>
                    <span class="absolute right-4 top-4 z-30 rounded-full bg-white/95 px-4 py-2 text-xs font-bold text-red-600 shadow-md dark:bg-zinc-950/95 dark:text-red-400">● {{ $motor->status ? 'TERSEDIA' : 'DISEWA' }}</span>
                    <div class="flex h-full transition-transform duration-500 ease-out" data-slides>
                        @foreach(range(0,2) as $i)
                            <div class="min-w-full h-full">
                                @if(isset($images[$i]))
                                    <img src="{{ $images[$i] }}" alt="{{ $motor->nama }}" class="h-full w-full object-cover">
                                @else
                                    <div class="grid h-full w-full place-items-center bg-zinc-100 text-center dark:bg-zinc-800">
                                        <div class="text-zinc-400 dark:text-zinc-500">
                                            <div class="mb-2 text-4xl">{{ $i === 0 ? '🏍️' : '📷' }}</div>
                                            <p class="font-semibold">Foto {{ ['depan','samping','belakang'][$i] }} belum ditambahkan</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="slider-prev absolute left-3 top-1/2 z-30 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-zinc-200 bg-white text-xl font-bold text-zinc-800 shadow-lg hover:bg-zinc-100 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white">‹</button>
                    <button type="button" class="slider-next absolute right-3 top-1/2 z-30 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-zinc-200 bg-white text-xl font-bold text-zinc-800 shadow-lg hover:bg-zinc-100 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white">›</button>
                    <div class="absolute bottom-3 left-1/2 z-30 flex -translate-x-1/2 gap-2 rounded-full bg-white/90 px-3 py-2 shadow dark:bg-zinc-950/90">
                        @foreach(range(0,2) as $i)
                            <button type="button" data-index="{{ $i }}" class="slider-dot h-2.5 {{ $i === 0 ? 'w-8 bg-red-600' : 'w-2.5 bg-zinc-300 dark:bg-zinc-600' }} rounded-full transition-all"></button>
                        @endforeach
                    </div>
                </div>
                <div class="border-t border-zinc-200 dark:border-zinc-800"></div>
                <div class="p-6">
                    <p class="text-sm font-black uppercase tracking-widest text-red-600">{{ $motor->brand->nama_brand }}</p>
                    <h3 class="mt-2 truncate text-2xl font-black text-zinc-950 dark:text-white">{{ $motor->nama }}</h3>
                    <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400">{{ $motor->no_polisi }} · {{ $motor->catatan }}</p>
                    <div class="my-6 border-t border-zinc-100 dark:border-zinc-800"></div>
                    <div class="flex items-end justify-between gap-4">
                        <div>
                            <p class="text-sm text-zinc-400">Harga sewa</p>
                            <p class="mt-1 text-2xl font-black text-zinc-950 dark:text-white">Rp{{ number_format($motor->harga,0,',','.') }}<span class="text-sm font-medium text-zinc-400">/hari</span></p>
                        </div>
                        <a href="/checkout/{{ $motor->id }}" class="{{ $motor->status ? 'rounded-xl bg-red-600 px-6 py-3 font-bold text-white shadow transition hover:bg-red-700' : 'pointer-events-none rounded-xl bg-zinc-200 px-6 py-3 font-bold text-zinc-500 dark:bg-zinc-800 dark:text-zinc-600' }}">Sewa</a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</section>

<script>
const state={brand:'all',status:'all',query:''},empty=document.getElementById('filter-empty');
document.querySelectorAll('[data-slider]').forEach(s=>{
    const slides=s.querySelector('[data-slides]'),dots=s.querySelectorAll('.slider-dot'),
          prev=s.querySelector('.slider-prev'),next=s.querySelector('.slider-next');
    let current=0,timer;
    function show(i){
        current=(i+3)%3;
        slides.style.transform=`translateX(-${current*100}%)`;
        dots.forEach((d,n)=>{
            d.classList.toggle('w-8',n===current);
            d.classList.toggle('bg-red-600',n===current);
            d.classList.toggle('w-2.5',n!==current);
            d.classList.toggle('bg-zinc-300',n!==current);
            d.classList.toggle('dark:bg-zinc-600',n!==current);
        });
    }
    function auto(){clearInterval(timer);timer=setInterval(()=>show(current+1),4000)}
    prev.onclick=()=>{show(current-1);auto()};
    next.onclick=()=>{show(current+1);auto()};
    dots.forEach(d=>d.onclick=()=>{show(+d.dataset.index);auto()});
    s.onmouseenter=()=>clearInterval(timer);
    s.onmouseleave=auto;
    show(0);auto();
});
function filter(){
    let count=0;
    document.querySelectorAll('.motor-card').forEach(c=>{
        const show=(state.brand==='all'||c.dataset.brand===state.brand)
            &&(state.status==='all'||c.dataset.status===state.status)
            &&(!state.query||c.dataset.keywords.includes(state.query));
        c.classList.toggle('hidden',!show);
        if(show)count++;
    });
    empty.classList.toggle('hidden',count!==0);
}
function active(buttons,button,on,off){
    buttons.forEach(b=>b.className=off);
    button.className=on;
}
document.querySelectorAll('.brand-filter').forEach(b=>b.onclick=()=>{
    state.brand=b.dataset.brand;
    active(document.querySelectorAll('.brand-filter'),b,
    'brand-filter rounded-full bg-zinc-950 px-4 py-2 text-sm font-semibold text-white dark:bg-white dark:text-zinc-950',
    'brand-filter rounded-full border border-zinc-300 bg-white px-4 py-2 text-sm font-semibold text-zinc-700 hover:border-red-500 hover:text-red-600 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300');
    filter();
});
document.querySelectorAll('.status-filter').forEach(b=>b.onclick=()=>{
    state.status=b.dataset.status;
    active(document.querySelectorAll('.status-filter'),b,'status-filter btn-dark','status-filter btn-muted');
    filter();
});
document.getElementById('motor-search').oninput=e=>{
    state.query=e.target.value.trim().toLowerCase();
    filter();
};
</script>
</x-layouts.app>