<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'parent',
    ];

    public function parentCate()
    {
        return $this->belongsTo(CourseCategory::class, 'parent', 'id');
    }
    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id', 'id');
    }
}
