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
        if (isset($request->r, $request->n)) {
            $r = $request->r;
            $n = $request->n;

            return new JsonResponse(
                (new CalculateOdds())(
                    Odds::with($r, $n)
                )
            );
        }

        return new JsonResponse();
    }
}
