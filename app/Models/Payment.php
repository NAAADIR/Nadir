<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'creditCardName',
        'creditCardNumber',
        'creditCardExpirationDate',
        'cvv',
        'start_at',
        'end_at',
        'payment_type_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'creditCardExpirationDate' => 'date',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'payment_type_id' => 'integer',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
}
