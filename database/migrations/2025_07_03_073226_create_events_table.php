<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void {
    Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->dateTime('event_date');
        $table->integer('max_capacity');
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
