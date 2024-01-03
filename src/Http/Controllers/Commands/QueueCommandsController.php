<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class QueueCommandsController extends Controller
{
    /**
     * Queue Batches Table.
     *
     * @return JsonResponse
     */
    public function queueBatchesTable(): JsonResponse
    {
        return $this->runArtisanCommand('queue:batches-table');
    }

    /**
     * Queue Clear.
     *
     * @return JsonResponse
     */
    public function queueClear(): JsonResponse
    {
        return $this->runArtisanCommand('queue:clear');
    }

    /**
     * Queue Failed.
     *
     * @return JsonResponse
     */
    public function queueFailed(): JsonResponse
    {
        return $this->runArtisanCommand('queue:failed');
    }

    /**
     * Queue Failed Table.
     *
     * @return JsonResponse
     */
    public function queueFailedTable(): JsonResponse
    {
        return $this->runArtisanCommand('queue:failed-table');
    }

    /**
     * Queue Flush.
     *
     * @return JsonResponse
     */
    public function queueFlush(): JsonResponse
    {
        return $this->runArtisanCommand('queue:flush');
    }

    /**
     * Queue Forget.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function queueForget(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'id' => ['string', 'min:1', 'max:50']
        ]);
        return $this->runArtisanCommand('queue:forget', ['id' => $validatedData['id']]);
    }

    /**
     * Queue Listen.
     *
     * @return JsonResponse
     */
    public function queueListen(): JsonResponse
    {
        return $this->runArtisanCommand('queue:listen');
    }

    /**
     * Queue Monitor.
     *
     * @return JsonResponse
     */
    public function queueMonitor(): JsonResponse
    {
        return $this->runArtisanCommand('queue:monitor');
    }

    /**
     * Queue Prune Batches.
     *
     * @return JsonResponse
     */
    public function queuePruneBatches(): JsonResponse
    {
        return $this->runArtisanCommand('queue:prune-batches');
    }

    /**
     * Queue Prune Failed.
     *
     * @return JsonResponse
     */
    public function queuePruneFailed(): JsonResponse
    {
        return $this->runArtisanCommand('queue:prune-failed');
    }

    /**
     * Queue Restart.
     *
     * @return JsonResponse
     */
    public function queueRestart(): JsonResponse
    {
        return $this->runArtisanCommand('queue:restart');
    }

    /**
     * Queue Retry.
     *
     * @return JsonResponse
     */
    public function queueRetry(): JsonResponse
    {
        return $this->runArtisanCommand('queue:retry');
    }

    /**
     * Queue Retry Batch.
     *
     * @return JsonResponse
     */
    public function queueRetryBatch(): JsonResponse
    {
        return $this->runArtisanCommand('queue:retry-batch');
    }

    /**
     * Queue Table.
     *
     * @return JsonResponse
     */
    public function queueTable(): JsonResponse
    {
        return $this->runArtisanCommand('queue:table');
    }

    /**
     * Queue Work.
     *
     * @return JsonResponse
     */
    public function queueWork(): JsonResponse
    {
        return $this->runArtisanCommand('queue:work');
    }

    /**
     * Generic method to run an Artisan command and return a JsonResponse.
     *
     * @param string $command
     * @return JsonResponse
     */
    protected function runArtisanCommand(string $command, array $params = []): JsonResponse
    {
        try {
            $output = new BufferedOutput();
            Artisan::call($command, $params, $output);
            $result = $output->fetch();

            return response()->json(['result' => $result]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
