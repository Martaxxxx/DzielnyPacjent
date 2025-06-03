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
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('email')->nullable(false);
            $table->string('phone')->nullable(false);
        });
    }
    
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['email', 'phone']);
        });
    }