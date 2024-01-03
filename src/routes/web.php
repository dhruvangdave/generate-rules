<?php

use \Illuminate\Support\Facades\Route;

Route::get('dashboard', 'GenerateRulesController@index');

Route::get('/{view?}', 'GenerateRulesController@index')->where('view', '(.*)')->name('generate-rules');

// Artisan Commands...
Route::post('/generate-rules-api/commands', 'CommandsController@index');
Route::get('/generate-rules-api/commands/{telescopeEntryId}', 'CommandsController@show');

Route::post('/generate-rules-api/cache-clear', 'Commands\\CacheCommandsController@cacheClear');
Route::post('/generate-rules-api/cache-forget', 'Commands\\CacheCommandsController@cacheForget');
Route::post('/generate-rules-api/cache-prune-stale-tags', 'Commands\\CacheCommandsController@cachePruneStaleTags');
Route::post('/generate-rules-api/cache-table', 'Commands\\CacheCommandsController@cacheTable');

Route::post('/generate-rules-api/config-clear', 'Commands\\ConfigCommandsController@configClear');
Route::post('/generate-rules-api/config-cache', 'Commands\\ConfigCommandsController@configCache');
Route::post('/generate-rules-api/config-show', 'Commands\\ConfigCommandsController@configShow');

Route::post('/generate-rules-api/auth-clear-resets', 'Commands\\AuthCommandsController@authClearResets');

Route::post('/generate-rules-api/channel-list', 'Commands\\ChannelCommandsController@channelList');

Route::post('/generate-rules-api/db-monitor', 'Commands\\DbCommandsController@dbMonitor');
Route::post('/generate-rules-api/db-seed', 'Commands\\DbCommandsController@dbSeed');
Route::post('/generate-rules-api/db-show', 'Commands\\DbCommandsController@dbShow');
Route::post('/generate-rules-api/db-table', 'Commands\\DbCommandsController@dbTable');
Route::post('/generate-rules-api/db-wipe', 'Commands\\DbCommandsController@dbWipe');

Route::post('/generate-rules-api/env-encrypt', 'Commands\\EnvCommandsController@envEncrypt');
Route::post('/generate-rules-api/env-decrypt', 'Commands\\EnvCommandsController@envDecrypt');

Route::post('/generate-rules-api/event-cache', 'Commands\\EventCommandsController@eventCache');
Route::post('/generate-rules-api/event-clear', 'Commands\\EventCommandsController@eventClear');
Route::post('/generate-rules-api/event-generate', 'Commands\\EventCommandsController@eventGenerate');
Route::post('/generate-rules-api/event-list', 'Commands\\EventCommandsController@eventList');

Route::post('/generate-rules-api/key-generate', 'Commands\\KeyCommandsController@keyGenerate');

Route::post('/generate-rules-api/lang-publish', 'Commands\\LangCommandsController@langPublish');

Route::post('/generate-rules-api/view-cache', 'Commands\\ViewCommandsController@viewCache');
Route::post('/generate-rules-api/view-clear', 'Commands\\ViewCommandsController@viewClear');

Route::post('/generate-rules-api/vendor-publish', 'Commands\\VendorCommandsController@vendorPublish');

Route::post('/generate-rules-api/stub-publish', 'Commands\\StubCommandsController@stubPublish');

Route::post('/generate-rules-api/storage-link', 'Commands\\StorageCommandsController@storageLink');

Route::post('/generate-rules-api/session-table', 'Commands\\SessionCommandsController@sessionTable');

Route::post('/generate-rules-api/schema-dump', 'Commands\\SchemaCommandsController@schemaDump');

Route::post('/generate-rules-api/schedule-clear-cache', 'Commands\\ScheduleCommandsController@scheduleClearCache');
Route::post('/generate-rules-api/schedule-interrupt', 'Commands\\ScheduleCommandsController@scheduleInterrupt');
Route::post('/generate-rules-api/schedule-list', 'Commands\\ScheduleCommandsController@scheduleList');
Route::post('/generate-rules-api/schedule-run', 'Commands\\ScheduleCommandsController@scheduleRun');
Route::post('/generate-rules-api/schedule-test', 'Commands\\ScheduleCommandsController@scheduleTest');
Route::post('/generate-rules-api/schedule-work', 'Commands\\ScheduleCommandsController@scheduleWork');

Route::post('/generate-rules-api/sanctum-prune-expired', 'Commands\\SanctumCommandsController@sanctumPruneExpired');

Route::post('/generate-rules-api/sail-add', 'Commands\\SailCommandsController@sailAdd');
Route::post('/generate-rules-api/sail-install', 'Commands\\SailCommandsController@sailInstall');
Route::post('/generate-rules-api/sail-publish', 'Commands\\SailCommandsController@sailPublish');

Route::post('/generate-rules-api/route-cache', 'Commands\\RouteCommandsController@routeCache');
Route::post('/generate-rules-api/route-clear', 'Commands\\RouteCommandsController@routeClear');
Route::post('/generate-rules-api/route-list', 'Commands\\RouteCommandsController@routeList');

