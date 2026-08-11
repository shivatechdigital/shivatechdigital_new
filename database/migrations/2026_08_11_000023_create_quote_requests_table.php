<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 30)->nullable();
            $table->string('project_type');
            $table->unsignedTinyInteger('budget_level')->default(3);
            $table->string('timeline')->nullable();
            $table->json('selected_features')->nullable();
            $table->unsignedInteger('estimated_amount')->default(0);
            $table->unsignedInteger('estimated_min')->default(0);
            $table->unsignedInteger('estimated_max')->default(0);
            $table->text('requirements')->nullable();
            $table->string('status')->default('submitted');
            $table->unsignedInteger('quoted_amount')->nullable();
            $table->text('quotation_message')->nullable();
            $table->text('admin_note')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};
