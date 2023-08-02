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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // VIP, preference, general
            $table->integer('remaining_slots');
            $table->timestamps();
        });

        $this->insertInitialData();
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }

    public function insertInitialData()
    {
        DB::table('tickets')->insert([
            ['type' => 'VIP', 'remaining_slots' => 15],
            ['type' => 'preference', 'remaining_slots' => 20],
            ['type' => 'general', 'remaining_slots' => 25],
        ]);
    }
};
