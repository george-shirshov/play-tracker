<?php

namespace App\Http\Controllers;

use App\Builder\Builder;
use App\Data\Top\TopRequest;
use App\Services\TopService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TopController extends Controller
{
    private const TOP_LIMIT = 10;

    public function __construct(
        private readonly TopService $topService,
        private readonly Builder $builder,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $body = (object)$request->json()->all();
        /** @var TopRequest $topRequest */
        $topRequest = $this->builder->build($body, TopRequest::class);

        $top = $this->topService->getTopFromRequest($topRequest, self::TOP_LIMIT);

        return response()->json($top);
    }
}
