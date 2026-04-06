<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consent_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('session_id')->nullable();
            $table->enum('consent_type', [
                'cookies_necessary',
                'cookies_analytics',
                'marketing',
                'privacy_policy',
                'terms',
            ]);
            $table->boolean('consented')->default(false);
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('consented_at')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'consent_type']);
            $table->index('session_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consent_log');
    }
};
