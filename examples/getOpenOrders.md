## Market - List of open order

##### Required Parameter
    (required)  market : Market keyname
    (optional)  offset : integer
    (optional)  limit  : integer
    $result = $thodex->getOpenOrders('BTCTRY', $offset, $limit);
---
```php
<?php
include_once '../php-thodex-api.php';
$thodex = new Thodex\API('api_key', 'api_secret');
$result = $thodex->getOpenOrders('BTCTRY');
print_r($result);
```
<details>
 <summary>Show Response</summary>

    stdClass Object
    (
        [error] => 
        [result] => stdClass Object
            (
                [limit] => 50
                [offset] => 0
                [total] => 2
                [records] => Array
                    (
                        [0] => stdClass Object
                            (
                                [time] => 1572432266.2779,
                                [id] => 215024,
                                [side] => 2,
                                [role] => 1,
                                [price] => "10",
                                [amount] => "1",
                                [deal] => "10",
                                [fee] => "0",
                                [deal_order_id] => 591041,
                                [market] => "BTCTRY"
                            )
                        [1] => stdClass Object
                            (
                                [time] => 1572432266.2779,
                                [id] => 215024,
                                [side] => 2,
                                [role] => 1,
                                [price] => "10",
                                [amount] => "1",
                                [deal] => "10",
                                [fee] => "0",
                                [deal_order_id] => 591041,
                                [market] => "BTCTRY"
                            )
                    )
            )
    )
</details>