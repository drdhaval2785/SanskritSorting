<?php
// set execution time to an hour
ini_set('max_execution_time', 360000);
// set memory limit to 1000 MB
ini_set("memory_limit","1000000M");
$characters = array("\\r\\n\\u0905","\\r\\n\\u0906","\\r\\n\\u0907","\\r\\n\\u0908","\\r\\n\\u0909","\\r\\n\\u090a","\\r\\n\\u090b","\\r\\n\\u0960","\\r\\n\\u090c","\\r\\n\\u0961","\\r\\n\\u090f","\\r\\n\\u0910","\\r\\n\\u0913","\\r\\n\\u0914","\\r\\n\\u0915","\\r\\n\\u0916","\\r\\n\\u0917","\\r\\n\\u0918","\\r\\n\\u0919","\\r\\n\\u091a","\\r\\n\\u091b","\\r\\n\\u091c","\\r\\n\\u091d","\\r\\n\\u091e","\\r\\n\\u091f","\\r\\n\\u0920","\\r\\n\\u0921","\\r\\n\\u0922","\\r\\n\\u0923","\\r\\n\\u0924","\\r\\n\\u0925","\\r\\n\\u0926","\\r\\n\\u0927","\\r\\n\\u0928","\\r\\n\\u092a","\\r\\n\\u092b","\\r\\n\\u092c","\\r\\n\\u092d","\\r\\n\\u092e","\\r\\n\\u092f","\\r\\n\\u0930","\\r\\n\\u0932","\\r\\n\\u0935","\\r\\n\\u0936","\\r\\n\\u0937","\\r\\n\\u0938","\\r\\n\\u0939");
$utf = array ('"\u0905"','"\u0906"','"\u0907"','"\u0908"','"\u0909"','"\u090a"','"\u090b"','"\u0960"','"\u090c"','"\u0961"','"\u090f"','"\u0910"','"\u0913"','"\u0914"','"\u0915"','"\u0916"','"\u0917"','"\u0918"','"\u0919"','"\u091a"','"\u091b"','"\u091c"','"\u091d"','"\u091e"','"\u091f"','"\u0920"','"\u0921"','"\u0922"','"\u0923"','"\u0924"','"\u0925"','"\u0926"','"\u0927"','"\u0928"','"\u092a"','"\u092b"','"\u092c"','"\u092d"','"\u092e"','"\u092f"','"\u0930"','"\u0932"','"\u0935"','"\u0936"','"\u0937"','"\u0938"','"\u0939"');
$text = file_get_contents("C:\\devanagari.txt");
$text = json_encode($text);
$text = str_replace("\\ufeff","\\r\\n",$text);
//echo $text."</br>";
//file_put_contents("C:\\devanagarisorted.txt",$text);
for ($i=0; $i<count($characters); $i++)
{
    if(strpos($text,$characters[$i])!==false)
    {
$array[$i] = strstr($text,$characters[$i],true);
$text = strstr($text,$characters[$i]);
    }

}
//print_r($array);
for ($i=0; $i<count($characters)-1; $i++)
{ 
$characters[$i] = str_replace("\r\n","",$characters[$i]);
$output[$i] = "\r\nStart of ".json_decode($utf[$i])."\r\n".json_decode('"'.$array[$i+1].'"')."\r\n";
}
$output = implode("",$output);
$output2= "\r\nStart of ".json_decode($utf[count($utf)-1]).json_decode('"'.$text);
$output = ltrim(chop($output.$output2));
file_put_contents("C:\\devanagarisorted.txt",$output);
?>
