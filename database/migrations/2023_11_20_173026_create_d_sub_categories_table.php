<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('d_sub_category_name');
            $table->string('show_on_menu');
            $table->string('show_on_home');
            $table->string('post_photo')->nullable();
            $table->string('sub_category_order');
            $table->integer('d_category_id');
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
        Schema::dropIfExists('d_sub_categories');
    }
};
