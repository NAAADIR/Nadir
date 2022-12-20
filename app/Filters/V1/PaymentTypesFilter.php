<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class PaymentTypesFilter extends ApiFilter {
    protected $safeParms = [
        'code' => ['eq', 'ne'],
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