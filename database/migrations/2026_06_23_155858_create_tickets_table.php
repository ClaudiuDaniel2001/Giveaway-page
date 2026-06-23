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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
             $table->foreignId('orders_id')
            ->constrained('orders')
            ->onDelete('cascade');

        $table->foreignId('produses_id')
            ->constrained('produses')
            ->onDelete('cascade');

        $table->foreignId('users_id')
            ->constrained('users')
            ->onDelete('cascade');

        $table->integer('ticket_number');

        $table->timestamps();
        

        $table->unique(['produses_id', 'ticket_number']);

        
    });
            
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
