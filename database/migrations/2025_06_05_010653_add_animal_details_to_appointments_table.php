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
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('animal_type')->nullable();      // np. kot, pies
            $table->string('breed')->nullable();            // np. europejski krótkowłosy
            $table->string('age')->nullable();              // np. 2 lata
            $table->string('weight')->nullable();           // np. 4.5 kg
            $table->text('notes')->nullable();              // dodatkowe informacje
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['animal_type', 'breed', 'age', 'weight', 'notes']);
        });
    }
};
