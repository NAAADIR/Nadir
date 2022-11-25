<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bedroom extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone_bedroom',
        'price',
        'image',
        'bedroom_type_id',
        'hotel_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'decimal:2',
        'bedroom_type_id' => 'integer',
        'hotel_id' => 'integer',
    ];

    public function benefits()
    {
        return $this->hasMany(Benefit::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(Booking::class);
    }

    public function bedroomType()
    {
        return $this->belongsTo(BedroomType::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
