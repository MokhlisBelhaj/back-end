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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('image');
            $table->text('description');
            $table->string('phone');
            $table->string('adresse');

            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('region_id')->constrained()->onUpdate('cascade') ->onDelete('cascade');
            $table->boolean('is_validated')->nullable()->default(null);
            $table->integer('role')->default(0);
            // $table->rememberToken();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
