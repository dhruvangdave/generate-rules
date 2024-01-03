<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SailCommandsController extends Controller
{
    /**
     * Sail Add.
     *
     * @return JsonResponse
     */
    public function sailAdd(): JsonResponse
    {
        try {
            Artisan::call('sail:add');
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
     * Sail Install.
     *
     * @return JsonResponse
     */
    public function sailInstall(): JsonResponse
    {
        try {
            Artisan::call('sail:install');
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
     * Sail Publish.
     *
     * @return JsonResponse
     */
    public function sailPublish(): JsonResponse
    {
        try {
            Artisan::call('sail:publish');
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
