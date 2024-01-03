<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ChannelCommandsController extends Controller
{
    /**
     * Clear Config.
     *
     * @return JsonResponse
     */
    public function channelList(): JsonResponse
    {
        try {
            Artisan::call('channel:list');
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
