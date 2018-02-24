<?php
/**
 * User: lnn
 * Date: 2018/1/19 0019
 * Time: 16:37
 */

namespace App;

use Slim\Container;
use App\Extension\Regedit;

class Controller
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
        Regedit::set('parsedBody', $container->get('request')->getParsedBody());
        Regedit::set('parsedBody', $container->get('request')->getQueryParams());
    }
}