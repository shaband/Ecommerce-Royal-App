<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGatewayConfiguration extends Model
{
    
    protected $table = "payment_gateway_configurations";
    protected $fillable = ['id']; 
}
