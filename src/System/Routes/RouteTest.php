<?php

namespace App\System\Routes;

class RouteTest
{
    public static function test(String $test, $controller)
    {
        $originalUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode('/', $originalUri);

        // If the last uri is blank, remove the entry
        if ($uri[count($uri) - 1] == '')
        {
            array_pop($uri);
        }

        $testUri = explode('/', $test);

        $params = [];

        if (count($uri) !== count($testUri))
        {
            return false;
        }

        for ($index = 1; $index < count($uri); $index++)
        {
            if (($testUri[$index][0] == '{') && ($testUri[$index][strlen($testUri[$index]) - 1] == '}'))
            {
                // This is a variable, always match and continue
                $params[substr($testUri[$index], 1, strlen($testUri[$index]) - 2)] = $uri[$index];
            }
            elseif ($testUri[$index] !== $uri[$index])
            {
                return false;
            }
        }

        $controllerObject = new $controller();

        // Route matched, execute now and return true
        $controllerObject->processRequest(
            $_SERVER["REQUEST_METHOD"],
            $originalUri,
            $params
        );

        return true;
    }

    public static function testAll(Array $tests)
    {
        foreach ($tests as $test)
        {
            if (self::test($test['test'], $test['controller']))
            {
                // We've found a mtaching route, exit now
                return true;
            }
        }
        return false;
    }
}