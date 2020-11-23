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
$result = $thodex->getMarketSummary();
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
                        [name] => BTCTRY
                        [ask_count] => 321
                        [ask_amount] => 57.543172
                        [bid_count] => 660
                        [bid_amount] => 3461.146019
                    )
    
                [1] => stdClass Object
                    (
                        [name] => ETHTRY
                        [ask_count] => 319
                        [ask_amount] => 780.13881
                        [bid_count] => 312
                        [bid_amount] => 4807.26333
                    )
    
                [2] => stdClass Object
                    (
                        [name] => LTCTRY
                        [ask_count] => 448
                        [ask_amount] => 4833.41879
                        [bid_count] => 543
                        [bid_amount] => 2488.05534
                    )
                ....
            )
    
    )
</details>