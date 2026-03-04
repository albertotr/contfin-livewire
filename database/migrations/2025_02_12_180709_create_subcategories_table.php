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

        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('nome da subcategoria');
            $table->string('description')->nullable()->comment('descricao da subcategoria');
            $table->unsignedBigInteger('category_id')->comment('id da categoria relacianada a esta subcategoria');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['name', 'category_id']);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
