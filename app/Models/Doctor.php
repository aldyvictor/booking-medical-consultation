<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function doctorCategory()
    {
        return $this->belongsTo(DoctorCategory::class);
    }

    public function scheduleDoctors()
    {
        return $this->hasMany(ScheduleDoctor::class);
    }
}
