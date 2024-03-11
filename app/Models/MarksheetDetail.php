<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksheetDetail extends Model
{
    use HasFactory;
    
    protected $fillable =  [
        'marksheet_id',
        'subject_name',
        'full_marks',
        'pass_marks',
        'marks_obtained',
        'remarks',
    ];

    public function markSheetId()
    {
        return $this->belongsTo(Marksheet::class, 'marksheet_id');
    }
}
