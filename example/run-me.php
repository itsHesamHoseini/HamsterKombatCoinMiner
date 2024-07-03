<?php



require_once("color.php");
require_once("../src/hamster.php");
require_once("Sys.php");

require_once ("runCodeFunction.php");

date_default_timezone_set("Asia/Tehran");


($sys=new Sys)->cls();
$Color=new Color();
$color=$Color;



function displayLogo()
{
    global $Color;
    $Color->formatPrint(['green','bold'],"");
//    echo <<<LOGO
// .                           _______ __    __
// /     ` , __   ,   . _  .- '   /    |     |
// |     | |'  `. |   |  \,'      |     \    /
// |     | |    | |   |  /\       |      \  /
// /---/ / /    | `._/| /  \      /       \/
//    echo <<<LOGO
    echo $Color->formatPrint(['green','bold']," .                           _______ __    __")."\n";
    echo $Color->formatPrint(['green','bold']," /     ` , __   ,   . _  .- '   /    |     | ")."\n";
    echo $Color->formatPrint(['white','bold']," |     | |'  `. |   |  \,'      |     \    / ")."\n";
    echo $Color->formatPrint(['red','bold']," |     | |    | |   |  /\       |      \  /  ")."\n";
    echo $Color->formatPrint(['red','bold']," /---/ / /    | `._/| /  \      /       \/   ")."\n";


    //LOGO;


// LinuxTV-ir CLI Tool
//LOGO;
}


// تابع برای نمایش منو
function displayMenu()
{
    global $Color;
    echo (new Color())->Color('purple');
    echo "\n";
    echo ($Color)->formatPrint(['green'],"[ 1 ] Add Account\n");
    echo ($Color)->formatPrint(['white','bold'],"[ 2 ] Run Bot\n");
    echo $Color->formatPrint(['white','bold'],"[ 3 ] Upgrade Carts\n");
    echo $Color->formatPrint(['white','bold'],"[ 4 ] Settings\n");
    echo $Color->formatPrint(['red','bold'],"[ 5 ] Exit\n");
    echo "\n";
    echo ($Color)->formatPrint(['white','greenbg'],"Enter")." your choice: ";
}
function _strlen($str){

    $q1=@strlen($str);
    $q2=@mb_strlen($str);
    if($q1 != $q2){
        return $q2;
    }
    else{
        return $q1;
    }
}
// تابع اصلی
/**
 * @throws Exception
 */
