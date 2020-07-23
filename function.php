<?php

function getNepaliNumberFormat($number, $division=1000, &$last = array()){
    if($number < 1000 && empty($last)){
        return eng_nep($number);
    }

    $rem = $number%$division;

    if($division == 100 && $rem == 0){
    	$rem = "00";
    }

    if($division == 1000 && $rem == 0){
    	$rem = "000";
    }

    $quo = (int)($number/$division);
    $last[] =$rem;

    if($quo > 99){
        getNepaliNumberFormat($quo, 100, $last);
    } else {
        $last[] = (int)($quo);
    }

    $nep = implode(",", array_reverse($last));

    return eng_nep($nep);
}

function eng_nep($eng_str){
    $replace 	= array("१","२","३","४","५","६","७","८","९","०" );
    $find 	 	= array("1","2","3","4","5","6","7","8","9","0" );
    $nep_str	=  str_replace($find, $replace, $eng_str);
    return $nep_str;
}

echo getNepaliNumberFormat(1);
echo "<br>";
echo getNepaliNumberFormat(10);
echo "<br>";
echo getNepaliNumberFormat(100);
echo "<br>";
echo getNepaliNumberFormat(1000);
echo "<br>";
echo getNepaliNumberFormat(10000);
echo "<br>";
echo getNepaliNumberFormat(100000);
echo "<br>";
echo getNepaliNumberFormat(1000000);
echo "<br>";
echo getNepaliNumberFormat(10000000);
echo "<br>";
echo getNepaliNumberFormat(100000000);
echo "<br>";
echo getNepaliNumberFormat(1000000000);
echo "<br>";
echo getNepaliNumberFormat(10000000000);
echo "<br>";
echo getNepaliNumberFormat(10000000000);
echo "<br>";
