<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marksheet extends Model
{
    use HasFactory;


    protected $table  =  'marksheets';

    protected $fillable =  [
        'student_id',
        'grade',
        'section',
        'roll_number',
        'created_by',

    ];
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function studentId()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function MarksheetDetails()
    {
        return $this -> hasMany(MarksheetDetail::class);
    }
}
