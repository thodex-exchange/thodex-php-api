<?php
namespace Thodex;

class API
{
    protected $api_key = '';
    protected $api_secret = '';
    const API_SERVER = 'https://api.thodex.com/';
    const SOCKET_SERVER = 'wss://wspub.thodex.com:443';
    const SOCKET_SUBSCRIBE_TYPES = ['deals', 'price', 'state'];

    const REQUEST_TIMEOUT = 30;
    public function __construct()
    {
        $args = func_get_args();
        if(!empty($args[1])){
            $this->api_key = $args[0];
            $this->api_secret = $args[1];
        }
    }

    /**
     * @return object
     */
    public function serverTime(){
        return $this->execute((object) ['url' => 'v1/public/time']);
    }

    /**
     * @return object
     */
    public function markets(){
        return $this->execute((object) ['url' => 'v1/public/markets']);
    }

    /**
     * @param string $market Key name of market
     * @return object
     */
    public function marketStatus(string $market){
        $request = (object) [
            'url' => 'v1/public/market-status',
            'params' => ['market' => $market]
        ];
        return $this->execute($request);
    }

    /**
     * @return object
     */
    public function marketSummary(){
        $request = (object) [
            'url' => 'v1/public/market-summary',
        ];
        return $this->execute($request);
    }

    /**
     * @param string $market Key name of market
     * @param integer $last_id (optional)
     * @return object
     */
    public function marketHistory(string $market, int $last_id = 0){
        $request = (object) [
            'url' => 'v1/public/market-history',
            'params' => ['market' => $market, 'last_id' => $last_id]
        ];
        return $this->execute($request);
    }

    /**
     * @param string $market Key name of market
     * @param integer $limit (optional)
     * @return object
     */
    public function orderDepth(string $market, int $limit = 0){
        $request = (object) [
            'url' => 'v1/public/order-depth',
            'params' => ['market' => $market, 'limit' => $limit]
        ];
        return $this->execute($request);
    }

    /**
     * @param string $market Key name of market
     * @param integer $offset (optional)
     * @param integer $limit (optional)
     * @return object
     */
    public function getOpenOrders(string $market, int $offset = 0, int $limit = 0){
        $request = (object) [
            'url' => 'v1/market/open-orders',
            'params' => ['market' => $market, 'offset' => $offset, 'limit' => $limit]
        ];
        return $this->execute($request, true);
    }

    /**
     * @param string $market Key name of market
     * @param integer $offset (optional)
     * @param integer $limit (optional)
     * @return object
     */
    public function getOrderHistory(string $market, int $offset = 0, int $limit = 0){
        $request = (object) [
            'url' => 'v1/market/order-history',
            'params' => ['market' => $market, 'offset' => $offset, 'limit' => $limit]
        ];
        return $this->execute($request, true);
    }

    /**
     * @param string $market Key name of market
     * @param float $price
     * @param float $amount must be STOCK
     * @return object
     */
    public function buyLimit(string $market, float $price, float $amount){
        $request = (object) [
            'url' => 'v1/market/buy-limit',
            'params' => ['market' => $market, 'price' => $price, 'amount' => $amount]
        ];
        return $this->execute($request, true, true);
    }

    /**
     * @param string $market Key name of market
     * @param float $amount must be MONEY
     * @return object
     */
    public function buyMarket(string $market, float $amount){
        $request = (object) [
            'url' => 'v1/market/buy',
            'params' => ['market' => $market, 'amount' => $amount]
        ];
        return $this->execute($request, true, true);
    }

    /**
     * @param string $market Key name of market
     * @param float $price
     * @param float $amount must be STOCK
     * @return object
     */
    public function sellLimit(string $market, float $price, float $amount){
        $request = (object) [
            'url' => 'v1/market/sell-limit',
            'params' => ['market' => $market, 'price' => $price, 'amount' => $amount]
        ];
        return $this->execute($request, true, true);
    }

    /**
     * @param string $market Key name of market
     * @param float $amount must be STOCK
     * @return object
     */
    public function sellMarket(string $market, float $amount){
        $request = (object) [
            'url' => 'v1/market/sell',
            'params' => ['market' => $market, 'amount' => $amount]
        ];
        return $this->execute($request, true, true);
    }

