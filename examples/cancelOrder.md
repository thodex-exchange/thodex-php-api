#### Market - Cancel open order
##### Parameter
    (required)  market   : Market keyname
    (required)  order_id : integer
    $result = $thodex->cancelOrder(('BTCTRY', $order_id);
---

```php
<?php
include_once '../php-thodex-api.php';
$thodex = new Thodex\API('api_key', 'api_secret');
$result = $thodex->cancelOrder('BTCTRY', 215024);
print_r($result);
```
<details>
 <summary>Show Response</summary>

    stdClass Object
    (
        [errors] => 
        [result] => Array
            (
            )
    
    )
</details>