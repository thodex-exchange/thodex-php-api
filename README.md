# php-thodex-api
PHP library for the Thodex API designed to be easy to use.

## Getting Started
    composer require atakandemirkir/php-thodex-api
```php
require 'vendor/autoload.php';
$thodex = new Thodex\API('api_key', 'api_secret');
$myBalance = $thodex->getBalance();
```
## Errors
##### Http Errors
    HTTP/1.1 404 Not Found
```json
 {
   "error":{
      "code":404,
      "message":null
   },
   "result":null
}
```
##### API Errors
    HTTP/1.1 406 Not Acceptable
```json
{
   "error":{
      "code":620,
      "message":"registration failed"
   },
   "result":null
}
```

##### Validation Errors
    HTTP/1.1 406 Not Acceptable
```json
{
   "error":{
      "code":619,
      "message":"The asset field is required."
   },
   "result":{
      "validation":{
         "asset":[
            "The asset field is required."
         ]
      }
   }
}
```

####List of Error Messages
#####Http Errors:
Code | Message
--- | --- 
401 | Unauthorized
404 | Not Found
406 | Not Acceptable
500 | Internal Server Error

#####Api Errors
Code | Message
--- | ---
429 | Too many request
600 | Api key required
601 | Api key no valid
604 | User not found
605 | Below min level
606 | Invalid credentials
607 | Account disabled
608 | White list unauthorized ip
609 | Authorization token required
610 | Authorization token mismatch
611 | Invalid tonce
612 | Market limit order creation failed
613 | Market order creation failed
614 | Market order cancelation failed
619 | Parameters validation failed
630 | Amount must exceed transfer fee
634 | Wallet not found
639 | Only https connections allowed
641 | Wallet creation failed
651 | Transfer failed please contact us
652 | The amount must exceed minimum transfer limit
657 | Location lock
658 | Invalid captcha
659 | White list toggle failed
660 | White list add new failed
661 | White list delete failed
673 | Selected nationality denied asset

## License
[MIT](https://choosealicense.com/licenses/mit/)