## Gambaran Umum (Overview)

Rental Motor adalah platform rental sepeda motor dan pengelolaan armada kendaraan berkinerja tinggi yang dirancang untuk proses penyewaan cepat serta kontrol administratif yang rapi dan terstruktur ("Sewa Cepat, Data Rapi"). Bahasa desain memadukan energi otomotif yang dinamis dengan presisi utilitarian yang bersih dan modern. Estetika visual berakar pada palet kontras tinggi antara merah crimson balap (`{colors.primary}` — #b91c1c), nuansa gelap obsidian (`{colors.ink}` — #09090b), dan permukaan putih bersih (`{colors.canvas}` — #ffffff), yang disempurnakan oleh gradien radial merah lembut dan aksen garis mekanis yang presisi.

Sistem desain ini mencerminkan kecepatan, pergerakan, dan keandalan operasional melalui bentuk geometris yang tegas namun ramah pengguna. Kartu kendaraan dan kontainer konten utama mengusung sudut membulat lebar (`{rounded.xl}` — 24px dan `{rounded.2xl}` — 28px), sementara elemen filter interaktif, badge status, titik navigasi slider gambar, dan tombol WhatsApp mengadopsi siluet pill lonjong dan lingkaran sempurna (`{rounded.full}`). Kedalaman visual mengandalkan batas garis tipis (*hairlines*), bayangan halus, serta efek angkat kinetis saat hover (`translateY(-2px)` hingga `translateY(-6px)` disertai pendaran bayangan merah tua) alih-alih bayangan abu-abu gelap yang berat.

Tipografi utama menggunakan font **Instrument Sans**, yang dipadukan dengan kontras bobot yang tegas: bobot ekstra tebal (800 dan 900) memberikan kehadiran bertenaga pada tajuk utama, nama unit motor, dan nominal tarif sewa harian, sedangkan bobot reguler dan medium (400 hingga 600) menjaga kejelasan informasi teknis, nomor pelat polisi, ketentuan sewa, dan tabel inventaris armada.

**Karakteristik Utama:**
- **Palet Otomotif Kontras Tinggi:** Warna merah balap (`{colors.primary}`) di atas kanvas putih atau obsidian pekat, diperkaya dengan pencahayaan radial crimson di sudut halaman (`{colors.crimson-glow}`).
- **Arsitektur Mode Ganda (Dual-Mode):** Mendukung mode terang (*Light Mode*) dan gelap (*Dark Mode*) dengan transisi tema halus dan penyesuaian kontras permukaan otomatis.
- **Kinetika Hover Interaktif:** Elemen interaktif merespons kursor dengan pergerakan terangkat (`translateY(-2px)` hingga `translateY(-6px)`), peningkatan skala halus, dan bayangan merah berpendar.
- **Bahasa Geometri Membulat:** Penggunaan radius luas `{rounded.xl}` (24px) hingga `{rounded.2xl}` (28px) pada kartu dan panel konten, diimbangi oleh stadium pill `{rounded.full}` pada filter dan badge status.
- **Visualizer Kendaraan Multi-Sudut:** Slider foto rasio 16:9 yang menampilkan sudut depan, samping, dan belakang secara mulus dilengkapi titik indikator dinamis, tombol sentuh, serta pratinjau modal beresolusi tinggi.
- **Hierarki Status Komersial yang Jelas:** Pembedaan visual tegas antara unit yang siap dipesan langsung ("TERSEDIA") dan unit yang sedang disewa ("DISEWA").
- **Alur Kerja Operasional Terintegrasi:** Pola antarmuka terpadu yang menghubungkan eksplorasi katalog publik, verifikasi dokumen identitas penyewa (KTP, SIM, KK), kalkulasi biaya rental instan, pembayaran Midtrans, hingga pengelolaan data armada oleh admin.

## Warna (Colors)

Halaman sumber: Beranda (*Home*), Katalog (*Catalog*), Checkout, Tentang Kami (*About Us*), Akun (*Account*), Verifikasi (*Verification*), Masuk (*Login*), dan Dashboard Backend.

### Merek & Aksen (Brand & Accent)
- **Racing Crimson** (`{colors.primary}` — #b91c1c / `red-700`): Warna identitas utama merek. Digunakan pada tombol aksi utama (CTA), status navigasi aktif, angka harga sewa, dan logo merek.
- **Crimson Hover** (`{colors.primary-hover}` — #991b1b / `red-800`): Warna saat tombol utama atau elemen interaktif disorot (*hover*).
- **Crimson Vivid** (`{colors.accent}` — #dc2626 / `red-600`): Aksen berenergi tinggi untuk ring fokus formulir, latar belakang ikon, efek teks bersinar pada banner, dan titik slider aktif.
- **Crimson Bright** (`{colors.accent-bright}` — #ef4444 / `red-500`): Aksen pendaran cahaya, efek bayangan neon, dan teks penekanan pada mode gelap.
- **Deep Wine / Maroon** (`{colors.primary-dark}` — #7f1d1d / `red-900`): Warna gradien dasar untuk hero banner gelap, kartu sorotan, dan pendaran latar belakang mode gelap.
- **Crimson Wash** (`{colors.primary-tint}` — #fef2f2 / `red-50`): Latar belakang transparan kemerahan 5% untuk kotak ikon, filter terpilih, notifikasi informatif, dan badge status.
- **Crimson Wash Gelap** (`{colors.primary-tint-dark}` — rgba(127, 29, 29, 0.35)): Warna transparan kemerahan untuk elemen penekanan pada mode gelap.

### Permukaan (Surface)
- **Kanvas Terang** (`{colors.canvas}` — #ffffff): Latar belakang halaman default dan kartu konten pada mode terang.
- **Gradien Kanvas Terang**: `radial-gradient(circle at top left, rgb(254 226 226 / 0.9), transparent 34rem), linear-gradient(180deg, #ffffff 0%, #f4f4f5 42%, #ffffff 100%)`.
- **Kanvas Gelap** (`{colors.canvas-dark}` — #09090b / `zinc-950`): Latar belakang default dan permukaan kartu pada mode gelap.
- **Gradien Kanvas Gelap**: `radial-gradient(circle at top left, rgb(127 29 29 / 0.42), transparent 34rem), linear-gradient(180deg, #09090b 0%, #18181b 44%, #09090b 100%)`.
- **Permukaan Lembut Terang** (`{colors.surface-soft}` — #f4f4f5 / `zinc-100`): Kotak rincian pesanan, kartu ringkasan, dan isian input formulir.
- **Permukaan Lembut Gelap** (`{colors.surface-soft-dark}` — #18181b / `zinc-900`): Kartu panel mode gelap, baris tabel selang-seling, dan kontainer dialog.
- **Permukaan Redup Terang** (`{colors.surface-muted}` — #fafafa / `zinc-50`): Area selingan antar-seksi dan kotak ringkasan kalkulasi.
- **Permukaan Redup Gelap** (`{colors.surface-muted-dark}` — #27272a / `zinc-800`): Garis batas input, latar hover, dan panel sekunder mode gelap.
- **Garis Batas Terang (Hairline)** (`{colors.hairline}` — #e4e4e7 / `zinc-200`): Garis batas 1px untuk kartu motor, panel, dan pemisah tabel.
- **Garis Batas Halus Terang** (`{colors.hairline-subtle}` — #d4d4d8 / `zinc-300`): Garis tepi input formulir, tombol sekunder (*muted*), dan bilah pencarian.
- **Garis Batas Gelap** (`{colors.hairline-dark}` — #27272a / `zinc-800`): Garis batas luar kartu dan panel pada mode gelap.
- **Garis Batas Kuat Gelap** (`{colors.hairline-strong-dark}` — #3f3f46 / `zinc-700`): Garis tepi input dan tombol kontrol pada mode gelap.

### Tipografi & Teks (Text)
- **Teks Utama Terang** (`{colors.ink}` — #09090b / `zinc-950`): Judul utama, nama model motor, nominal harga, dan label penting.
- **Teks Sekunder Terang** (`{colors.ink-secondary}` — #27272a / `zinc-800`): Paragraf deskripsi, isi input formulir, dan sub-judul.
- **Teks Redup (Muted)** (`{colors.text-muted}` — #71717a / `zinc-500`): Nomor pelat, catatan kondisi unit, judul kolom tabel, dan filter tidak aktif.
- **Teks Pudar (Faint)** (`{colors.text-faint}` — #a1a1aa / `zinc-400`): Teks *placeholder*, catatan kaki hak cipta, dan keterangan teknis tambahan.
- **Teks Utama Gelap** (`{colors.ink-dark}` — #ffffff): Judul dan teks berkontras tinggi pada mode gelap.
- **Teks Sekunder Gelap** (`{colors.ink-secondary-dark}` — #f4f4f5 / `zinc-100`): Paragraf isi dan label tombol pada mode gelap.
- **Teks Redup Gelap** (`{colors.text-muted-dark}` — #a1a1aa / `zinc-400`): Teks pendukung dan keterangan metadata pada mode gelap.
- **Teks di Atas Warna Utama** (`{colors.on-primary}` — #ffffff): Teks putih murni di atas tombol crimson, badge gelap, dan banner hero.

### Status & Semantik (Semantic)
- **Berhasil (Success)** (`{colors.success}` — #16a34a / `green-600`): Badge akun terverifikasi, status rental selesai, dan notifikasi sukses.
- **Berhasil Lembut** (`{colors.success-soft}` — #dcfce7 / `green-100`): Latar belakang badge status akun terverifikasi.
- **Peringatan / Menunggu (Warning)** (`{colors.warning}` — #d97706 / `amber-600`): Status dokumen menunggu verifikasi admin (*pending*).
- **Peringatan Lembut** (`{colors.warning-soft}` — #fef3c7 / `amber-100`): Latar belakang kotak informasi verifikasi tertunda.
- **Bahaya / Disewa (Danger)** (`{colors.danger}` — #dc2626 / `red-600`): Badge status unit "DISEWA", garis aksen notifikasi gagal, dan pesan kesalahan.
- **Bantuan WhatsApp** (`{colors.whatsapp}` — #25D366): Tombol mengambang (*floating button*) untuk layanan pelanggan langsung.

## Tipografi (Typography)

### Keluarga Font (Font Family)

**Instrument Sans** — Tipografi sans-serif neo-grotesque modern dengan proporsi geometris proporsional, keterbacaan tinggi, dan karakter sporty yang kuat, baik pada tajuk berukuran besar maupun data teknis yang padat. Dikonfigurasi melalui Tailwind `@theme { --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }`.

Keluarga alternatif: `ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif`.

### Hierarki Tipografi

| Token | Ukuran | Bobot (Weight) | Tinggi Baris | Spasi Huruf | Penggunaan |
|---|---|---|---|---|---|
| `{typography.display}` | 48px – 56px | 900 (Black) | 1.05 | -0.025em | Tajuk utama hero banner ("Sewa Motor Cepat. Data Rapi.") |
| `{typography.heading-1}` | 36px – 40px | 900 (Black) | 1.15 | -0.02em | Judul seksi utama, judul katalog ("Pilih Motor yang Tersedia") |
| `{typography.heading-2}` | 28px – 32px | 900 (Black) | 1.2 | -0.015em | Judul fitur unggulan, judul cerita tentang kami, judul modal |
| `{typography.heading-3}` | 22px – 24px | 900 (Black) | 1.25 | -0.01em | Nama model motor pada kartu (Nmax, PCX, Vespa), judul popup detail |
| `{typography.heading-4}` | 18px – 20px | 800 (Extra Bold) | 1.3 | 0 | Judul tahapan cara sewa ("01 Tentukan Kebutuhan"), sub-judul panel |
| `{typography.price-display}` | 24px – 28px | 900 (Black) | 1.1 | -0.01em | Nominal tarif rental ("Rp150.000"), total pembayaran checkout |
| `{typography.title}` | 16px | 800 (Extra Bold) | 1.35 | 0 | Judul kartu metrik, header tabel, label identitas akun |
| `{typography.body-lg}` | 16px – 18px | 400 – 500 | 1.6 | 0 | Sub-judul banner hero, paragraf pembuka |
| `{typography.body}` | 14px | 500 (Medium) | 1.55 | 0 | Paragraf default, catatan kondisi unit, ringkasan transaksi |
| `{typography.body-sm}` | 12px – 13px | 400 – 500 | 1.5 | 0 | Nomor pelat polisi, baris spesifikasi, petunjuk pengunggahan dokumen |
| `{typography.eyebrow}` | 11px | 900 (Black) | 1.2 | 0.18em – 0.3em | Penanda kategori huruf kapital ("RENTAL MOTOR", "KENAPA KAMI?", "AREA PENYEWA") |
| `{typography.button}` | 14px | 700 – 800 | 1.0 | 0.02em | Label tombol aksi utama, tombol sekunder, dan filter |
| `{typography.badge}` | 11px – 12px | 800 (Extra Bold) | 1.0 | 0.05em | Badge status unit ("● TERSEDIA", "● DISEWA"), label peran pengguna |
| `{typography.caption}` | 10px – 11px | 600 | 1.3 | 0.02em | Hak cipta footer, catatan petunjuk slider foto motor |

### Prinsip Tipografi

- **Dominasi Bobot Tebal untuk Karakter Kuat:** Tajuk utama, nama motor, angka metrik, dan tombol selalu menggunakan bobot 800 (Extra Bold) atau 900 (Black). Karakter otomotif yang berdaya tahan dan sporty tercermin dari bobot huruf ini.
- **Eyebrow Huruf Kapital Berjarak Lebar:** Setiap blok konten atau seksi baru diawali label kategori berhuruf besar dengan spasi renggang (`0.18em` hingga `0.3em`) berwarna merah (`{colors.primary}` atau `{colors.accent}`) untuk menetapkan konteks sebelum tajuk utama dibaca.
- **Tinggi Baris Rapat pada Teks Besar:** Tajuk hero dan heading seksi menggunakan line-height rapat (1.05 hingga 1.2) agar teks tampak padat, kokoh, dan menyatu.
- **Keterbacaan Angka Finansial Tinggi:** Angka tarif rental disajikan tebal berukuran besar, diikuti teks frekuensi sewa yang lebih kecil dan redup (contoh: `/hari` ukuran 14px berbobot medium dalam warna `{colors.text-muted}`).

### Catatan Font Alternatif

Jika font `Instrument Sans` tidak tersedia pada lingkungan target:
- Pilihan pertama: **Plus Jakarta Sans** (bobot 400, 500, 700, 800, 900) — memiliki kehangatan geometris dan karakter ketegasan yang sangat mirip.
- Pilihan kedua: **Inter** (bobot 400, 600, 800, 900) dengan sedikit pengetatan letter-spacing `-0.02em` pada tajuk utama.
- Pilihan sistem: `-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif`.

## Tata Letak (Layout)

### Sistem Jarak & Spasi (Spacing System)
- **Basis Grid:** Unit mikro 4px dengan kelipatan ritme utama 8px.
- **Daftar Token:**
  - `{spacing.xxs}`: 4px
  - `{spacing.xs}`: 8px
  - `{spacing.sm}`: 12px
  - `{spacing.md}`: 16px
  - `{spacing.lg}`: 24px
  - `{spacing.xl}`: 32px
  - `{spacing.xxl}`: 48px
  - `{spacing.section}`: 64px
  - `{spacing.section-lg}`: 80px – 96px
- **Padding Standar Kartu:** `20px` hingga `24px` pada kartu katalog motor dan panel data; `28px` hingga `36px` pada kartu promosi utama dan form login.
- **Padding Tombol & Kontrol:** Input formulir menggunakan padding `{spacing.sm} {spacing.md}` (10px 16px); tombol menggunakan `12px 24px` pada desktop dan `10px 16px` pada perangkat bergerak.

### Grid & Kontainer
- **Kontainer Utama:** Tata letak terpusat dengan batas maksimal `max-w-7xl` (1280px) disertai jarak samping responsif `px-4 sm:px-6 lg:px-8`.
- **Kontainer Konten Khusus:** `max-w-6xl` (1152px) untuk seksi keunggulan layanan ("Kenapa Kami?") dan linimasa cerita.
- **Kontainer Formulir Fokus:** `max-w-[430px]` untuk kotak autentikasi masuk/daftar dan `max-w-3xl` untuk alur verifikasi KYC dokumen.
- **Grid Katalog Motor:** 3 kolom pada layar desktop besar (`grid gap-6 sm:grid-cols-2 xl:grid-cols-3`).
- **Tata Letak Checkout:** Split asimetris 2 kolom (`lg:grid-cols-[0.8fr_1.2fr]`), menampilkan kartu ringkasan kendaraan di sisi kiri dan formulir pemilihan tanggal serta total pembayaran di sisi kanan.
- **Metrik Dashboard Admin:** Susunan 4 hingga 5 kolom kartu ringkasan operasional (`grid-cols-2 lg:grid-cols-4` atau `md:grid-cols-5`).

### Filosofi Ruang Kosong (Whitespace)

Ruang kosong dirancang seimbang antara kepadatan fungsional (mempermudah perbandingan spesifikasi motor dan pemindaian tabel armada secara cepat) serta keleluasaan pandang pada seksi promosi. Seksi halaman bergantian antara kanvas putih/obsidian dengan permukaan abu-abu lembut (`{colors.surface-muted}`), dipisahkan jarak vertikal konsisten sebesar 64px hingga 80px.

### Strategi Responsif (Responsive Strategy)

#### Titik Henti Layar (Breakpoints)

| Nama | Lebar Layar | Penyesuaian Tampilan |
|---|---|---|
| 2xl | 1536px | Batas lebar maksimal 1280px; banner hero tampil luas dengan proporsi visual seimbang |
| xl | 1280px | Grid katalog motor 3 kolom, alur checkout berdampingan kiri-kanan |
| lg | 1024px | Banner hero bertransformasi dari susunan vertikal ke horizontal; grid fitur 4 kolom aktif |
| md | 768px | Grid motor menjadi 2 kolom; kartu metrik admin tersusun 2 per baris; bilah filter mulai menumpuk |
| sm | 640px | Tampilan 1 kolom linier; tombol navigasi atas memadat |
| xs | 480px | Tombol memenuhi lebar layar (*full width*); foto motor tetap mempertahankan rasio 16:9 |

#### Target Sentuh (Touch Targets)
- Semua tombol filter dan tombol aksi utama memiliki tinggi minimum 44px–48px untuk kenyamanan sentuhan jari pada layar ponsel.
- Tombol navigasi slider foto motor berukuran 40px × 40px dengan latar kontras tinggi dan jarak bebas yang cukup dari tepi kartu.

#### Strategi Penumpukan Elemen (Collapsing)
- **Header:** Tautan navigasi desktop ("Katalog", "Tentang Kami", "Akun") tampil horizontal pada desktop, dan memadat menjadi tombol ringkas pada ponsel.
- **Filter Katalog:** Pill filter merek dapat digeser horizontal dengan scroll halus; input pencarian kata kunci dan filter ketersediaan menumpuk rapi di layar kecil.
- **Halaman Checkout:** Menumpuk secara vertikal di perangkat seluler: ringkasan motor berada di atas, diikuti formulir tanggal dan pembayaran di bawah.

#### Perilaku Gambar (Image Behavior)
- **Foto Kartu Motor:** Dipasang pada rasio aspek 16:9 (`aspect-video`) menggunakan `object-cover` untuk foto riil dan `object-contain` untuk aset berlatar transparan.
- **Banner Motor Hero:** Menampilkan motor tanpa latar belakang (*transparent cutout*) dalam bingkai geometris berotasi dinamis (`rotate-[-4deg]` yang kembali rata saat di-hover) disertai animasi melayang halus (`@keyframes float`).

## Elevasi & Kedalaman (Elevation & Depth)

| Tingkat | Perlakuan Visual | Penggunaan |
|---|---|---|
| 0 (Dasar) | Kanvas datar `{colors.canvas}` atau gradien radial lembut | Latar belakang halaman utama, latar belakang seksi selang-seling |
| 1 (Panel Istirahat) | Garis batas 1px `{colors.hairline}` + `shadow-sm` | Kartu motor kondisi diam, panel dashboard, tabel data admin |
| 2 (Angkat Interaktif) | `translateY(-4px)` hingga `translateY(-6px)` + `shadow-xl` / semburat merah | Kartu motor saat di-hover, kartu keunggulan, tombol utama aktif |
| 3 (Aksen Menonjol) | Garis tepi + pendaran merah `shadow-[0_0_25px_rgba(239,68,68,0.35)]` | Bingkai dekoratif hero, input yang sedang aktif/fokus, badge sorotan |
| 4 (Overlay / Modal) | `z-[100]`, efek buram latar (*backdrop blur* 12px), `shadow-2xl` | Modal detail foto motor, popup riwayat penyewaan, tumpukan toast alert |
| Mengambang (Floating) | Posisi tetap di sudut kanan bawah + radar ping berkedip | Tombol bantuan cepat WhatsApp (FAB) |

### Filosofi Kedalaman & Gerak

Elevasi bersifat kinetis. Daripada menampilkan bayangan mati yang tebal saat diam, elemen antarmuka dirancang bersih dengan garis pembatas halus saat istirahat, lalu bereaksi terangkat aktif saat didekati kursor pengguna.
- **Transisi Halus:** Semua efek hover menerapkan transisi `transition-all duration-200 ease-out` atau `duration-300 ease-out`.
- **Pengangkatan Kartu:** Saat kursor menyentuh kartu motor, kartu terangkat perlahan (`transform: translateY(-4px)`), garis batas berubah lebih tegas, dan bayangan bawah meluas menjadi rona atmosfer yang hangat.
- **Ring Penanda Fokus:** Elemen input yang aktif mendapatkan cincin pendaran merah berukuran 2px–3px (`focus:border-red-600 focus:ring-2 focus:ring-red-100`).

### Kedalaman Dekoratif
- **Pendaran Radial Otomotif:** Gradien radial di sudut halaman (`circle at top left`) dengan rona merah transparan (`rgba(220, 38, 38, 0.4)` ke transparan), menciptakan efek pencahayaan lampu belakang motor di dalam showroom.
- **Bingkai Miring Dinamis:** Bingkai kawat merah tipis di belakang motor utama berotasi miring `-4 derajat` dan otomatis lurus secara lembut saat disorot kursor.
- **Kaca Buram Frosted:** Bilah navigasi atas yang menempel saat scroll memanfaatkan `backdrop-blur-xl` dengan transparansi 90% pada latar putih atau obsidian.

## Bentuk & Geometri (Shapes)

### Skala Radius Batas (Border Radius Scale)

| Token | Nilai | Penggunaan |
|---|---|---|
| `{rounded.none}` | 0px | Banner layar penuh, garis pemisah horizontal |
| `{rounded.xs}` | 4px (0.25rem) | Input teks standar (`.field`), tombol dasar `.btn-primary`, panel dasar |
| `{rounded.sm}` | 8px (0.5rem) | Baris tabel, kotak aksi tombol admin, kotak notifikasi toast |
| `{rounded.md}` | 12px (0.75rem) | Kotak nomor tahapan (01, 02), tanggal checkout, kotak peringatan |
| `{rounded.lg}` | 16px (1.0rem) | Kotak fitur keunggulan, tombol proses checkout, input form login |
| `{rounded.xl}` | 24px (1.5rem) | Jendela modal detail motor, kartu profil akun, kartu cerita tentang kami |
| `{rounded.2xl}` | 28px (1.75rem) | Kartu katalog motor (`.motor-card`), banner promosi besar |
| `{rounded.full}` | 9999px | Pill filter merek, badge ketersediaan ("TERSEDIA"), tombol ganti tema, tombol WhatsApp |

### Geometri Komponen & Media
- **Bingkai Kartu Motor:** Menggunakan radius `{rounded.2xl}` (28px). Bagian penampil gambar di sisi atas terpotong rapi mengikuti lekuk kartu, dipisahkan oleh garis batas tipis 1px menuju bagian konten teks di bawahnya.
- **Badge Status Ketersediaan:** Berbentuk stadium pill (`{rounded.full}`). Menyertakan titik warna solid ("●") di depan teks status berhuruf kapital.
- **Pill Filter Merek:** Berbentuk stadium pill (`{rounded.full}`). Filter yang tidak aktif memiliki garis batas halus 1px berlatar putih; filter yang aktif berganti warna menjadi gelap (`{colors.ink}`) atau merah dengan teks putih kontras.
- **Lingkaran Monogram Avatar:** Menggunakan susunan cincin ganda: cincin luar putih/obsidian tebal (4px–5px) yang membungkus bingkai lingkaran dalam beraksen merah.

## Komponen (Components)

### Tombol (Buttons)

**`btn-primary`** — Contoh: "Lihat Katalog", "Sewa Motor", "Buat Transaksi & Lanjut Bayar", "Simpan Motor"
- Sudut `{rounded.xs}` (4px) pada antarmuka teknis atau `{rounded.lg}` (12px) pada CTA promosi, latar `{colors.primary}`, teks `{colors.on-primary}` berbobot tebal `{typography.button}`.
- Bayangan ringan `shadow-sm shadow-red-900/10`.
- Keadaan Hover: `transform: translateY(-2px)`, warna latar berganti ke `{colors.primary-hover}` (#991b1b), bayangan meluas menjadi `shadow-lg shadow-red-900/20`.
- Keadaan Fokus: `focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2`.

**`btn-dark`** — Contoh: "Semua Brand" (Aktif), "Masuk", "Keluar", tombol sekunder backend
- Sudut `{rounded.xs}` atau stadium pill `{rounded.full}`, latar `{colors.ink}` (#09090b), teks `{colors.on-primary}`.
- Keadaan Hover: `transform: translateY(-2px)`, latar berganti ke `#27272a`.
- Inversi Mode Gelap: Latar berganti ke `{colors.canvas}` (#ffffff) dengan teks `{colors.ink}` (#09090b).

**`btn-muted`** — Contoh: Filter Brand (Tidak Aktif), Filter Status, Tombol "Kembali"
- Sudut `{rounded.xs}` atau `{rounded.full}`, latar `{colors.canvas}`, garis batas 1px `{colors.hairline-subtle}`, teks `{colors.ink-secondary}`.
- Keadaan Hover: `transform: translateY(-2px)`, batas berubah merah `{colors.accent}`, teks menjadi merah `{colors.primary}`, latar berganti ke `{colors.surface-muted}` (#fafafa).
- Mode Gelap: Latar `{colors.surface-soft-dark}`, batas `{colors.hairline-dark}`, teks `{colors.ink-secondary-dark}`.

**`btn-filter-pill`** — Pilihan brand motor ("Honda", "Yamaha", "Kawasaki", "Vespa")
- Stadium pill `{rounded.full}`, padding `8px 16px`, teks berbobot semibold.
- Tidak aktif: Garis batas 1px `{colors.hairline-subtle}`, latar putih, teks `{colors.text-muted}`.
- Aktif: Latar gelap `{colors.ink}` (atau merah `{colors.primary}`), teks putih `{colors.on-primary}`, tanpa garis batas kasar.

### Kartu & Kontainer (Cards & Containers)

**`motor-card`** — Kartu utama penampil unit motor di katalog
- Bingkai luar: `{rounded.2xl}` (28px), garis batas 1px `{colors.hairline}`, latar `{colors.canvas}`, `shadow-sm`.
- Efek Hover: `transform: translateY(-4px)`, bayangan membesar menjadi `shadow-xl`.
- Bagian Atas: Area foto rasio 16:9 dengan slider multi-sudut, tombol panah kiri-kanan, titik indikator geser, dan badge status mengambang di kanan atas.
- Bagian Bawah: Padding `24px`. Kategori brand huruf besar, nama motor berukuran `{typography.heading-3}`, nomor pelat dan catatan kondisi dalam teks `{colors.text-muted}`, garis pembatas tipis, serta informasi tarif harian di samping tombol sewa langsung.

**`panel`** — Kontainer standar untuk dashboard operasional dan checkout
- Bingkai: `{rounded.xs}` (4px) hingga `{rounded.lg}` (12px), garis batas 1px `{colors.hairline}`, latar `{colors.canvas}`, `shadow-sm`.
- Mode Gelap: Latar `{colors.surface-soft-dark}`, garis batas `{colors.hairline-dark}`.
- Digunakan untuk ringkasan jadwal sewa, metrik inventaris armada, tabel transaksi, dan formulir unggah berkas KYC.

**`feature-card`** — Kartu keunggulan layanan ("Kenapa Kami?")
- Bingkai: `{rounded.xl}` (24px) hingga `{rounded.2xl}` (28px), garis batas 1px `{colors.hairline}`, latar `{colors.canvas}`.
- Kotak Ikon Utama: Ukuran 48px × 48px beradius `{rounded.md}` (12px) dengan latar kemerahan `{colors.primary-tint}` dan ikon merah `{colors.accent}`.
- Efek Hover: Kotak ikon bertransformasi menjadi latar merah pekat dengan ikon putih, kartu terangkat perlahan ke atas.

**`step-process-card`** — Kartu alur tahapan rental ("Cara Sewa" 01, 02, 03)
- Bingkai: `{rounded.xl}` (24px), susunan teks rata tengah, padding `28px`.
- Kotak Nomor Langkah: Ukuran 56px × 56px beradius `{rounded.md}` berwarna merah `{colors.primary}` dengan angka tebal warna putih.

### Input & Formulir (Inputs & Forms)

**`field`** — Input teks standar, pilihan dropdown, kolom pencarian, dan tanggal
- Lebar 100%, sudut `{rounded.xs}` (4px) atau `{rounded.lg}` (12px pada form login), garis batas 1px `{colors.hairline-subtle}`, latar `{colors.canvas}`, padding `10px 14px`, teks `{colors.ink}`.
- Teks petunjuk (*placeholder*) menggunakan warna `{colors.text-faint}`.
- Keadaan Fokus: Garis tepi berubah merah `{colors.accent}` (#dc2626) dengan bayangan cincin fokus `box-shadow: 0 0 0 3px rgba(254, 202, 202, 0.7)` (pada mode terang) atau `rgba(127, 29, 29, 0.5)` (pada mode gelap).

**`field-file-upload`** — Area pengunggahan dokumen identitas (KTP, SIM, KK)
- Garis batas 1px solid atau putus-putus `{colors.hairline-subtle}`, tombol pemilih berkas dengan label jelas dan petunjuk format file yang diizinkan.

### Navigasi (Navigation)

**`navbar-sticky`** — Bilah navigasi atas menempel (*sticky*)
- Posisi tetap `top-0`, `z-30`, garis pembatas bawah 1px `{colors.hairline}`, latar belakang putih transparan 90% disertai efek kaca buram `backdrop-blur-xl`.
- Sisi Kiri: Logo monogram RM (44px × 44px beradius `{rounded.sm}`) disertai teks nama merek bertingkat ("RENTAL MOTOR / Sewa cepat, data rapi").
- Sisi Tengah/Kanan: Tautan navigasi ("Katalog", "Tentang Kami", "Akun"); tautan aktif disorot dengan latar merah muda `{colors.primary-tint}` dan teks merah `{colors.primary}`.
- Sisi Kanan Luar: Tombol autentikasi ("Masuk" / "Keluar"), label peran (Admin / Tukang / Penyewa), dan tombol pill ganti tema (*Dark/Light*).

**`footer-automotive`** — Seksi penutup bagian bawah halaman
- Garis pembatas atas 1px `{colors.hairline}`, latar belakang putih (mode terang) atau obsidian gelap (mode gelap).
- Susunan Grid 4 Kolom: Profil singkat perusahaan & tautan media sosial, menu navigasi cepat, direktori layanan sewa, serta rincian kontak operasional (WhatsApp, Email, dan alamat fisik garasi di Kraton, Yogyakarta).
- Baris Penutup Bawah: Deklarasi hak cipta dan indikator status sistem aktif berwarna merah ("● Rental Motor System").

### Komponen Khas (Signature Components)

**`badge-status`** — Badge penanda ketersediaan unit
- Bentuk stadium pill `{rounded.full}`, padding `6px 14px`, tipografi `{typography.badge}`.
- "TERSEDIA": Latar belakang putih transparan 95% dengan teks merah tajam `{colors.accent}` dan titik indikator bulat, atau latar hijau lembut `{colors.success-soft}`.
- "DISEWA": Latar belakang abu-abu gelap dengan teks `{colors.text-muted}` dan titik indikator redup.

**`slider-carousel`** — Slider foto 3 sudut (Depan, Samping, Belakang)
- Terintegrasi langsung di dalam area gambar kartu motor.
- Jalur geser foto dengan transisi halus (`transition: transform 500ms ease-out`).
- Tombol Navigasi Kiri/Kanan: Lingkaran obsidian 40px × 40px dengan panah putih, berubah merah `{colors.primary}` dan sedikit membesar saat disentuh kursor.
- Titik Indikator Bawah: Wadah lonjong transparan; titik foto yang sedang tampil memanjang secara horizontal dan berubah warna menjadi merah `{colors.accent}`.

**`motor-modal`** — Popup dialog detail spesifikasi motor
- Latar belakang fullscreen gelap transparan `bg-black/80 backdrop-blur-sm`, lapisan tingkat `z-[100]`.
- Wadah Konten: Batas maksimal `max-w-5xl`, sudut membulat `{rounded.xl}` (24px), tata letak terbagi dua (kiri: foto beresolusi penuh; kanan: spesifikasi lengkap, nomor polisi, rincian biaya sewa, dan tombol sewa langsung).

**`wa-float-cta`** — Tombol WhatsApp mengambang untuk bantuan cepat
- Berada di posisi tetap sudut kanan bawah `bottom-6 right-6`, tingkat `z-[999]`.
- Tombol lingkaran diameter 64px berwarna hijau WhatsApp resmi (`#25D366`) dengan garis tepi putih 4px.
- Cincin Radar Berpendar: Lapisan mutlak di sekeliling tombol dengan animasi gelombang berkedip `animate-ping rounded-full bg-[#25D366]/30`.
- Efek Hover: Membesar perlahan (`transform: scale(1.1)`), warna lebih pekat `#20bd5a`, disertai bayangan tebal.

**`toast-stack` & `toast`** — Kotak notifikasi status mengambang
- Menumpuk di sudut kanan atas `top-4 right-4`, tingkat `z-60`, dengan jarak antar-notifikasi 12px.
- Kotak pesan: Sudut `{rounded.sm}` (6px), garis pembatas halus 1px, garis aksen tebal 4px di sisi kiri (warna hijau untuk sukses, merah untuk gagal, abu-abu untuk informasi), disertai animasi meluncur masuk dari atas (`@keyframes toast-in`).

### Contoh Permukaan Standar (Examples illustrative `ex-*`)

> Permukaan percontohan sistem desain. Setiap entitas `ex-*` mengacu langsung pada token primitif resmi sistem sehingga memudahkan konsistensi antar-halaman.

**`ex-motor-card`** — Kartu etalase motor standar. Memanfaatkan rasio foto 16:9, badge ketersediaan unit, blok harga sewa harian, dan tombol sewa motor.
- Properti: `backgroundColor`, `textColor`, `borderColor`, `rounded`, `padding`, `statusBadge`

**`ex-pricing-calculator`** — Kartu kalkulator rincian biaya rental saat checkout. Menampilkan tarif sewa per hari, jumlah hari sewa, total estimasi biaya, dan petunjuk gerbang pembayaran Midtrans.
- Properti: `backgroundColor`, `textColor`, `borderColor`, `rounded`, `padding`, `totalColor`

**`ex-brand-filter-pill`** — Pill filter pemilihan merek motor. Stadium pill lonjong dengan transisi status antara aktif dan tidak aktif.
- Properti: `backgroundColor`, `textColor`, `borderColor`, `rounded`, `padding`, `activeState`

**`ex-status-pill`** — Badge penunjuk ketersediaan unit ("TERSEDIA" / "DISEWA"). Stadium pill dengan titik indikator warna.
- Properti: `backgroundColor`, `textColor`, `rounded`, `padding`, `dotColor`

**`ex-hero-feature-tile`** — Kartu nilai keunggulan utama (contoh: "Proses Cepat", "Data Rapi") dengan nomor langkah atau kotak ikon aksen.
- Properti: `backgroundColor`, `iconBackground`, `iconColor`, `rounded`, `padding`

**`ex-dashboard-metric`** — Kartu metrik operasional admin (Total Motor, Tersedia, Disewa, Total Penjualan).
- Properti: `backgroundColor`, `textColor`, `labelColor`, `rounded`, `padding`

**`ex-auth-card`** — Kartu autentikasi masuk/daftar akun. Permukaan bertekstur kaca halus dengan lambang monogram RM dan kolom input data.
- Properti: `backgroundColor`, `backdropBlur`, `borderColor`, `rounded`, `padding`

**`ex-modal-dialog`** — Dialog modal pemeriksaan unit motor dengan tampilan slider foto lebar dan lembar rincian spesifikasi teknis.
- Properti: `backgroundColor`, `textColor`, `rounded`, `backdropBlur`, `closeButton`

**`ex-toast`** — Kotak notifikasi peringatan sistem dengan garis aksen warna status di sisi kiri.
- Properti: `backgroundColor`, `borderLeftColor`, `rounded`, `padding`, `titleTypography`

**`ex-wa-fab`** — Tombol mengambang aksi cepat WhatsApp dengan cincin pendaran radar ping.
- Properti: `backgroundColor`, `borderColor`, `rounded`, `pingColor`, `size`

## Panduan Praktik (Do's and Don'ts)

### Lakukan (Do)
- Gunakan warna **Racing Crimson** (`{colors.primary}` — #b91c1c) untuk keputusan dan tindakan utama pengguna ("Sewa Motor", "Lihat Katalog", "Buat Transaksi").
- Pertahankan rasio aspek 16:9 (`aspect-video`) pada seluruh area foto motor untuk menjaga keseragaman tampilan antar-merek kendaraan.
- Terapkan bobot ekstra tebal pada tajuk utama menggunakan Instrument Sans 900 (Black) dengan tinggi baris rapat (1.05 hingga 1.15) guna mempertahankan karakter otomotif yang bertenaga.
- Awali setiap seksi atau kartu fitur utama dengan penanda kategori huruf besar berjarak renggang (`tracking-[0.18em]` berwarna merah).
- Gunakan bentuk stadium pill (`{rounded.full}`) untuk filter merek, badge ketersediaan motor, titik indikator geser gambar, dan tombol WhatsApp.
- Terapkan efek angkat kinetis (`translateY(-2px)` hingga `translateY(-4px)`) yang dipadukan dengan bayangan bernuansa merah lembut saat elemen interaktif disorot kursor.
- Bedakan secara jelas dan tegas antara motor yang siap disewa ("TERSEDIA") dan motor yang sedang dipakai penyewa lain ("DISEWA"), serta nonaktifkan tombol sewa pada unit yang berstatus disewa.
- Pastikan kenyamanan visual di kedua mode (terang dan gelap) dengan warna latar belakang dan kontras teks yang tepat.

### Hindari (Don't)
- Jangan menggunakan bayangan jatuh abu-abu pekat yang kaku; gunakan garis pembatas tipis 1px saat diam dan bayangan berona hangat kemerahan saat di-hover.
- Jangan mengubah bentuk pill filter atau badge status menjadi kotak bersudut tajam; elemen-elemen ini wajib mempertahankan bentuk membulat lonjong `{rounded.full}`.
- Jangan menggunakan bobot tipis (300 atau di bawahnya) pada judul utama atau nominal harga; pertahankan bobot 800 atau 900 agar informasi selalu tampil tegas dan percaya diri.
- Jangan memenuhi kartu katalog dengan teks deskripsi yang terlalu panjang; batasi hanya pada Nama Model, Merek, Nomor Pelat, dan catatan kondisi singkat.
- Jangan menghilangkan titik status ("●") dari badge ketersediaan motor, karena titik tersebut berfungsi sebagai panduan visual instan bagi calon penyewa.
- Jangan membiarkan kolom isian formulir tanpa garis pembatas atau tanpa indikator saat aktif; selalu tampilkan cincin fokus merah berpendar 2px–3px.
- Jangan mengganti tombol mengambang WhatsApp dengan tautan teks statis biasa; komunikasi langsung secara instan adalah elemen penting dalam membangun kepercayaan pelanggan.
- Jangan menggunakan warna merah pekat sebagai latar belakang penuh pada kartu konten teks besar; simpan warna merah solid khusus untuk banner hero, tombol utama, dan badge penekanan kecil.
