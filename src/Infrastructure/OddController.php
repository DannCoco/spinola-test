<?php

declare(strict_types=1);

namespace Spinola\Infrastructure;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spinola\Application\CalculateOdds;
use Spinola\Domain\Odds;

class OddController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        /**
         * @var array{r: string, n: string}
         */
        $data = $request->query();

        $r = (int) $data['r'];
        $n = (int) $data['n'];

        return new JsonResponse(
            (new CalculateOdds())(
                Odds::with($r, $n)
            )
        );
    }
}
