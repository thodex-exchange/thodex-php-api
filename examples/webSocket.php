<?php
require '../vendor/autoload.php';

$markets = ['BTCTRY','ETHTRY','LTCTRY','HOTTRY', 'DASHTRY', 'DOGETRY', 'LINKTRY'];  // Add the markets you want to follow.
$callableFunction = 'anotherClass::callableFunction';

Thodex\API::socketReader($markets, $callableFunction);

class anotherClass
{
    /**
     * @param string $method
     * @param string $marketName
     * @param object $params
     * @return bool
     */
    public static function callableFunction(string $method, string $marketName, object $params)
    {
        /*
         * If you want to close the socket connection.
         * You can return 'true' anywhere in this function.
         */

        switch($method){
            case 'price':
                echo 'Method : ' . $method . PHP_EOL;                   # price
                echo 'marketName : ' . $marketName . PHP_EOL;           # BTCTRY etc.
                echo 'price : ' . $params->price  . PHP_EOL . PHP_EOL;  # 139082.44
                    # ... your process
                        # return true;
                break;
            case 'deals':
                echo 'Method : ' . $method . PHP_EOL;                   # deals
                echo 'marketName : ' . $marketName . PHP_EOL;           # BTCTRY etc.
                echo 'price : ' . $params->price  . PHP_EOL;            # price         => 139082.44
                echo 'id : ' . $params->id  . PHP_EOL;                  # deal id       => 7296837
                echo 'time : ' . $params->time  . PHP_EOL;              # deal time     => 1606392244.4197
                echo 'amount : ' . $params->amount  . PHP_EOL;          # deal amount   => 0.3
                echo 'type : ' . $params->type  . PHP_EOL . PHP_EOL;    # type          => buy | sell
                    # ... your process
                        # return true;
                break;
            case 'state':
                echo 'Method : ' . $method . PHP_EOL;               # state
                echo 'marketName : ' . $marketName . PHP_EOL;       # BTCTRY etc.
                echo 'period : ' . $params->period . PHP_EOL;       # 86400 ( 1 day)
                echo 'deal : ' . $params->deal . PHP_EOL;           # daily deal  ( volume * order price )
                echo 'last : ' . $params->last . PHP_EOL;           # last value
                echo 'volume : ' . $params->volume . PHP_EOL;       # daily market volume
                echo 'open : ' . $params->open . PHP_EOL;           # open price
                echo 'close : ' . $params->close . PHP_EOL;         # daily close value ( probably equal last value for this usage )
                echo 'high : ' . $params->high . PHP_EOL;           # daily high value
                echo 'low : ' . $params->low .  PHP_EOL . PHP_EOL;  # daily low value
                    # ... your process
                        # return true;
                break;
        }
    }
}