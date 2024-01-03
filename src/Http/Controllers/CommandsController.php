<?php

namespace Dhruvang\GenerateRules\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Dhruvang\GenerateRules\GenerateRules;
use Illuminate\Support\Facades\Artisan;

class CommandsController extends Controller
{
    /**
     * Display the GenerateRules view.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'entries' => 'Okay',
            'status' => 'Status',
        ]);
    }

    /**
     * Clear View.
     *
     * @return JsonResponse
     */
    public function clearView(): JsonResponse
    {
        try {
            Artisan::call('view:clear');
            $result = Artisan::output();

            return response()->json([
                'result' => $result,
                'alert' => [
                    'message' => 'View cleared successfully',
                    'type' => 'success',
                    'autoClose' => true,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
