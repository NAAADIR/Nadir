<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class BedroomsFilter extends ApiFilter {
    protected $safeParms = [
        'name' => ['eq', 'ne'],
        'phone_bedroom' => ['eq', 'ne'],
        'price' => ['eq', 'ne', 'lt', 'gt'],
        'bedroom_type_id' => ['eq', 'ne'],
        'hotel_id' => ['eq', 'ne'],

    ];

    protected $columnMap = [
        'bedroom_type_id' => 'bedroom_type_id',
        'hotel_id' => 'hotel_id'
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