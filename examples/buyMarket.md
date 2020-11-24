#### BUY MARKET order
##### Parameter
    (required)  market  : Market keyname
    (amount)    amount  : float | must be MONEY
    $result = $thodex->buyMarket('BTCTRY', $amount);
---

```php
<?php
include_once '../php-thodex-api.php';
$thodex = new Thodex\API('api_key', 'api_secret');
$result = $thodex->buyMarket('BTCTRY', 100);
print_r($result);
```
<details>
 <summary>Show Response</summary>

    stdClass Object
    (
        [error] => 
        [result] => stdClass Object
            (
                [id] => 703625
                [market] => BTCTRY
                [source] => api
                [type] => 2
                [side] => 2
                [ctime] => 1575458371.9883
                [mtime] => 1575458371.9883
                [price] => 0
                [amount] => 100
                [taker_fee] => 0
                [maker_fee] => 0
                [left] => 0.0000952
                [deal_stock] => 0.00810372
                [deal_money] => 99.9999048
                [deal_fee] => 0e-12
            )
    
    )
</details>