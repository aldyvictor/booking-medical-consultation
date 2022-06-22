<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleDoctor extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'id', 'schedule_id');
    }
}
