<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class RouteCommandsController extends Controller
{
    /**
     * Route Cache.
     *
     * @return JsonResponse
     */
    public function routeCache(): JsonResponse
    {
        try {
            $output = new BufferedOutput();
            Artisan::call('route:cache', [], $output);
            $result = $output->fetch();

            return response()->json([
                'result' => $result,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Route Clear.
     *
     * @return JsonResponse
     */
    public function routeClear(): JsonResponse
    {
        try {
            Artisan::call('route:clear');
            $result = Artisan::output();

            return response()->json([
                'result' => $result,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Route List.
     *
     * @return JsonResponse
     */
    public function routeList(): JsonResponse
    {
        try {
            Artisan::call('route:list');
            $result = Artisan::output();

            return response()->json([
                'result' => json_encode($result),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
