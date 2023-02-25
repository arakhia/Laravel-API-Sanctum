<?php


namespace App\Filters\V1;

use App\Filters\APIFilter;

class StudentFilter extends APIFilter {

    protected $safeParms = [
        'id' => ['eq', 'gt', 'lt'],
        'name' => ['eq'],
        'email' => ['eq'],
        'dateOfBirth' => ['eq', 'gt', 'lt'],
        'major' => ['eq'],
        'address' => ['eq'],
        'status' => ['eq']
    ];

    protected $columnMap = [
        'dateOfBirth' => 'date_of_birth'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '=<', 
        'gte' => '>=',
    ];

}