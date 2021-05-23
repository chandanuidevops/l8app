<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostPagesSlug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->String('slug',255)->nullable()->after('thumbnail');
        });
        Schema::table('pages', function (Blueprint $table) {
            $table->String('slug',255)->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
