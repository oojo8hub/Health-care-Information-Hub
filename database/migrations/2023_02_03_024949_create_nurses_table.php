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
        Schema::create('nurses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->string('province');
            $table->string('status')->default('pending');
            $table->string('registration_number');
            $table->timestamp('effective_from')->nullable();
            $table->timestamp('expiration_date')->nullable();
            $table->boolean('verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->foreignUuid('registration_class_id');
            $table->foreignUuid('user_id');
        });

        Schema::table('nurses', function ($table) {
            $table->foreign('registration_class_id')->references('id')->on('registration_classes');
            $table->index('registration_class_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nurses');
    }
};
