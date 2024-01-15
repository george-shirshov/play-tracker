<?php

namespace App\Http\Controllers;

use App\Builder\Builder;
use App\Http\Requests\Top\TopRequest;
use App\Services\TopService;
use Illuminate\Http\JsonResponse;

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
