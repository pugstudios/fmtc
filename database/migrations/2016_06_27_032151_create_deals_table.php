<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('deals', function (Blueprint $table) {
            $table -> increments('id') -> unsigned();
            $table -> string('code');
            $table -> string('name');
            $table -> string('network');
            $table -> integer('merchant_id') -> unsigned();
            $table -> string('label');
            $table -> text('image') -> nullable() -> default(NULL);
            $table -> datetime('start_date');
            $table -> datetime('end_date');
            $table -> string('affiliate_url');
            $table -> string('direct_url') -> nullable() -> default(NULL);
            $table -> string('skim_links_url') -> nullable() -> default(NULL);
            $table -> string('fmtc_url') -> nullable() -> default(NULL);
            $table -> text('pixel_html') -> nullable() -> default(NULL);
            $table -> decimal('sale_price', 10, 2) -> default(0.00);
            $table -> decimal('was_price', 10, 2) -> default(0.00);
            $table -> decimal('discount', 10, 2) -> default(0.00);
            $table -> decimal('threshold', 10, 2) -> default(0.00);
            $table -> decimal('rating', 10, 3) -> default(0.00);
            $table -> boolean('starred') -> default(0);
            $table -> string('logo_88x31');
            $table -> string('logo_120x60');
            $table -> boolean('exclusive') -> default(0);
            $table -> integer('link_id');
            $table -> string('network_name');
            $table -> enum('status', array('active', 'disabled')) -> default('active');
            $table -> timestamps();
            
            $table -> foreign('merchant_id') -> references('id') -> on('merchants') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('deals');
    }

}
