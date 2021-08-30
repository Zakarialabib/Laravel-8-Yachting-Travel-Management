<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'name', 'phone' ,'first_name', 'last_name',
         'email',  'phone_number', 'address', 
         'password',"is_admin"
    ];

    protected $casts = [
        'is_admin' => 'integer',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    public $active = 1;

    public $inactive = 0;

    public function generateToken()
    {
        $this->api_token = str_random(20);
        $this->save();

        return $this->api_token;
    }



    public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id', 'id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function scopeCustomers($query)
    {
        return $query->whereHas('roles', function ($roles) {
            $roles->where('id', 3);
        });
    }

    public function scopeAdmin($query)
    {
        return $query->where('is_admin', 1);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function returns()
    {
        return $this->hasMany(Returns::class);
    }

}
