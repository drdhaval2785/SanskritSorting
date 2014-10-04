<?php
/* set execution time to an hour */
ini_set('max_execution_time', 36000);
/* set memory limit to 1000 MB */
ini_set("memory_limit","1000M");
include "C:\\xampp\\htdocs\\sanskrit\\dev-slp.php";
include "C:\\xampp\\htdocs\\sanskrit\\function.php";
$file=file('PWKslp.txt');
//$file = array_map("convert1",$file);
$hlplus = array_merge($hl,array("M","H"));

/* VV pattern */
/*foreach ($file as $value)
{
    if(preg_match('/([aAiIuUfFxXeEoO][aAiIuUfFxXeEoO])/',$value))
    {
        $vvwords[] = $value; 
        $vvraw = preg_split('/([aAiIuUfFxXeEoO][aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $vv[] = $vvraw[1];        
    }
}
$vv=  array_unique($vv);
$vv=  array_values($vv);
$vv = sort($vv);
*/

/* VCV pattern */
/*$vcv=array();
foreach ($file as $value)
{
    if(preg_match('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value))
    {
        $vcvwords[] = $value; 
        $vcvraw = preg_split('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $i=2;
        while($i<count($vcvraw))
        { 
        $vcv=array_merge($vcv,array($vcvraw[$i-1])); 
        $i=$i+2;
        }
    }
}
$vcv=  array_unique($vcv);
$vcv=  array_values($vcv);
$vcv = sort($vcv);
 */

/* VCCV pattern */
/*$vccv=array();
foreach ($file as $value)
{
    if(preg_match('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value))
    {
        $vccvwords[] = $value; 
        $vccvraw = preg_split('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $i=2;
        while($i<count($vccvraw))
        {
            $vccv=array_merge($vccv,array($vccvraw));
            $i=$i+2;
        }
    }
}
$vccv = array_unique($vccv);
$vccv = array_values($vccv);
sort($vccv);
print_r($vccv);
*/
/* VCCCV pattern */
/*$vcccv=array();
foreach ($file as $value)
{
    if(preg_match('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value))
    {
        $vcccvwords[] = $value; 
        $vcccvraw = preg_split('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $i=2;
        while($i<count($vcccvraw))
        {
            $vcccv=array_merge($vcccv,array($vcccvraw[$i-1]));
            $i=$i+2;
        }
    }
}
$vcccv = array_unique($vcccv);
$vcccv = array_values($vcccv);
sort($vcccv);
print_r($vcccv);*/

/* VCCCCV pattern */
function vccccv($a)
{
$file= file($a);
$vccccv=array();
foreach ($file as $value)
{
    if(preg_match('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value))
    {
        $vccccvwords[] = $value; 
        $vccccvraw = preg_split('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $i=2;
        while($i<count($vccccvraw))
        {
            $vccccv=array_merge($vccccv,array($vccccvraw[$i-1]));
            $i=$i+2;
        }
    }
}
$vccccv = array_unique($vccccv);
$vccccv = array_values($vccccv);
sort($vccccv);
return $vccccv;
}

$input = vccccv("PWKslp.txt");
//print_r($input);
/* testing in MW */
$file1=file("MWslp.txt");
foreach ($file1 as $value)
{
    if(preg_match('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value))
    {
        $vccccvex = preg_split('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);        
        $i=2;
        while ($i<count($vccccvex))
        {
            if ( !in_array($vccccvex[$i-1],$input ))
            {
                echo '<b style="color:red">'.$value." - ".$vccccvex[$i-1]."</b><br>";
            }
            else
            {
                echo $value." - ".$vccccvex[$i-1]."<br>";
            }
            $i=$i+2;
        }
    }
}



















/* VCCCCCV pattern */
/*$vcccccv=array();
foreach ($file as $value)
{
    if(preg_match('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value))
    {
        $vcccccvwords[] = $value; 
        $vcccccvraw = preg_split('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $i=2;
        while($i<count($vcccccvraw))
        {
            $vcccccv=array_merge($vcccccv,array($vcccccvraw[$i-1]));
            $i=$i+2;
        }
//        echo $vcccccv."<br>";
    }
}
$vcccccv = array_unique($vcccccv);
$vcccccv = array_values($vcccccv);
print_r($vcccccv);
*/

// Pending from here.

/* start-CC pattern */
/*foreach ($file as $value)
{
    if(preg_match('/^([kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs])/',$value))
    {
//        echo $value." - ";
        $ccwords[] = $value; 
        $ccraw = preg_split('/^([kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $i=2;
        while($i<count($ccraw))
        {
            $cc="";
            $cc=$cc.$ccraw[$i-1].",";
            $i=$i+2;
            $ccarray[] = $cc;
        }
//        echo $cc."<br>";
    }
}
$ccarray = array_unique($ccarray);
$ccarray = array_values($ccarray);
sort($ccarray);
print_r($ccarray);
echo count($ccarray)."<br>";
echo count($hlplus)*count($hlplus);*/
/* CC-end pattern */
/*foreach ($file as $value)
{
    $value=trim($value);
    if(preg_match('/([kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs])$/',$value))
    {
//        echo $value." - ";
        $ccwords[] = $value; 
        $ccraw = preg_split('/([kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs])$/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $i=2;
        while($i<count($ccraw))
        {
            $cc="";
            $cc=$cc.$ccraw[$i-1].",";
            $i=$i+2;
            $ccarray[] = $cc;
        }
//        echo $cc."<br>";
    }
}
$ccarray = array_unique($ccarray);
$ccarray = array_values($ccarray);
sort($ccarray);
print_r($ccarray);
echo count($ccarray)."<br>";
echo count($hlplus)*count($hlplus);*/
/* CCC-end pattern */
/*foreach ($file as $value)
{
    $value=trim($value);
    if(preg_match('/([kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs])$/',$value))
    {
//        echo $value." - ";
        $ccwords[] = $value; 
        $ccraw = preg_split('/([kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs])$/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $i=2;
        while($i<count($ccraw))
        {
            $cc="";
            $cc=$cc.$ccraw[$i-1].",";
            $i=$i+2;
            $ccarray[] = $cc;
        }
//        echo $cc."<br>";
    }
}
$ccarray = array_unique($ccarray);
$ccarray = array_values($ccarray);
sort($ccarray);
print_r($ccarray);
echo count($ccarray)."<br>";
echo count($hlplus)*count($hlplus)*count($hlplus);
*/
/* CCCC-end pattern */
/*foreach ($file as $value)
{
    $value=trim($value);
    if(preg_match('/([kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs])$/',$value))
    {
//        echo $value." - ";
        $ccwords[] = $value; 
        $ccraw = preg_split('/([kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs])$/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $i=2;
        while($i<count($ccraw))
        {
            $cc="";
            $cc=$cc.$ccraw[$i-1].",";
            $i=$i+2;
            $ccarray[] = $cc;
        }
//        echo $cc."<br>";
    }
}
$ccarray = array_unique($ccarray);
$ccarray = array_values($ccarray);
sort($ccarray);
print_r($ccarray);
echo "<br>".count($ccarray)."<br>";
echo count($hlplus)*count($hlplus)*count($hlplus);
*/
?>