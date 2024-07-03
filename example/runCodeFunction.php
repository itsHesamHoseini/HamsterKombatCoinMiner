<?php

$list=[];
function GetProxy(){
    $url="https://api.proxyscrape.com/v3/free-proxy-list/get?request=getproxies&skip=0&proxy_format=protocolipport&format=json&limit=20&timeout=1000";
    $js=json_decode(file_get_contents($url),true);
    global $list;
    foreach($js['proxies'] as $row){
        $list[]=$row['ip'].":".$row['port'];
    }
}
function GetRandomProxy(){
    global $list;
    return $list[ rand ( 0, count($list) - 1 ) ];
}

function GetPrice(int|null $price){
    if($price >= 1000000000){
        return number_format($price/1000000000,2)."B";
    }
    elseif($price >= 1000000){
        return number_format($price/1000000,2)."M";
    }
    elseif($price >= 1000){
        return number_format($price/1000,2)."K";
    }
}
function Formed(string|null $text,int|null $converted_to_it,string|null $text_color,string|null $tag='#',bool $be_first_of_string=true){
    if(mb_strlen($text)==($strlen=strlen($text))){
        if($strlen < $converted_to_it) {
            global $color;
            if ($be_first_of_string) {
                return str_repeat($tag,$converted_to_it-$strlen).($color)->formatPrint([$text_color,'bold'],$text);
            }
            else/*if(!$be_first_of_string)*/{
                return ($color)->formatPrint([$text_color,'bold'],$text).str_repeat($tag,$converted_to_it-$strlen);
            }
        }
        return $text;
    }
    else{
        return $text;
    }
}

function __Sleep($s){
    global $color;
    echo ($color)->formatPrint(['green','bold'],"#") . " <----- ".($color)->formatPrint(['red','bold'],"Sleep {$s}s")." ----->"."\n";
    sleep($s);
}
function __Ingoring($ing_reason):bool
{
    global $color;
    echo ($color)->formatPrint(['green','bold'],"#") . " <----- ".($color)->formatPrint(['red','bold'],"Ingored [$ing_reason]")." ----->"."\n";
    return true;
}
