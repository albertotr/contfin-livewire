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

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_amount')->default(0)->comment('total da invoice somando todos os INSTALLMENTS relacionado a INVOICE');
            $table->date('due_date')->nullable()->comment('data da efetivacao do pagamento');
            $table->date('payment_date')->comment('data do pagamento da invoice');
            $table->unsignedBigInteger('card_id')->comment('id do cartao relacionado a invoice');
            $table->foreign('card_id')->references('id')->on('cards');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
