<?php


namespace App\Virtual\Models;

/**
 * Class Location
 * @package App\Virtual\Models
 *
 * @OA\Schema(
 *     title="FreeBlocks",
 *     description="Calculated free blocks resource",
 *     @OA\Xml(
 *         name="FreeBlocks"
 *     )
 * )
 */
class FreeBlocks
{
    /**
     * @OA\Property (
     *     title="Free volume",
     *     description="Free volume",
     *     format="int64",
     *     example=100
     * )
     */
    public $free_volume;

    /**
     * @OA\Property (
     *     title="Required number of blocks",
     *     description="Required number of blocks",
     *     format="int64",
     *     example=10
     * )
     */
    public $required_number_of_blocks;

    /**
     * @OA\Property (
     *     title="Unused product volume",
     *     description="Unused product volume",
     *     format="int64",
     *     example=0
     * )
     */
    public $unused_product_volume;
}
