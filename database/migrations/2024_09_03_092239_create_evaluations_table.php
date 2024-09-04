<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->integer('star_quantity');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('evaluationable_id');
            $table->string('evaluationable_type');
            $table->boolean('statut')->default(1);
            $table->timestamps();

//            cle etrangere

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};

