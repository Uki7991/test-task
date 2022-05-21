<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="LocationResource",
 *     description="Location resource",
 *     @OA\Xml(
 *         name="LocationResource"
 *     )
 * )
 */
class LocationResource
{
    /**
     * @OA\Property (
     *     title="Data",
     *     description="Data wrapper",
     * )
     *
     * @var Location[]
     */
    public $data;
}
