<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // علاقة one-to-many مع المدن
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    // علاقة one-to-one مع المستخدمين
    public function users()
    {
        return $this->hasOne(User::class);
    }
}
