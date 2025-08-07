<?php
namespace App\Filters\V1;
use App\FIlters\ApiFilter;
use Illuminate\Http\Request;

class InvoicesFilter extends ApiFilter{

    protected $safeParms =[
        'customerID' =>['eq'],
        'amount' =>['eq', 'lt','lte', 'gt','gte'],
        'status' =>['eq', 'ne'],
        'billedDate' =>['eq', 'lt','lte', 'gt','gte'],
        'paidDate' =>['eq', 'lt','lte', 'gt','gte']
    ];
    protected $columMap =[
    'customerID'=> 'customer_id',
    'billedDate'=> 'billed_date',
    'paidDate'=> 'paid_date'
    ];
    protected $operatorMap =[
        'eq' =>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',
        'ne'=>'!='
    ];
    
    
}