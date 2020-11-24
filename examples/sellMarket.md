#### SELL MARKET order
##### Parameter
    (required)  market  : Market keyname
    (amount)    amount  : float | must be STOCK
    $result = $thodex->sellMarket('BTCTRY', $amount);
---

```php
<?php
include_once '../php-thodex-api.php';
$thodex = new Thodex\API('api_key', 'api_secret');
$result = $thodex->sellMarket('BTCTRY', 0.3);
print_r($result);
```
<details>
 <summary>Show Response</summary>
 
    stdClass Object
    (
        [errors] => 
        [result] => stdClass Object
            (
                [id] => 703627
                [market] => BTCTRY
                [source] => api
                [type] => 2
                [side] => 1
                [ctime] => 1575458989.6804
                [mtime] => 1575458989.6819
                [price] => 0
                [amount] => 0.3
                [taker_fee] => 0
                [maker_fee] => 0
                [left] => 0e-8
                [deal_stock] => 0.3
                [deal_money] => 3645
                [deal_fee] => 0e-14
            )
    
    )
</details>