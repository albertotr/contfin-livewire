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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique('idx_account_name');
            $table->bigInteger('balance')->default(0)->comment('valor referente ao saldo da conta com todos os registros pagos');
            $table->bigInteger('estimate')->default(0)->comment('valor referente ao saldo da conta com todos os registros, pagos ou não');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
