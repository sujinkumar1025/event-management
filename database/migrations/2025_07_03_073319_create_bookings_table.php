<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
   public function up(): void {
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('event_id');
        $table->string('name');
        $table->string('email');
        $table->timestamps();

        $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
    });
}
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
