<?php


namespace App\Filters\V1;

use App\Filters\APIFilter;

class AssignmentFilter extends APIFilter {

    protected $safeParms = [
        'id' => ['eq', 'gt', 'lt'],
        'courseId' => ['eq'],
        'studentId' => ['eq'],
        'grade' => ['eq', 'gt', 'lt'],
        'openedAt' => ['eq', 'gt', 'lt'],
        'solvedAt' => ['eq', 'gt', 'lt'],
        'status' => ['eq']
    ];

    protected $columnMap = [
        'courseId' => 'course_id',
        'studentId' => 'student_id',
        'openedAt' => 'opened_at',
        'solvedAt' => 'solved_at',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '=<', 
        'gte' => '>=',
    ];

}