<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = ["first_name", "last_name", "telephone", "address_1", "address_2", "town", "postcode"];


    public function fullName()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function fullAddress()
    {
        return "{$this->address_1}, {$this->address_2}, {$this->town}, {$this->postcode}";
    }

    public static function haveWeBananas($number)
    {
        if ($number === 0) {
            return "No we have no bananas";
        }
        if ($number === 1){
        return "Yes we have {$number} bananas";
        }
    }
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }

}




