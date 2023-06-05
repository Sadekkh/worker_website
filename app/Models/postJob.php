<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postJob extends Model
{
    protected $fillable = ['user_id', 'title', 'date_start', 'date_end', 'time_start', 'time_end', 'payement_type', 'budget', 'description', 'type', 'tools', 'worker_number', 'worker_left', 'state', 'place'];
}
