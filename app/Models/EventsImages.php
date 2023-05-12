<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventsImages extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'event_id',
        'path',
    ];
    
    public function events() {
        return $this->belongsTo(Event::class);
    }
}
