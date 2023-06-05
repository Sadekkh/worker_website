<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobReview extends Model
{
    protected $fillable = ['job_id', 'employer_id', 'worker_id', 'review', 'comment'];
}
