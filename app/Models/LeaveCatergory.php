<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveCatergory extends Model
{
    use HasFactory;

    protected $table = "leave_catergories";

    public function leavedata()
    {
        return $this->hasMany(LeaveData::class);
    }
}
