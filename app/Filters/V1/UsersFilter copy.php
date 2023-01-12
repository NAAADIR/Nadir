<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class UsersFilter extends ApiFilter {
    protected $safeParms = [
        'lastname' => ['eq', 'ne'],
        'firstname' => ['eq', 'ne'],
        'email' => ['eq', 'ne'],
        'gender' => ['eq', 'ne'],
        'phone_office' => ['eq', 'ne'],
        'phone_mobile' => ['eq', 'ne'],
        'role' => ['eq', 'ne'],
    ];

    protected $columnMap = [];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];
}