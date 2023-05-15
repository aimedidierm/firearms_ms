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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_id')->nullable();
            $table->foreign('applicant_id')->on('applicants')->references('id')->onDelete("restrict");
            $table->string("phone");
            $table->date("birth");
            $table->enum("sex", ["male", "Female"]);
            $table->enum("materialStatus", ["single", "married"]);
            $table->string("country");
            $table->string("province");
            $table->string("district");
            $table->string("sector");
            $table->string("cell");
            $table->string("village");
            $table->enum("personStatus", ["civilian", "police", "soldier"]);
            $table->string("rank");
            $table->string("NID");
            $table->string("FirearmsType");
            $table->text("comment");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
