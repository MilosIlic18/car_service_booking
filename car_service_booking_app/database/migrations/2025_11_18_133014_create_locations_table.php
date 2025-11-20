<?php

use App\Models\Town;
use App\Models\Service;
use App\Models\Location;
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
        Schema::create(Location::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(Service::TABLE.'_id')->constrained(Service::TABLE)->restictOnDelete()->cascadeOnUpdate();
            $table->foreignId(Town::TABLE.'_id')->constrained(Town::TABLE)->restictOnDelete()->cascadeOnUpdate();
            $table->string('street',60);
            $table->string('house_number',10);
            $table->timestamps();
            $table->unique([Town::TABLE.'_id','street','house_number']);
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Location::TABLE);
    }
};
