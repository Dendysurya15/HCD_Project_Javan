<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobtitle extends Model
{
    use HasFactory;

    protected $table = "jobtitles";

    protected $primaryKey = 'id';

    public function employeemasters()
    {
        return $this->hasMany(EmployeeMaster::class);
    }
}
