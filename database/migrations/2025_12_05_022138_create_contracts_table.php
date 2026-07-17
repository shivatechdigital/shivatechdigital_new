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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
    
            // Top part
            $table->string('client_name');
            $table->string('client_company')->nullable();  // Sample Client company name
            $table->string('developer_name')->default('shivatechdigital');
            $table->string('country')->default('India');
            $table->date('contract_date');
    
            // Section 1 – Work and payment
            $table->text('project_details'); // "Details to be provided"
            $table->date('start_date');      // "December 05, 2025"
            $table->string('schedule_text')->default('until the work is completed');
            $table->decimal('total_fee', 12, 2);   // ₹35,000
            $table->decimal('advance_fee', 12, 2); // ₹5,000
            $table->integer('invoice_due_days')->default(15); // "15 days"
            $table->decimal('late_fee_percent', 5, 2)->default(2.0); // "2.0%"
            $table->boolean('support_after_acceptance')->default(false); // will / will not
    
            // Ownership / permissions (yellow editable sentences)
            $table->text('section_2_2_text')->nullable(); // portfolio permission text
            $table->text('section_2_4_text')->nullable(); // background IP text
            $table->text('section_4_text')->nullable();   // Non-solicitation edited text
            $table->text('section_5_6_text')->nullable();
            $table->text('section_6_text')->nullable();   // Term and termination para
            $table->text('section_10_1_text')->nullable();
            $table->text('section_11_3_text')->nullable();
            $table->text('section_11_5_text')->nullable();
            $table->string('governing_law_country')->default('India');
    
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
