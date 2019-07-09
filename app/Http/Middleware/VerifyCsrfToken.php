<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;


use Auth ; 

class VerifyCsrfToken extends Middleware
{



	// $client = Auth::guard('client')->user() ; 


    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
    	
    	"client/check_payment"

    ];
}
