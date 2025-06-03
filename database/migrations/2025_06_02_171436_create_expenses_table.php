<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('expenses', function (Blueprint $table) {
        $table->integer('id')->primary(); // INT(11) NOT NULL

        $table->string('title', 100)->nullable(); // VARCHAR(100) DEFAULT NULL
        $table->decimal('amount', 10, 2)->nullable(); // DECIMAL(10,2) DEFAULT NULL
        $table->text('description')->nullable(); // TEXT DEFAULT NULL
        $table->date('expense_date')->nullable(); // DATE DEFAULT NULL

        // TIMESTAMP DEFAULT current_timestamp()
        $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
