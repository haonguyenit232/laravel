<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use File;

class Course extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'information',
        'rank',
        'picture',
        'number_of_lesson',
    ];

    protected $appends = [
        'picture_path'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function studies()
    {
        return $this->hasMany(Study::class);
    }

    public function getPicturePathAttribute()
    {
        $pathFile = config('setting.folderUpload') . $this->attributes['picture'];
        if (!File::exists(public_path($pathFile)) || empty($this->attributes['picture'])) {

            return config('setting.lessonPictureDefault');
        }
        
        return config('setting.pathUpload') . $this->attributes['picture']; 
    }
}
