#### Place a BUY LIMIT order
##### Parameter
    (required)  market  : Market keyname
    (required)  price   : float
    (required)  amount  : float | must be STOCK
    $result = $thodex->buyLimit('BTCTRY', $price, $amount);
---

```php
<?php
include_once '../php-thodex-api.php';
$thodex = new Thodex\API('api_key', 'api_secret');
$result = $thodex->buyLimit('BTCTRY', 12340, 0.001);
print_r($result);
```
<details>
 <summary>Show Response</summary>

    stdClass Object
    (
        [error] => 
        [result] => stdClass Object
            (
                [id] => 703619
                [market] => BTCTRY
                [source] => api
                [type] => 1
                [side] => 2
                [ctime] => 1575456329.4376
                [mtime] => 1575456329.4376
                [price] => 12340
                [amount] => 0.001
                [taker_fee] => 0
                [maker_fee] => 0
                [left] => 0e-8
                [deal_stock] => 0.001
                [deal_money] => 12.34
                [deal_fee] => 0e-12
            )
    
    )
</details>