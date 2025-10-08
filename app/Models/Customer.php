<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    public $incrementing = false; // customer_id is also user_id
    protected $keyType = 'int';

    protected $fillable = [
        'customer_id',
        'driver_license_no',
        'address',
        'balance',
    ];

    public $timestamps = false; // No created_at, updated_at in customers table

    protected function casts(): array
    {
        return [
            'balance' => 'decimal:2',
        ];
    }

    // Relationship với User
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'user_id');
    }

    // Relationship với Reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'customer_id', 'customer_id');
    }
}
