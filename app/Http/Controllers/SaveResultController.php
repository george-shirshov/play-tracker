<?php

namespace App\Http\Controllers;

use App\Builder\Builder;
use App\Data\Result\ResultRequest;
use App\Services\ResultService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SaveResultController extends Controller
{
    public function __construct(
        private readonly ResultService $resultService,
        private readonly Builder $builder,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $body = (object)$request->json()->all();

        /** @var ResultRequest $resultRequest */
        $resultRequest = $this->builder->build($body, ResultRequest::class);

        $this->resultService->saveResultFromRequest($resultRequest);

        return response()->json();
    }
}
