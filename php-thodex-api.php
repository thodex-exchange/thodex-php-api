<?php
namespace Thodex;

class API
{
    protected $base = 'https://api.thodex.com/';
    protected $api_key = '';
    protected $api_secret = '';
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
    public function buyLimit(string $market, $price, $amount){
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
    public function buyMarket(string $market, $amount){
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
    public function sellLimit(string $market, $price, $amount){
        $request = (object) [
            'url' => 'v1/market/sell-limit',
            'params' => ['market' => $market, 'price' => $price, 'amount' => $amount]
        ];
        return $this->execute($request, true, true);
    }

    /**
     * @param string $market Key name of market
     * @param float $amount must be MONEY
     * @return object
     */
    public function sellMarket(string $market, $amount){
        $request = (object) [
            'url' => 'v1/market/buy',
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
            CURLOPT_URL => $this->base . $request->url . (!empty($request->params) ? '?' . http_build_query($request->params) : ''),
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

    private function _encode($params) {
        ksort($params);
        $params['secret'] = $this->api_secret;
        return hash('sha256', http_build_query($params));
    }
}
