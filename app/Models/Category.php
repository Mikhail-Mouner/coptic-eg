<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * If you would like to make all of your attributes mass assignable, you may define your model's $guarded property as an empty array
     *
     * @var array
     */
    protected $fillable = ['name','active'];

    public function courses () {
        return $this->hasMany(Course::class);
    }
}
