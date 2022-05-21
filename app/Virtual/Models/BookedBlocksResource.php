<?php


namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="BookedBlocksResource",
 *     description="Booked Blocks Resource",
 *     @OA\Xml(
 *         name="BookedBlocksResource"
 *     )
 * )
 */
class BookedBlocksResource
{
    /**
     * @OA\Property (
     *     title="Data",
     *     description="Data wrapper",
     * )
     *
     * @var BookedBlocks[]
     */
    public $data;
}
