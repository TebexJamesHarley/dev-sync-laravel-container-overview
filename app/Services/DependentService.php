<?php

namespace App\Services;

use App\Services\Contracts\DependentInterface;
use App\Services\Contracts\NumInterface;

class DependentService implements DependentInterface
{
    public function __construct(
        private readonly NumInterface $num
    )
    {}

    public function getValue(): int
    {
        return $this->num->value;
    }
}
