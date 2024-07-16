<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aplikasi', 255);
            $table->text('gambaran_umum');
            $table->text('jenis_pengguna')->nullable();
            $table->text('detail_aplikasi')->nullable();
            $table->text('catatan_verifikator')->nullable();
            $table->string('status', 255);
            $table->text('progress')->nullable();
            $table->unsignedBigInteger('user_id'); // Kolom yang akan menjadi foreign key
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('pengajuan');
    }
}