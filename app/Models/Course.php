<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function category () {
        return $this->belongsTo(Category::class);
    }

    public function user () {
        return $this->belongsTo(User::class,'add_by');
    }

    public function getPhoto($photo = NULL)
    {
        if ($photo === NULL)
            $photo = $this->main_photo;

        return Storage::url($photo);
    }

    public function tags () {
        return $this->belongsToMany(Tag::class);
    }

    public function sections () {
        return $this->hasMany(Section::class);
    }

    public function hasTag($tag_id)
    {
        return in_array($tag_id, $this->tags->pluck('id')->toArray());
    }

}
