<?php


namespace App\Virtual\Models;

/**
 * Class Location
 * @package App\Virtual\Models
 *
 * @OA\Schema (
 *     title="Room",
 *     description="Room",
 *     @OA\Xml(
 *         name="Room"
 *     )
 * )
 */
class Room
{
    /**
     * @OA\Property (
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example="154"
     * )
     *
     * @var
     */
    public $id;

    /**
     * @OA\Property (
     *     title="temperature",
     *     description="temperature",
     *     format="int64",
     *     example="-2"
     * )
     *
     * @var
     */
    public $temperature;

    /**
     * @OA\Property (
     *     title="location_id",
     *     description="location_id",
     *     format="int64",
     *     example="147"
     * )
     *
     * @var
     */
    public $location_id;

    /**
     * @OA\Property (
     *     title="location",
     *     description="location model",
     *     format="object",
     * )
     *
     * @var BookedLocation
     */
    public $location;
}
