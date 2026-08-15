<x-layouts.app title="Verifikasi Penyewa">
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-wide text-red-700">Backend</p>
            <h1 class="mt-2 text-3xl font-black">Verifikasi Akun Penyewa</h1>
        </div>
        <section class="panel p-5">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b text-xs uppercase text-zinc-500"><tr><th class="py-2">Nama</th><th>Email</th><th>No HP</th><th>Status</th><th>Aksi</th></tr></thead>
                    <tbody id="verification-table" class="divide-y divide-zinc-100"></tbody>
                </table>
            </div>
        </section>
    </section>
    <script>
        async function loadVerifications() {
            const users = await fetch('/api/verifications', { headers: window.rentalApp.authHeaders() }).then((res) => res.json());
            document.getElementById('verification-table').innerHTML = users.map((user) => `<tr><td class="py-3 font-medium">${user.name}</td><td>${user.email}</td><td>${user.no_hp || '-'}</td><td>${user.verification_status}</td><td class="flex gap-2 py-3"><button class="text-sm font-semibold text-red-700" data-id="${user.id}" data-status="verified">Setujui</button><button class="text-sm font-semibold text-zinc-700" data-id="${user.id}" data-status="rejected">Tolak</button></td></tr>`).join('');
            document.querySelectorAll('[data-status]').forEach((button) => button.addEventListener('click', async () => {
                await fetch(`/api/verifications/${button.dataset.id}`, { method: 'PATCH', headers: window.rentalApp.authHeaders(), body: JSON.stringify({ verification_status: button.dataset.status }) });
                loadVerifications();
            }));
        }
        loadVerifications();
    </script>
</x-layouts.app>
