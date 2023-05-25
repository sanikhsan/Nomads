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
        Schema::table('Users', function (Blueprint $table) {
            $table->string('nationality')->nullable()->after('email');
            $table->boolean('is_visa')->default(false)->after('nationality');
            $table->date('doe_passport')->nullable()->after('is_visa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Users', function (Blueprint $table) {
            $table->dropColumn('nationality');
            $table->dropColumn('is_visa');
            $table->dropColumn('doe_passport');
        });
    }
};
