<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOrdersTableAddNewColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('delivery_address')->after('cost');
            $table->unsignedBigInteger('delivery_type_id')->after('cost');

            $table->foreign('delivery_type_id')->references('id')->on('delivery_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('delivery_type');
            $table->dropColumn('delivery_type');
            $table->dropColumn('delivery_address');
        });
    }
}
