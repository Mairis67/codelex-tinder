<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDislikesTable extends Migration
{

    public function up(): void
    {
        Schema::create('dislikes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auth_user');
            $table->unsignedBigInteger('user_two');
            $table->timestamps();

            $table->foreign('auth_user')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('user_two')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dislikes');
    }
}
