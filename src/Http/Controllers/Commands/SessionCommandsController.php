<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SessionCommandsController extends Controller
{
    /**
     * View Cache.
     *
     * @return JsonResponse
     */
    public function sessionTable(): JsonResponse
    {
        try {
            Artisan::call('session:table');
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
     * View Clear.
     *
     * @return JsonResponse
     */
    public function viewClear(): JsonResponse
    {
        try {
            Artisan::call('view:clear');
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
