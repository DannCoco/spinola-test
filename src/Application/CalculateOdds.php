<?php

declare(strict_types=1);

namespace Spinola\Application;

use Spinola\Domain\Factorial;
use Spinola\Domain\Odds;

final class CalculateOdds
{
    /**
     * @return array<mixed>
     */
    public function __invoke(Odds $odds): array
    {
        $data = [];

        for ($i = 0; $i < $odds->r; $i++) {
            $m = $odds->r - $i;

            $oddsResult = [
                'number_of_match' => $m,
                'odds' => (int) ($this->c($odds->n, $odds->r) / ($this->c($odds->r, $m) * $this->c($odds->n - $odds->r, $odds->r - $m))),
            ];

            $data[] = $oddsResult;
        }

        return $data;
    }

    private function c(int $n, int $r): float
    {
        return Factorial::with($n)->execute() / (Factorial::with($r)->execute() * Factorial::with($n - $r)->execute());
    }
}
