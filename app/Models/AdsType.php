<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsType extends Model
{   protected $table = 'ads_type';
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // علاقة many-to-one مع الإعلانات (Ads)
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
