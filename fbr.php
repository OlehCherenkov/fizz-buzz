<?php
$handle = fopen("php://stdin","r");
$file = fopen("tests.txt", "c+");
echo "Enter first number - [Fizz]:\n";
$getfizz = fgets($handle);
fwrite($file, $getfizz);
echo "Enter second number - [Buzz]:\n";
$getbuzz = fgets($handle);
fwrite($file, $getbuzz);
echo "Enter random number that bigger than first and second:\n";
$getrnum = fgets($handle);
fwrite($file, $getrnum);
$start = microtime(true);
$filearr = file("tests.txt");
$fizzarr = $filearr[0];
$buzzarr = $filearr[1];
$rnumarr = $filearr[2];
$fizzbuzz = function ($i) use ($fizzarr, $buzzarr){
    if($i % $fizzarr == 0 && $i % $buzzarr == 0){
        return "|FB| ";
    }
    else if($i % $fizzarr == 0){
        return "|F| ";
    }
    else if($i % $buzzarr == 0){
        return "|B| ";
    }
    else {
        return "|".$i."| ";
    }
};
$result = implode(" ", array_map($fizzbuzz, range(1, $rnumarr)));
print_r("\n\tResult of working Fizz-Buzz Function:\n".$result);
$filedata = fopen("file.txt", "w+");
fwrite($filedata, $result);
$arrdata = file('file.txt');
if($result == $arrdata[0]){
	echo "\n\nVerification the result written in the file with the result in the console - true.\n";
	} else {
		echo "\n\nVerification the result written in the file with the result in the console - false.\n";
		}
$time = microtime(true) - $start;
printf('Script time: %.3F second.', $time);
fclose($file);
fclose($filedata);
?>