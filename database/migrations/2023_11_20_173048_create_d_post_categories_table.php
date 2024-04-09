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
        Schema::create('d_post_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('d_sub_category_id');
            $table->string('post_title');
            $table->text('post_detail')->nullable();
            $table->string('post_photo')->nullable();
            $table->integer('visitors')->default(0);
            $table->integer('author_id')->default(0);
            $table->integer('admin_id')->default(0);
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
        Schema::dropIfExists('d_post_categories');
    }
};
