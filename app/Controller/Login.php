<?php
/**
 * User: lnn
 * Date: 2018/1/20 0020
 * Time: 11:13
 */

namespace App\Controller;

use App\Controller;
use App\Service\User;


class Login extends Controller
{
    public function index($request, $response, $next)
    {
        if (!$request->isPost()) {
            $this->container->view->render($response, 'login/index.twig');
        } else {
            // print_r($request->getParsedBody());


            $user = new User();
            $user->checkPwd();
        }
    }
}