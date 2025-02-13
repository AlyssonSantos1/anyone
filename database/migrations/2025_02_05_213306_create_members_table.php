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
            $table->foreignId('squad_id');
            $table->string('name');
            $table->string('email');
            $table->string('role');
            $table->string('hierarchy');
            $table->string('insertedproject')->nullable();
            $table->string('personalreviews')->nullable();
            $table->string('ownerofreview')->nullable();

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
