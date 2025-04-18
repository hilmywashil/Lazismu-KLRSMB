<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'target'
    ];

    public function kirimZakat()
    {
        return $this->hasMany(KirimZakat::class, 'zakat_id');
    }
}
