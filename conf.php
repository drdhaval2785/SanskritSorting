<?php
/* Configuration of the Sorting Script */
/*$input="C:\\devanagari.txt";
$outfile="C:\\devanagarisorted1.txt";
$outfile2="C://devanagarisorted2.html";
$outfile3="C://devanagarisorted3.html";
$pratyayas = file("morphologicends.txt");
$pratyayastatistics=fopen("C:\\pratyayastatistics.txt","w+");
 */
$base="D://!sorting//";
//define('BASE_PATH','d://sorting//'); 
$input=$base.'devanagari.txt'; 
$pratyayas = file($base.'morphologicends.txt');

/* Output */
$outfile=$base.'devanagarisorted1.txt';
$outfile2=$base.'devanagarisorted2.html';
$outfile3=$base.'devanagarisorted3.html';
$pratyayastatistics=fopen($base.'pratyayastatistics.txt',"w+");
?>
