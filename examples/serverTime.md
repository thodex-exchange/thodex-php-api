```php
<?php
include_once '../php-thodex-api.php';
$thodex = new Thodex\API(); // 'api_key', 'api_secret' not required
$result = $thodex->serverTime();
print_r($result);
```

<details>
 <summary>Show Response</summary>

    stdClass Object
    (
        [error] => 
        [result] => stdClass Object
            (
                [time] => 1606161629
                [timestamp] => 2020-11-23 23:00:29
            )
    
    )
</details>
