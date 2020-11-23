```php
<?php
include_once '../php-thodex-api.php';
$thodex = new Thodex\API('api_key', 'api_secret');
```

####
```php
$result = $thodex->getBalance('BTC');
```

<details>
 <summary>Show Response</summary>

    stdClass Object
    (
        [error] => 
        [result] => stdClass Object
            (
                [BTC] => stdClass Object
                    (
                        [available] => 0
                        [freeze] => 0
                    )
    
            )
    
    )
</details>

---

```php
$result = $thodex->getBalance('BTC,TRY');
```

<details>
 <summary>Show Response</summary>

    stdClass Object
    (
        [error] => 
        [result] => stdClass Object
            (
                [BTC] => stdClass Object
                    (
                        [available] => 0
                        [freeze] => 0
                    )
    
            )
    
    )
</details>

---

```php
$result = $thodex->getBalance();
```

<details>
 <summary>Show Response</summary>

    stdClass Object
    (
        [error] => 
        [result] => stdClass Object
            (
                [TRY] => stdClass Object
                    (
                        [available] => 0
                        [freeze] => 0
                    )
    
                [BTC] => stdClass Object
                    (
                        [available] => 0
                        [freeze] => 0
                    )
    
                [ETH] => stdClass Object
                    (
                        [available] => 0
                        [freeze] => 0
                    )
    
                [LTC] => stdClass Object
                    (
                        [available] => 0
                        [freeze] => 0
                    )
                ...
            )
    )
</details>
