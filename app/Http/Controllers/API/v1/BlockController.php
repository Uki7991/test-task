<?php


namespace App\Http\Controllers\API\v1;


use App\Http\Requests\CalculationRequest;
use App\Http\Resources\BlocksBookedResource;
use App\Http\Resources\CalculatedFreeBlocksResource;
use App\Http\Resources\CalculatedFreeBlocksResourceCollection;
use App\Http\Resources\CalculatedFreeBlocksVolumeResource;
use App\Models\Location;
use App\Services\BookingService;
use App\Services\CalculateFreeBlocksVolumeService;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * @OA\Get(
     *     path="/calculate/{id}",
     *     tags={"Blocks"},
     *     @OA\Parameter(
     *      name="id",
     *     in="path",
     *     example=1,
     *     @OA\Schema(
     *     type="integer"
     * )
     * ),
     *     @OA\Parameter (
     *      name="temperature",
     *      description="Temperature",
     *      example="2",
     *     in="query"
     * ),
     *     @OA\Parameter (
     *      name="product_volume",
     *      description="Product volume",
     *      example="10",
     *     in="query"
     * ),
     *     @OA\Parameter (
     *      name="time",
     *      description="Days to store product",
     *      example="15",
     *     in="query"
     * ),
     *     security={
     *     {
     *      "sanctum": ""
     *     }
     *     },
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *     @OA\Response(
     *          response=404,
     *          description="Not found",
     *      ),
     *     @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(ref="#/components/schemas/CalculatedFreeBlocksVolume")
     * ),
     * )
     */
    public function calculate(CalculationRequest $request, Location $location, CalculateFreeBlocksVolumeService $calculateFreeBlocksVolumeService)
    {
        return CalculatedFreeBlocksVolumeResource::make($calculateFreeBlocksVolumeService->calculate(array_merge(['location' => $location], $request->all())));
    }

    /**
     * @OA\Post(
     *     path="/book/{id}",
     *     tags={"Blocks"},
     *     @OA\Parameter(
     *      name="id",
     *     in="path",
     *     example=1,
     *     @OA\Schema(
     *     type="integer"
     * )
     * ),
     *     @OA\Parameter (
     *      name="temperature",
     *      description="Temperature",
     *      example="2",
     *     in="query"
     * ),
     *     @OA\Parameter (
     *      name="product_volume",
     *      description="Product volume",
     *      example="10",
     *     in="query"
     * ),
     *     @OA\Parameter (
     *      name="time",
     *      description="Days to store product",
     *      example="15",
     *     in="query"
     * ),
     *     security={
     *     {
     *      "sanctum": ""
     *     }
     *     },
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *     @OA\Response(
     *          response=404,
     *          description="Not found",
     *      ),
     *     @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(ref="#/components/schemas/BookedBlocksResource")
     * ),
     * )
     */
    public function book(CalculationRequest $request, Location $location, BookingService $bookingService)
    {
        return BlocksBookedResource::make($bookingService->book(array_merge(['location' => $location], $request->all())));
    }

    public function unbook(BookingService $bookingService)
    {
        $bookingService->unbook();
    }
}
