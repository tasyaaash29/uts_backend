<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('gender');
            $table->string('phone');
            $table->text('address');
            $table->string('email');
            $table->string('status');
            $table->date('hired_on');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(('employees'));
    }
};