Route::post('/generate-rules-api/queue-batches-table', 'Commands\\QueueCommandsController@queueBatchesTable');
Route::post('/generate-rules-api/queue-clear', 'Commands\\QueueCommandsController@queueClear');
Route::post('/generate-rules-api/queue-failed', 'Commands\\QueueCommandsController@queueFailed');
Route::post('/generate-rules-api/queue-failed-table', 'Commands\\QueueCommandsController@queueFailedTable');
Route::post('/generate-rules-api/queue-flush', 'Commands\\QueueCommandsController@queueFlush');
Route::post('/generate-rules-api/queue-forget', 'Commands\\QueueCommandsController@queueForget');
Route::post('/generate-rules-api/queue-listen', 'Commands\\QueueCommandsController@queueListen');
Route::post('/generate-rules-api/queue-monitor', 'Commands\\QueueCommandsController@queueMonitor');
Route::post('/generate-rules-api/queue-prune-batches', 'Commands\\QueueCommandsController@queuePruneBatches');
Route::post('/generate-rules-api/queue-prune-failed', 'Commands\\QueueCommandsController@queuePruneFailed');
Route::post('/generate-rules-api/queue-restart', 'Commands\\QueueCommandsController@queueRestart');
Route::post('/generate-rules-api/queue-retry', 'Commands\\QueueCommandsController@queueRetry');
Route::post('/generate-rules-api/queue-retry-batch', 'Commands\\QueueCommandsController@queueRetryBatch');
Route::post('/generate-rules-api/queue-table', 'Commands\\QueueCommandsController@queueTable');
Route::post('/generate-rules-api/queue-work', 'Commands\\QueueCommandsController@queueWork');

Route::post('/generate-rules-api/package-discover', 'Commands\\PackageCommandsController@packageDiscover');

Route::post('/generate-rules-api/optimize-clear', 'Commands\\OptimizeCommandsController@optimizeClear');

Route::post('/generate-rules-api/notifications-table', 'Commands\\NotificationsCommandsController@notificationsTable');

Route::post('/generate-rules-api/model-prune', 'Commands\\ModelCommandsController@modelPrune');
Route::post('/generate-rules-api/model-show', 'Commands\\ModelCommandsController@modelShow');

Route::post('/generate-rules-api/make-cast', 'Commands\\MakeCommandsController@makeCast');
Route::post('/generate-rules-api/make-channel', 'Commands\\MakeCommandsController@makeChannel');
Route::post('/generate-rules-api/make-command', 'Commands\\MakeCommandsController@makeCommand');
Route::post('/generate-rules-api/make-component', 'Commands\\MakeCommandsController@makeComponent');
Route::post('/generate-rules-api/make-controller', 'Commands\\MakeCommandsController@makeController');
Route::post('/generate-rules-api/make-event', 'Commands\\MakeCommandsController@makeEvent');
Route::post('/generate-rules-api/make-exception', 'Commands\\MakeCommandsController@makeException');
Route::post('/generate-rules-api/make-factory', 'Commands\\MakeCommandsController@makeFactory');
Route::post('/generate-rules-api/make-job', 'Commands\\MakeCommandsController@makeJob');
Route::post('/generate-rules-api/make-listener', 'Commands\\MakeCommandsController@makeListener');
Route::post('/generate-rules-api/make-mail', 'Commands\\MakeCommandsController@makeMail');
Route::post('/generate-rules-api/make-middleware', 'Commands\\MakeCommandsController@makeMiddleware');
Route::post('/generate-rules-api/make-migration', 'Commands\\MakeCommandsController@makeMigration');
Route::post('/generate-rules-api/make-model', 'Commands\\MakeCommandsController@makeModel');
Route::post('/generate-rules-api/make-notification', 'Commands\\MakeCommandsController@makeNotification');
Route::post('/generate-rules-api/make-observer', 'Commands\\MakeCommandsController@makeObserver');
Route::post('/generate-rules-api/make-policy', 'Commands\\MakeCommandsController@makePolicy');
Route::post('/generate-rules-api/make-provider', 'Commands\\MakeCommandsController@makeProvider');
Route::post('/generate-rules-api/make-request', 'Commands\\MakeCommandsController@makeRequest');
Route::post('/generate-rules-api/make-resource', 'Commands\\MakeCommandsController@makeResource');
Route::post('/generate-rules-api/make-rule', 'Commands\\MakeCommandsController@makeRule');
Route::post('/generate-rules-api/make-scope', 'Commands\\MakeCommandsController@makeScope');
Route::post('/generate-rules-api/make-seeder', 'Commands\\MakeCommandsController@makeSeeder');
Route::post('/generate-rules-api/make-test', 'Commands\\MakeCommandsController@makeTest');
Route::post('/generate-rules-api/make-view', 'Commands\\MakeCommandsController@makeView');

//Route::post('/generate-rules-api/clear-config', 'CommandsController@clearConfig');
