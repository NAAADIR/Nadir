<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_at',
        'end_at',
        'payment_date',
        'amount',
        'user_id',
        'payment_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_at' => 'date',
        'end_at' => 'date',
        'payment_date' => 'date',
        'amount' => 'decimal:2',
        'user_id' => 'integer',
        'payment_id' => 'integer',
    ];

    public function bedrooms()
    {
        return $this->belongsToMany(Bedroom::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
