<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class PaymentsFilter extends ApiFilter {
    protected $safeParms = [
        'creditCardName' => ['eq', 'ne'],
        'creditCardNumber' => ['eq', 'ne'],
        'cvv' => ['eq', 'ne'],
        'start_at' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'end_at' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'payment_typesID' => ['eq', 'ne'],
    ];

    protected $columnMap = [
        'payment_typesID' => 'payment_type_id' 
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