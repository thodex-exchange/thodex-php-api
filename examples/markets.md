```php
<?php
include_once '../php-thodex-api.php';
$thodex = new Thodex\API(); // 'api_key', 'api_secret' not required
$result = $thodex->markets();
print_r($result);
```

<details>
 <summary>Show Response</summary>

    stdClass Object
    (
        [error] => 
        [result] => Array
            (
                [0] => stdClass Object
                    (
                        [keyname] => BTCTRY
                        [stock_keyname] => BTC
                        [money_keyname] => TRY
                        [stock_fullname] => Bitcoin
                        [money_fullname] => Türk Lirası
                        [stock_display] => BTC
                        [money_display] => TRY
                        [stock_prec] => 6
                        [money_prec] => 2
                        [min_amount] => 0.0001
                        [maintenance] => NO
                        [maintenance_note] => 
                    )
    
                [1] => stdClass Object
                    (
                        [keyname] => ETHTRY
                        [stock_keyname] => ETH
                        [money_keyname] => TRY
                        [stock_fullname] => Ethereum
                        [money_fullname] => Türk Lirası
                        [stock_display] => ETH
                        [money_display] => TRY
                        [stock_prec] => 5
                        [money_prec] => 2
                        [min_amount] => 0.001
                        [maintenance] => NO
                        [maintenance_note] => 
                    )
    
                [2] => stdClass Object
                    (
                        [keyname] => LTCTRY
                        [stock_keyname] => LTC
                        [money_keyname] => TRY
                        [stock_fullname] => Litecoin
                        [money_fullname] => Türk Lirası
                        [stock_display] => LTC
                        [money_display] => TRY
                        [stock_prec] => 5
                        [money_prec] => 2
                        [min_amount] => 0.001
                        [maintenance] => NO
                        [maintenance_note] => 
                    )
    
                [3] => stdClass Object
                    (
                        [keyname] => DASHTRY
                        [stock_keyname] => DASH
                        [money_keyname] => TRY
                        [stock_fullname] => Dash
                        [money_fullname] => Türk Lirası
                        [stock_display] => DASH
                        [money_display] => TRY
                        [stock_prec] => 5
                        [money_prec] => 2
                        [min_amount] => 0.001
                        [maintenance] => NO
                        [maintenance_note] => 
                    )
    
                [4] => stdClass Object
                    (
                        [keyname] => HOTUSDT
                        [stock_keyname] => HOT
                        [money_keyname] => USDT
                        [stock_fullname] => Holochain
                        [money_fullname] => USDTether
                        [stock_display] => HOT
                        [money_display] => USDT
                        [stock_prec] => 0
                        [money_prec] => 7
                        [min_amount] => 3000
                        [maintenance] => NO
                        [maintenance_note] => 
                    )
                ...
            )
    )
</details>
