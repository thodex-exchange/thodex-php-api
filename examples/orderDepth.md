#### Parameter
    (required)  $market : Market keyname
    (optional)  $limit  : limit
    $thodex->getOrderDepth($market, $limit);
---
```php
<?php
include_once '../php-thodex-api.php';
$thodex = new Thodex\API('api_key', 'api_secret');
$result = $thodex->orderDepth('BTCTRY', 2);
print_r($result);
```

<details>
 <summary>Show Response</summary>

    stdClass Object
    (
        [error] => 
        [result] => stdClass Object
            (
                [asks] => Array
                    (
                        [0] => Array
                            (
                                [0] => 145448.2
                                [1] => 0.896875
                            )
    
                        [1] => Array
                            (
                                [0] => 145448.29
                                [1] => 0.887583
                            )
    
                    )
    
                [bids] => Array
                    (
                        [0] => Array
                            (
                                [0] => 144700
                                [1] => 0.076761
                            )
    
                        [1] => Array
                            (
                                [0] => 144331.4
                                [1] => 0.000223
                            )
    
                    )
    
            )
    
    )
</details>