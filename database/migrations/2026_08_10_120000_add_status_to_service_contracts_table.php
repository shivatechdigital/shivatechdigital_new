<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_contracts', function (Blueprint $table) {
            if (!Schema::hasColumn('service_contracts', 'status')) {
                $table->string('status', 20)->default('new')->after('service');
            }
        });
    }

    public function down(): void
    {
        Schema::table('service_contracts', function (Blueprint $table) {
            if (Schema::hasColumn('service_contracts', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