function main()
{
    global $Color,$sys, $color;
    displayLogo();

    while (true) {
        displayMenu();
        $choice = trim(fgets(STDIN));

        switch ($choice) {
            case '1':
                $sys->cls();
                if(!file_exists("users.json")){
                    file_put_contents("users.json",json_encode([]));
                }



                $Color=new Color();
                $Sys=new Sys();
                $Sys->cls();
                echo $Color->formatPrint(['white'],"<   ");
                echo ($Color)->formatPrint(['red','strikethrough'],"Bearar").$Color->formatPrint(['green','bold','italic']," XXXXXXXXXXXXXXXXXX");
                echo $Color->formatPrint(['white'],"   >");
                usleep(1000000);
                echo $Color->formatPrint(['white','blackbg'],"\n");
                echo $Color->formatPrint(['white','blackbg'],"\n");
                echo $Color->formatPrint(['white','blackbg'],"\n");
                usleep(1000000);
                echo ($Color)->formatPrint(['blue','bold'],"Enter Your Token: \n");
                echo $Color->formatPrint(['white','blackbg'],"\n");

                $token = trim(fgets(STDIN));
                $Sys->cls();
                while(true){
                    try {
                        $me = @($h = new Hamster($token))->getme();
                        break;
                    }catch(Exception $e){
                        echo "[ ";
                        echo $Color->formatPrint(['red','bold'],"ERR");
                        echo " ] - Check Your Connection!\n";
                        sleep(10);
                    }
                }

                $from_id=$me['id'];
                $name=$me['name'];

//echo $from_id."\n";
//echo $name."\n";
//exit;


                $users=@json_decode($json=@file_get_contents("users.json"),true);
                $index=-1;
                try {
                    $data=@array_search($from_id, @array_column($users, 'id'));
                    $index = !$data ? -1 : $data;
                }catch(Exception $e){
                    $index=-1;
                }



                if(!isset($users[$index]) && $index==-1){
                    $users[]=['id'=>$from_id,'name'=>$name,'token'=>$token];
                    echo "\n\n\n";
                    $Sys->cls();
                    $q1=str_repeat('-',_strlen($name));
                    $q2=str_repeat('-',_strlen($from_id));
                    ($q1>$q2) ? (
                    $q2 = $q1 && ($q3=(_strlen($q1)-_strlen($q2))) && ($q3=str_repeat(' ',$q3)) )
                        :
                        ($q1 = $q2 && ($q3=_strlen($q2)-_strlen($q1))) && ($q3=str_repeat(' ',$q3) );

                    echo "[ ";
                    echo $Color->formatPrint(['white','bold'],"INFO");
                    echo " ] :\n";
                    if(_strlen($q1) > _strlen($q2)) {
                        echo <<<MAME
|\033[31m---------$q1\033[0m|
|# Name : \033[32m$name\033[0m|
|# ID   : \033[34m$from_id{$q3}\033[0m|
|\033[31m---------$q1\033[0m|
MAME;
                    }
                    elseif(_strlen($q1) <= _strlen($q2)) {
                        echo <<<MAME
|\033[31m---------$q2\033[0m|
|# Name : \033[32m$name{$q3}\033[0m|
|# ID   : \033[34m$from_id\033[0m|
|\033[31m---------$q2\033[0m\033[0m|
MAME;
                    }
                    echo "\n\n";
                    if(strlen($from_id)!=0){
                        echo "[ ";
                        echo $Color->formatPrint(['green','bold'],"OK");
                        @file_put_contents("users.json",@json_encode($users));
                        echo " ] - Account Added!\n";
                    }
                }
                else {
                    $Sys->cls();
                    $q1=str_repeat('-',_strlen($name));
                    $q2=str_repeat('-',_strlen($from_id));
                    ($q1>$q2) ? (
                    $q2 = $q1 && ($q3=(_strlen($q1)-_strlen($q2))) && ($q3=str_repeat(' ',$q3)) )
                        :
                        ($q1 = $q2 && ($q3=_strlen($q2)-_strlen($q1))) && ($q3=str_repeat(' ',$q3) );

                    echo "[ ";
                    echo $Color->formatPrint(['white','bold'],"INFO");
                    echo " ] :\n";
                    if(_strlen($q1) > _strlen($q2)) {
                        echo <<<MAME
|\033[31m---------$q1\033[0m|
|# Name : \033[32m$name\033[0m|
|# ID   : \033[34m$from_id{$q3}\033[0m|
|\033[31m---------$q1\033[0m|
MAME;
                    }
                    elseif(_strlen($q1) <= _strlen($q2)) {
                        echo <<<MAME
|\033[31m---------$q2\033[0m|
|# Name : \033[32m$name{$q3}\033[0m|
|# ID   : \033[34m$from_id\033[0m|
|\033[31m---------$q2\033[0m\033[0m|
MAME;
                    }

                    echo "\n\n[ ";
                    if(strlen($from_id)!=0) {
                        echo $Color->formatPrint(['red', 'bold'], "ERR");
                        echo " ] - Account is already exists!\n";
                    }
                }
                echo "\n\n";
                sleep(5);
                $sys->cls();
                displayLogo();
                // کد مربوط به اضافه کردن حساب
                break;
            case '2':
                $sys->cls();
                echo "Running bot...\n";
                sleep(10);
                $sys->cls();
                $users=json_decode(file_get_contents("users.json"),true);
                $objUsers=[];
                $c=null;
                foreach($users as $user) {
                    $c=null;
                    $objUsers[]=['class'=>$c=(new Hamster($user['token'])),'name'=>$user['name'],'id'=>$user['id'],'last_coin'=>0,'red_alarm_now'=>0,'red_alarm_set'=>0,
                        'availableTaps'=>$c->sync()['clickerUser']['availableTaps'] ,'dailyCipher'=>['']];
                    task:
                    try{$list_tasks=@$c->list_tasks();}catch(Exception $e){
                        @__Sleep(10);
                        goto task;
                    }

//    echo json_encode($list_tasks);
//    exit;
                    $__index=-1;
                    $__index=@array_search('streak_days', @array_column($list_tasks['tasks'], 'id'));
                    $__index = !$__index ? -1 : $__index;


                    if(!@$list_tasks['tasks'][$__index]['streak_days']['isCompleted'] && isset($list_tasks['tasks'][$__index]) )
                    {
                        task2:
                        try {
                            if($c->get_daily_coins()) {
                                echo ($color)->formatPrint(['blue', 'bold'], "#");
                                echo " [ ";
                                echo ($color)->formatPrint(['green', 'bold'], "OK");
                                echo " ] => [ " . $color->formatPrint(['green', 'bold'], "We Get Daily Coin!");
                                echo " ] => < " . $color->formatPrint(['blue', 'bold'], $user['id']) . " >\n";
                            }
                        }catch(Exception $e){
                            __Sleep(10);
                            goto task2;
                        }
                    }




                    back_Try:
                    try{$ciper=$c->config();}catch(Exception $e){
                        echo ($color)->formatPrint(['green','bold'],"#") . " <----- ".($color)->formatPrint(['red','bold'],$e->getMessage())." ----->"."\n";
                        __Sleep(20);
                        goto back_Try;
                    }
                    if( ! $ciper['dailyCipher']['isClaimed'] ){
                        back_Try2:
                        try{
                            $result =
                                $c->cipher(
                                    $c->ciperDecoder(
                                        $ciper['dailyCipher']['cipher']
                                    )
                                );
                        }catch(Exception $e) {
                            echo ($color)->formatPrint(['green','bold'],"#") . " <----- ".($color)->formatPrint(['red','bold'],$e->getMessage())." ----->"."\n";
                            sleep(20);
                            goto back_Try2;
                        }

                        if(@$result['dailyCipher']['isClaimed']==true && !isset($result['error_code']) ) {
                            echo ($color)->formatPrint(['blue','bold'],"#");
                            echo " [ ";
                            echo ($color)->formatPrint(['green' ,'bold'],"OK" );
                            echo " ] => [ ".  $color->formatPrint(['green','bold'],"We Get 1,000,000 coin from Cipher!");
                            echo " ] => < ".$color->formatPrint(['blue','bold'],$user['id']) . " >\n";
//            echo ($color)->formatPrint(['green','bold'],"#") . " <----- ".($color)->formatPrint(['red','bold'],$e->getMessage())." ----->"."\n";

                        }
//        exit;
                    }


                }
                system('cls');
                while(true){
                    foreach ($objUsers as $key=>$objUser){
                        if($objUser['red_alarm_now'] != $objUser['red_alarm_set'] && $objUser['red_alarm_now'] < $objUser['red_alarm_set']){
                            $objUsers[$key]['red_alarm_now']++;
                            if(__Ingoring($objUser['red_alarm_set'] - $objUser['red_alarm_now'])){
                                continue;
                            }
                        }
                        if($objUser['red_alarm_now'] != 0 && $objUser['red_alarm_set'] > 0 && $objUser['red_alarm_now'] == $objUser['red_alarm_set']){
                            $objUsers[$key]['red_alarm_now']=0;
                            $objUsers[$key]['red_alarm_set']=0;
                        }

                        try {
                            $data =
                                $objUser['class']->
                                _Click($objUser['availableTaps']);
                        }catch (Exception $e){
                            echo ($color)->formatPrint(['green','bold'],"#") . " <----- ".($color)->formatPrint(['red','bold'],$e->getMessage())." ----->"."\n";
                            __Sleep(15);
                        }

                        $your_coin=str_contains(@$data['clickerUser']['balanceCoins'],".") ? explode('.',@$data['clickerUser']['balanceCoins'])[0] : @$data['clickerUser']['balanceCoins'];
                        $earnCoinWithTapAndProfit=((int)$your_coin)-(
                            (int)@$objUser['last_coin'] != 0 ? (int)@$objUser['last_coin'] : $your_coin
                            );
                        if($objUser['last_coin'] != 0) {
                            $earnCoinWithTapAndProfitPercent = (($your_coin - @$objUser['last_coin']) / @$objUser['last_coin'] * 100) . "%";
                        }
                        else
                            $earnCoinWithTapAndProfitPercent="0%";

                        $availableTaps=@$data['clickerUser']['availableTaps'];
                        $objUsers[$key]['availableTaps']=$availableTaps;

                        if($availableTaps < 1000){
                            $boostsForBuy=$objUser['class']->GetBoostsData()['boostsForBuy'];
                            foreach($boostsForBuy as $f){
                                if($f['id']=="BoostFullAvailableTaps"){
                                    $avai_exists=((int)$f['maxLevel'])-((int)$f['level'])+1;
                                    if($f['cooldownSeconds'] == 0 && $avai_exists != 0){
                                        $objUser['class']->FullEnergy();
                                        continue 2;
                                    }
                                }
                            }
//            $objUser['class']->FullEnergy();

                            $objUsers[$key]['red_alarm_now']=0;
                            $objUsers[$key]['red_alarm_set']=2;
                        }



                        $count_tap=@$data['count'];
                        $earnCoinPerTap=@$data['clickerUser']['earnPerTap'];
//        $earnCoinWithTapAndProfit=((int)$earnCoinPerTap)+((int)$objUsers[$key]['last_coin']);
                        echo ($color)->formatPrint(['blue','bold'],"#");
                        echo " [ ";
                        echo ($color)->formatPrint([isset($data['clickerUser']) ? 'green' : 'red','bold'],isset($data['clickerUser']) ? "OK" : "KO" );
                        echo " ] => [ ".
                            ($color)->formatPrint(['green','bold'],date("Y"))."/".
                            ($color)->formatPrint(['white','bold'],date("m"))."/".
                            ($color)->formatPrint(['red','bold'],date("d"))." ".

                            ($color)->formatPrint(['red','bold'],date("H")).":".
                            ($color)->formatPrint(['white','bold'],date("i")).":".
                            ($color)->formatPrint(['green','bold'],date("s")).
                            " ] => [ ". Formed(str_replace(['+','-'],'',$earnCoinWithTapAndProfit),7,str_starts_with($earnCoinWithTapAndProfit,'-') ? 'red' : 'green' ,' ' ) ." ] => [ AvTaps : ".Formed($availableTaps,5,'green','')." ] => [ ".Formed($objUser['id'],11,'green',' ')." ] => [ ".Formed(GetPrice($your_coin),8,'green',' ')." ]\n";

                        $objUsers[$key]['last_coin']=$your_coin;
                        $your_coin_Earn=$earnCoinPerTap*$count_tap;


                    }
                    __Sleep(rand(1,15));
                }


                break;
            case '3':
                while(true) {
                    $sys->cls();
                    echo "____________________\n";
                    $last_key = 0;
                    foreach ($users = json_decode(file_get_contents("users.json"), true) as $key => $user) {
                        echo "| [ " . ($key + 1) . " ] -> {{$user['name']}}\n";
                        $last_key = $key + 1;
                    }
                    echo "____________________\n";
                    echo "Your Choose for update ? ---> ";
                    $readbuff = trim(fgets(STDIN));
                    if (!is_numeric($readbuff) && ($readbuff < 1 && $readbuff > $last_key)) {
                        exit;
                    }
                    $sys->cls();
                    $q1 = "";
                    $q3 = "";

                    $from_id = $users[$readbuff - 1]['id'];
                    $name = $users[$readbuff - 1]['name'];
                    while (true) {
                        $hm = new Hamster($users[$readbuff - 1]['token']);
                        $sys->cls();
                        $GetData = $hm->sync();
//                        echo json_encode($GetData);
//                        exit;
                        $profit = GetPrice((int)@$GetData['clickerUser']['earnPassivePerHour']);
                        $coin = GetPrice((int)@$GetData['clickerUser']['balanceCoins']);
                        if($coin == 0 && $profit == 0){
                            continue;
                        }

                        echo <<<MAME
|\033[31m---------$q1\033[0m|
|# ID   : \033[34m$from_id{$q3}\033[0m|
|# Name : \033[32m$name\033[0m|
|# Coin : \033[34m$coin\033[0m|
|# Profit : \033[32m$profit\033[0m|
|\033[31m---------$q1\033[0m|
MAME;
                        echo "\n\n";
                        $carts = @$hm->get_carts();
                        $maxRatio = -INF;
                        $cartName = '';
                        $p1 = 0;
                        $p2 = 0;
                        $key = 0;
                        $sum = 0;
                        $sumprofit = 0;
                        foreach ($carts as $k => $cart) {
                            if ($cart['price'] == 0) {
                                continue;
                            }
                            $ratio = $cart['profitPerHourDelta'] / $cart['price'];
                            if ($ratio > $maxRatio && $cart['profitPerHourDelta'] > 0 && $cart['price'] > 0 && $cart['isAvailable'] == true && $cart['isExpired'] == false  /*&& (@$cart['cooldownSeconds'] == 0 || !isset($cart['cooldownSeconds'] ) )*/
                            ) {
                                if (@$cart['cooldownSeconds'] == 0 || !isset($cart['cooldownSeconds'])) {
                                    /// CoolDown nadarad!
                                } else {
                                    continue;
                                }

                                $maxRatio = $ratio;
                                $cartName = $cart['name'];
                                $p1 = $cart['price'];
                                $p2 = $cart['profitPerHourDelta'];
                                $key = $k;
                            }
                        }
//                    sleep(5);
                        if ($cartName) {
                            echo $cartName . "\n";
                            $sum += $p1;
                            $sumprofit += $p2;
                            echo $p1 . "\n" . $p2 . " " . "\n ----" . number_format($sum) . "--" . number_format($sumprofit) . "------\n";
                            echo("Upgrade?(y/n) ---> ");
                            $do_i_upgrade = trim(fgets(STDIN));
                            if (strtolower($do_i_upgrade) == "y") {
                                $res = $hm->UpgradeCarts($carts[$key]['id']);
                                echo "\n OK";
                                $sumprofit = 0;
                                $sum = 0;
                            }
                            else{
                                break;
                            }
                        }
                    }
                }





                break;
            case '4':
                $sys->cls();
                break;
            case '5':
                $sys->cls();
                echo ($Color)->formatPrint(['red','blackbg','bold'],"Exiting...\n");
                exit;
            default:
                echo "Invalid choice. Please try again.\n";
        }
    }
}

// اجرای برنامه اصلی
main();



//new Hamster();
