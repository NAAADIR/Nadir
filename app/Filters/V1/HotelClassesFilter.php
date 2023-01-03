<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class  HotelClassesFilter extends ApiFilter {
    protected $safeParms = [
        'star_rating' => ['eq', 'ne']
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