<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Support\Facades\Artisan;

class MigrateCommandsController extends Controller
{
    /**
     * Migrate Fresh.
     *
     * @return JsonResponse
     */
    public function migrateFresh(): JsonResponse
    {
        try {
            Artisan::call('migrate:fresh');
            $result = Artisan::output();

            return response()->json([
                'result' => $result,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Migrate Install.
     *
     * @return JsonResponse
     */
    public function migrateInstall(): JsonResponse
    {
        try {
            Artisan::call('migrate:install');
            $result = Artisan::output();

            return response()->json([
                'result' => $result,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Migrate Refresh.
     *
     * @return JsonResponse
     */
    public function migrateRefresh(): JsonResponse
    {
        try {
            Artisan::call('migrate:refresh');
            $result = Artisan::output();

            return response()->json([
                'result' => $result,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Migrate Reset.
     *
     * @return JsonResponse
     */
    public function migrateReset(): JsonResponse
    {
        try {
            Artisan::call('migrate:reset');
            $result = Artisan::output();

            return response()->json([
                'result' => $result,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Migrate Rollback.
     *
     * @return JsonResponse
     */
    public function migrateRollback(): JsonResponse
    {
        try {
            Artisan::call('migrate:rollback');
            $result = Artisan::output();

            return response()->json([
                'result' => $result,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Migrate Status.
     *
     * @return JsonResponse
     */
    public function migrateStatus(): JsonResponse
    {
        try {
            Artisan::call('migrate:status');
            $result = Artisan::output();

            return response()->json([
                'result' => $result,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
