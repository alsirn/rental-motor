<x-layouts.app title="Katalog Motor">
<section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
    <div class="mb-8 grid gap-5 lg:grid-cols-[1fr_auto] lg:items-end">
        <div>
            <p class="text-sm font-bold uppercase tracking-widest text-red-600">Katalog Motor</p>
            <h1 class="mt-2 text-3xl font-black text-zinc-950 dark:text-white sm:text-4xl">Pilih Motor yang Tersedia</h1>
            <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400">Temukan motor yang sesuai untuk perjalananmu.</p>
        </div>
        <div class="flex flex-wrap gap-2 lg:justify-end">
            <button class="brand-filter rounded-full bg-zinc-950 px-4 py-2 text-sm font-semibold text-white transition hover:-translate-y-1 hover:shadow-lg active:scale-95 dark:bg-white dark:text-zinc-950" data-brand="all" type="button">Semua Brand</button>
            @foreach($brands as $brand)
                <button class="brand-filter rounded-full border border-zinc-300 bg-white px-4 py-2 text-sm font-semibold text-zinc-700 transition hover:-translate-y-1 hover:border-red-500 hover:text-red-600 hover:shadow-lg active:scale-95 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300" data-brand="{{ $brand->nama_brand }}" type="button">{{ $brand->nama_brand }}</button>
            @endforeach
        </div>
    </div>
    <div class="mb-8 grid gap-4 rounded-2xl border border-zinc-200 bg-white p-4 shadow-sm dark:border-zinc-800 dark:bg-zinc-900 md:grid-cols-[1fr_auto] md:items-end">
        <label class="grid gap-2 text-sm font-semibold text-zinc-800 dark:text-zinc-200">Cari motor<input id="motor-search" class="field" type="search" placeholder="Cari nama motor, plat nomor, brand..."></label>
        <div class="flex flex-wrap gap-2">
            <button class="status-filter btn-dark" data-status="all" type="button">Semua Status</button>
            <button class="status-filter btn-muted" data-status="tersedia" type="button">Tersedia</button>
            <button class="status-filter btn-muted" data-status="disewa" type="button">Disewa</button>
        </div>
    </div>
    <p id="filter-empty" class="mb-4 hidden rounded-2xl border border-zinc-200 bg-white p-5 text-sm font-semibold text-zinc-600 dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-400">Tidak ada motor yang sesuai filter.</p>
    <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
        @foreach($motors as $motor)
            @php
                $images = json_decode($motor->image_motor, true);
                $images = is_array($images)
                    ? collect($images)->filter()->take(3)->map(fn($i) => asset('storage/'.$i))->values()->toArray()
                    : ($motor->image_motor ? [asset('storage/'.$motor->image_motor)] : []);
            @endphp
            <article
                class="motor-card overflow-hidden rounded-[28px] border border-zinc-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-zinc-800 dark:bg-zinc-900"
                data-brand="{{ $motor->brand->nama_brand }}"
                data-status="{{ $motor->status ? 'tersedia' : 'disewa' }}"
                data-keywords="{{ strtolower($motor->nama.' '.$motor->brand->nama_brand.' '.$motor->no_polisi.' '.$motor->catatan) }}"
                data-name="{{ $motor->nama }}"
                data-price="{{ number_format($motor->harga,0,',','.') }}"
                data-plate="{{ $motor->no_polisi }}"
                data-note="{{ $motor->catatan }}"
                data-id="{{ $motor->id }}"
            >
                <div class="relative aspect-video w-full cursor-pointer overflow-hidden bg-zinc-100 dark:bg-zinc-800" data-slider title="Klik foto untuk melihat detail">
                    <span class="absolute right-4 top-4 z-30 rounded-full bg-white/95 px-4 py-2 text-xs font-bold text-red-600 shadow-md dark:bg-zinc-950/95 dark:text-red-400">● {{ $motor->status ? 'TERSEDIA' : 'DISEWA' }}</span>
                    <div class="flex h-full transition-transform duration-500 ease-out" data-slides>
                        @foreach(range(0,2) as $i)
                            <div class="h-full min-w-full">
                                @if(isset($images[$i]))
                                    <img src="{{ $images[$i] }}" alt="{{ $motor->nama }}" class="h-full w-full object-cover transition duration-500 hover:scale-105">
                                @else
                                    <div class="grid h-full place-items-center bg-zinc-100 text-center dark:bg-zinc-800">
                                        <div class="text-zinc-400 dark:text-zinc-500">
                                            <div class="mb-2 text-4xl">{{ $i === 0 ? '🏍️' : '📷' }}</div>
                                            <p class="font-semibold">Foto {{ ['depan','samping','belakang'][$i] }} belum ditambahkan</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="slider-prev absolute left-3 top-1/2 z-30 grid h-10 w-10 -translate-y-1/2 place-items-center rounded-full bg-zinc-950/90 pb-1 text-2xl font-bold leading-none text-white shadow-lg transition hover:scale-110 hover:bg-red-600 active:scale-95">‹</button>
                    <button type="button" class="slider-next absolute right-3 top-1/2 z-30 grid h-10 w-10 -translate-y-1/2 place-items-center rounded-full bg-zinc-950/90 pb-1 text-2xl font-bold leading-none text-white shadow-lg transition hover:scale-110 hover:bg-red-600 active:scale-95">›</button>
                    <div class="absolute bottom-3 left-1/2 z-30 flex -translate-x-1/2 gap-2 rounded-full bg-white/90 px-3 py-2 shadow dark:bg-zinc-950/90">
                        @foreach(range(0,2) as $i)
                            <button type="button" data-index="{{ $i }}" class="slider-dot h-2.5 rounded-full {{ $i === 0 ? 'w-8 bg-red-600' : 'w-2.5 bg-zinc-300 dark:bg-zinc-600' }}"></button>
                        @endforeach
                    </div>
                </div>
                <div class="border-t border-zinc-200 p-6 dark:border-zinc-800">
                    <p class="text-sm font-black uppercase tracking-widest text-red-600">{{ $motor->brand->nama_brand }}</p>
                    <h3 class="mt-2 truncate text-2xl font-black text-zinc-950 dark:text-white">{{ $motor->nama }}</h3>
                    <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400">{{ $motor->no_polisi }} · {{ $motor->catatan }}</p>
                    <div class="my-6 border-t border-zinc-100 dark:border-zinc-800"></div>
                    <div class="flex items-end justify-between gap-4">
                        <div>
                            <p class="text-sm text-zinc-400">Harga sewa</p>
                            <p class="mt-1 text-2xl font-black text-zinc-950 dark:text-white">Rp{{ number_format($motor->harga,0,',','.') }}<span class="text-sm font-medium text-zinc-400">/hari</span></p>
                        </div>
                        <a href="/checkout/{{ $motor->id }}" class="{{ $motor->status ? 'rounded-xl bg-red-600 px-6 py-3 font-bold text-white hover:bg-red-700 active:scale-95' : 'pointer-events-none rounded-xl bg-zinc-200 px-6 py-3 font-bold text-zinc-500 dark:bg-zinc-800 dark:text-zinc-600' }}">Sewa</a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</section>