    /**
     * @param string $market Key name of market
     * @param integer $order_id
     * @return object
     */
    public function cancelOrder(string $market, int $order_id){
        $request = (object) [
            'url' => 'v1/market/cancel',
            'params' => ['market' => $market, 'order_id' => $order_id]
        ];
        return $this->execute($request, true, true);
    }

    /**
     * @param string $assets
     * @return object
     */
    public function getBalance($assets = null){
        $request = (object) [
            'url' => 'v1/account/balance',
            'params' => ['assets' => $assets]
        ];
        return $this->execute($request, true);
    }

    /**
     * @param object $request
     * @param boolean $auth
     * @param boolean $post
     * @return mixed
     */
    protected function execute(object $request, $auth = false, $post = false) {
        $ch = curl_init();
        $headers = ['cache-control: no-cache'];

        if($auth) {
            $request->params['apikey'] = $this->api_key;
            $request->params['tonce'] = time();
            $authorization = $this->_encode($request->params);
            $headers[] = 'Authorization: ' . $authorization;
        }

        $curlparams= [
            CURLOPT_URL => self::API_SERVER . $request->url . (!empty($request->params) ? '?' . http_build_query($request->params) : ''),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => self::REQUEST_TIMEOUT,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => $headers,
        ];

        if($post) {
            $curlparams[CURLOPT_POST] = 1;
            $curlparams[CURLOPT_POSTFIELDS] = http_build_query($request->params);
        }
        curl_setopt_array($ch, $curlparams);
        $resultRaw = curl_exec($ch);
        curl_close($ch);
        return json_decode($resultRaw);
    }

    /**
     * @param array $params
     * @return string
     */
    private function _encode($params) {
        ksort($params);
        $params['secret'] = $this->api_secret;
        return hash('sha256', http_build_query($params));
    }

    /**
     * @param array $markets
     * @param callable $callback
     * @param array $subscribes
     */
    public static function socketReader(array $markets, callable $callback, $subscribes = self::SOCKET_SUBSCRIBE_TYPES){
        $loop = \React\EventLoop\Factory::create();
        $reactConnector = new \React\Socket\Connector($loop);
        $connector = new \Ratchet\Client\Connector($loop, $reactConnector);
        $connector(self::SOCKET_SERVER)
            ->then(function(\Ratchet\Client\WebSocket $conn) use ($loop, $subscribes, $markets, $callback)  {
                $conn->send(json_encode(['method' => 'state.unsubscribe', 'params' => [], 'id' => 0]));
                foreach ($subscribes as $subscribe){
                    if(in_array($subscribe, self::SOCKET_SUBSCRIBE_TYPES)){
                        $conn->send(json_encode([
                            'method' => $subscribe .'.subscribe',
                            'params' => $markets,
                            'id' => 1
                        ]));
                    }
                }
                $conn->on('message', function(\Ratchet\RFC6455\Messaging\MessageInterface $msg) use ($loop, $callback) {
                    $response = json_decode($msg);
                    if(!empty($response->params[1]) && !empty($response->method))
                        if((is_array($response->params[1]) && count($response->params[1]) == 1) || !is_array($response->params[1])){
                            $method = explode('.', $response->method)[0];
                            $marketKeyName = $response->params[0];
                            if(is_object($response->params[1])){
                                $params = $response->params[1];
                            }else if(is_array($response->params[1])){
                                $params = (object) $response->params[1][0];
                            }else {
                                $params = (object) ['price' => $response->params[1]];
                            }
                            $stopSocketConnection = call_user_func($callback, $method, $marketKeyName, $params) ?? 0;
                            if ($stopSocketConnection)
                                $loop->stop();
                        }
                });
                $conn->on('close', function($code = null, $reason = null) use ($loop){
                    $loop->stop();
                });
            }, function(\Exception $e) use ($loop) {
                echo "Could not connect: {$e->getMessage()}\n";
                $loop->stop();
            });
        $loop->run();
    }
}
