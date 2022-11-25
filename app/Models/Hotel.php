<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'street',
        'postcode',
        'phone',
        'image',
        'hotel_class_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'hotel_class_id' => 'integer',
    ];

    public function bedrooms()
    {
        return $this->hasMany(Bedroom::class);
    }

    public function hotelClass()
    {
        return $this->belongsTo(HotelClass::class);
    }
}
