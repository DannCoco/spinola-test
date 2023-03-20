<?php

namespace Spinola\Infrastructure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spinola\Application\CalculateOdds;
use Spinola\Domain\Odds;

class OddController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $r = $request->r;
        $n = $request->n;

        return new JsonResponse(
            (new CalculateOdds)(
                Odds::with($r, $n)
            )
        );
    }

}
