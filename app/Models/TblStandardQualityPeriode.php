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
        'tds_standard',
        'do_standard',
        'redox_standard',
        'conductivity_standard',
        'temperatur_standard',
    ];
    // Tambahkan ini
    protected $casts = [
        'tss_standard'          => 'double',
        'do_standard'           => 'double',
        'redox_standard'        => 'double',
        'conductivity_standard' => 'double',
        'temperatur_standard'   => 'double',
        'tds_standard'           => 'double',
        'ph_min_standard'       => 'double',
        'ph_max_standard'       => 'double',
    ];
}
