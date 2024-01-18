<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\Output;

class CommonCommandsController extends Controller
{
    /**
     * About.
     *
     * @return JsonResponse
     */
    public function about(): JsonResponse
    {
        try {
            Artisan::call('about');
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
     * Clear Compiled.
     *
     * @return JsonResponse
     */
    public function clearCompiled(): JsonResponse
    {
        try {
            Artisan::call('clear-compiled');
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
     * Completion.
     *
     * @return JsonResponse
     */
    public function completion(): JsonResponse
    {
        try {
            Artisan::call('completion');
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
     * DB.
     *
     * @return JsonResponse
     */
    public function db(): JsonResponse
    {
        try {
            Artisan::call('db');
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
     * Docs.
     *
     * @return JsonResponse
     */
    public function docs(): JsonResponse
    {
        try {
            Artisan::call('docs');
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
     * Up.
     *
     * @return JsonResponse
     */
    public function up(): JsonResponse
    {
        try {
            Artisan::call('up');
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
     * Down.
     *
     * @return JsonResponse
     */
    public function down(): JsonResponse
    {
        try {
            Artisan::call('down');
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
     * Env.
     *
     * @return JsonResponse
     */
    public function env(): JsonResponse
    {
        try {
            Artisan::call('env');
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
     * Help.
     *
     * @return JsonResponse
     */
    public function help(): JsonResponse
    {
        try {
            Artisan::call('help');
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
     * Help.
     *
     * @return JsonResponse
     */
    public function inspire(): JsonResponse
    {
        try {
            Artisan::call('inspire');
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
     * List.
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        try {
            Artisan::call('list');
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
     * Migrate.
     *
     * @return JsonResponse
     */
    public function migrate(): JsonResponse
    {
        try {
            Artisan::call('migrate');
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
     * Optimize.
     *
     * @return JsonResponse
     */
    public function optimize(): JsonResponse
    {
        try {
            $output = new BufferedOutput();
            Artisan::call('optimize', [], $output);
            $result = $output->fetch();

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
