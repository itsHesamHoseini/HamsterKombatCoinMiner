<?php

class Hamster
{
    private $token;
    public $version="2.0";

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
    public function list_tasks(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.hamsterkombat.io/clicker/list-tasks');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array();
        $headers[] = 'Accept: */*';
        $headers[] = 'Accept-Language: en-US,en;q=0.9';
        $headers[] = 'Authorization: Bearer '.$this->getToken();
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Content-Length: 0';
        $headers[] = 'Origin: https://hamsterkombat.io';
        $headers[] = 'Referer: https://hamsterkombat.io/';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-site';
        $headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36';
        $headers[] = 'Sec-Ch-Ua: \"Not/A)Brand\";v=\"8\", \"Chromium\";v=\"126\", \"Google Chrome\";v=\"126\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Platform: \"Linux\"';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
//            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return json_decode($result,true);
    }
    public function GetBoostsData(){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.hamsterkombat.io/clicker/boosts-for-buy');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = 'Accept: */*';
        $headers[] = 'Accept-Language: en-US,en;q=0.9';
        $headers[] = 'Authorization: Bearer '.$this->getToken();
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Content-Length: 0';
        $headers[] = 'Origin: https://hamsterkombat.io';
        $headers[] = 'Referer: https://hamsterkombat.io/';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-site';
        $headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36';
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
    public function FullEnergy(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.hamsterkombat.io/clicker/buy-boost');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"boostId\":\"BoostFullAvailableTaps\",\"timestamp\":".time()."}");
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
        $headers[] = 'Authorization: Bearer '.$this->getToken();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"125\", \"Chromium\";v=\"125\", \"Not.A/Brand\";v=\"24\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Platform: \"Linux\"';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = json_decode(curl_exec($ch),true);
        if (curl_errno($ch)) {
        }
        curl_close($ch);
        return $result;

    }
    public function cipher($morse_code){
	$token=$this->getToken();
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.hamsterkombat.io/clicker/claim-daily-cipher');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"cipher\":\"$morse_code\"}");
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
        ($result = json_decode(curl_exec($ch), true)) && (curl_close($ch));
	if (curl_errno($ch)) {
            throw new Exception("Check Your Internet connection!");
            return [];
	}
		return $result;
    }
    public function sync(){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.hamsterkombat.io/clicker/sync');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = 'Accept: */*';
        $headers[] = 'Accept-Language: en-US,en;q=0.9';
        $headers[] = 'Authorization: Bearer '.$this->getToken();
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Content-Length: 0';
        $headers[] = 'Origin: https://hamsterkombat.io';
        $headers[] = 'Referer: https://hamsterkombat.io/';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-site';
        $headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36';
        $headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"125\", \"Chromium\";v=\"125\", \"Not.A/Brand\";v=\"24\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Platform: \"Linux\"';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
//            echo 'Error:' . curl_error($ch);
        }
        return json_decode($result,true);
        curl_close($ch);
    }
    public function ciperDecoder(string|null $base64EncodedData){
        $manipulatedStr = substr($base64EncodedData, 0, 3) . substr($base64EncodedData, 4);
        $decodedBytes = base64_decode($manipulatedStr);
        $decodedStr = utf8_decode($decodedBytes);
        return $decodedStr;
    }

    public function config(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.hamsterkombat.io/clicker/config');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array();
        $headers[] = 'Accept: */*';
        $headers[] = 'Accept-Language: en-US,en;q=0.9';
        $headers[] = 'Authorization: Bearer '.$this->getToken();
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Content-Length: 0';
        $headers[] = 'Origin: https://hamsterkombat.io';
        $headers[] = 'Referer: https://hamsterkombat.io/';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-site';
        $headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36';
        $headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"125\", \"Chromium\";v=\"125\", \"Not.A/Brand\";v=\"24\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Platform: \"Linux\"';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = json_decode(curl_exec($ch),true);
        if (curl_errno($ch)) {
            throw new Exception("Check Your Internet!");
        }
        curl_close($ch);
        return $result;
    }
    public function _Click($availableTaps=1500,$rand = 0)
    {
        $token=$this->getToken();
        $rand = ($rand == 0) ? rand(1, 9) : $rand;
        $time = time();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.hamsterkombat.io/clicker/tap');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"count\":$rand,\"availableTaps\":$availableTaps,\"timestamp\":$time}");
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
            throw new Exception("Check Your Internet!");
//            echo("Check Your Internet!");
//            echo("Check Your Internet connection!\nDetail : ".curl_error($ch));
            return [];
        }
        curl_close($ch);
        $result['count']=$rand;
        return $result;
//        if($param=="balanceCoins")
//            return explode('.', $result['clickerUser']['balanceCoins'])[0];
//        else
//            return $result['clickerUser'][$param];
    }

    /**
     * @throws Exception
     */
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
        @curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = @json_decode(@curl_exec($ch), true)['telegramUser'];
        if (@curl_errno($ch)) {
            @throw new Exception(curl_error($ch));
        }
        @curl_close($ch);
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
    public function get_best_cart_for_profit($upgraded /*should it be upgraded?*/)
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
        }# <----- Ingored [4] ----->

        return;
    }
    public function check_task(string $task){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.hamsterkombat.io/clicker/check-task');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"taskId\":\"$task\"}");
        $headers = array();
        $headers[] = 'Accept-Language: en-US,en;q=0.9';
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Origin: https://hamsterkombat.io';
        $headers[] = 'Referer: https://hamsterkombat.io/';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-site';
        $headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36';
        $headers[] = 'Accept: application/json';
        $headers[] = 'Authorization: Bearer '.$this->getToken();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Sec-Ch-Ua: \"Not/A)Brand\";v=\"8\", \"Chromium\";v=\"126\", \"Google Chrome\";v=\"126\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Platform: \"Linux\"';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
//            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return json_decode($result,true);
    }
    public function get_daily_coins()
    {
        $token=$this->getToken();
        $data = $this->get_list_task($token);
        $key = 5;
	//default!
        foreach ($data as $k => $d) {
            if ($d['id'] == "streak_days") {
                $key = $k;
                break;
            }
        }
        if (!$data[$key]['isCompleted']) { // daily coins!
//            echo "< --------- We Get Your Daily Coin!(" . $data[$key]['rewardCoins'] . ") ----------- >";
            //// continue;
            $this->check_task('streak_days');
            return true;
//            return $this->UpgradeCarts('streak_days');
        }
        else{
            return false;
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
                  //  sleep(rand(40,100));
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
