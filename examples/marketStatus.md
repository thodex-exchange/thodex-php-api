#### Parameter
    (required)  market: Market keyname
    $thodex->marketStatus('BTCTRY');            
---
```php
<?php
include_once '../php-thodex-api.php';
$thodex = new Thodex\API(); // 'api_key', 'api_secret' not required
$result = $thodex->marketStatus('BTCTRY');
print_r($result);
```

<details>
 <summary>Show Response</summary>

    stdClass Object
    (
        [error] => 
        [result] => stdClass Object
            (
                [period] => 86400
                [last] => 145328.93
                [deal] => 51771759.56219956
                [open] => 141816
                [low] => 138200
                [close] => 145328.93
                [high] => 145998
                [volume] => 361.896084
            )
    
    )
</details>