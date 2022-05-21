<?php


namespace App\Virtual\Models;

/**
 * Class Location
 * @package App\Virtual\Models
 *
 * @OA\Schema (
 *     title="BookedLocation",
 *     description="BookedLocation",
 *     @OA\Xml(
 *         name="BookedLocation"
 *     )
 * )
 */
class BookedLocation
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
     *     title="title",
     *     description="title",
     *     format="string",
     *     example="Toronto"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property (
     *     title="timezone",
     *     description="timezone",
     *     format="string",
     *     example="America/New_York"
     * )
     *
     * @var string
     */
    public $timezone;

}
