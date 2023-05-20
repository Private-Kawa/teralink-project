<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'admin_id',
        'date',
        'title',
        'content',
    ];
    
    public function users() {
        return $this->belongsToMany(User::class);
    }
    
    public function news_images() {
        return $this->hasMany(NewsImages::class);
    }
}
