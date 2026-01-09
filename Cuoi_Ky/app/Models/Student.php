<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['school_id', 'student_id', 'full_name', 'email', 'phone'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
