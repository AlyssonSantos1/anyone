<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('project_member_squad', function (Blueprint $table) {
            $table->foreignId('member_id')->constrained()->onDelete('cascade'); 
        });
    }

    public function down()
    {
        Schema::table('project_member_squad', function (Blueprint $table) {
            $table->dropColumn('member_id'); 
        });
    }
};
