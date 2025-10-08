<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $primaryKey = 'reservation_id';

    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'driver_id',
        'pickup_at',
        'dropoff_at',
        'total_amount',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'pickup_at' => 'datetime',
            'dropoff_at' => 'datetime',
            'total_amount' => 'decimal:2',
            'created_at' => 'datetime',
        ];
    }

    // Relationship với Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    // Relationship với Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'vehicle_id');
    }

    // Relationship với Driver
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'driver_id');
    }
}
