<?php
/* Configuration of the Sorting Script */

/* input file */
//$base="D://!sorting//";

//$input=$base.'input//input.txt'; 
/* pratyaya file */
//$pratyayas = file($base.'input//morphologicends.txt');

/* Output file for reverse sorting */
$outmulti1=$base.'//normalsorted1.txt';
$outmulti2=$base.'//normalsorted2.html';
$outmulti3=$base.'//normalsorted3.html';
$outmulti4=$base.'//normalsorted4.txt';
//$pratyayamulti=$base.'pratyayastatistics_normal.txt';

/* Output file for reverse sorting */
$outfile=$base.'//reversesorted1.txt';
$outfile2=$base.'//reversesorted2.html';
$outfile3=$base.'//reversesorted3.html';
$outfile4=$base.'//reversesorted4.txt';
$pratyayareverse=$base.'//reverse_pratyaya_stats.txt';

/*html head */
$htmlhead='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <META HTTP-EQUIV="Content-Language" CONTENT="HI">
  <!--<meta name="language" content="hi"> -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </meta>
  
</head>
    <body>';

/* panchama letter option */
$panchama=0; 
// 0 - off. Default. 
//1 - On. Converts the anusvAra to corresponding panchama varga letter. e.g. aMka (अंक) -> aNka (अङ्क) 
$display=1; 
// 1 - header + counter for different headers + separate identity for 'kA',"khA' etc
// 2 - header + counter for different headers (without 'kA','khA' etc)
// 3 - only list and no header
// 4 for sorting pratyayawise with numbers of words ending with pratyayas.
$slashdef=2; 
// 1 - add \ at the start and end of words. 
//2 - add # at the start and end of word.
?>
 
