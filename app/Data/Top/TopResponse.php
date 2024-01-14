<?php

namespace App\Data\Top;

class TopResponse
{
    public ResponseData $data;
    public function __construct()
    {
        $this->data = new ResponseData();
    }
}
