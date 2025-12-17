<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblStandardQualityPeriode extends Model
{
    use HasFactory;
    protected $fillable = [
        'tss_standard',
        'ph_min_standard',
        'ph_max_standard',
        'do_standard',
        'redox_standard',
        'conductivity_standard',
        'temperatur_standard',
    ];
}
