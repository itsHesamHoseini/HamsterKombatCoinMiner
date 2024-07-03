<?php
class Color
{
    
public array $datas = ['red' => "\033[31m",
'green' => "\033[32m",
'yellow' => "\033[33m",
'purple' => "\033[35m",
'cyan' => "\033[36m",
'blue' => "\033[34m",
'rest' => "\033[0m"];
    public function Color(String $Color_name):string
    {
        return $this->datas[$Color_name];
    }
    public function formatPrint(array $format=[],string|null $text = '') {
        $codes=[
            'bold'=>1,
            'italic'=>3, 'underline'=>4, 'strikethrough'=>9,
            'black'=>30, 'red'=>31, 'green'=>32, 'yellow'=>33,'blue'=>34, 'magenta'=>35, 'cyan'=>36, 'white'=>37,
            'blackbg'=>40, 'redbg'=>41, 'greenbg'=>42, 'yellowbg'=>44,'bluebg'=>44, 'magentabg'=>45, 'cyanbg'=>46, 'lightgreybg'=>47
        ];
        $formatMap = array_map(function ($v) use ($codes) { return $codes[$v]; }, $format);
        return "\e[".implode(';',$formatMap).'m'.$text."\e[0m";

    }
    public function formatPrintLn(array $format=[], string $text='') {
        formatPrint($format, $text); echo "\r\n";
    }

}
