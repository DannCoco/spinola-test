<?php

declare(strict_types=1);

namespace Tests\Unit\Application;

use Spinola\Application\CalculateOdds;
use Spinola\Domain\Odds;
use Tests\TestCase;

final class CalculateOddsTest extends TestCase
{
    private CalculateOdds $odds;

    protected function setUp(): void
    {
        $this->odds = new CalculateOdds();
    }

    /**
     * @test
     */
    public function calculate_successfully(): void
    {
        $odds = ($this->odds)(
            Odds::with(1, 2)
        );

        $this->assertEquals([
            [
                'number_of_match' => 1,
                'odds' => 2,
            ],
        ], $odds);
    }
}
