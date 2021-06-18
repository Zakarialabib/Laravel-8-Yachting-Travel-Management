<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'user_id',
        'sur_name',
        'first_name',
        'other_name',
        'phone_number',
        'address'
    ];

    public static function store($data){

        $profile = static::updateOrCreate(
            [
                'user_id'      => $data['user']['id']
            ],
            [
                'sur_name'     => $data['sur_name'],
                'first_name'   => $data['first_name'],
                'other_name'   => $data['other_name'],
                'phone_number' => $data['phone'],
                'address'      => Arr::get($data,'address',''),
            ]
        );

        return $profile;
    }

    public static function getUserInfo($id){
        return static::where('user_id',$id)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
