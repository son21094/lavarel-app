<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'student_name',
        'student_id',
        'paid_date',
        'amount',
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function calculateAmount()
    {
        if ($this->enrollment && $this->enrollment->courses) {
            $totalCredits = $this->enrollment->courses->sum('credits');
            return $totalCredits * 500000;
        }
        return 0; // Trả về 0 nếu không có thông tin khóa học
    }
}