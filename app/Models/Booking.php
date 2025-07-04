<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model {
    protected $fillable = [
        'event_id', 
        'name', 
        'email', 
        'phone',
        'comments',];

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
