#### Sell LIMIT order
##### Parameter
    (required)  market  : Market keyname
    (required)  price   : float
    (amount)    amount  : float | must be STOCK
    $result = $thodex->sellLimit('BTCTRY', $price, $amount);
---

```php
<?php
include_once '../php-thodex-api.php';
$thodex = new Thodex\API('api_key', 'api_secret');
$result = $thodex->sellLimit('BTCTRY', 12340, 0.3);
print_r($result);
```
<details>
 <summary>Show Response</summary>

    stdClass Object
    (
        [errors] => 
        [result] => stdClass Object
            (
                [id] => 703626
                [market] => BTCTRY
                [source] => api
                [type] => 1
                [side] => 1
                [ctime] => 1575458715.9208
                [mtime] => 1575458715.9208
                [price] => 12340
                [amount] => 0.3
                [taker_fee] => 0
                [maker_fee] => 0
                [left] => 0.3
                [deal_stock] => 0
                [deal_money] => 0
                [deal_fee] => 0
            )
    
    )
</details>