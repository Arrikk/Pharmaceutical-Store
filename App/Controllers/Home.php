<?php

namespace App\Controllers;

use Core\Controller;
use Core\Http\Res;
/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function _index($get) # get as GET
    {
        Res::send("<pre>
        ---
        title: PHARMACY MGT API
        slug: Web/API/PHARMACY MGT_API
        page-type: web-api-overview
        tags:
          - API
          - PHARMACY MGT API
          - Reference
          - Landing
          - Experimental
          - Active
          - Standard
        ---
        </pre>");
    }
}
