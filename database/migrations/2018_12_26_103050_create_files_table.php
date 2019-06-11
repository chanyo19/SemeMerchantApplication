<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('new_filename');
            $table->string('old_file_name')->unique();
            $table->string('uploaded_by');
            $table->string('department');
            $table->longText('uploader_remark')->nullable();
            $table->longText('approver_remark')->nullable();
            $table->boolean('is_approved')->default(0);
            $table->string('doc_status')->nullable();
            $table->string('doc_type')->nullable();
            $table->boolean('is_downloaded')->default(0);
            $table->string('last_viewed')->nullable();
            $table->ipAddress('user_ip')->nullable();
            $table->softDeletes();
            $table->string('file_url');
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
        Schema::dropIfExists('files');
    }
}
