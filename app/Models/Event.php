<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'admin_id',
        'date',
        'title',
        'content',
        'capacity',
    ];
    
    public function users() {
        return $this->belongsToMany(User::class);
    }
    
    public function events_images() {
        return $this->hasMany(EventsImages::class);
    }
    
}
