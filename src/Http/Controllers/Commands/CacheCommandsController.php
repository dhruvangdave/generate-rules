<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CacheCommandsController extends Controller
{
    /**
     * Cache Clear.
     *
     * @return JsonResponse
     */
    public function cacheClear(): JsonResponse
    {
        try {
            Artisan::call('cache:clear');
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
     * Cache Forget.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function cacheForget(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'key' => ['string', 'max:50', 'min:1', 'regex:/^[\w-]+$/']
            ], [
                'key.regex' => 'The key must be a single word without spaces.'
            ]);

            Artisan::call('cache:forget', ['key' => $validatedData['key']]);
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
     * Cache Prune Stale Tags.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function cachePruneStaleTags(Request $request): JsonResponse
    {
        try {
            Artisan::call('cache:prune-stale-tags');
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
     * Cache Table Creation.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function cacheTable(Request $request): JsonResponse
    {
        try {
            Artisan::call('cache:table');
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
