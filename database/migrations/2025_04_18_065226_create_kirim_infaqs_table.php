<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kirim_infaqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('infaq_id')->constrained('infaqs')->onDelete('cascade');
            $table->string('nama');
            $table->unsignedBigInteger('jumlah');
            $table->string('email')->nullable();
            $table->string('metode_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kirim_infaqs');
    }
};
