<?php

namespace App\Classes;

use Symfony\Component\HttpFoundation\Request;

class LocaleClass
{
    private Request $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function setRoute()
    {
        return $this->request->attributes->get("_route");
    }

    public function setRouteParams()
    {
        return $this->request->attributes->get("_route_params");
    }
}