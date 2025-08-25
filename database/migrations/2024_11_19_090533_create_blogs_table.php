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
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('blog_category_id')->nullable()->index('fk_blogs_blog_categories_idx');
            $table->unsignedBigInteger('admin_id')->nullable()->index('fk_blogs_admins1_idx');
            $table->string('title')->nullable();
            $table->string('slug')->nullable()->unique('slug_UNIQUE');
            $table->string('thumbnail')->nullable();
            $table->longText('content')->nullable();
            $table->text('keywords')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
