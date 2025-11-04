<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('mata_kuliahs', function (Blueprint $table) {
            $table->string('dosen_pengampu')->after('semester'); // tambahkan kolom dosen_pengampu setelah semester
        });
    }

    public function down()
    {
        Schema::table('mata_kuliahs', function (Blueprint $table) {
            $table->dropColumn('dosen_pengampu');
        });
    }
};
