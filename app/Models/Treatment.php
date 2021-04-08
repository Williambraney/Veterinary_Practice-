<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\Animal;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    public $timestamps = false;
    // stopping timestamps from being added

    public function animals()
    {
        return $this->belongsToMany(Animal::class);
    }

    public static function fromStrings(array $strings): Collection
    {
        return collect($strings)->map(fn ($str) => trim($str))
            ->unique()
            ->map(fn ($str) => Treatment::firstOrCreate(["name" => $str]));
            // Takes an array of strings and thurns it into a colleciton. 
            // We then use map to remove any whitespace from either side of the string.
            // Next we make sure there arent any duplicate strings.
            // firstOrCreate method to find a matching animal in the database or create a new one if one doesent exist.
            // by the end we should have a collection containing all the relevant Treatment models from the database.
    }

}
