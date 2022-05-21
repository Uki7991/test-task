<?php


namespace App\Http\Controllers\API\v1;


use App\Http\Resources\LocationResource;
use App\Models\Location;

class LocationController
{
    /**
     * @OA\Get(
     *     path="/locations",
     *     tags={"Locations"},
     *
     *     @OA\Response(
     *     response=200,
     *     description="Location response",
     *     @OA\JsonContent(ref="#/components/schemas/LocationResource")
     * )
     * )
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return LocationResource::collection(Location::all(['id', 'title']));
    }
}
