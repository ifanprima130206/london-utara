<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('populations', function (Blueprint $table) {
            $table->id();
            $table->integer('enhancer');
            $table->string('name');
            $table->string('nik_kk');
            $table->string('family_card');
            $table->string('image');
            $table->string('nik')->nullable();
            $table->string('gender');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('religion');
            $table->string('marital_status');
            $table->string('job');
            $table->string('address');
            $table->string('phone');
            $table->integer('residence_status');
            $table->text('notes')->nullable();
            $table->text('qr_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('populations');
    }
};
