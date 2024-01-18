<?php

namespace Dhruvang\GenerateRules\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class MakeCommandsController extends Controller
{
    /**
     * Make Cast.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeCast(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        $extras = $validatedData['extras'];

        return $this->runArtisanCommand('make:cast', [
            'name' => $validatedData['name'],
            '--inbound' => $extras['inbound'] ?? false,
            '--force' => $extras['force'] ?? false,
            '--quiet' => $extras['quiet'] ?? false,
            '--help' => $extras['help'] ?? false,
        ]);
    }

    /**
     * Make Channel.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeChannel(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:channel', [
            'name' => $validatedData['name'],
            '--force' => $extras['force'] ?? false,
            '--quiet' => $extras['quiet'] ?? false,
            '--help' => $extras['help'] ?? false,
        ]);
    }

    /**
     * Make Command.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeCommand(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:command', [
            'name' => $validatedData['name'],
            '--test' => $extras['test'] ?? false,
            '--pest' => $extras['pest'] ?? false,
            '--force' => $extras['force'] ?? false,
            '--quiet' => $extras['quiet'] ?? false,
            '--help' => $extras['help'] ?? false,
        ]);
    }

    /**
     * Make Component.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeComponent(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:component', ['name' => $validatedData['name']]);
    }

    /**
     * Make Controller.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeController(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:controller', [
            'name' => $validatedData['name'],
        ]);
    }

    /**
     * Make Event.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeEvent(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:event', ['name' => $validatedData['name']]);
    }

    /**
     * Make Exception.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeException(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:exception', ['name' => $validatedData['name']]);
    }

    /**
     * Make Factory.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeFactory(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:factory', ['name' => $validatedData['name']]);
    }

    /**
     * Make Job.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeJob(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:job', ['name' => $validatedData['name']]);
    }

    /**
     * Make Listener.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeListener(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:listener', ['name' => $validatedData['name']]);
    }

    /**
     * Make Mail.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeMail(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:mail', ['name' => $validatedData['name']]);
    }

    /**
     * Make Middleware.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeMiddleware(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:middleware', ['name' => $validatedData['name']]);
    }

    /**
     * Make Migration.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeMigration(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:migration', ['name' => $validatedData['name']]);
    }

    /**
     * Make Model.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeModel(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:model', ['name' => $validatedData['name']]);
    }

    /**
     * Make Notification.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeNotification(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:notification', ['name' => $validatedData['name']]);
    }

    /**
     * Make Observer.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeObserver(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:observer', ['model' => $validatedData['model']]);
    }

    /**
     * Make Policy.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makePolicy(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:policy', ['name' => $validatedData['name']]);
    }

    /**
     * Make Provider.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeProvider(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:provider', ['name' => $validatedData['name']]);
    }

    /**
     * Make Request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeRequest(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:request', ['name' => $validatedData['name']]);
    }

    /**
     * Make Resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeResource(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:resource', ['name' => $validatedData['name']]);
    }

    /**
     * Make Seeder.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeSeeder(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:seeder', ['name' => $validatedData['name']]);
    }

    /**
     * Make Test.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeTest(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:test', ['name' => $validatedData['name']]);
    }

    /**
     * Make View.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function makeView(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'extras' => 'array'
        ]);

        return $this->runArtisanCommand('make:view', ['name' => $validatedData['name']]);
    }


    /**
     * Generic method to run an Artisan command and return a JsonResponse.
     *
     * @param string $command
     * @param array $params
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
