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
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable()->unique('slug_UNIQUE');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('price_idr')->nullable();
            $table->enum('bill_type', ['Sekali Bayar', 'Tahunan', 'Bulanan'])->nullable()->default('Sekali Bayar');
            $table->tinyInteger('is_shown')->nullable()->default(1);
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
        Schema::dropIfExists('services');
    }
};
