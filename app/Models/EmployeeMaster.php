<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class EmployeeMaster extends Authenticable
{
    use HasFactory, Notifiable;

    protected $table = 'employee_masters';

    // protected $guard = 'admin';

    protected $fillable = [
        'first_name', 'middle_name', 'last_name',
        'employee_id', 'email', 'password', 'status_id',
        'supervisor_id', 'job_title_id', 'sub_unit_id'
    ];

    protected $hidden = ['password'];

    public function jobtitle()
    {
        return $this->belongsTo(Jobtitle::class, 'job_title_id');
    }

    public function statusemployee()
    {
        return $this->belongsTo(StatusEmployee::class, 'status_id');
    }

    public function subunit()
    {
        return $this->belongsTo(SubUnit::class, 'sub_unit_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'supervisor_id');
    }

    public function leavedata()
    {
        return $this->hasMany(LeaveData::class);
    }

    public function personalinformation()
    {
        return $this->hasOne(PersonalInformation::class);
    }
}
