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
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_number')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('email')->nullable()->unique('email_UNIQUE');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('level')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->rememberToken();
            $table->tinyInteger('is_shown')->nullable();
            $table->tinyInteger('is_activated')->nullable()->default(1);
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
        Schema::dropIfExists('teams');
    }
};
