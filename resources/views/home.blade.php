<x-layouts.app title="Rental Motor">
    <style>
        @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-10px); } 100% { transform: translateY(0px); } }
        @keyframes pulseGlow { 0% { box-shadow: 0 0 20px rgba(239, 68, 68, 0.3); } 50% { box-shadow: 0 0 40px rgba(239, 68, 68, 0.6); } 100% { box-shadow: 0 0 20px rgba(239, 68, 68, 0.3); } }
        .animate-float { animation: float 4s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulseGlow 3s ease-in-out infinite; }
        .transition-transform { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .transition-transform:hover { transform: translateY(-5px); }
        *:focus { outline: none !important; }
        @media (max-width: 768px) { .hero-title { font-size: 32px !important; } .responsive-grid-3 { grid-template-columns: 1fr !important; } .hero-section { padding: 30px 16px !important; } }
    </style>
    <section class="hero-section" style="position: relative; width: 100%; overflow: hidden; padding: 80px 24px; background: radial-gradient(circle at 75% 50%, #b91c1c 0%, #7f1d1d 35%, #450a0a 65%, #09090b 100%) !important; border-bottom: 1px solid #27272a;">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 40px; position: relative; z-index: 10;">
            <div style="flex: 1 1 300px; max-width: 100%; display: flex; flex-direction: column; gap: 20px;">
                <div><span style="display: inline-block; padding: 6px 14px; border-radius: 6px; background-color: rgba(239, 68, 68, 0.25); border: 1px solid rgba(239, 68, 68, 0.5); font-size: 11px; font-weight: 800; letter-spacing: 1px; color: #fca5a5; text-transform: uppercase;">RENTAL MOTOR ONLINE</span></div>
                <h1 class="hero-title" style="font-size: 48px; font-weight: 900; line-height: 1.15; color: #ffffff; margin: 0; letter-spacing: -0.5px;">Sewa Motor <br> <span style="color: #ef4444; text-shadow: 0 0 20px rgba(239, 68, 68, 0.4);">Mudah, Cepat</span> <br> & Terpercaya</h1>
                <p style="font-size: 14px; line-height: 1.6; color: #d4d4d8; margin: 0; max-width: 480px;">Temukan motor terbaik untuk setiap perjalananmu. Proses cepat, aman, dan harga bersahabat.</p>
                <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 12px; margin-top: 8px;">
                    <a href="/katalog" class="transition-transform" style="display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; padding: 12px 24px; border-radius: 8px; background-color: #dc2626; color: #ffffff; text-decoration: none; border: none; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.4);">Lihat Katalog</a>
                    <a href="/register" class="auth-guest transition-transform" style="display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; padding: 12px 24px; border-radius: 8px; background-color: rgba(0, 0, 0, 0.3); color: #ffffff; text-decoration: none; border: 1px solid rgba(255, 255, 255, 0.3);">Daftar Sewa</a>
                    <a href="/login" class="auth-guest transition-transform" style="display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; padding: 12px 24px; border-radius: 8px; background-color: rgba(0, 0, 0, 0.3); color: #ffffff; text-decoration: none; border: 1px solid rgba(255, 255, 255, 0.3);">Masuk</a>
                    <a href="/akun" class="auth-user hidden transition-transform" style="display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; padding: 12px 24px; border-radius: 8px; background-color: #dc2626; color: #ffffff; text-decoration: none; border: none; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.4);">Lihat Akun</a>
                    <a href="/backend" class="auth-backend hidden transition-transform" style="display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; padding: 12px 24px; border-radius: 8px; background-color: rgba(0, 0, 0, 0.3); color: #ffffff; text-decoration: none; border: 1px solid rgba(255, 255, 255, 0.3);">Buka Backend</a>
                </div>
                <div class="responsive-grid-3" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; margin-top: 16px; padding-top: 20px; border-top: 1px solid rgba(255, 255, 255, 0.15);">
                    <div style="display: flex; align-items: flex-start; gap: 10px;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background-color: rgba(220, 38, 38, 0.3); border: 1px solid #ef4444; display: flex; align-items: center; justify-content: center; color: #ffffff; flex-shrink: 0;">
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <div>
                            <h4 style="font-size: 12px; font-weight: 700; color: #ffffff; margin: 0;">Aman & Terpercaya</h4>
                            <p style="font-size: 10px; color: #a1a1aa; margin: 2px 0 0 0;">Data aman & terjamin.</p>
                        </div>
                    </div>
                    <div style="display: flex; align-items: flex-start; gap: 10px;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background-color: rgba(220, 38, 38, 0.3); border: 1px solid #ef4444; display: flex; align-items: center; justify-content: center; color: #ffffff; flex-shrink: 0;">
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <div>
                            <h4 style="font-size: 12px; font-weight: 700; color: #ffffff; margin: 0;">Proses Cepat</h4>
                            <p style="font-size: 10px; color: #a1a1aa; margin: 2px 0 0 0;">Sewa hitungan menit.</p>
                        </div>
                    </div>
                    <div style="display: flex; align-items: flex-start; gap: 10px;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background-color: rgba(220, 38, 38, 0.3); border: 1px solid #ef4444; display: flex; align-items: center; justify-content: center; color: #ffffff; flex-shrink: 0;">
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <div>
                            <h4 style="font-size: 12px; font-weight: 700; color: #ffffff; margin: 0;">Harga Terbaik</h4>
                            <p style="font-size: 10px; color: #a1a1aa; margin: 2px 0 0 0;">Harga bersaing.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="flex: 1 1 300px; display: flex; align-items: center; justify-content: center; position: relative; min-height: 300px; width: 100%;">
                <div class="animate-pulse-glow" style="position: absolute; inset: 10px; border: 2px solid #ef4444; transform: skewX(-8deg); border-radius: 16px; pointer-events: none;"></div>
                <div class="animate-float" style="position: relative; z-index: 10; width: 100%; display: flex; justify-content: center; align-items: center;">
                    @if ($heroBanner)
                        <img style="max-width: 100%; height: auto; max-height: 380px; object-fit: contain; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.7));" src="{{ asset('storage/'.$heroBanner) }}" alt="Banner motor rental">
                    @else
                        <div style="text-align: center; padding: 20px;">
                            <p style="font-size: 12px; font-weight: 700; color: #fca5a5; text-transform: uppercase;">Banner Motor</p>
                            <p style="font-size: 18px; font-weight: 900; color: #ffffff;">Upload PNG via Backend</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="scroll-animate bg-white dark:bg-zinc-900 transition-colors duration-300" style="padding: 28px 24px;">
        <div style="max-width: 1000px; margin: 0 auto;">
            <div class="responsive-grid-3 bg-zinc-200 dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 35px rgba(0,0,0,0.04);">
                <div class="transition-transform bg-white dark:bg-zinc-900" style="padding: 22px; text-align: center;">
                    <div style="font-size: 26px; font-weight: 900; color: #dc2626;">100%</div>
                    <div class="text-zinc-500 dark:text-zinc-400" style="margin-top: 4px; font-size: 12px;">Proses Transparan</div>
                </div>
                <div class="transition-transform bg-white dark:bg-zinc-900" style="padding: 22px; text-align: center;">
                    <div style="font-size: 26px; font-weight: 900; color: #dc2626;">Cepat</div>
                    <div class="text-zinc-500 dark:text-zinc-400" style="margin-top: 4px; font-size: 12px;">Booking Lebih Mudah</div>
                </div>
                <div class="transition-transform bg-white dark:bg-zinc-900" style="padding: 22px; text-align: center;">
                    <div style="font-size: 26px; font-weight: 900; color: #dc2626;">Aman</div>
                    <div class="text-zinc-500 dark:text-zinc-400" style="margin-top: 4px; font-size: 12px;">Data Pelanggan Terjaga</div>
                </div>
            </div>
        </div>
    </section>
    <section class="scroll-animate bg-zinc-50 dark:bg-zinc-950 transition-colors duration-300" style="padding: 80px 24px;">
        <div style="max-width: 1100px; margin: 0 auto;">
            <div style="text-align: center; max-width: 650px; margin: 0 auto 48px;">
                <span style="display: inline-block; padding: 6px 12px; border-radius: 999px; background: #fef2f2; color: #dc2626; font-size: 11px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase;">Kenapa Kami?</span>
                <h2 class="text-zinc-900 dark:text-white" style="margin: 14px 0 10px; font-size: 32px; line-height: 1.2; font-weight: 900;">Bukan Sekadar Sewa Motor</h2>
                <p class="text-zinc-500 dark:text-zinc-400" style="margin: 0; font-size: 14px; line-height: 1.7;">Kami membuat proses penyewaan motor menjadi lebih sederhana, cepat, dan nyaman untuk setiap perjalananmu.</p>
            </div>
            <div class="responsive-grid-3" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                <div class="transition-transform bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800" style="border-radius: 20px; padding: 28px; box-shadow: 0 10px 30px rgba(0,0,0,0.04);">
                    <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; border-radius: 14px; background: #fef2f2; color: #dc2626; margin-bottom: 20px;">
                        <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="text-zinc-900 dark:text-white" style="margin: 0 0 8px; font-size: 17px; font-weight: 800;">Motor Terawat</h3>
                    <p class="text-zinc-500 dark:text-zinc-400" style="margin: 0; font-size: 13px; line-height: 1.7;">Pilihan motor siap digunakan untuk menemani perjalananmu dengan nyaman.</p>
                </div>
                <div class="transition-transform bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800" style="border-radius: 20px; padding: 28px; box-shadow: 0 10px 30px rgba(0,0,0,0.04);">
                    <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; border-radius: 14px; background: #fef2f2; color: #dc2626; margin-bottom: 20px;">
                        <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-zinc-900 dark:text-white" style="margin: 0 0 8px; font-size: 17px; font-weight: 800;">Booking Lebih Cepat</h3>
                    <p class="text-zinc-500 dark:text-zinc-400" style="margin: 0; font-size: 13px; line-height: 1.7;">Pilih motor, tentukan kebutuhanmu, lalu lakukan proses penyewaan dengan mudah.</p>
                </div>
                <div class="transition-transform bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800" style="border-radius: 20px; padding: 28px; box-shadow: 0 10px 30px rgba(0,0,0,0.04);">
                    <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; border-radius: 14px; background: #fef2f2; color: #dc2626; margin-bottom: 20px;">
                        <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-zinc-900 dark:text-white" style="margin: 0 0 8px; font-size: 17px; font-weight: 800;">Harga Bersahabat</h3>
                    <p class="text-zinc-500 dark:text-zinc-400" style="margin: 0; font-size: 13px; line-height: 1.7;">Nikmati pilihan harga yang kompetitif tanpa mengorbankan kenyamanan.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="scroll-animate bg-white dark:bg-zinc-900 transition-colors duration-300" style="padding: 80px 24px;">
        <div style="max-width: 1050px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 50px;">
                <span style="display: inline-block; padding: 6px 12px; border-radius: 999px; background: #fef2f2; color: #dc2626; font-size: 11px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase;">Cara Sewa</span>
                <h2 class="text-zinc-900 dark:text-white" style="margin: 14px 0 10px; font-size: 32px; font-weight: 900;">Sewa Motor Dalam 3 Langkah</h2>
                <p class="text-zinc-500 dark:text-zinc-400" style="margin: 0 auto; max-width: 550px; font-size: 14px; line-height: 1.7;">Tidak perlu proses yang ribet. Cari motor yang kamu inginkan dan mulai perjalananmu.</p>
            </div>
            <div class="responsive-grid-3" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; position: relative;">
                <div class="transition-transform" style="text-align: center; padding: 28px 20px;">
                    <div style="width: 64px; height: 64px; margin: 0 auto 20px; border-radius: 50%; background: #dc2626; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 900; box-shadow: 0 10px 25px rgba(220,38,38,0.25);">01</div>
                    <h3 class="text-zinc-900 dark:text-white" style="margin: 0 0 8px; font-size: 17px; font-weight: 800;">Pilih Motor</h3>
                    <p class="text-zinc-500 dark:text-zinc-400" style="margin: 0; font-size: 13px; line-height: 1.7;">Jelajahi katalog dan temukan motor yang sesuai dengan kebutuhanmu.</p>
                </div>
                <div class="transition-transform" style="text-align: center; padding: 28px 20px;">
                    <div style="width: 64px; height: 64px; margin: 0 auto 20px; border-radius: 50%; background: #dc2626; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 900; box-shadow: 0 10px 25px rgba(220,38,38,0.25);">02</div>
                    <h3 class="text-zinc-900 dark:text-white" style="margin: 0 0 8px; font-size: 17px; font-weight: 800;">Lakukan Booking</h3>
                    <p class="text-zinc-500 dark:text-zinc-400" style="margin: 0; font-size: 13px; line-height: 1.7;">Tentukan tanggal dan lakukan proses booking melalui akunmu.</p>
                </div>
                <div class="transition-transform" style="text-align: center; padding: 28px 20px;">
                    <div style="width: 64px; height: 64px; margin: 0 auto 20px; border-radius: 50%; background: #dc2626; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 900; box-shadow: 0 10px 25px rgba(220,38,38,0.25);">03</div>
                    <h3 class="text-zinc-900 dark:text-white" style="margin: 0 0 8px; font-size: 17px; font-weight: 800;">Nikmati Perjalanan</h3>
                    <p class="text-zinc-500 dark:text-zinc-400" style="margin: 0; font-size: 13px; line-height: 1.7;">Motor siap digunakan. Tinggal berangkat dan nikmati perjalananmu.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="scroll-animate" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 50px 24px; margin-bottom: 40px; background: linear-gradient(135deg, #450a0a 0%, #991b1b 55%, #dc2626 100%); position: relative; overflow: hidden;">
        <div style="position: absolute; width: 250px; height: 250px; border-radius: 50%; background: rgba(255,255,255,0.05); right: -80px; top: -100px;"></div>
        <div style="position: relative; z-index: 2; max-width: 700px; width: 100%; margin: 0 auto; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center;">
            <span style="display: inline-block; padding: 5px 12px; border: 1px solid rgba(255,255,255,0.25); background: rgba(255,255,255,0.08); border-radius: 999px; color: #fecaca; font-size: 10px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase;">Siap Berangkat?</span>
            <h2 style="margin: 12px 0 8px; color: #ffffff; font-size: 28px; line-height: 1.2; font-weight: 900;">Temukan Motor Pilihanmu</h2>
            <p style="max-width: 480px; margin: 0 auto; color: #fecaca; font-size: 13px; line-height: 1.6;">Jangan biarkan perjalananmu terhambat. Pilih motor yang sesuai dan mulai perjalananmu hari ini.</p>
            <div style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 10px; margin-top: 20px;">
                <a href="/katalog" class="transition-transform" style="display: inline-flex; align-items: center; justify-content: center; gap: 6px; padding: 10px 20px; border-radius: 8px; background: #ffffff; color: #b91c1c; text-decoration: none; font-size: 13px; font-weight: 800; box-shadow: 0 8px 20px rgba(0,0,0,0.15);">Lihat Katalog</a>
                <a href="/register" class="auth-guest transition-transform" style="display: inline-flex; align-items: center; justify-content: center; padding: 10px 20px; border-radius: 8px; background: rgba(0,0,0,0.18); color: #ffffff; text-decoration: none; font-size: 13px; font-weight: 800; border: 1px solid rgba(255,255,255,0.3);">Buat Akun</a>
            </div>
        </div>
    </section>
    <script>
        function initScrollAnimations() {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.10
            };
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        observer.unobserve(entry.target); // Hentikan observasi setelah animasi berjalan sekali
                    }
                });
            }, observerOptions);
            document.querySelectorAll('.scroll-animate').forEach((el) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
                observer.observe(el);
            });
        }
        document.addEventListener("DOMContentLoaded", initScrollAnimations);
        document.addEventListener("livewire:navigated", initScrollAnimations);
    </script>
</x-layouts.app>