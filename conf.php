<?php
/* Configuration of the Sorting Script */

/* input file */
$base="D://!sorting//";
// for reverse 
$input=$base.'dev_reverse_input.txt'; 
// for multi
$in=$base.'dev_normal_input.txt';
/* pratyaya file */
$pratyayas = file($base.'dev_morphologicends.txt');

/* Output file for reverse sorting */
$outmulti1=$base.'normalsorted1.txt';
$outmulti2=$base.'normalsorted2.html';
$outmulti3=$base.'normalsorted3.html';
$outmulti4=$base.'normalsorted4.txt';
$pratyayamulti=$base.'pratyayastatistics_normal.txt';

/* Output file for reverse sorting */
$outfile=$base.'reversesorted1.txt';
$outfile2=$base.'reversesorted2.html';
$outfile3=$base.'reversesorted3.html';
$outfile4=$base.'reversesorted4.txt';
$pratyayareverse=$base.'pratyayastatistics_reverse.txt';

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
 