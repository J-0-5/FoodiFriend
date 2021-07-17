<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastName', 'docType', 'docNum', 'city_id', 'address', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCommerce()
    {
        return $this->hasOne(Commerce::class, 'user_id');
    }

    public function getCity()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function getOrder()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function scopeDate($query, $startDate, $endtDate)
    {
        if (trim($startDate) != null && trim($endtDate) != null) {
            $query->whereBetween('created_at', [$startDate, $endtDate]);
        }
    }
}
