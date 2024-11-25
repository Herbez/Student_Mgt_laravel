<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //


    protected $table = 'students';

    protected $fillable = [
        'name',
        'class',
    ];

    // Define the relationship with marks (a student can have many marks)
    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}
