<x-layouts.app title="Rental Motor">
    <section style="position: relative; width: 100%; overflow: hidden; color: #ffffff; padding: 60px 24px; background: radial-gradient(circle at 75% 50%, #b91c1c 0%, #7f1d1d 35%, #450a0a 65%, #09090b 100%) !important; border-bottom: 1px solid #27272a;">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 40px; position: relative; z-index: 10;">
            <div style="flex: 1 1 500px; max-width: 600px; display: flex; flex-direction: column; gap: 20px;">
                <div><span style="display: inline-block; padding: 6px 14px; border-radius: 6px; background-color: rgba(239, 68, 68, 0.25); border: 1px solid rgba(239, 68, 68, 0.5); font-size: 11px; font-weight: 800; letter-spacing: 1px; color: #fca5a5; text-transform: uppercase;">RENTAL MOTOR ONLINE</span></div>
                <h1 style="font-size: 48px; font-weight: 900; line-height: 1.15; color: #ffffff; margin: 0; letter-spacing: -0.5px;">Sewa Motor <br><span style="color: #ef4444; text-shadow: 0 0 20px rgba(239, 68, 68, 0.4);">Mudah, Cepat</span> <br>& Terpercaya</h1>
                <p style="font-size: 14px; line-height: 1.6; color: #d4d4d8; margin: 0; max-width: 480px;">Temukan motor terbaik untuk setiap perjalananmu. Proses cepat, aman, dan harga bersahabat.</p>
                <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 12px; margin-top: 8px;">
                    <a href="/katalog" style="display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; padding: 12px 24px; border-radius: 8px; background-color: #dc2626; color: #ffffff; text-decoration: none; border: none; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.4);">Lihat Katalog</a>
                    <a href="/register" class="auth-guest" style="display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; padding: 12px 24px; border-radius: 8px; background-color: rgba(0, 0, 0, 0.3); color: #ffffff; text-decoration: none; border: 1px solid rgba(255, 255, 255, 0.3);">Daftar Sewa</a>
                    <a href="/login" class="auth-guest" style="display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; padding: 12px 24px; border-radius: 8px; background-color: rgba(0, 0, 0, 0.3); color: #ffffff; text-decoration: none; border: 1px solid rgba(255, 255, 255, 0.3);">Masuk</a>
                    <a href="/akun" class="auth-user hidden" style="display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; padding: 12px 24px; border-radius: 8px; background-color: #dc2626; color: #ffffff; text-decoration: none; border: none; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.4);">Lihat Akun</a>
                    <a href="/backend" class="auth-backend hidden" style="display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; padding: 12px 24px; border-radius: 8px; background-color: rgba(0, 0, 0, 0.3); color: #ffffff; text-decoration: none; border: 1px solid rgba(255, 255, 255, 0.3);">Buka Backend</a>
                </div>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; margin-top: 16px; padding-top: 20px; border-top: 1px solid rgba(255, 255, 255, 0.15);">
                    <div style="display: flex; align-items: flex-start; gap: 10px;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background-color: rgba(220, 38, 38, 0.3); border: 1px solid #ef4444; display: flex; align-items: center; justify-content: center; shrink: 0; color: #ffffff;">
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <div><h4 style="font-size: 12px; font-weight: 700; color: #ffffff; margin: 0;">Aman & Terpercaya</h4><p style="font-size: 10px; color: #a1a1aa; margin: 2px 0 0 0;">Data aman & terjamin.</p></div>
                    </div>
                    <div style="display: flex; align-items: flex-start; gap: 10px;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background-color: rgba(220, 38, 38, 0.3); border: 1px solid #ef4444; display: flex; align-items: center; justify-content: center; shrink: 0; color: #ffffff;">
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <div><h4 style="font-size: 12px; font-weight: 700; color: #ffffff; margin: 0;">Proses Cepat</h4><p style="font-size: 10px; color: #a1a1aa; margin: 2px 0 0 0;">Sewa hitungan menit.</p></div>
                    </div>

                    <div style="display: flex; align-items: flex-start; gap: 10px;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background-color: rgba(220, 38, 38, 0.3); border: 1px solid #ef4444; display: flex; align-items: center; justify-content: center; shrink: 0; color: #ffffff;">
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <div><h4 style="font-size: 12px; font-weight: 700; color: #ffffff; margin: 0;">Harga Terbaik</h4><p style="font-size: 10px; color: #a1a1aa; margin: 2px 0 0 0;">Harga bersaing.</p></div>
                    </div>
                </div>
            </div>
            <div style="flex: 1 1 400px; display: flex; align-items: center; justify-content: center; position: relative; min-height: 350px;">
                <div style="position: absolute; inset: 10px; border: 2px solid #ef4444; transform: skewX(-8deg); border-radius: 16px; pointer-events: none; box-shadow: 0 0 30px rgba(239, 68, 68, 0.3);"></div>
                <div style="position: relative; z-index: 10; width: 100%; display: flex; justify-content: center; align-items: center;">
                    @if ($heroBanner)
                        <img style="max-width: 100%; height: auto; max-height: 380px; object-fit: contain; filter: drop-shadow(0 15px 25px rgba(0,0,0,0.6));" src="{{ asset('storage/'.$heroBanner) }}" alt="Banner motor rental">
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

</x-layouts.app>
