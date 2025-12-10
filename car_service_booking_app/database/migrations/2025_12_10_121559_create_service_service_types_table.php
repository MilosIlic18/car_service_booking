<?php

use App\Models\Service;
use App\Models\ServiceType;
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
        Schema::create(ServiceServiceType::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(Service::TABLE.'_id')->constrained(Service::TABLE)->restrictOnDelete()->cascadeOnDelete();
            $table->foreignId(ServiceType::TABLE.'_id')->constrained(ServiceType::TABLE)->restrictOnDelete()->cascadeOnDelete();
            $table->decimal("price",5,2);
            $table->unsignedInteger("duration");
            $table->text("description");
            $table->timestamps();

            //Unique index
            $table->unique([Service::TABLE.'_id',ServiceType::TABLE.'_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(ServiceServiceType::TABLE);
    }
};
