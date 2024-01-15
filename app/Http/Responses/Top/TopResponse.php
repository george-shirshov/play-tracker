<?php

namespace App\Http\Responses\Top;

use App\Data\Top\ResponseData;

class TopResponse
{
    public ResponseData $data;
    public function __construct()
    {
        $this->data = new ResponseData();
    }
}
