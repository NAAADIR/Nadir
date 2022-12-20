<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class BenefitsFilter extends ApiFilter {
    protected $safeParms = [
        'name' => ['eq', 'ne'],
        'start_at' => ['eq', 'ne', 'lt', 'gt'],
        'end_at' => ['eq', 'ne', 'lt', 'gt'],
        'bedroom_id' => ['eq', 'ne'],
        'benefit_price_id' => ['eq', 'ne'],
        'user_id' => ['eq', 'ne'],
    ];

    protected $columnMap = [
        'bedroom_id' => 'bedroom_id',
        'benefit_price_id' => 'benefit_price_id',
        'user_id' => 'user_id',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];
}