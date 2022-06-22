<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public $table = 'appointment';

     protected $guarded = [
        'id'
     ];

     public function schedules()
     {
        return $this->belongsTo(ScheduleDoctor::class, 'schedule_id', 'id');
     }

     public function users()
     {
        return $this->belongsTo(User::class, 'user_id', 'id');
     }
}
