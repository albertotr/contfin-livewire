<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('amount')->comment('valor total da parcela');
            $table->dateTime('payment_date')->comment('data da efetivacao');
            $table->integer('number')->comment('numero da parcela');
            $table->unsignedBigInteger('transaction_id')->comment('id da transacao');
            $table->unsignedBigInteger('invoice_id')->comment('id da invoice relacionada');
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installments');
    }
};
