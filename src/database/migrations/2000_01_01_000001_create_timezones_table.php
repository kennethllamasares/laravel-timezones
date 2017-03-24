<?php
/*
 * This file is part of Laravel Timezones.
 *
 * (c) Kenneth Llamasares <webdev.kenneth@gmail.com>
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
class CreateTimezonesTable extends Migration
{
    public function up()
    {
        Schema::create(\Config::get('timezones.table_name'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('label')->nullable();
            $table->string('value')->nullable();
            $table->string('offset')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop(\Config::get('timezones.table_name'));
    }
}