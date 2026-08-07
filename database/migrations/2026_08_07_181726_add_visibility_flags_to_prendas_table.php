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
        Schema::table('prendas', function (Blueprint $table) {
            $table->boolean('mostrar_spotlight')->default(false)->after('imagen');
            $table->boolean('mostrar_catalogo')->default(true)->after('mostrar_spotlight');
            $table->boolean('mostrar_muro')->default(false)->after('mostrar_catalogo');
        });
    }

    public function down(): void
    {
        Schema::table('prendas', function (Blueprint $table) {
            $table->dropColumn(['mostrar_spotlight', 'mostrar_catalogo', 'mostrar_muro']);
        });
    }
};
