<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;
use App\Http\Requests\API\OwnerRequest;
use App\Http\Resources\API\OwnerResource;

class OwnerControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //list all owners in model
        // return Owner::all();
        // $owner = Owner::all();
        // return new OwnerResource($owner);
        return OwnerResource::collection(Owner::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OwnerRequest $request) // OWNER REQUEST is linked to rules that were stated.
    {
        $data = $request->all();
        // gets all the request data
        // returns an array of a ll the data the user sent

        $owner = Owner::create($data);

        return new OwnerResource($owner);
        // return the resource
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return new OwnerResource($owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OwnerRequest $request, Owner $owner) //OWNER REQUEST is linked to rules that were stated.
    {
        //gets the request data
        $data = $request->all();

        //update the article using the fill method
        //then saves it to the database
        $owner->fill($data)->save();

        //return the updated version
        return new OwnerResource($owner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        // works to destroy an owner, again use owner $owner as route model binding.
        $owner->delete();
        //deletes the article from the database.

        return response(null, 204);
        // use a 204 code as there is no content in the response.
    }
}
