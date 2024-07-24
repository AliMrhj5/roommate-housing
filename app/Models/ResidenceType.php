<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenceType extends Model
{   protected $table = 'residence_type';
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // علاقة one-to-one مع الإعلانات (Ad)
    public function ad()
    {
        return $this->hasOne(Ad::class);
    }
}
