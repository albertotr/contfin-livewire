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

        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique('idx_card_name')->comment('nome do cartao');
            $table->integer('close_day')->comment('dia do fechamento do cartao');
            $table->integer('payment_day')->comment('dia do pagamento da invoice');
            $table->unsignedBigInteger('account_id')->comment('id da conta padrao para pagamento');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
