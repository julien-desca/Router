<?php
namespace Test\Router;

use PHPUnit\Framework\TestCase;

require_once 'Router/Route.php';
require_once 'RouteCallable_ForTest.php';
require_once 'Router/RouterException.php';
use Test\Router\RouteCallable_ForTest as RouteCallable;
use Router\RouterException;

class RouteCallableTest extends TestCase
{
    public function testCall(): void
    {
      $route = new RouteCallable('home/', function(){return true;} );
      $this->assertTrue($route->call());
    }

    public function testCallWithParam():void
    {
        $route = new RouteCallable('home/', function($e){return true;} );
        $route->setMatches(['foo']);
        $this->assertTrue($route->call());
    }

        public function testCallWithToFewArgumentRaiseException():void
        {
            $route = new RouteCallable('home/', function($e){return true;} );
            $this->expectException(RouterException::class);
            $route->call();
        }

}
