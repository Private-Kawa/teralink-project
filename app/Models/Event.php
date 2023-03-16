<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'admin_id',
        'date',
        'title',
        'content',
        'capacity',
    ];
    
    public function users() {
        return $this->belongsToMany(Event::class);
    }
}
