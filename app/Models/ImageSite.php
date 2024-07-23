<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSite extends Model
{
    protected $fillable = [
        'data_site_id', 'description', 'image_path', 'upload_date'
    ];

    public function dataSite()
    {
        return $this->belongsTo(DataSite::class);
    }
}
