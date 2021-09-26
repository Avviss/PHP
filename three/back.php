<!DOCTYPE HTML>                                                                         
<html lang="ru">
  <head>
    <meta charset="utf-8">  
    <title>Форма</title>
  </head>
  <body>
      <form name="feedback" method="POST" action="#">
        <label>n: <input type="number" name="n"></label>
        <label>k: <input type="number" name="k"></label>
        <input type="submit" name="send" value="send">
        <input type="hidden" name="1" value="1">
      </form>
      <br/>
  </body>
</html>


<?php

if (isset($_POST['1'])) 
{
    print("n: " . $_POST['n']);                                                         //обрабатываем форму и выводим полученные данные
    $n = $_POST['n'];
    print("<br>k: " . $_POST['k']."<br/>");
    $k = $_POST['k'];

    if (($n>0) and ($k>0) and ($k<=$n))                                                 //условия существования числа в ряду и самого ряда
    {    
    	$length_K = strlen($_POST['k']);
      $length_K0= $length_K;                                               
    	$length_N = strlen($_POST['n']);
      if (($length_K == $length_N) or ($n == $k)) {$avers = 1;}            
      else {$avers = 0;}
	    $r = $length_N - $length_K;
      $length_K += $r;

      if (intdiv($n, 10**$r) - $k < 0)                                                  //количество цифр перед искомым максимального разряда
      {
        $avers += $n - 10**($length_N - 1) + 1;
      }
      else 
      {
        $avers += $k * 10**$r - 10**($length_K - 1); 
      }

      $k = $k * 10**($r - 1);  
      $length_K--;

	    for (; $length_K > $length_K0; $length_K--, $k = intdiv($k, 10))                  //сколько чисел каждого другого разряда перед искомым
	    {
        $avers += $k - 10**($length_K - 1);    
	    }
	    for (;$length_K <= $length_K0, $length_K > 0; $length_K--, $k = intdiv($k, 10))
      {
        $avers += $k - 10**($length_K - 1) + 1;    
      }

	    echo "<br><br>Место числа: $avers";                                                        
    }

    else {echo "<br><br>ERROR";}                                                        //сообщение при неправильной задаче n и k
}                                                
?>