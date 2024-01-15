<?php

namespace App\Services;

use App\Http\Requests\Top\TopRequest;
use App\Http\Responses\Top\TopResponse;
use App\Repositories\ResultRepository;

readonly class TopService
{
    public function __construct(
        private ResultRepository $resultRepository,
        private HideService $hideService,
    ) {
    }

    public function getTopFromRequest(TopRequest $request, int $topLimit): TopResponse
    {
        $response = new TopResponse();

        if (!empty($request->email)) {
            $response->data->self = $this->resultRepository->getTopSelf($request->email);
        }

        $response->data->top = $this->resultRepository->getTop($topLimit);

        $response->data->top = $this->hideService->hideTopDataset($response->data->top);

        return $response;
    }
}
