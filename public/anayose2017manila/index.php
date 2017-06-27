<?php
require __DIR__ . '/../../bootstrap/autoload.php';

$app = require_once __DIR__ . '/../../bootstrap/app.php';
$app->bind('path.public', function () {
	return base_path() . '/public';
});

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
	$request = App\Http\AnaRequest::capture()
);

$response->send();

$kernel->terminate($request, $response);
