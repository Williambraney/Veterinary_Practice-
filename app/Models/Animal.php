<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ["name", "type", "dob", "weight_kg", "height_metres", "biteyness", "owner_id"];

    public function Owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function Treatment()
    {
        return $this->belongsToMany(Treatment::class);
    }

    public function setTreatments(array $strings): Animal
    {
        $treatments = Treatment::fromStrings($strings);

        // we're on an article instance, so use $this
        // pass in collection of IDs
        $this->Treatment()->sync($treatments->pluck("id"));

        // return $this in case we want to chain
        return $this;
    }
}
