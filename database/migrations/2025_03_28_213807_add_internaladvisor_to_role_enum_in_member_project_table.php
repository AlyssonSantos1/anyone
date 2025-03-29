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
        DB::statement("ALTER TABLE member_project MODIFY COLUMN role ENUM('manager', 'associate', 'internaladvisor')");
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE member_project MODIFY COLUMN role ENUM('manager', 'associate')");
    }
    
    
};
