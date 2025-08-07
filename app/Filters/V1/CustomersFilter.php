<?php
namespace App\Filters\V1;
use App\FIlters\ApiFilter;
use Illuminate\Http\Request;

class CustomersFilter extends ApiFilter{
    protected $safeParms =[
        'name' =>['eq'],
        'type' =>['eq'],
        'email' =>['eq'],
        'address' =>['eq'],
        'city' =>['eq'],
        'state' =>['eq'],
        'postalCode' =>['eq','gt','lt']
    ];
    protected $columMap =[
    'postalCode'=> 'postal_code'
    ];
    protected $operatorMap =[
        'eq' =>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>='
    ];
    
}