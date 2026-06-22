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
        Schema::create('produses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoriis_id')
                  ->constrained('categoriis')
                  ->onDelete('cascade');
            $table->string('title' , 255);
            $table->text('description');
            $table->decimal('price',10,2);
            $table->decimal('discount',10,2);
            $table->integer('tickets');
            $table->integer('tickets_sold')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produses');
    }
};
