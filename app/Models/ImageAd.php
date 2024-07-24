<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageAd extends Model
{ protected $table = 'imageads';
    use HasFactory;

    protected $fillable = [
        'image_path',
        'ad_id',
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
