<?php

namespace Spinola\Domain;

final class Odds
{
    private function __construct(public readonly int $r, public readonly int $n)
    {
    }

    public static function with(int $r, int $n): self
    {
        return new self($r, $n);
    }
}
