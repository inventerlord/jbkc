<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'slug',
        'image',
        'content',
        'description',
        'status'
    ];
    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id', 'id');
    }
}