<div id="motor-modal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/80 p-4 backdrop-blur-sm">
    <div class="relative grid w-full max-w-5xl overflow-hidden rounded-[24px] bg-zinc-950 shadow-2xl md:grid-cols-[1.1fr_0.9fr]">
        <button id="motor-modal-close" type="button" class="absolute right-4 top-4 z-50 grid h-10 w-10 place-items-center rounded-full bg-black/80 text-xl font-bold text-white shadow-lg transition hover:scale-105 hover:bg-red-600 active:scale-95">×</button>
        <div class="relative flex h-[380px] items-center justify-center overflow-hidden bg-zinc-900 md:h-[480px]">
            <img id="modal-motor-image" src="" alt="" class="max-h-full max-w-full object-contain">
            <button id="modal-prev" type="button" class="absolute left-4 top-1/2 z-40 grid h-11 w-11 -translate-y-1/2 place-items-center rounded-full bg-zinc-950 pb-1 text-2xl font-bold leading-none text-white shadow-xl transition hover:scale-110 hover:bg-red-600 active:scale-95">‹</button>
            <button id="modal-next" type="button" class="absolute right-4 top-1/2 z-40 grid h-11 w-11 -translate-y-1/2 place-items-center rounded-full bg-zinc-950 pb-1 text-2xl font-bold leading-none text-white shadow-xl transition hover:scale-110 hover:bg-red-600 active:scale-95">›</button>            
            <div id="modal-dots" class="absolute bottom-4 left-1/2 z-40 flex -translate-x-1/2 gap-2 rounded-full bg-zinc-950/90 px-3 py-2 shadow-lg"></div>
        </div>
        <div class="flex h-[380px] flex-col justify-center bg-zinc-950 p-6 text-white md:h-[480px] md:p-7">
            <p id="modal-motor-brand" class="text-sm font-black uppercase tracking-[.15em] text-red-500"></p>
            <h2 id="modal-motor-name" class="mt-2 text-3xl font-black tracking-tight sm:text-4xl"></h2>
            <div class="mt-6 grid gap-4">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-zinc-500">Status</p>
                    <p id="modal-motor-status" class="mt-1 font-bold text-red-500"></p>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-zinc-500">Nomor Polisi</p>
                    <p id="modal-motor-plate" class="mt-1 font-bold text-white"></p>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-zinc-500">Harga Sewa</p>
                    <p class="mt-1 text-2xl font-black text-white">Rp<span id="modal-motor-price"></span><span class="text-sm font-medium text-zinc-500">/hari</span></p>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-zinc-500">Catatan</p>
                    <p id="modal-motor-note" class="mt-1 text-sm text-zinc-300"></p>
                </div>
            </div>
            <a id="modal-rent-button" href="/checkout/{{ $motor->id }}" class="mt-auto inline-flex justify-center rounded-xl bg-red-600 px-6 py-3 font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-red-700 active:scale-[.98]"> Sewa Motor</a>
        </div>
    </div>
