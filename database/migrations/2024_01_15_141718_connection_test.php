<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('connection_test', function (Blueprint $table) {
            $table->id();
            $table->string('text');
        });

        DB::table('connection_test')->insert(
            array(
                'text' => 'Povezava na podatkovno bazo je uspela!'
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connection_test');
    }
};
