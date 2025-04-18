<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infaq extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'target'
    ];

    public function kirimInfaq()
    {
        return $this->hasMany(KirimInfaq::class, 'infaq_id');
    }
}
