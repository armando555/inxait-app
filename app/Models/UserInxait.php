<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class UserInxait extends Model
{
    use HasFactory;

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
        'habeasData'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    public static function validate(Request $request)
    {
        $request->validate(
            [
            "name" => "required",
            "last_name" => "required",
            "cedula" => "required",
            "state" => "required",
            "city" => "required",
            "phone" => "required",
            "email" => "required",
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
    public function getLastName()
    {

        return $this->attributes['last_name'];
    }

    public function setLastName($name)
    {

        $this->attributes['last_name'] = $name;
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
