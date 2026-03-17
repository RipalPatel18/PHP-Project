<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            if (!Schema::hasColumn('appointments', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
            }

            if (!Schema::hasColumn('appointments', 'department')) {
                $table->string('department')->nullable()->after('doctor');
            }

            if (!Schema::hasColumn('appointments', 'status')) {
                $table->string('status')->default('Upcoming')->after('notes');
            }
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            if (Schema::hasColumn('appointments', 'user_id')) {
                $table->dropColumn('user_id');
            }

            if (Schema::hasColumn('appointments', 'department')) {
                $table->dropColumn('department');
            }

            if (Schema::hasColumn('appointments', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};