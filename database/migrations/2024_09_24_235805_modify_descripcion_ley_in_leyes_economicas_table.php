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
        Schema::table('leyes_economicas', function (Blueprint $table) {
            $table->longText('descripcion_ley')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leyes_economicas', function (Blueprint $table) {
            $table->string('descripcion_ley', 255)->change();
        });
    }
};
