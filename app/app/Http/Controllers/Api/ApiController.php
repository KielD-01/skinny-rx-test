<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{

    /**
     * Sets needed headers for the API data processing and response
     */
    public function __construct()
    {
        request()->headers->set('Accept', 'application/json');
        request()->headers->set('Content', 'application/json');
    }
}
