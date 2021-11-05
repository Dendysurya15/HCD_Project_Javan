<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusReport extends Model
{
    use HasFactory;

    protected $table = "status_reports";

    protected $primaryKey = "id";


    public function leavedata()
    {
        return $this->hasMany(LeaveData::class);
    }
}
