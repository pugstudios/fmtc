<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkDealsCategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('link_deals_categories', function (Blueprint $table) {
            $table -> increments('id') -> unsigned();
            $table -> integer('deal_id') -> unsigned();
            $table -> integer('category_id') -> unsigned();
            $table -> timestamps();

            $table -> foreign('deal_id') -> references('id') -> on('deals') -> onDelete('cascade');
            $table -> foreign('category_id') -> references('id') -> on('categories') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('link_deals_categories');
    }

}
