<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
