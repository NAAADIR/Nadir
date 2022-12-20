<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class HotelsFilter extends ApiFilter {
    protected $safeParms = [
        'name' => ['eq', 'ne'],
        'street' => ['eq', 'ne'],
        'postcode' => ['eq', 'ne'],
        'phone' => ['eq', 'ne'],
        'hotel_class_id' => ['eq', 'ne'],
    ];

    protected $columnMap = [
        'hotel_class_id' => 'hotel_class_id'
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