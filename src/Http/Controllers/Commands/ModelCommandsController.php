<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ModelCommandsController extends Controller
{
    /**
     * Model Prune.
     *
     * @return JsonResponse
     */
    public function modelPrune(): JsonResponse
    {
        try {
            Artisan::call('model:prune');
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
     * Model Show.
     *
     * @return JsonResponse
     */
    public function modelShow(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'model' => ['string', 'min:3', 'max:30']
            ]);
            Artisan::call('model:show', ['model' => $validatedData['model']]);
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
