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
            $table->foreignId('status_id')->default(1)->constrained();

            $table->unsignedTinyInteger('tiny_status_id')->default(1);
            $table->foreign('tiny_status_id')->references('id')->on('tiny_statuses');
        });

        $sqlStatus = "UPDATE shop_orders set status_id =
            case when status='new' then 1
                when status='processing' then 2
                when status='shipped' then 3
                when status='delivered' then 4
                when status='cancelled' then 5
                else 5
            end";
        \Illuminate\Support\Facades\DB::statement($sqlStatus);

        $sqlTinyStatus = 'UPDATE shop_orders set tiny_status_id=status_id';
        \Illuminate\Support\Facades\DB::statement($sqlTinyStatus);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shop_orders', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');
            $table->dropForeign(['tiny_status_id']);
            $table->dropColumn('tiny_status_id');
        });
    }
};
