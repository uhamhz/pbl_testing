<?php
// Autoload files or include them manually
spl_autoload_register(function ($class) {
    $paths = ['controller', 'Model', 'view'];
    foreach ($paths as $path) {
        $file = __DIR__ . "/$path/$class.php";
        if (file_exists($file)) {
            include_once $file;
        }
    }
});
// Load routes from web.app
$routes = include __DIR__ . '/web.php';
// Parse the current URL and request method
$requestUri = strtok($_SERVER['REQUEST_URI'], '?');
$requestMethod = $_SERVER['REQUEST_METHOD'];
// Find the matching route
$foundRoute = null;
$parameters = [];
foreach ($routes[$requestMethod] ?? [] as $route => $handler) {
    $pattern = preg_replace('/\{[^\/]+\}/', '([^/]+)', $route); // Convert {id} to regex
    $pattern = "#^" . $pattern . "$#";
    if (preg_match($pattern, $requestUri, $matches)) {
        $foundRoute = $handler;
        $parameters = array_slice($matches, 1); // Capture dynamic parameters
        break;
    }
}
if ($foundRoute) {
    list($controllerName, $methodName) = explode('@', $foundRoute);
    $controller = new $controllerName();
    call_user_func_array([$controller, $methodName], $parameters);
} else {
    http_response_code(404);
    echo "404 - Page Not Found";
}
