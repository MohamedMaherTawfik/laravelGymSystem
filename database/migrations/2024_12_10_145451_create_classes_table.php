<?php

use App\Models\classes;
use App\Models\Members;
use App\Models\Trainers;
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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('start_time');
            $table->string('end_time');
            $table->foreignIdFor(Trainers::class)->onDelete('cascade');
            $table->decimal('price', 8, 2);
            $table->decimal('max_participants', 8, 2);
            $table->timestamps();
        });

        Schema::create('members_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Members::class,)->constrained()->onDelete('cascade');
            $table->foreignIdFor(classes::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
