<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class ConfigCommandsController extends Controller
{
    /**
     * Clear Config.
     *
     * @return JsonResponse
     */
    public function configClear(): JsonResponse
    {
        try {
            Artisan::call('config:clear');
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
    public function configCache(): JsonResponse
    {
        try {
            $output = new BufferedOutput();
            Artisan::call('config:cache', [], $output);
            $result = $output->fetch();

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
    public function configShow(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
               'config' => ['string', 'max:50', 'min:1']
            ]);
            Artisan::call('config:show', ['config' => $request['config']]);
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
