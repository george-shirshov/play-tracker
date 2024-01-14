<?php

namespace App\Repositories;

use App\Builder\Builder;
use App\Data\Result\ResultViewModel;
use App\Data\Top\TopData;
use App\Models\Result;
use Illuminate\Support\Facades\DB;

readonly class ResultRepository
{
    public function __construct(
        private Builder $builder,
    ) {
    }

    public function save(ResultViewModel $viewModel): void
    {
        $result = new Result();
        $result->setMemberId($viewModel->memberId);
        $result->setMilliseconds($viewModel->milliseconds);

        $result->save();
    }

    /** @return TopData[] */
    public function getTop(int $limit): array
    {
        $data = DB::select("
            select email,
                   min(milliseconds) as milliseconds,
                   rank() over (order by milliseconds) AS place
            from results
                     join members m on results.member_id = m.id
            where member_id is not null
            group by email
            order by milliseconds
            limit $limit
        ");

        /** @var TopData[] */
        return $this->builder->buildArray($data, TopData::class);
    }

    public function getTopSelf(string $email): ?TopData
    {
        $data = DB::select("
            select *,
                    min(milliseconds) as milliseconds
            from (select email,
                         milliseconds,
                         rank() over (order by milliseconds) AS place
                  from results
                           join members m on results.member_id = m.id
                  where member_id is not null) as rr
            where email = :email
            group by email
        ", ['email' => $email]);

        if (empty($data)) {
            return null;
        }

        /** @var TopData */
        return $this->builder->build($data[0], TopData::class);
    }
}
