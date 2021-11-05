<?php

namespace App\Models;

// use Database\Seeders\LeaveCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveData extends Model
{
    use HasFactory;

    protected $table = "leave_data";

    protected $fillable = [
        'type', 'days', 'argument', 'id_master', 'id_leaveCategories'
    ];

    protected $primaryKey = 'id';

    public function leavecategories()
    {
        return $this->belongsTo(LeaveCatergory::class, 'id_leaveCategories');
    }

    public function statusreport()
    {
        return $this->belongsTo(StatusReport::class, 'id_status_report');
    }

    public function employeemasters()
    {
        return $this->belongsTo(EmployeeMaster::class, 'id_master');
    }
}
