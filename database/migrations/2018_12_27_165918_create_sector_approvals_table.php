<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector_approvals_edit_tmp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sector_id');
            $table->string('old_name');
            $table->string('new_name');
            $table->string('requested_by');
            $table->boolean('is_active');
            $table->string('approved_status')->default('pending');
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
        Schema::dropIfExists('sector_approvals_edit_tmp');
    }
}
