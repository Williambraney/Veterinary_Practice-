<?php

namespace App\Http\Controllers\API\Animals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Http\Requests\API\AnimalRequest;
use App\Http\Resources\API\AnimalResource;
use App\Models\Owner;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Owner $owner)
    {
        //
        return AnimalResource::collection($owner->animals);
        // return AnimalResource::collection(Animal::all());
        // return AnimalResource::collection(Animal::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Owner $owner)
    {
        // can only use the store method when the fillable functionality has been applied in Animal.php (model).
        $data = $request->all();

        
        
        $animal = new Animal($data);
        
        $animal->owner()->associate($owner);
        //associate the new animal with the owner
        
        $animal->save();
        //save the new animal 
        
        $treatmentID = $request->get("treatment_id"); // this gets the treatment id as creates it as a variable
        $animal->Treatment()->sync($treatmentID); // this then uses the treatment method from animal PHP to sync the treatment ids
                                                  // with the animals.

        return new AnimalResource($animal);
        //return the new animal with the resources
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner, Animal $animal)
    {
        //
        return new AnimalResource($animal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner, Animal $animal)
    {
        //
        $data = $request->all();

        $animal->fill($data);

        $animal->save();

        $treatmentID = $request->get("treatment_id"); // this gets the treatment id as creates it as a variable
        $animal->Treatment()->sync($treatmentID); // this then uses the treatment method from animal PHP to sync the treatment ids
                                                  // with the animals.

        return new AnimalResource($animal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner, Animal $animal)
    {
        //
        $animal->delete();

        return response(null, 204);
    }
}
