<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('group');
            $table->text('q1');
            $table->string('q2');
            $table->string('q3');
            $table->boolean('q1_correct');
            $table->boolean('q2_correct');
            $table->boolean('q3_correct');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
