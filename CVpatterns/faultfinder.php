﻿<?php
/* set execution time to an hour */
ini_set('max_execution_time', 36000);
/* set memory limit to 1000 MB */
ini_set("memory_limit","1000M");
include "C:\\xampp\\htdocs\\sanskrit\\dev-slp.php";
include "C:\\xampp\\htdocs\\sanskrit\\function.php";
include "C:\\xampp\\htdocs\\sanskrit\\mystyle.css";
$file=file('c:\\devanagari.txt');
$file = array_map("convert1",$file);
$hlplus = array_merge($hl,array("M","H"));

/* VV pattern */
echo "The following are VV patterns which have to be checked for correctness :";
foreach ($file as $value)
{
    if(preg_match('/([aAiIuUfFxXeEoO][aAiIuUfFxXeEoO])/',$value))
    {
//        echo $value." - ";
        $vvraw = preg_split('/([aAiIuUfFxXeEoO][aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $vv = $vvraw[1];
        echo $vv."<br>";
    }
}
/* VCV pattern */
/*foreach ($file as $value)
{
    if(preg_match('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value))
    {
        echo $value." - ";
        $vvwords[] = $value; 
        $vvraw = preg_split('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $vv = $vvraw[1];
        echo $vv."<br>";
    }
}*/
/* VCCV pattern */
/*foreach ($file as $value)
{
    if(preg_match('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value))
    {
//        echo $value." - ";
        $vccvwords[] = $value; 
        $vccvraw = preg_split('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $i=2;
        while($i<count($vccvraw))
        {
            $vccv="";
            $vccv=$vccv.$vccvraw[$i-1].",";
            $i=$i+2;
            $vccvarray[] = $vccv;
        }
//        echo $vccv."<br>";
    }
}
$vccvarray = array_unique($vccvarray);
$vccvarray = array_values($vccvarray);
sort($vccvarray);
print_r($vccvarray);
echo count($vccvarray)."<br>";
echo count($ac)*count($hlplus)*count($hlplus)*count($ac);
*/
/* VCCCV pattern */
/*foreach ($file as $value)
{
    if(preg_match('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value))
    {
//        echo $value." - ";
        $vcccvwords[] = $value; 
        $vcccvraw = preg_split('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $i=2;
        while($i<count($vcccvraw))
        {
            $vcccv="";
            $vcccv=$vcccv.$vcccvraw[$i-1].",";
            $i=$i+2;
            $vcccvarray[] = $vcccv;
        }
//        echo $vcccv."<br>";
    }
}
$vcccvarray = array_unique($vcccvarray);
$vcccvarray = array_values($vcccvarray);
sort($vcccvarray);
print_r($vcccvarray);
echo count($vcccvarray)."<br>";
echo count($ac)*count($hlplus)*count($hlplus)*count($hlplus)*count($ac);
*/
/* VCCCCV pattern */
$invccccv=array( [0] => ANktra, [1] => ANktya, [2] => ANkzya, [3] => Andrya, [4] => Antrya, [5] => ArSvya, [6] => ArdDya, [7] => ArkzRu, [8] => ArkzyA, [9] => Arkzya, [10] => Artrya, [11] => Artsna, [12] => Artvya, [13] => ArzRya, [14] => Arzwya, [15] => Astvya, [16] => AtsTya, [17] => EkzRya, [18] => IkzRya, [19] => Okzmya, [20] => Ukzmya, [21] => Urkzya, [22] => aNktyu, [23] => akzmyA, [24] => antrya, [25] => apsnya, [26] => arkzya, [27] => artsya, [28] => arttrI, [29] => attrya, [30] => azwrya, [31] => ettrya, );
echo "The following are VV patterns which have to be checked for correctness :";
foreach ($file as $value)
{
    if(preg_match('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value))
    {
        $vccccvraw = preg_split('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        if(count(array_diff($vccccvraw,$invccccv))>0 && count($vccccvraw)>1)
        {
            echo $value."<br>";
        }
        
    }
$vccccvarray = array_unique($vccccvarray);
$vccccvarray = array_values($vccccvarray);
sort($vccccvarray);
print_r($vccccvarray);
echo count($vccccvarray)."<br>";
echo count($ac)*count($hlplus)*count($hlplus)*count($hlplus)*count($hlplus)*count($ac);

/* VCCCCCV pattern */
/*foreach ($file as $value)
{
    if(preg_match('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value))
    {
//        echo $value." - ";
        $vcccccvwords[] = $value; 
        $vcccccvraw = preg_split('/([aAiIuUfFxXeEoO][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][kKgGNcCjJYwWqQRtTdDnpPbBmyrlvzSs][aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        $i=2;
        while($i<count($vcccccvraw))
        {
            $vcccccv="";
            $vcccccv=$vcccccv.$vcccccvraw[$i-1].",";
            $i=$i+2;
            $vcccccvarray[] = $vcccccv;
        }
//        echo $vcccccv."<br>";
    }
}
$vcccccvarray = array_unique($vcccccvarray);
$vcccccvarray = array_values($vcccccvarray);
sort($vcccccvarray);
print_r($vcccccvarray);
echo count($vcccccvarray)."<br>";
echo count($ac)*count($hlplus)*count($hlplus)*count($hlplus)*count($hlplus)*count($hlplus)*count($ac);
*/

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