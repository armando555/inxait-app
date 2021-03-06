<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'cedula',
        'state',
        'city',
        'phone',
        'email',
        'password',
        'habeasData'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function validate(Request $request)
    {
        $request->validate(
            [
            "name" => "required",
            "last_name" => "required",
            "cedula" => "required|numeric|gt:0",
            "state" => "required",
            "city" => "required",
            "phone" => "required|numeric|gt:0",
            "email" => "required",
            "password" => "required",
            "habeasData" => "required",
            ]
        );
    }
    public function getId()
    {

        return $this->attributes['id'];
    }

    public function setId($id)
    {

        $this->attributes['id'] = $id;
    }

    public function getName()
    {

        return $this->attributes['name'];
    }

    public function setName($name)
    {

        $this->attributes['name'] = $name;
    }
    public function getState()
    {

        return $this->attributes['state'];
    }

    public function setState($state)
    {

        $this->attributes['state'] = $state;
    }
    public function getCity()
    {

        return $this->attributes['city'];
    }

    public function setCity($city)
    {

        $this->attributes['city'] = $city;
    }
    public function getCedula()
    {

        return $this->attributes['cedula'];
    }

    public function setCedula($cedula)
    {

        $this->attributes['cedula'] = $cedula;
    }
    public function getPhone()
    {

        return $this->attributes['phone'];
    }

    public function setPhone($phone)
    {

        $this->attributes['phone'] = $phone;
    }
    public function getEmail()
    {

        return $this->attributes['email'];
    }

    public function setEmail($email)
    {

        $this->attributes['email'] = $email;
    }
}
