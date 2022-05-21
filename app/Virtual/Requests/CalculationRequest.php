<?php


namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Calculation Request",
 *      description="Calculation Request",
 *      type="object",
 *      required={"temperature", "product_volume", "time"}
 * )
 */
class CalculationRequest
{
    /**
     * @OA\Parameter (
     *      name="temperature",
     *      description="Temperature",
     *      example="2",
     *     in="query"
     * )
     *
     * @var integer
     */
    public $temperature;

    /**
     * @OA\Property(
     *      title="Product volume",
     *      description="Product volume",
     *      example="10"
     * )
     *
     * @var string
     */
    public $product_volume;

    /**
     * @OA\Property(
     *      title="Time",
     *      description="Days to store product",
     *      example="15"
     * )
     *
     * @var string
     */
    public $time;
}
