<?php

namespace App\Services;

use App\Data\Top\TopData;
use Exception;

class HideService
{
    private const HIDDEN_CHAR = '*';

    /**
     * @param TopData[] $topDataset
     * @return TopData[]
     * @throws Exception
     */
    public function hideTopDataset(array $topDataset): array
    {
        return array_map(function (TopData $topData) {
            $topData->email = $this->hideEmail($topData->email);
            return $topData;
        }, $topDataset);
    }

    /**
     * @throws Exception
     */
    private function hideEmail(string $email): string
    {
        $localPart = strstr($email, '@', true);
        $domain = strstr($email, '@');

        if (!is_string($localPart) || !is_string($domain)) {
            throw new Exception('Попытка обработки некорректного email');
        }

        $localPartLength = strlen($localPart);
        $hiddenLength = (int)ceil($localPartLength / 2);
        $hiddenPart = str_repeat(self::HIDDEN_CHAR, $hiddenLength);

        $localPartSub = substr($localPart, 0, $localPartLength - $hiddenLength);

        return "$localPartSub$hiddenPart$domain";
    }
}
