<?php

namespace App\Repositories;

use App\Data\Result\ResultViewModel;
use App\Models\Result;

class ResultRepository
{
    public function save(ResultViewModel $viewModel): void
    {
        $result = new Result();
        $result->setMemberId($viewModel->memberId);
        $result->setMilliseconds($viewModel->milliseconds);

        $result->save();
    }
}
