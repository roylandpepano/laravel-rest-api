<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = Customer::factory();
        $invoice_number = $this->faker->unique()->randomNumber(8);
        $invoice_date = $this->faker->dateTimeThisYear();
        $due_date = $this->faker->dateTimeThisYear();
        $status = $this->faker->randomElement(['Paid', 'Unpaid', 'Overdue', 'Partial', 'Pending', 'Void']);
        $payment_method = $this->faker->randomElement(['Cash', 'Check', 'Credit Card', 'PayPal']);
        $notes = $this->faker->sentence;
        $currency = $this->faker->randomElement(['PHP', 'USD', 'EUR']);
        $issue_by = $this->faker->name;
        $ship_to = $this->faker->address;
        $product = $this->faker->word;
        $quantity = $this->faker->numberBetween(1, 10);
        $price = $this->faker->randomFloat(2, 100, 1000);
        $tax = $this->faker->randomFloat(2, 0, 20);
        $discount = $this->faker->randomFloat(2, 0, 100);

        // Amount before tax
        $amountBeforeTax = $quantity * $price;

        // Discount
        $discountAmount = $amountBeforeTax * ($discount / 100);
        $amountAfterDiscount = $amountBeforeTax - $discountAmount;

        // Tax
        $taxAmount = $amountAfterDiscount * ($tax / 100);
        $amount = $amountAfterDiscount + $taxAmount;

        return [
            'customer_id' => $id,
            'invoice_number' => $invoice_number,
            'invoice_date' => $invoice_date,
            'due_date' => $due_date,
            'status' => $status,
            'payment_method' => $payment_method,
            'notes' => $notes,
            'currency' => $currency,
            'issue_by' => $issue_by,
            'ship_to' => $ship_to,
            'product' => $product,
            'quantity' => $quantity,
            'price' => $price,
            'tax' => $tax,
            'discount' => $discount,
            'amount' => $amount,
        ];
    }
}