<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class KeyCommandsController extends Controller
{
    /**
     * Key Generate.
     *
     * @return JsonResponse
     */
    public function keyGenerate(): JsonResponse
    {
        try {
            Artisan::call('key:generate');
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
