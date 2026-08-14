<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('nama_brand')->unique();
            $table->timestamps();
        });

        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->string('nama');
            $table->unsignedInteger('harga');
            $table->string('no_polisi')->unique();
            $table->text('catatan')->nullable();
            $table->string('image_motor')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('motor_id')->constrained()->cascadeOnDelete();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->unsignedInteger('total_biaya');
            $table->string('order_id')->unique();
            $table->string('snap_token')->nullable();
            $table->string('status')->default('pending')->index();
            $table->boolean('status_bayar')->default(false)->index();
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->constrained()->cascadeOnDelete();
            $table->string('order_id')->index();
            $table->unsignedInteger('gross_amount');
            $table->string('payment_type')->nullable();
            $table->string('transaction_status')->default('pending')->index();
            $table->boolean('status_bayar')->default(false);
            $table->timestamp('paid_at')->nullable();
            $table->json('payload')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('rentals');
        Schema::dropIfExists('motors');
        Schema::dropIfExists('brands');
    }
};
