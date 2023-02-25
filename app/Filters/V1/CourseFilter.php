<?php


namespace App\Filters\V1;

use App\Filters\APIFilter;

class CourseFilter extends APIFilter {

    protected $safeParms = [
        'id' => ['eq', 'gt', 'lt'],
        'name' => ['eq']
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '=<', 
        'gte' => '>=',
    ];

}