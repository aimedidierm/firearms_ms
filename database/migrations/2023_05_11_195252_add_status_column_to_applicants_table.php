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
        Schema::table('applicants', function (Blueprint $table) {
            $table->enum("status", ["none", "send", "rApproved", "pApproved", "trainingPassed", "examPassed", "approved"])->default("none");
            $table->boolean("rejected")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->dropColumn("status");
            $table->dropColumn("rejected");
        });
    }
};
