<?php

namespace App\Services;

use App\Services\Contracts\NumInterface;

class NumService implements NumInterface
{
    public int $value = 0;

    public function increment(): int
    {
       ++$this->value;

       return $this->value;
    }
}
