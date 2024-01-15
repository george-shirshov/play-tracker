<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     description="Сервис для сохранения результатов прохождения игры",
 *     version="1.0.0",
 *     title="PlayTracker",
 * ),
 * @OA\PathItem(
 *     path="/api/v1/",
 * ),
 * @OA\Schema(
 *     schema="TopData",
 *     @OA\Property(property="email", format="email", type="string"),
 *     @OA\Property(property="place", type="integer"),
 *     @OA\Property(property="milliseconds", type="integer"),
 * ),
 * @OA\Schema(
 *     schema="ResponseData",
 *     @OA\Property(property="top", type="array",
 *         @OA\Items(
 *             allOf={
 *                 @OA\Schema(ref="#/components/schemas/TopData"),
 *             }
 *         )
 *     ),
 *     @OA\Property(property="self", type="object", ref="#/components/schemas/TopData"),
 * ),
 * @OA\Schema(
 *     schema="TopResponse",
 *     @OA\Property(property="data", ref="#/components/schemas/ResponseData"),
 * ),
 * @OA\Schema(
 *     schema="ResultRequest",
 *     @OA\Property(property="email", format="email", type="string"),
 *     @OA\Property(property="milliseconds", type="integer"),
 * )
 * @OA\Schema(
 *     schema="TopRequest",
 *     @OA\Property(property="email", format="email", type="string"),
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