</div>
<a href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20menanyakan%20rental%20motor" target="_blank" rel="noopener noreferrer" class="fixed bottom-6 right-6 z-[999] flex h-16 w-16 items-center justify-center rounded-full border-4 border-white bg-[#25D366] shadow-2xl transition hover:scale-110 dark:border-zinc-900">
    <img src="{{ asset('storage/motors/wa.png') }}" alt="WhatsApp" class="h-9 w-9 object-contain">
    <span class="absolute inset-0 -z-10 animate-ping rounded-full bg-[#25D366]/30"></span>
</a>
<script>
const state={brand:'all',status:'all',query:''},empty=document.getElementById('filter-empty');
document.querySelectorAll('[data-slider]').forEach(slider=>{
    const slides=slider.querySelector('[data-slides]'),
        dots=slider.querySelectorAll('.slider-dot'),
        prev=slider.querySelector('.slider-prev'),
        next=slider.querySelector('.slider-next');
    let current=0,timer;
    const show=i=>{
        current=(i+3)%3;
        slides.style.transform=`translateX(-${current*100}%)`;
        dots.forEach((d,n)=>{
            d.classList.toggle('w-8',n===current);
            d.classList.toggle('bg-red-600',n===current);
            d.classList.toggle('w-2.5',n!==current);
            d.classList.toggle('bg-zinc-300',n!==current);
            d.classList.toggle('dark:bg-zinc-600',n!==current);
        });
    };
    const auto=()=>{
        clearInterval(timer);
        timer=setInterval(()=>show(current+1),4000);
    };
    prev.onclick=e=>{e.stopPropagation();show(current-1);auto()};
    next.onclick=e=>{e.stopPropagation();show(current+1);auto()};
    dots.forEach(d=>d.onclick=e=>{e.stopPropagation();show(+d.dataset.index);auto()});
    slider.onmouseenter=()=>clearInterval(timer);
    slider.onmouseleave=auto;
    show(0);auto();
});
function filter(){
    let count=0;
    document.querySelectorAll('.motor-card').forEach(card=>{
        const visible=
            (state.brand==='all'||card.dataset.brand===state.brand)&&
            (state.status==='all'||card.dataset.status===state.status)&&
            (!state.query||card.dataset.keywords.includes(state.query));
        card.classList.toggle('hidden',!visible);
        if(visible)count++;
    });
    empty.classList.toggle('hidden',count!==0);
}
function active(buttons,button,on,off){
    buttons.forEach(b=>b.className=off);
    button.className=on;
}
document.querySelectorAll('.brand-filter').forEach(button=>{
    button.onclick=()=>{
        state.brand=button.dataset.brand;
        active(
            document.querySelectorAll('.brand-filter'),button,
            'brand-filter rounded-full bg-zinc-950 px-4 py-2 text-sm font-semibold text-white transition-all duration-200 hover:-translate-y-1 hover:shadow-lg active:scale-95 dark:bg-white dark:text-zinc-950',
            'brand-filter rounded-full border border-zinc-300 bg-white px-4 py-2 text-sm font-semibold text-zinc-700 transition-all duration-200 hover:-translate-y-1 hover:border-red-500 hover:text-red-600 hover:shadow-lg active:scale-95 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300'
        );
        filter();
    };
});
document.querySelectorAll('.status-filter').forEach(button=>{
    button.onclick=()=>{
        state.status=button.dataset.status;
        active(document.querySelectorAll('.status-filter'),button,'status-filter btn-dark','status-filter btn-muted');
        filter();
    };
});
document.getElementById('motor-search').oninput=e=>{
    state.query=e.target.value.trim().toLowerCase();
    filter();
};
const modal=document.getElementById('motor-modal'),
    modalImage=document.getElementById('modal-motor-image'),
    modalDots=document.getElementById('modal-dots');
let modalImages=[],modalIndex=0,modalTimer;
function showModalImage(i){
    if(!modalImages.length)return;
    modalIndex=(i+modalImages.length)%modalImages.length;
    modalImage.src=modalImages[modalIndex];
    modalDots.querySelectorAll('button').forEach((d,n)=>{
        d.className=`h-2.5 rounded-full ${n===modalIndex?'w-8 bg-red-600':'w-2.5 bg-white/60 hover:bg-white'}`;
    });
}
function startModalSlider(){
    clearInterval(modalTimer);
    if(modalImages.length>1)
        modalTimer=setInterval(()=>showModalImage(modalIndex+1),4000);
}
function openMotorModal(card){
    modalImages=[...card.querySelectorAll('[data-slides] img')].map(i=>i.src);
    if(!modalImages.length)return;
    modalIndex=0;
    showModalImage(0);
    document.getElementById('modal-motor-brand').textContent=card.dataset.brand;
    document.getElementById('modal-motor-name').textContent=card.dataset.name;
    document.getElementById('modal-motor-status').textContent=
        card.dataset.status==='tersedia'?'TERSEDIA':'DISEWA';
    document.getElementById('modal-motor-plate').textContent=card.dataset.plate;
    document.getElementById('modal-motor-price').textContent=card.dataset.price;
    document.getElementById('modal-motor-note').textContent=card.dataset.note||'-';
    const rent=document.getElementById('modal-rent-button'),
        ready=card.dataset.status==='tersedia';
    rent.href='/checkout/'+card.dataset.id;
    rent.textContent=ready?'Sewa Motor':'Sedang Disewa';
    rent.className=ready
        ?'mt-auto inline-flex justify-center rounded-xl bg-red-600 px-6 py-3 font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-red-700 active:scale-[.98]'
        :'pointer-events-none mt-auto inline-flex justify-center rounded-xl bg-zinc-800 px-6 py-3 font-bold text-zinc-500';
    modalDots.innerHTML=modalImages.map((_,i)=>`
        <button type="button" data-modal-index="${i}" class="h-2.5 rounded-full ${i?'w-2.5 bg-white/60 hover:bg-white':'w-8 bg-red-600'}"></button>
    `).join('');
    modal.classList.replace('hidden','flex');
    document.body.classList.add('overflow-hidden');
    startModalSlider();
}
function closeModal(){
    clearInterval(modalTimer);
    modal.classList.replace('flex','hidden');
    document.body.classList.remove('overflow-hidden');
}
document.querySelectorAll('.motor-card').forEach(card=>{
    card.querySelector('[data-slider]').onclick=e=>{
        if(!e.target.closest('button'))openMotorModal(card);
    };
});
document.getElementById('modal-prev').onclick=()=>{
    showModalImage(modalIndex-1);
    startModalSlider();
};
document.getElementById('modal-next').onclick=()=>{
    showModalImage(modalIndex+1);
    startModalSlider();
};
document.getElementById('motor-modal-close').onclick=closeModal;
modalDots.onclick=e=>{
    const button=e.target.closest('[data-modal-index]');
    if(button){
        showModalImage(+button.dataset.modalIndex);
        startModalSlider();
    }
};
modal.onclick=e=>{
    if(e.target===modal)closeModal();
};
modal.querySelector('.relative.flex').onmouseenter=()=>{
    clearInterval(modalTimer);
};
modal.querySelector('.relative.flex').onmouseleave=()=>{
    startModalSlider();
};
document.onkeydown=e=>{
    if(modal.classList.contains('hidden'))return;
    if(e.key==='Escape')closeModal();
    if(e.key==='ArrowLeft'){
        showModalImage(modalIndex-1);
        startModalSlider();
    }
    if(e.key==='ArrowRight'){
        showModalImage(modalIndex+1);
        startModalSlider();
    }
};
</script>
</x-layouts.app>