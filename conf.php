<?php
/* Configuration of the Sorting Script */

/* input file */
$base="D://!sorting//";
//define('BASE_PATH','d://sorting//'); 
$input=$base.'devanagari.txt'; 
$pratyayas = file($base.'morphologicends.txt');

/* Output file */
$outfile=$base.'devanagarisorted1.txt';
$outfile2=$base.'devanagarisorted2.html';
$outfile3=$base.'devanagarisorted3.html';
$outfile4=$base.'devanagarisorted4.txt';
$pratyayastatistics=fopen($base.'pratyayastatistics.txt',"w+");

/* panchama letter option */
$panchama=0; 
// 0 - off. Default. 
//1 - On. This optiona converts the anusvAra to corresponding panchama varga letter. e.g. aMka (अंक) -> aNka (अङ्क) 
$display=1; 
// 1 - header + counter for different headers + separate identity for 'kA',"khA' etc
// 2 - header + counter for different headers (without 'kA','khA' etc)
// 3 - only list and no header
// 4 for sorting pratyayawise with numbers of words ending with pratyayas.
$slashdef=2; 
// 1 - add \ at the start and end of words. 
//2 - add # at the start and end of word.
?>
 