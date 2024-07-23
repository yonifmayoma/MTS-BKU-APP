<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSite extends Model
{
    use HasFactory;

    protected $fillable = [
        'siteId', 'name', 'longitude', 'latitude', 'provinsi', 'kabupaten', 'kecamatan', 'terminalId', 'spotbeam', 'lc', 'vsat', 'tahun', 'oa'
    ];

    public function images()
    {
        return $this->hasMany(ImageSite::class);
    }

    public function problemSites()
    {
        return $this->hasMany(ProblemSite::class);
    }

    public function troubleTickets()
    {
        return $this->hasMany(TopoTroubleTicket::class, 'site_id');
    }

    public function siartroubleTickets()
    {
        return $this->hasMany(SiarTroubleTicket::class, 'site_id');
    }
}
