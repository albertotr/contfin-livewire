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

        Schema::create('record_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('record_id');
            $table->unsignedBigInteger('tag_id');

            $table->primary(['record_id', 'tag_id']);

            $table->foreign('record_id')->references('id')->on('records')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_tag');
    }
};
