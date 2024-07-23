<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopotroubleticketDetail extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model yang di-plural-kan
    protected $table = 'topotroubleticket_details';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'topotroubleticket_id',
        'tanggal',
        'tindakan',
        'deskripsi',
        'status',
    ];

    // Relasi ke tabel TopoTroubleTicket
    public function ticket()
    {
        return $this->belongsTo(TopoTroubleTicket::class, 'topotroubleticket_id');
    }
}
