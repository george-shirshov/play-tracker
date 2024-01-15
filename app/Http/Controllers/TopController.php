<?php

namespace App\Http\Controllers;

use App\Http\Requests\Top\TopRequest;
use App\Services\TopService;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *     path="/top",
 *     summary="Вывод топ 10 результатов",
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             ref="#/components/schemas/TopRequest"
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Успешно получен топ",
 *         @OA\JsonContent(
 *             ref="#/components/schemas/TopResponse",
 *         )
 *     ),
 * )
 */
class TopController extends Controller
{
    private const TOP_LIMIT = 10;

    public function __construct(
        private readonly TopService $topService,
    ) {
    }

    public function __invoke(TopRequest $request): JsonResponse
    {
        $top = $this->topService->getTopFromRequest($request, self::TOP_LIMIT);

        return response()->json($top);
    }
}
