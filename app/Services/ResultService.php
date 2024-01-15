<?php

namespace App\Services;


use App\Data\Result\ResultViewModel;
use App\Http\Requests\Result\ResultRequest;
use App\Repositories\MemberRepository;
use App\Repositories\ResultRepository;

readonly class ResultService
{
    public function __construct(
        private ResultRepository $resultRepository,
        private MemberRepository $memberRepository,
    ) {
    }

    public function saveResultFromRequest(ResultRequest $resultRequest): void
    {
        $resultViewModel = new ResultViewModel();

        if (!empty($resultRequest->email)) {
            $memberModel = $this->memberRepository->getByEmail($resultRequest->email);
            $resultViewModel->memberId = $memberModel->getId();
        }

        $resultViewModel->milliseconds = $resultRequest->milliseconds;

        $this->resultRepository->save($resultViewModel);
    }
}
