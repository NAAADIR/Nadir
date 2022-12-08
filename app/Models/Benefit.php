<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'start_at',
        'end_at',
        'duration',
        'image',
        'bedroom_id',
        'benefit_price_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'bedroom_id' => 'integer',
        'benefit_price_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function bedroom()
    {
        return $this->belongsTo(Bedroom::class);
    }

    public function benefitPrice()
    {
        return $this->belongsTo(BenefitPrice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
