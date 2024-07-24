<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'birthday',
        'gender',
        'nationality',
        'country_id',
        'city_id',
        'account_type',
        'job',
        'marital_status',
        'profile_picture',
    ];


    // علاقة one-to-one مع المدينة
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // علاقة one-to-one مع الدولة
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // علاقة one-to-many مع الإعلانات (Ads)
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
