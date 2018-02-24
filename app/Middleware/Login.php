<?php
/**
 * User: lnn
 * Date: 2018/1/19 0019
 * Time: 16:55
 */

namespace App\Middleware;

use App\Service\Login as LoginService;

class Login
{
    private $container;
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function __invoke($request, $response, $next)
    {
        if (!LoginService::isRegister() and $request->getAttribute('route')->getName() != 'login') {
            return $response->withRedirect($this->container->get('router')->pathFor('login'));
        }
        $response = $next($request, $response);
        return $response;
    }
}