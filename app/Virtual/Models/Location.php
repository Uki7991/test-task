<?php


namespace App\Virtual\Models;

/**
 * Class Location
 * @package App\Virtual\Models
 *
 * @OA\Schema (
 *     title="Location",
 *     description="Location model",
 *     @OA\Xml(
 *         name="Location"
 *     )
 * )
 */
class Location
{
    /**
     * @OA\Property (
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example="1"
     * )
     *
     * @var
     */
    public $id;

    /**
     * @OA\Property (
     *     title="Title",
     *     description="Title",
     *     format="varchar",
     *     example="California"
     * )
     *
     */
    public $title;

    /**
     *  * @OA\Property (
     *     title="Free blocks count",
     *     description="Free blocks count",
     *     format="int64",
     *     example="45"
     * )
     */
    public $free_blocks_count;
}
