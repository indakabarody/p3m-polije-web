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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('app_name')->nullable();
            $table->text('about')->nullable();
            $table->longText('vision_mission')->nullable();
            $table->text('why_choose_us')->nullable();
            $table->string('highlight_text')->nullable();
            $table->string('header_text')->nullable();
            $table->string('subheader_text')->nullable();
            $table->integer('clients_count')->nullable();
            $table->dateTime('date_founded')->nullable();
            $table->string('company_name')->nullable();
            $table->text('company_address')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_website_url')->nullable();
            $table->text('company_google_maps_iframe')->nullable();
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
        Schema::dropIfExists('app_settings');
    }
};
