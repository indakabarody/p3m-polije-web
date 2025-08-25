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
        Schema::table('blogs', function (Blueprint $table) {
            $table->foreign(['admin_id'], 'fk_blogs_admins1')->references(['id'])->on('admins')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['blog_category_id'], 'fk_blogs_blog_categories')->references(['id'])->on('blog_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign('fk_blogs_admins1');
            $table->dropForeign('fk_blogs_blog_categories');
        });
    }
};
