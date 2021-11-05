<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;

    protected $table = "personal_information";



    protected $fillable = [
        'first_name', 'middle_name', 'last_name',
        'gender', 'place_of_birth', 'date_of_birth',
        'marital_status', 'nationality', 'employee_id',
        'other_id', 'driver_license_number', 'license_expire_date',
        'image'
    ];

    public function employeemasters()
    {
        return $this->belongsTo(EmployeeMaster::class, 'id_master');
    }
}
