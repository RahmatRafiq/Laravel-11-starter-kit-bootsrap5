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
        Schema::create('about_app', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('contact_email')->nullable(); // Contact email for inquiries
            $table->string('contact_phone')->nullable(); // Contact phone number for inquiries
            $table->string('contact_address')->nullable(); // Contact address for inquiries
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_app');
    }
};
