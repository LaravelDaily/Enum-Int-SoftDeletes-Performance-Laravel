<?php

use App\Models\TinyStatus;
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
        Schema::create('tiny_statuses', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        TinyStatus::create(['name' => 'new']);
        TinyStatus::create(['name' => 'processing']);
        TinyStatus::create(['name' => 'shipped']);
        TinyStatus::create(['name' => 'delivered']);
        TinyStatus::create(['name' => 'cancelled']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiny_statuses');
    }
};
