<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('status', ['new', 'processing', 'shipped', 'delivered', 'cancelled'])->default('new');
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('tax', 10, 2)->default(0);
            $table->decimal('shipping', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            $table->string('stripe_payment_id')->nullable();
            $table->string('stripe_payment_status')->nullable();
            // Shipping details
            $table->string('shipping_name');
            $table->string('shipping_email');
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_county');
            $table->string('shipping_zip')->nullable();
            // Invoice details
            $table->boolean('wants_invoice')->default(false);
            $table->string('company_name')->nullable();
            $table->string('company_vat')->nullable();
            $table->string('company_address')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }
    public function down(): void { Schema::dropIfExists('orders'); }
};
