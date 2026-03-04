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

        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('description')->comment('descricao do registro');
            $table->unsignedBigInteger('account_id')->comment('id da conta relacianada ao registro de gasto ou deposito');
            $table->bigInteger('amount')->comment('valor total do registro');
            $table->bigInteger('balance')->default(0)->comment('saldo em conta no momento do registro, mas somente de o campo DUE estiver como TRUE');
            $table->bigInteger('estimate')->default(0)->comment('saldo previsto em conta no momento do registro, onde independete o campo DUE ele é calculado no saldo da conta');
            $table->char('type', 1)->comment('tipo do registro, debito ou credito');
            $table->enum('method', ['C', 'B', 'P', 'D'])->default('C');
            $table->dateTime('due_date')->useCurrent()->comment('data da efetivacao do registo');
            $table->boolean('due')->default(false)->comment('identifica se o registro foi efetivado ou não, onde o padrão é não efetivado');
            $table->unsignedBigInteger('category_id')->default(5);
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
