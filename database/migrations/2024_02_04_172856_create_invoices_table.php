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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->string('invoice_number')->unique();
            $table->dateTime('invoice_date');
            $table->dateTime('due_date');
            $table->string('status'); // Paid, Unpaid, Overdue, Partial, Pending, Void
            $table->string('payment_method'); // Cash, Check, Credit Card, PayPal
            $table->string('notes')->nullable();
            $table->string('currency')->default('PHP');
            $table->string('issue_by');
            $table->string('ship_to'); // Customer's address
            $table->string('product');
            $table->integer('quantity');
            $table->float('price');
            $table->float('tax'); // 12% VAT
            $table->float('discount'); // 5% discount
            $table->decimal('amount', 10, 2); // 10 digits in total, 2 after the decimal point
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
