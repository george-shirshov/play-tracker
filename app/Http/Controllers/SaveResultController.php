<?php

namespace App\Http\Controllers;

use App\Http\Requests\Result\ResultRequest;
use App\Services\ResultService;
use Illuminate\Http\JsonResponse;

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
