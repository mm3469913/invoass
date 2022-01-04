<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesDetailsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_detailses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_Invoice');
            $table->string('invoice_number', 50);
            $table->foreign('id_Invoice')->references('id')->on('invoices')->onDelete('cascade');
            $table->string('product', 50);
            $table->string('Section', 999);
            $table->string('Status', 50);
            $table->integer('Value_Status');
            $table->date('Payment_Date')->nullable();
            $table->text('note')->nullable();
            $table->string('user',300);
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
        Schema::dropIfExists('invoices_detailses');
    }
}
