<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class AddressesFilter extends ApiFilter {
    protected $safeParms = [
        'name' => ['eq', 'ne'],
        'street' => ['eq', 'ne'],
        'postcode' => ['eq', 'ne'],
        'city' => ['eq', 'ne'],
        'country_id' => ['eq', 'ne'],

    ];

    protected $columnMap = [
        'country_id' => 'country_id' 
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