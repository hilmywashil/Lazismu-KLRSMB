<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KirimZakat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'jumlah',
        'metode_pembayaran',
        'zakat_id',
    ];

    public function zakat()
    {
        return $this->belongsTo(Zakat::class, 'zakat_id');
    }
}
