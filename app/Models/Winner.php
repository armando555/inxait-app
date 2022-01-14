<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_inxait_id'
    ];
    public function getUsernxaitId()
    {

        return $this->attributes['user_inxait_id'];
    }

    public function setUsernxaitId($id)
    {

        $this->attributes['user_inxait_id'] = $id;
    }

    public function getId()
    {

        return $this->attributes['id'];
    }

    public function setId($id)
    {

        $this->attributes['id'] = $id;
    }
}
