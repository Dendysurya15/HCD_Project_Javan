<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedInformation extends Model
{
    use HasFactory;

    protected $table = "related_information";

    protected $fillable = ['telegram', 'linkedin', 'facebook', 'instagram', 'bpjs_kesehatan', 'bpjs_ketenagakerjaan', 'gol_darah', 'no_ijazah', 'no_kk', 'npwp', 'rek_payroll'];
}
