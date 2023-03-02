<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_organisasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('pimpinan_utama_id')->nullable();
            $table->foreignId('pimpinan_kedua_id')->nullable();
            $table->string('kondisi_organisasi')->nullable();
            $table->string('no_sp')->nullable();
            $table->string('sekretariatan')->nullable();
            $table->string('periode')->nullable();
            $table->string('ketua_pembina')->nullable(); 
            $table->string('contact_pembina')->nullable(); 
            $table->string('ketua')->nullable(); 
            $table->string('contact_ketua')->nullable(); 
            $table->string('komandan')->nullable(); 
            $table->string('contact_komandan')->nullable(); 
            $table->string('jumlah_pengurus')->nullable(); 
            $table->string('total_alumni')->nullable(); 
            $table->string('total_anggota')->nullable(); 
            $table->string('total_anggota_lembaga')->nullable(); 
            $table->string('link_sp')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi_organisasis');
    }
};
