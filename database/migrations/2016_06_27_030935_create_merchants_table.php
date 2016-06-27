<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('merchants', function (Blueprint $table) {
            $table -> increments('id') -> unsigned();
            $table -> increments('master_merchant_id') -> unsigned();
            $table -> string('name');
            $table -> timestamps();

            $table -> foreign('master_merchant_id') -> references('id') -> on('merchants') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('merchants');
    }

}
