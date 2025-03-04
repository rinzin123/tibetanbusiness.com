<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentBasicInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('rent')->create('rent_basic_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('name', 50);
            $table->string('banner', 100);
            $table->string('card', 100);
            $table->string('thumb', 100);
            $table->decimal('fare', 10, 0);
            $table->decimal('rate', 5, 1)->nullable();
            $table->string('rate_color', 100)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('location', 255);
            $table->double('longitude',5,2);
            $table->double('latitude',5,2);
            $table->string('mobile_no', 12)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('accomodation_size',2);
            $table->string('instagram', 100)->nullable();
            $table->text('facebook')->nullable();
            $table->boolean('status');
            $table->boolean('featured_ad')->nullable();
            $table->date('featured_ad_expire_date')->nullable();
            $table->boolean('home_ad')->nullable();
            $table->date('home_ad_expire_date')->nullable();
            $table->boolean('sidebar_ad')->nullable();
            $table->date('sidebar_ad_expire_date')->nullable();
            $table->boolean('popup_ad')->nullable();
            $table->date('popup_expire_date')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('rent')->dropIfExists('rent_basic_info');
    }
}
