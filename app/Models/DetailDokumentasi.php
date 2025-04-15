<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailDokumentasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokumentasi_id',
        'image'
    ];

    public function dokumentasi()
    {
        return $this->belongsTo(Dokumentasi::class, 'dokumentasi_id');
    }
}
