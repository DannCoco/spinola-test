<?php

namespace Spinola\Domain;

use Illuminate\Support\Facades\Log;

final class Factorial
{
    private function __construct(public readonly int $value)
    {
    }

    public static function with(int $value): self
    {
        return new self($value);
    }

    public function execute(): float
    {
        return $this->factorial($this->value);
    }

    private function factorial(int $n): float
    {
        if ($n <= 1) {
            return 1;
        } else {
            return $n * $this->factorial($n - 1);
        }
    }
}
