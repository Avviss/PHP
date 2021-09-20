<?php

if (isset($_POST)) 
{
    print("n: " . $_POST['n']);                                             //обрабатываем форму и выводим полученные данные
    $n = $_POST['n'];
    print("<br>k: " . $_POST['k']);
    $k = $_POST['k'];

    if (($n>0) and ($k>0) and ($k<=$n))                                     //условия существования числа в ряду и самого ряда
    {
    	$length_K = $k !== 0 ? floor(log10($k) + 1) : 1;                    //количество цифр в числах
    	$length_N = $n !== 0 ? floor(log10($n) + 1) : 1;

    	$rank = $length_K - 1;
	    $revers = $n - $k;                                                  //числа после искомого
	    $avers = 0;                                                         //числа перед искомым (включая его)
	    $r = $length_N - $length_K;
        
        if (intdiv($n, 10**$r) - $k < 0) {$avers = $n % 10**$r + 1;}
	    
	    for ($n > 0; $rank >= 0; $rank--, $k = intdiv($k, 10))              //считаем количество чисел после искомого
	    {
	    	$revers += 10**$rank - 1 - intdiv($k, 10);
	    }
	    
	    $avers += $n - $revers;                                             //искомое
	    echo "<br><br>Место числа: $avers";
    }
    else {echo "<br><br>ERROR";}
}                                                
?>