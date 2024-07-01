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
        Schema::table('shop_orders', function (Blueprint $table) {
            $table->unsignedTinyInteger('status_number')->default(1)->index();
        });

        $sqlStatusNumber = 'UPDATE shop_orders set status_number=tiny_status_id';
        \Illuminate\Support\Facades\DB::statement($sqlStatusNumber);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shop_orders', function (Blueprint $table) {
            $table->dropColumn('status_number');
        });
    }
};
