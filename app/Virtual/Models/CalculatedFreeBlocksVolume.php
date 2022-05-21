<?php


namespace App\Virtual\Models;

/**
 * Class Location
 * @package App\Virtual\Models
 *
 * @OA\Schema(
 *     title="CalculatedFreeBlocksVolumeResource",
 *     description="Calculated free blocks volume resource",
 *     @OA\Xml(
 *         name="CalculatedFreeBlocksVolumeResource"
 *     )
 * )
 */
class CalculatedFreeBlocksVolume
{
    /**
     * @OA\Property (
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var FreeBlocks
     */
    public $data;
}
