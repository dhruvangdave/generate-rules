<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ScheduleCommandsController extends Controller
{
    /**
     * Schedule Clear Cache.
     *
     * @return JsonResponse
     */
    public function scheduleClearCache(): JsonResponse
    {
        try {
            Artisan::call('schedule:clear-cache');
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
     * Schedule Interrupt.
     *
     * @return JsonResponse
     */
    public function scheduleInterrupt(): JsonResponse
    {
        try {
            Artisan::call('schedule:interrupt');
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
     * Schedule List.
     *
     * @return JsonResponse
     */
    public function scheduleList(): JsonResponse
    {
        try {
            Artisan::call('schedule:list');
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
     * Schedule Run.
     *
     * @return JsonResponse
     */
    public function scheduleRun(): JsonResponse
    {
        try {
            Artisan::call('schedule:run');
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
     * Schedule Test.
     *
     * @return JsonResponse
     */
    public function scheduleTest(): JsonResponse
    {
        try {
            Artisan::call('schedule:test');
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
     * Schedule Work.
     *
     * @return JsonResponse
     */
    public function scheduleWork(): JsonResponse
    {
        try {
            Artisan::call('schedule:work');
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
