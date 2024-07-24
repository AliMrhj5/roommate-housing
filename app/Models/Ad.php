<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ad_type',
        'residence_type',
        'budget',
        'availability_date',
        'preferences',
        'location_description',
        'country_id',
        'city_id',
        'title',
        'room_size',
        'number_of_rooms',
        'number_of_bathrooms',
        'furnished',
        'smoking_allowed',
        'pets_allowed',
        'contact_email',
        'notes',
        'contact_phone',
        'status',
        'partner_age_min',
        'partner_age_max',
        'partner_gender',
        'accommodation_type',
    ];

    // علاقة many-to-one مع المستخدمين
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    // علاقة many-to-one مع الدول (Country)
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    // علاقة many-to-one مع المدن (City)
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function images()
    {
        return $this->hasMany(ImageAd::class);
    }

    public function firstImage()
    {
        return $this->images()->first();
    }
    /**
     * Determine if the ad is for a residence search.
     *
     * @return bool
     */
    public function isResidenceSearch()
    {
        return $this->adsType->name === 'Residence Search';
    }

    /**
     * Determine if the ad is for a roommate search.
     *
     * @return bool
     */
    public function isRoommateSearch()
    {
        return $this->adsType->name === 'Roommate Search';
    }
}


