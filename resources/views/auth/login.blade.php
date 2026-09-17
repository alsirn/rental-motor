<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Masuk - Rental Motor</title>
    @vite('resources/css/app.css')
    <script>
        const t=localStorage.getItem('theme');
        if(t==='dark'||(!t&&matchMedia('(prefers-color-scheme:dark)').matches))
            document.documentElement.classList.add('dark');
    </script>
    <style>
        @keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-6px)}}
        @keyframes glow{0%,100%{opacity:.2;transform:scale(1)}50%{opacity:.5;transform:scale(1.15)}}
        @keyframes enter{from{opacity:0;transform:translateY(20px) scale(.98)}to{opacity:1;transform:none}}
        .logo{animation:float 4s ease-in-out infinite}.glow{animation:glow 5s ease-in-out infinite}.box{animation:enter .6s ease-out}
    </style>
</head>
<body class="min-h-screen overflow-hidden bg-zinc-100 text-zinc-900 dark:bg-zinc-950 dark:text-white">
    <div class="fixed inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_45%,#fecaca,#fef2f2_30%,#f4f4f5_65%,#e4e4e7)] dark:bg-[radial-gradient(circle_at_50%_45%,#7f1d1d,#450a0a_28%,#18181b_60%,#09090b)]"></div>
        <div class="glow absolute -left-32 -top-32 h-80 w-80 rounded-full bg-red-500/20 blur-3xl"></div>
        <div class="glow absolute -bottom-32 -right-32 h-96 w-96 rounded-full bg-red-600/15 blur-3xl"></div>
        <div class="absolute left-[12%] top-[18%] h-24 w-24 rounded-full border border-red-500/20"></div>
        <div class="absolute right-[14%] top-[15%] h-16 w-16 rounded-full border border-red-500/20"></div>
        <div class="absolute bottom-[15%] left-[17%] h-20 w-20 rounded-full border border-red-500/20"></div>
        <div class="absolute left-0 top-[25%] h-px w-[35%] bg-red-500/15"></div>
        <div class="absolute right-0 top-[68%] h-px w-[32%] bg-red-500/15"></div>
        <div class="absolute inset-0 opacity-[.04] dark:opacity-[.07]" style="background-image:radial-gradient(currentColor 1px,transparent 1px);background-size:24px 24px"></div>
    </div>
    <button id="theme-toggle" type="button" aria-label="Ganti tema" class="fixed right-5 top-5 z-50 flex h-11 w-11 items-center justify-center rounded-full border border-zinc-300 bg-white/80 text-zinc-700 shadow-lg backdrop-blur transition hover:border-red-700 hover:text-red-600 dark:border-zinc-700 dark:bg-zinc-900/80 dark:text-zinc-300 dark:hover:text-red-700">
        <svg id="sun" class="hidden h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="4" stroke-width="2"/>
            <path stroke-linecap="round" stroke-width="2" d="M12 2v2m0 16v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2m16 0h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>
        </svg>
        <svg id="moon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.8A9 9 0 1111.2 3 7 7 0 0021 12.8z"/>
        </svg>
    </button>
    <main class="relative flex min-h-screen items-center justify-center px-5 py-8">
        <div class="box w-full max-w-[430px]">
            <div class="relative overflow-hidden rounded-[2rem] border border-red-300/70 bg-white/90 p-7 shadow-2xl shadow-red-900/10 backdrop-blur-xl dark:border-red-500/40 dark:bg-zinc-900/90 dark:shadow-red-950/40 sm:p-9">
                <div class="absolute -right-20 -top-20 h-48 w-48 rounded-full bg-red-500/10 blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 h-48 w-48 rounded-full bg-red-500/10 blur-3xl"></div>
                <div class="relative">
                    <div class="logo mb-6 flex justify-center">
                        <div class="relative">
                            <div class="absolute inset-0 rounded-[1.4rem] bg-red-500/30 blur-xl"></div>
                            <div class="relative flex h-20 w-20 items-center justify-center rounded-[1.4rem] border border-red-300 bg-gradient-to-br from-red-500 to-red-700 shadow-xl shadow-red-500/20 dark:border-red-700/50">
                                <div class="text-center"><div class="text-2xl font-black leading-none text-white">RM</div></div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="text-2xl font-black tracking-wide text-zinc-900 dark:text-white sm:text-3xl">RENTAL <span class="text-red-600 dark:text-red-500">MOTOR</span></h1>
                        <p class="mt-2 text-[10px] font-bold uppercase tracking-[.3em] text-zinc-500">Sewa Cepat • Data Rapi</p>
                    </div>
                    <div class="my-7 flex items-center gap-3">
                        <div class="h-px flex-1 bg-zinc-200 dark:bg-zinc-700"></div>
                        <span class="text-[9px] font-bold uppercase tracking-widest text-zinc-400 dark:text-zinc-600">Akses Akun</span>
                        <div class="h-px flex-1 bg-zinc-200 dark:bg-zinc-700"></div>
                    </div>
                    <form id="login-form" class="space-y-5">
                        <div>
                            <label for="email" class="mb-2 block text-[11px] font-bold uppercase tracking-wider text-zinc-600 dark:text-zinc-400">Email Address</label>
                            <div class="relative">
                                <svg class="absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18v12H3z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 7 9 6 9-6"/>
                                </svg>
                                <input id="email" name="email" type="email" placeholder="nama@email.com" required class="w-full rounded-xl border border-zinc-300 bg-zinc-100 py-3.5 pl-11 pr-4 text-sm text-zinc-900 outline-none placeholder:text-zinc-400 focus:border-red-500 focus:bg-white dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:placeholder:text-zinc-500 dark:focus:bg-zinc-800">
                            </div>
                        </div>
                        <div>
                            <label for="password" class="mb-2 block text-[11px] font-bold uppercase tracking-wider text-zinc-600 dark:text-zinc-400">Password</label>
                            <div class="relative">
                                <svg class="absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <rect x="5" y="10" width="14" height="10" rx="2" stroke-width="2"/>
                                    <path stroke-linecap="round" stroke-width="2" d="M8 10V7a4 4 0 0 1 8 0v3"/>
                                </svg>
                                <input id="password" name="password" type="password" placeholder="Masukkan password" required class="w-full rounded-xl border border-zinc-300 bg-zinc-100 py-3.5 pl-11 pr-12 text-sm text-zinc-900 outline-none placeholder:text-zinc-400 focus:border-red-500 focus:bg-white dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:placeholder:text-zinc-500 dark:focus:bg-zinc-800">
                                <button id="toggle-password" type="button" class="absolute right-0 top-0 flex h-full items-center px-4 text-zinc-400 transition hover:text-red-600">
                                    <svg id="eye-open" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6z"/>
                                        <circle cx="12" cy="12" r="2.5" stroke-width="2"/>
                                    </svg>
                                    <svg id="eye-close" class="hidden h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 3 18 18"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.6 6.2A9.7 9.7 0 0 1 12 6c6 0 9.5 6 9.5 6a16 16 0 0 1-3.1 3.6M6.2 6.2C3.9 7.7 2.5 12 2.5 12s3.5 6 9.5 6a9.8 9.8 0 0 0 3-.5"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="group flex w-full items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-red-600 to-red-500 py-3.5 text-sm font-black uppercase tracking-wider text-white shadow-lg shadow-red-500/20 transition hover:-translate-y-0.5 hover:from-red-500 hover:to-red-700 active:scale-[.98]">Masuk
                            <span class="transition group-hover:translate-x-1">→</span>
                        </button>
                    </form>
                    <div class="mt-7 text-center">
                        <p class="text-[10px] text-zinc-500 dark:text-zinc-600">Gunakan email dan password yang telah terdaftar.</p>
                        <div class="mt-4 flex items-center justify-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                            <span class="text-[9px] font-bold uppercase tracking-[.2em] text-zinc-500 dark:text-zinc-600">Rental Motor</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        const html=document.documentElement,
            toggle=document.getElementById('theme-toggle'),
            sun=document.getElementById('sun'),
            moon=document.getElementById('moon');
        function themeIcon(){
            const dark=html.classList.contains('dark');
            sun.classList.toggle('hidden',!dark);
            moon.classList.toggle('hidden',dark);
        }
        themeIcon();
        toggle.onclick=()=>{
            const dark=html.classList.toggle('dark');
            localStorage.setItem('theme',dark?'dark':'light');
            themeIcon();
        };
        const password=document.getElementById('password'),
            togglePassword=document.getElementById('toggle-password'),
            eyeOpen=document.getElementById('eye-open'),
            eyeClose=document.getElementById('eye-close');
        togglePassword.onclick=()=>{
            const show=password.type==='password';
            password.type=show?'text':'password';
            eyeOpen.classList.toggle('hidden',show);
            eyeClose.classList.toggle('hidden',!show);
        };
        document.getElementById('login-form').onsubmit=async e=>{
            e.preventDefault();
            const f=new FormData(e.currentTarget);
            try{
                const r=await fetch('/api/login',{
                    method:'POST',
                    headers:{
                        Accept:'application/json',
                        'Content-Type':'application/json'
                    },
                    body:JSON.stringify({
                        email:f.get('email'),
                        password:f.get('password')
                    })
                });
                const j=await r.json();
                if(!r.ok){
                    if(window.rentalApp?.notifyResponse)
                        window.rentalApp.notifyResponse(r,j,'Login berhasil.');
                    else
                        alert(j.message||'Email atau password salah.');
                    return;
                }
                if(window.rentalApp?.setSession)
                    window.rentalApp.setSession(j);
                else{
                    localStorage.setItem('api_token',j.token??j.access_token??'');
                    localStorage.setItem('auth_user',JSON.stringify(j.user));
                }
                location.href=j.user.role==='user'?'/akun':'/backend';
            }catch{
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        };
    </script>
</body>
</html>