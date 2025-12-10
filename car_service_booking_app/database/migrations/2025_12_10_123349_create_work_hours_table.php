<?php

use App\Models\Service;
use App\Models\WorkHour;
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
        Schema::create(WorkHour::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(Service::TABLE.'_id')->constrained(Service::TABLE)->restrictOnDelete()->cascadeOnDelete();
            $table->unsignedInteger("day_of_week");
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

            //Unique index
            $table->unique([Service::TABLE.'_id','day_of_week']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(WorkHour::TABLE);
    }
};
