<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorApprovalDeletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector_approval_deletes_tmp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sector_id');
            $table->longText('remark')->nullable();
            $table->string('requested_by');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('sector_approval_deletes_tmp');
    }
}
