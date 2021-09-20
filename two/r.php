<?php

if (isset($_POST)) 
{
    print("error: " . $_POST['error']);
    $error = $_POST['error'];
    print("<br>warning: " . $_POST['warning']);
    $warning = $_POST['warning'];
}                                                //обрабатываем форму и выводим полученные данные

$k=0;                                            //счётчик коммитов
$impos=0;                                        //флаг невозможности исправления кода

if ($error%2==1 and $warning==0)                 //проверяем возможность исправления кода
{
	$impos=1;
}

$k+=intdiv($error,2);                            //избавляемся от всех возможных фатальных ошибок
$error %= 2;

if ($warning%2==1)                               //делаем четное количество ворнингов
{
	$warning++;
	$k++;
}

if ($error==1)                                   //считаем количество коммитов: делаем четное
{                                                //количество фатальных ошибок с помощью ворнингов
	if ($warning/2%2==1)                         
	{
		$error+=$warning/2;
		$k+=$warning/2+$error/2;
	}
	else
	{
		$error+=($warning+2)/2;
		$k+=($warning+2)/2+2+$error/2;
	}
}
else
{
	if ($warning/2%2==1)
	{
		$k+=($warning+2)/4*3+2;
	}
	else
	{
		$k+=$warning/4*3;
	}
}

if ($impos==0)                                   //проверяем флаг и выводим результат
{
	echo "<br>Commits = $k";
}
else
{
	echo "<br>Commits = -1";
}
?>