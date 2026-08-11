<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $table->string('quotation_number')->nullable()->after('quoted_amount');
            $table->string('quotation_subject')->nullable()->after('quotation_number');
            $table->date('quotation_valid_till')->nullable()->after('quotation_subject');
            $table->json('quotation_line_items')->nullable()->after('quotation_valid_till');
            $table->unsignedInteger('quotation_discount')->default(0)->after('quotation_line_items');
            $table->unsignedDecimal('quotation_tax_percent', 5, 2)->default(0)->after('quotation_discount');
            $table->text('quotation_terms')->nullable()->after('quotation_tax_percent');
        });
    }

    public function down(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $table->dropColumn([
                'quotation_number',
                'quotation_subject',
                'quotation_valid_till',
                'quotation_line_items',
                'quotation_discount',
                'quotation_tax_percent',
                'quotation_terms',
            ]);
        });
    }
};
