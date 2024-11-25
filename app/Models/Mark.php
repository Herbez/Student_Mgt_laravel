<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    //    // Specify the table name (optional)
    protected $table = 'marks';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'student_id',
        'math',
        'computer',
        'average',
        'grade',
    ];

        // Define the relationship with the student (each mark belongs to one student)
        public function student()
        {
            return $this->belongsTo(Student::class);
        }

}
