##### Parameter
    (required)  market  : Market keyname
    (optional)  last_id : market history id 
    $result = $thodex->getOpenOrders('BTCTRY', $last_id);
---
```php
<?php
include_once '../php-thodex-api.php';
$thodex = new Thodex\API(); // 'api_key', 'api_secret' not required
$result = $thodex->marketHistory('BTCTRY');
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
                        [id] => 6968562
                        [time] => 1606200294.9146
                        [price] => 145031.99
                        [amount] => 0.030155
                        [type] => sell
                    )
    
                [1] => stdClass Object
                    (
                        [id] => 6968551
                        [time] => 1606200293.5195
                        [price] => 145020.46
                        [amount] => 0.125508
                        [type] => sell
                    )
    
                [2] => stdClass Object
                    (
                        [id] => 6968548
                        [time] => 1606200293.2478
                        [price] => 145013.46
                        [amount] => 0.118248
                        [type] => buy
                    )
    
                [3] => stdClass Object
                    (
                        [id] => 6968522
                        [time] => 1606200290.4689
                        [price] => 145015.04
                        [amount] => 0.0203
                        [type] => buy
                    )
    
                [4] => stdClass Object
                    (
                        [id] => 6968452
                        [time] => 1606200252.3544
                        [price] => 145007.11
                        [amount] => 0.003604
                        [type] => sell
                    )
    
                [5] => stdClass Object
                    (
                        [id] => 6968438
                        [time] => 1606200243.2884
                        [price] => 145085.71
                        [amount] => 0.080172
                        [type] => sell
                    )
                ...
    
            )
    
    )
</details>

```php
$result = $thodex->marketHistory('BTCTRY', 6968548);
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
                        [id] => 6968562
                        [time] => 1606200294.9146
                        [price] => 145031.99
                        [amount] => 0.030155
                        [type] => sell
                    )
    
                [1] => stdClass Object
                    (
                        [id] => 6968551
                        [time] => 1606200293.5195
                        [price] => 145020.46
                        [amount] => 0.125508
                        [type] => sell
                    )
    
            )
    
    )
</details>
