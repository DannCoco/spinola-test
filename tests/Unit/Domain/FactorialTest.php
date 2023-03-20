<?php

declare(strict_types=1);

namespace Tests\Unit\Domain;

use Spinola\Domain\Factorial;
use Tests\TestCase;

final class FactorialTest extends TestCase
{
    /**
     * @test
     */
    public function factorial_successfully(): void
    {
        $this->assertEquals(3628800, Factorial::with(10)->execute());
        $this->assertEquals(720, Factorial::with(6)->execute());
        $this->assertEquals(1, Factorial::with(0)->execute());
    }

    /**
     * @test
     */
    public function factorial_with_incorrect_params(): void
    {
        $this->expectException(\TypeError::class);

        /** @phpstan-ignore-next-line */
        Factorial::with('a');
    }
}
