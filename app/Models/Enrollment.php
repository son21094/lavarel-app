<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Enrollment extends Model
{
    protected $table = 'enrollments';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'batch_id', 'student_id', 'join_date', 'fee', 'enroll_no','credits']; 
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
    public function fee()
    {
        return $this->belongsTo(Course::class);
    }

}
