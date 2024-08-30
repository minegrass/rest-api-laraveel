<?php

namespace App\Filters\v1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request; 

class InvoiceFilter extends ApiFilter{

   // $table->integer('customer_id');
   // $table->integer('amount');
   // $table->string('status'); //billed,paid,void
   // $table->dateTime('billed_date');
   // $table->dateTime('paid_date')->nullable();


     protected $safeParms = [
        'customerId'=>['eq'],
        'amount'=>['eq','lt','gt','lte','gte'],
        'status'=>['eq','ne'],
        'billedDate'=>['eq','lt','gt','lte','gte'],
        'paidDate'=>['eq','lt','gt','lte','gte'],
     ];


     protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate'=>'billed_date',
        'paidDate'=>'paid_date',
     ];

     protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'lte' => '<=',
        'gte' => '>=',
        'ne'=>'!=',
     ];


}
