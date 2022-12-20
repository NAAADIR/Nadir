<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class BedroomTypesFilter extends ApiFilter {
    protected $safeParms = [
        'name' => ['eq', 'ne']
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