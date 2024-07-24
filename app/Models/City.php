<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country_id'];

    // علاقة many-to-one مع الدولة
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // علاقة one-to-one مع المستخدمين
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
