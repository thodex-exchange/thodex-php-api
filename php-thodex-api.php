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
        $param = func_get_args();
        if(!empty($param[1])){
            $this->api_key = $param[0];
            $this->api_secret = $param[1];
        }
    }

    /**
     * @return object
     */
    public function getServerTime(){
        return $this->execute((object) ['url' => 'v1/public/time']);
    }

    /**
     * @return object
     */
    public function getMarkets(){
        return $this->execute((object) ['url' => 'v1/public/markets']);
    }

    /**
     * @param string $market
     * @return object
     */
    public function getMarketStatus(string $market){
        $request = (object) [
            'url' => 'v1/public/market-status',
            'params' => ['market' => $market]
        ];
        return $this->execute($request);
    }

    public function getMarketSummary(){
        $request = (object) [
            'url' => 'v1/public/market-summary',
        ];
        return $this->execute($request);
    }

    /**
     * @param string $market
     * @param integer $last_id
     * @return mixed
     */
    public function getMarketHistory(string $market, int $last_id = 0){
        $request = (object) [
            'url' => 'v1/public/market-history',
            'params' => ['market' => $market, 'last_id' => $last_id]
        ];
        return $this->execute($request);
    }

    /**
     * @param string $market
     * @param integer $limit
     * @return mixed
     */
    public function getOrderDepth(string $market, int $limit = 0){
        $request = (object) [
            'url' => 'v1/public/order-depth',
            'params' => ['market' => $market, 'limit' => $limit]
        ];
        return $this->execute($request);
    }



    public function getBalance($assets = null){
        $request = (object) [
            'url' => 'v1/account/balance',
            'params' => ['assets' => $assets]
        ];
        return $this->execute($request, true);
    }

    public function buyMarket(string $market, $amount){
        $request = (object) [
            'url' => 'v1/market/buy',
            'params' => ['market' => $market, 'amount' => $amount]
        ];
        return $this->execute($request);
    }

    public function orderDepth(string $market){
        $request = (object) [
            'url' => 'v1/public/order-depth',
            'params' => ['market' => $market]
        ];
        return $this->execute($request);
    }


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
