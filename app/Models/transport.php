<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transport extends Model
{
    protected $fillable = ['job_id', 'emp_id', 'worker_id', 'date_start', 'date_end', 'time_start', 'time_end', 'payement_type', 'budget'];
}
