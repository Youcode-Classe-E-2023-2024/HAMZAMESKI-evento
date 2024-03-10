<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'image',
        'date',
        'place',
        'category_id',
        'available_places',
        'ticket_price',
        'acceptance',
        'nmb_reservations',
        'is_published'
    ];

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%");
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'event_id', 'id');
    }
}
