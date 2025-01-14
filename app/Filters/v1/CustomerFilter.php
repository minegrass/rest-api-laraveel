<?php

namespace App\Filters\v1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request; 

class CustomerFilter extends ApiFilter{
     protected $safeParms = [
        'name'=>['eq'],
        'type'=>['eq'],
        'email'=>['eq'],
        'address'=>['eq'],
        'city'=>['eq'],
        'state'=>['eq'],
        "postalCode" => ["eq","gt","lt"],
     ];


     protected $columnMap = [
        'postalCode' => 'postal_code',
     ];

     protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'lte' => '<=',
        'gte' => '>=',
     ];

      

}
