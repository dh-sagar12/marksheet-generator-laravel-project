<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table  =  'students';

    protected $fillable =  [
        'full_name',
        'grade',
        'section',
        'roll_number',
        'roll_number',
        'date_of_birth',
        'date_of_joined',
        'created_by',

    ];

    protected $dates =  [
        'date_of_birth', 
        'date_of_joined', 
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
