<?php

namespace App\Services;

use App\Data\Top\TopData;

class HideService
{
    private const HIDDEN_CHAR = '*';

    /**
     * @param TopData[] $topDataset
     * @return TopData[]
     */
    public function hideTopDataset(array $topDataset): array
    {
        return array_map(function (TopData $topData) {
            $topData->email = $this->hideEmail($topData->email);
            return $topData;
        }, $topDataset);
    }

    private function hideEmail(string $email): string
    {
        $localPart = strstr($email, '@', true);
        $domain = strstr($email, '@');

        $localPartLength = strlen($localPart);
        $hiddenLength = ceil($localPartLength / 2);
        $hiddenPart = str_repeat(self::HIDDEN_CHAR, $hiddenLength);

        $localPartSub = substr($localPart, 0, $localPartLength - $hiddenLength);

        return "$localPartSub$hiddenPart$domain";
    }
}
