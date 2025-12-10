<?php

use App\Models\WorkHour;
use App\Models\WorkHourBreak;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(WorkHourBreak::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(WorkHour::TABLE.'_id')->constrained(WorkHour::TABLE)->restrictOnDelete()->cascadeOnDelete();
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(WorkHourBreak::TABLE);
    }
};
