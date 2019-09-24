<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appointment_id');
            $table->integer('merchant_id')->unsigned()->index();
            $table->integer('customer_id')->unsigned()->index();
            $table->string('services',200)->nullable();
            $table->double('amount');
            $table->double('discount')->default(0.0);
            $table->string('invoiced_person')->nullable();
            $table->double('outstanding_balance')->default(0.0)->nullable();
            $table->boolean('type')->default(0);//0 = not paid 1= fully paid 2= partially paid
            $table->boolean('status')->default(0);//0 =inactive status or deleted 1=active status
            $table->timestamps();
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
