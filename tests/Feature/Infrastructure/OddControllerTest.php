<?php

declare(strict_types=1);

namespace Tests\Feature\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

final class OddControllerTest extends TestCase
{
    /**
     * @test
     */
    public function request_successfully(): void
    {
        $response = $this->get(
            'api/odd',
            [
                'r' => 1,
                'n' => 2,
            ]
        );

        /** @var string */
        $responseString = $response->getContent();

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertEquals(
            [
                [
                    'number_of_match' => 1,
                    'odds' => 2
                ],
                [
                    'number_of_match' => 3,
                    'odds' => 4
                ]
        ], \json_decode($responseString, true));
    }
}
