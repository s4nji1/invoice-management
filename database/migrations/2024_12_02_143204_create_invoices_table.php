<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->decimal('amount', 10, 2);
            $table->string('status')->default('unpaid'); // unpaid, paid, canceled
            $table->string('file_path')->nullable(); // Pour les justificatifs
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
