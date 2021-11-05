<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusEmployee extends Model
{
    use HasFactory;

    protected $table = "status_employees";

    protected $primaryKey = 'id';

    public function employeemasters()
    {
        return $this->hasMany(EmployeeMaster::class);
    }
}
