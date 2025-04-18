<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KirimInfaq extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'jumlah',
        'metode_pembayaran',
        'infaq_id',
    ];

    public function infaq()
    {
        return $this->belongsTo(Infaq::class, 'infaq_id');
    }
}
