<?php 


namespace App\Controller;

use App\Controller;

class Index extends Controller
{

    public function index($request, $response, $next)
    {
        $nameKey = $this->container->csrf->getTokenNameKey();
        $valueKey = $this->container->csrf->getTokenValueKey();
        $name = $request->getAttribute($nameKey);
        $value = $request->getAttribute($valueKey);
        $this->container->view->render($response, 'index.twig', [
            'nameKey' => $nameKey,
            'valueKey' => $valueKey,
            'name' => $name,
            'value' => $value
        ]);
    }
}






