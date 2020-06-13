<?php
require "../bootstrap.php";

// This file simply acts as a router for the API
// Returns 404 if route requested is not found

use App\System\Routes\RouteTest;

RouteTest::testAll([
    // ['test' => 'auth', 'controller' => AuthController::class],
]);

header("HTTP/1.1 404 Not Found");
exit();
