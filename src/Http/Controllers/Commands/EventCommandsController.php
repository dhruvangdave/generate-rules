<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class EventCommandsController extends Controller
{
    /**
     * Event Cache.
     *
     * @return JsonResponse
     */
    public function eventCache(): JsonResponse
    {
        try {
            Artisan::call('event:cache');
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
     * Event Clear.
     *
     * @return JsonResponse
     */
    public function eventClear(): JsonResponse
    {
        try {
            Artisan::call('event:clear');
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
     * Event Generate.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function eventGenerate(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
               'config' => ['string', 'max:50', 'min:1']
            ]);
            Artisan::call('event:generate');
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
     * Event Generate.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function eventList(Request $request): JsonResponse
    {
        try {
            Artisan::call('event:list');
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
}
