<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('phone_number');
            $table->string('password');
            $table->enum('role', ['utilisateur', 'admin_secondaire', 'admin_principal'])->default('utilisateur');
            $table->string('email')->unique();
            $table->boolean('statut')->default(true);
//            $table->timestamp('email_verified_at')->nullable();
//            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
