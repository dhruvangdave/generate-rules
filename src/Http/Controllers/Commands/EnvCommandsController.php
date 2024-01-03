<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class EnvCommandsController extends Controller
{
    /**
     * Clear Config.
     *
     * @return JsonResponse
     */
    public function envEncrypt(): JsonResponse
    {
        try {
            Artisan::call('env:encrypt');
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
     * Config Cache.
     *
     * @return JsonResponse
     */
    public function envDecrypt(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'key' => ['string', 'min:10']
            ], [
                'key.regex' => 'The key must be a single word without spaces.'
            ]);

            Artisan::call('env:decrypt', ['--key' => $validatedData['key']]);
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
