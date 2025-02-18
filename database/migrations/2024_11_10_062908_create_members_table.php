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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('jabatan');
            $table->string('NPM');
            $table->string('email')->unique();
            $table->text('motivasi');
            $table->date('ulangTahun');
            $table->json('sosialMedia')->nullable();
            $table->json('profilePicture')->nullable();
            $table->timestamps();
        });


        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
