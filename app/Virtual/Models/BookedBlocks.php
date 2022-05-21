<?php


namespace App\Virtual\Models;

/**
 * Class Location
 * @package App\Virtual\Models
 *
 * @OA\Schema (
 *     title="BookedBlocks",
 *     description="Booked Blocks",
 *     @OA\Xml(
 *         name="BookedBlocks"
 *     )
 * )
 */
class BookedBlocks
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
     *     title="Room_id",
     *     description="Room ID",
     *     format="int64",
     *     example="154"
     * )
     *
     * @var
     */
    public $room_id;

    /**
     * @OA\Property (
     *     title="booked",
     *     description="Is booked",
     *     format="boolean",
     *     example="1"
     * )
     *
     * @var boolean
     */
    public $booked;

    /**
     * @OA\Property (
     *     title="room",
     *     description="room model",
     *     format="object",
     * )
     *
     * @var Room
     */
    public $room;
}
