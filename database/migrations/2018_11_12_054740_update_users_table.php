<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// $ php artisan make:migration update_users_table
// $ php artisan migrate
class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('twitter_avatar')->nullable();
            $table->string('twitter_id')->nullable();
            $table->string('twitter_nickname')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('twitter_avatar');
            $table->dropColumn('twitter_id');
            $table->dropColumn('twitter_nickname');
        });
    }
}
