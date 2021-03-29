<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'job_title_user',
            'job_title_id',
            'user_id');
    }
}
