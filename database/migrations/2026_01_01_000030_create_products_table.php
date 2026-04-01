<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('price_eur', 10, 2)->nullable();
            $table->enum('stock_status', ['in_stock', 'on_order'])->default('in_stock');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->string('image_url')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
        });
    }
    public function down(): void { Schema::dropIfExists('products'); }
};
