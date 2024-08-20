<?php

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
        Schema::create('outboxes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->bigInteger('kd_tender')->nullable();
            $table->string('pesan')->nullable();
            $table->string('channel')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->datetimes();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outboxes');
    }
};
