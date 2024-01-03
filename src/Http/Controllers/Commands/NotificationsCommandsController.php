<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class NotificationsCommandsController extends Controller
{
    /**
     * Notifications Table.
     *
     * @return JsonResponse
     */
    public function notificationsTable(): JsonResponse
    {
        try {
            Artisan::call('notifications:table');
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
