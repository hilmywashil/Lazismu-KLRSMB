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
        Schema::create('kirim_zakats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zakat_id')->constrained('zakats')->onDelete('cascade');
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
        Schema::dropIfExists('kirim_zakats');
    }
};
