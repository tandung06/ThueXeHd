<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'password_hash',
        'role',
    ];

    protected $hidden = [
        'password_hash',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    public $timestamps = true; // Enable timestamps
    const UPDATED_AT = null; // Disable updated_at column
    
    // Disable remember_token functionality
    public function getRememberToken()
    {
        return null;
    }
    
    public function setRememberToken($value)
    {
        // Do nothing - no remember_token column
    }
    
    public function getRememberTokenName()
    {
        return null;
    }

    // Relationship với Customer
    public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id', 'user_id');
    }

    // Relationship với Reservations
    public function reservations()
    {
        return $this->hasManyThrough(Reservation::class, Customer::class, 'customer_id', 'customer_id');
    }

    // Get password attribute
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    // Set password attribute
    public function setPasswordAttribute($value)
    {
        $this->attributes['password_hash'] = bcrypt($value);
    }
}
