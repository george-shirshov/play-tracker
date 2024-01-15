<?php

namespace App\Http\Controllers;

use App\Http\Requests\Result\ResultRequest;
use App\Services\ResultService;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *     path="/save-result",
 *     summary="Сохранение результата для участника",
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             ref="#/components/schemas/ResultRequest",
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Успешно сохранён результат",
 *     ),
 * )
 */
class SaveResultController extends Controller
{
    public function __construct(
        private readonly ResultService $resultService,
    ) {
    }

    public function __invoke(ResultRequest $request): JsonResponse
    {
        $this->resultService->saveResultFromRequest($request);

        return response()->json('');
    }
}
