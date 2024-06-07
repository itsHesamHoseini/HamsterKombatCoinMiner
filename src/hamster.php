<?php

class Hamster
{
    private string $token;
    public string $version="1.0";

    function __update()
    {

    }
    public function __construct($token)
    {
        $this->setToken($token);
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }
/*
 *  Click and bypass 3 hours limit for Profit carts!
 * .clickerUser.availableTaps
 * */

    /**
     * @throws Exception
     */
    public function _Click($rand = 0, $param="balanceCoins")
    {
        $token=$this->getToken();
        $rand = ($rand == 0) ? rand(1, 5) : $rand;
        $time = time();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.hamsterkombat.io/clicker/tap');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"count\":$rand,\"availableTaps\":1500,\"timestamp\":$time}");
        $headers = array();
        $headers[] = 'Accept-Language: en-US,en;q=0.9';
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Origin: https://hamsterkombat.io';
        $headers[] = 'Referer: https://hamsterkombat.io/';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-site';
        $headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36';
        $headers[] = 'Accept: application/json';
        $headers[] = 'Authorization: Bearer ' . $token;
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"122\", \"Not(A:Brand\";v=\"24\", \"Google Chrome\";v=\"122\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Platform: \"Linux\"';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = json_decode(curl_exec($ch), true);
        if (curl_errno($ch)) {
            echo("Check Your Internet connection!\nDetail : ".curl_error($ch));
            return 0;
        }
        curl_close($ch);
        if($param=="balanceCoins")
            return explode('.', $result['clickerUser']['balanceCoins'])[0];
        else{
            return $result['clickerUser'][$param];
        }
    }

    public function getme()
    {
        $token=$this->getToken();
        $time = time();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.hamsterkombat.io/auth/me-telegram');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array();
        $headers[] = 'Accept-Language: en-US,en;q=0.9';
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Origin: https://hamsterkombat.io';
        $headers[] = 'Referer: https://hamsterkombat.io/';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-site';
        $headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36';
        $headers[] = 'Accept: application/json';
        $headers[] = 'Authorization: Bearer ' . $token;
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"122\", \"Not(A:Brand\";v=\"24\", \"Google Chrome\";v=\"122\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Platform: \"Linux\"';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = json_decode(curl_exec($ch), true)['telegramUser'];
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return ['id' => $result['id'], 'name' => $result['firstName'] . @$result['lastName'], 'is_bot' => $result['isBot']];
    }

    public function get_list_task()
    {
        $token=$this->getToken();
        $time = time();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.hamsterkombat.io/clicker/list-tasks');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array();
        $headers[] = 'Accept-Language: en-US,en;q=0.9';
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Origin: https://hamsterkombat.io';
        $headers[] = 'Referer: https://hamsterkombat.io/';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-site';
        $headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36';
        $headers[] = 'Accept: application/json';
        $headers[] = 'Authorization: Bearer ' . $token;
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"122\", \"Not(A:Brand\";v=\"24\", \"Google Chrome\";v=\"122\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Platform: \"Linux\"';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = json_decode(curl_exec($ch), true)['tasks'];
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;

    }
    public function get_best_cart_for_profit(bool $upgraded /*should it be upgraded?*/)
    {
        $carts=$this->get_carts();
        $count_of_carts=0;
        while(count($carts) !=0) {
            $maxRatio = -INF;
            $cartName = '';
            $p1 = 0;
            $p2 = 0;
            foreach ($carts as $k=>$cart) {
                if ($cart['price'] == 0) {
                    continue;
                }
                $ratio =  $cart['profitPerHourDelta'] / $cart['price'];
                if ($ratio > $maxRatio && $cart['profitPerHourDelta'] > 0 && $cart['price'] > 0 && $cart['isAvailable'] == true && $cart['isExpired'] == false) {
                    ($upgraded) ? $this->UpgradeCarts($cart['id']) : "";
                    $maxRatio = $ratio;
                    $cartName = $cart['name'];
                    $p1 = $cart['price'];
                    $p2 = $cart['profitPerHourDelta'];
                }
            }
            if ($cartName) {
                echo $cartName . "\n";
                echo $p1 . "\n" . $p2 . "\n------------\n";
            }
            unset($carts[$count_of_carts]);
            $count_of_carts++;
        }
        return;
    }
    public function get_daily_coins()
    {
        $token=$this->getToken();
        $data = $this->get_list_task($token);
        $key = 5;//default!
        foreach ($data as $k => $d) {
            if ($d['id'] == "streak_days") {
                $key = $k;
                break;
            }
        }
        if (!$data[$key]['isCompleted']) { // daily coins!
            echo "< --------- We Get Your Daily Coin!(" . $data[$key]['rewardCoins'] . ") ----------- >".PHP_EOL;
            //// continue;
            return $this->UpgradeCarts('streak_days');
        }
    }
    public function UpgradeCarts($task_id){
	$token=$this->getToken();
	$time=round(microtime(true)*1000);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.hamsterkombat.io/clicker/buy-upgrade');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"upgradeId\":\"$task_id\",\"timestamp\":$time}");
	$headers = array();
	$headers[] = 'Accept-Language: en-US,en;q=0.9';
	$headers[] = 'Connection: keep-alive';
	$headers[] = 'Origin: https://hamsterkombat.io';
	$headers[] = 'Referer: https://hamsterkombat.io/';
	$headers[] = 'Sec-Fetch-Dest: empty';
	$headers[] = 'Sec-Fetch-Mode: cors';
	$headers[] = 'Sec-Fetch-Site: same-site';
	$headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36';
	$headers[] = 'Accept: application/json';
	$headers[] = 'Authorization: Bearer '.$token;
	$headers[] = 'Content-Type: application/json';
	$headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"125\", \"Chromium\";v=\"125\", \"Not.A/Brand\";v=\"24\"';
	$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
	$headers[] = 'Sec-Ch-Ua-Platform: \"Linux\"';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = json_decode(curl_exec($ch),true);
	if (curl_errno($ch)) {
    		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);
	return $result;
    }
    public function get_carts()
    {
        $token=$this->getToken();
        $time = time();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.hamsterkombat.io/clicker/upgrades-for-buy');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array();
        $headers[] = 'Accept-Language: en-US,en;q=0.9';
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Origin: https://hamsterkombat.io';
        $headers[] = 'Referer: https://hamsterkombat.io/';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-site';
        $headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36';
        $headers[] = 'Accept: application/json';
        $headers[] = 'Authorization: Bearer ' . $token;
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"122\", \"Not(A:Brand\";v=\"24\", \"Google Chrome\";v=\"122\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Platform: \"Linux\"';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = json_decode(curl_exec($ch), true)['upgradesForBuy'];
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }
    public function AutomaticMiner(){
            $old = (int)$this->_Click();
            $tap = (int)$this->_Click(0,"availableTaps");
            while(true){
                if($tap <= 1000 && $tap != 0){
                    sleep(rand(40,100));
                }
                $s=(int)$this->_Click();
                echo number_format($s);
                echo (" -> "."+".number_format( (($s-$old)/$old*100) ,2) . " --> ".(int)($s-$old). " ---> ".date("H:i:s")." ----> "."av_tap : ".$tap.PHP_EOL);
                $old=$s;
                sleep( 5 * rand(1,2) );
                $tap = (int)$this->_Click(0,"availableTaps");
        }
    }


}
