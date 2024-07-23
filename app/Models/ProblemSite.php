<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemSite extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_site_id', 'riwayat_problem', 'description', 'petugas', 'status'
    ];

    public function dataSite()
    {
        return $this->belongsTo(DataSite::class);
    }
}
