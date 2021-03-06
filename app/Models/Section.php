<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public $guarded = [];

    public function course () {
        return $this->belongsTo(Course::class);
    }
}
