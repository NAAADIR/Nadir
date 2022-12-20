<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class CountriesFilter extends ApiFilter {
    protected $safeParms = [
        'code' => ['eq', 'ne'],
        'name' => ['eq', 'ne'],
        'priority' => ['eq', 'ne', 'lt', 'gt']
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