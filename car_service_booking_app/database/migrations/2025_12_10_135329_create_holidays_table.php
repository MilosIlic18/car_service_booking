<?php

use App\Models\Holiday;
use App\Models\Service;
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
        Schema::create(Holiday::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(Service::TABLE.'_id')->constrained(Service::TABLE)->restrictOnDelete()->cascadeOnDelete();
            $table->date('date');
            $table->text("description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Holiday::TABLE);
    }
};
