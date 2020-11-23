####Parameter
    market: Market keyname            
---
```php
<?php
include_once '../php-thodex-api.php';
$thodex = new Thodex\API('api_key', 'api_secret');
```

####
```php
$result = $thodex->getMarketHistory('BTCTRY');
```

<details>
 <summary>Show Response</summary>

    stdClass Object
    (
        [error] => 
        [result] => Array
            (
                [0] => stdClass Object
                    (
                        [id] => 6899441
                        [time] => 1606164989.4137
                        [price] => 145061
                        [amount] => 0.029849
                        [type] => sell
                    )
    
                [1] => stdClass Object
                    (
                        [id] => 6899435
                        [time] => 1606164983.3196
                        [price] => 145222.15
                        [amount] => 0.003053
                        [type] => sell
                    )
    
                [2] => stdClass Object
                    (
                        [id] => 6899426
                        [time] => 1606164972.3354
                        [price] => 145248.08
                        [amount] => 0.069968
                        [type] => sell
                    )
    
                [3] => stdClass Object
                    (
                        [id] => 6899416
                        [time] => 1606164961.3072
                        [price] => 145446.99
                        [amount] => 0.027473
                        [type] => buy
                    )
                ....
            )
    )
</details>