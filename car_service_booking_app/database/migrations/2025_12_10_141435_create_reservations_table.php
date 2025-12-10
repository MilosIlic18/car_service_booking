<?php

use App\Models\User;
use App\Models\Reservation;
use App\Models\ServiceServiceType;
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
        Schema::create(Reservation::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(User::TABLE.'_id')->constrained(User::TABLE)->restrictOnDelete()->cascadeOnDelete();
            $table->foreignId(ServiceServiceType::TABLE.'_id')->constrained(ServiceServiceType::TABLE)->restrictOnDelete()->cascadeOnDelete();
            $table->datetime('datetime');
            $table->text('notes');
            $table->enum('status',['pending','cancel','reject','done'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Reservation::TABLE);
    }
};
