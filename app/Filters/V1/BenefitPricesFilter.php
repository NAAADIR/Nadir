<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class BenefitPricesFilter extends ApiFilter {
    protected $safeParms = [
        'name' => ['eq', 'ne'],
        'price' => ['eq', 'ne', 'lt', 'gt']
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