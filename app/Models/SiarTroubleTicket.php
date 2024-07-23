<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiarTroubleTicket extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model yang di-plural-kan
    protected $table = 'siartroubleticket';

    protected $fillable = [
        'site_id', 'siteId', 'nama_site', 'provinsi', 'kabupaten', 'kecamatan',
        'problem', 'deskripsi', 'durasi', 'created_by', 'updated_by', 'assigned_by',
        'priority', 'status'
    ];

    public function details()
    {
        return $this->hasMany(SiarTroubleTicketDetail::class, 'siartroubleticket_id');
    }

    public function site()
    {
        return $this->belongsTo(DataSite::class, 'site_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
