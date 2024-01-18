<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DbCommandsController extends Controller
{
    /**
     * Database Monitor.
     *
     * @return JsonResponse
     */
    public function dbMonitor(): JsonResponse
    {
        try {
            Artisan::call('db:monitor');
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
     * Database Seed.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function dbSeed(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'class' => ['sometimes', 'nullable', 'string', 'max:50', 'min:1', 'regex:/^[\w-]+$/']
            ], [
                'class.regex' => 'The key must be a single word without spaces.'
            ]);

            Artisan::call('db:seed', ['class' => $validatedData['class']]);
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
     * Database Show.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function dbShow(Request $request): JsonResponse
    {
        try {
            Artisan::call('db:show', ['--no-interaction' => true]);
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
     * Database Table.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function dbTable(Request $request): JsonResponse
    {
        try {
            Artisan::call('db:table', ['--no-interaction' => true]);
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
     * Database Wipe.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function dbWipe(Request $request): JsonResponse
    {
        try {
            Artisan::call('db:wipe');
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
