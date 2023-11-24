<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->string('topic')->fulltext();
            $table->string('slug')->unique();
            $table->longText('content')->fulltext();
            $table->boolean('published')->default(false);
            $table->foreignUuid('user_id');
            $table->foreignUuid('category_id');
        });

        Schema::table('guides', function ($table) {
            $table->unique('topic');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->index('user_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guides');
    }
};
