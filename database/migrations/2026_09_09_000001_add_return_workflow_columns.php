<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->string('foto_bukti_pengembalian')->nullable()->after('status_bayar');
            $table->string('status_pengembalian')->default('belum_diajukan')->index()->after('foto_bukti_pengembalian');
            $table->timestamp('diajukan_kembali_pada')->nullable()->after('status_pengembalian');
            $table->timestamp('disetujui_kembali_pada')->nullable()->after('diajukan_kembali_pada');
        });

        Schema::table('offline_transactions', function (Blueprint $table) {
            $table->string('foto_bukti_pengembalian')->nullable()->after('status');
            $table->string('status_pengembalian')->default('belum_diajukan')->index()->after('foto_bukti_pengembalian');
            $table->timestamp('diajukan_kembali_pada')->nullable()->after('status_pengembalian');
            $table->timestamp('disetujui_kembali_pada')->nullable()->after('diajukan_kembali_pada');
        });
    }

    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropIndex(['status_pengembalian']);
            $table->dropColumn(['foto_bukti_pengembalian', 'status_pengembalian', 'diajukan_kembali_pada', 'disetujui_kembali_pada']);
        });

        Schema::table('offline_transactions', function (Blueprint $table) {
            $table->dropIndex(['status_pengembalian']);
            $table->dropColumn(['foto_bukti_pengembalian', 'status_pengembalian', 'diajukan_kembali_pada', 'disetujui_kembali_pada']);
        });
    }
};
