<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('sector_name');
            $table->string('department');
            // type 1 = User ; Type 2 = Secretary ;Type 3 = Admin
            $table->integer('user_type')->default(1);
            $table->boolean('is_verified')->default(0);
            $table->string('api_key')->unique()->nullable();
            $table->string('last_login')->nullable();
            $table->boolean('is_active')->default(1);
            $table->integer('doc_count')->default(0);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
