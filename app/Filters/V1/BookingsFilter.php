<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class BookingsFilter extends ApiFilter {
    protected $safeParms = [
        'start_at' => ['eq', 'ne', 'lt','gt'],
        'end_at' => ['eq', 'ne', 'lt','gt'],
        'amount' => ['eq', 'ne', 'lt','gt'],
        'user_id' => ['eq', 'ne'],
        'payment_id' => ['eq', 'ne'],
    ];

    protected $columnMap = [
        'user_id' => 'user_id',
        'payment_id' => 'payment_id'
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