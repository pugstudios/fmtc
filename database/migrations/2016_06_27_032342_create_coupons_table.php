<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('coupons', function (Blueprint $table) {
            $table -> increments('id') -> unsigned();
            $table -> integer('pod_id');
            $table -> string('title');
            $table -> string('md5');
            $table -> integer('width') -> default(0);
            $table -> integer('max_offers') -> default(0);
            $table -> integer('max_store_offers') -> default(0);
            $table -> string('sort_col') -> nullable() -> default(NULL);
            $table -> string('sort_dir') -> nullable() -> default(NULL);
            $table -> enum('merchant_display', array('text', 'html')) -> default('text');
            $table -> string('sort_deals_by');
            $table -> boolean('display_powered_by') -> default(1);
            $table -> string('keyword') -> nullable() -> default(NULL);
            $table -> string('country') -> nullabel() -> default(NULL);
            $table -> string('zip_code') -> nullable() -> default(NULL);
            $table -> integer('miles') -> default(0);
            $table -> text('backfill_html') -> nullable() -> default(NULL);
            $table -> string('background_color') -> nullable() -> default(NULL);
            $table -> string('text_color') -> nullable() -> default(NULL);
            $table -> string('well_color') -> nullable() -> default(NULL);
            $table -> string('title_color') -> nullable() -> default(NULL);
            $table -> string('link_color') -> nullable() -> default(NULL);
            $table -> string('border_color') -> nullable() -> default(NULL);
            $table -> string('button_color') -> nullable() -> default(NULL);
            $table -> string('button_text_color') -> nullable() -> default(NULL);
            $table -> string('coupon_color') -> nullable() -> default(NULL);
            $table -> text('custom_css') -> nullable() -> default(NULL);
            $table -> integer('template_id') -> default(1);
            $table -> string('group_by') -> nullable() -> default(NULL);
            $table -> string('display_style') -> nullable() -> default(NULL);
            $table -> integer('group_limit') -> default(0);
            $table -> boolean('show_logo') -> default(1);
            $table -> boolean('show_button') -> default(1);
            $table -> boolean('show_ribbon') -> default(0);
            $table -> integer('sub_id') -> nullable() -> default(NULL);
            $table -> string('application_code');
            $table -> integer('opm_id') -> default(0);
            $table -> string('sub_domain') -> nullable() -> default(NULL);
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('coupons');
    }

}
