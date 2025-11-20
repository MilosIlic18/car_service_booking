<?php

use App\Models\User;
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
        Schema::create(Service::TABLE, function (Blueprint $table) {
            $table->id();
            
            $table->foreignId(User::TABLE.'_id')->constrained(User::TABLE)->restictOnDelete()->cascadeOnUpdate();
            $table->string('name',60)->unique();
            $table->text('description');
            $table->boolean('verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Service::TABLE);
    }
};
