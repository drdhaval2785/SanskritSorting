<?php
// accent_old2new.php
// Feb 3, 2013 ejf
// Converts old accents to new; the old is the monier.xml convention.
// checks in (a) key2, and (b) all <s> elements.
// Writes out a line for each line in input; counts the lines where
// there was a change from old to new accents.
// July 8, 2014:  Also change 
// (a) <!DOCTYPE monier SYSTEM "monier.dtd"> to 
//     <!DOCTYPE mw SYSTEM "mw.dtd">
// (b) <monier> to <mw>
// (c) </monier> to </mw>

error_reporting(E_ALL ^ E_NOTICE); // all errors except 'PHP Notice:'
$filein1 = $argv[1];  // e.g. monier.xml or monier_input.txt
$fileout1 = $argv[2];
$fpout1 = fopen($fileout1,"w") or die("Cannot open $fileout1\n");

$fp = fopen($filein1,"r") or die("Cannot open $filein1\n");
$n1=0;
$n=0;
$conhash = array(
 '<!DOCTYPE monier SYSTEM "monier.dtd">' => '<!DOCTYPE mw SYSTEM "mw.dtd">',
 '<monier>' => '<mw>',
 '</monier>' => '</mw>'
);
while (!feof($fp)) {
 $line = fgets($fp);
 $line = trim($line);
 $n++;
 $line1 = $conhash[$line];
 if (! $line1) {
  $line1 = accent_old2new($line);
 }
 if ($line1 != $line) {
  $n1++;
 }
 fwrite($fpout1,"$line1\n");
 //if ($n1>=10) {break;} // dbg
}
echo "$n lines read from $filein1\n";
echo "$n lines written to $fileout1\n";
echo "$n1 lines were altered on account of accents\n";
exit(0);
function accent_old2new($x) {
 $x1 = preg_replace_callback('|<(key2)>(.*?)</key2>|',"accent_old2new_callback",$x);
 $x2 = preg_replace_callback('|<(s)>(.*?)</s>|',"accent_old2new_callback",$x1);

 return $x2;
}
function accent_old2new_callback($matches) {
 // assume $matches[0] = <$elt>$y</$elt>
 // return <$elt>$z</$elt>,
 // where $z converts accents in string $y from old to new form.
 // The logic is that the old form is:  <accent><vowel>
 // The new form is <vowel><accent>
 $orig = $matches[0];
 $elt = $matches[1];
 $y = $matches[2];
 // Note '\\' since we want a literal backslash
 $z = preg_replace('|([/\\^])([aAiIuUfFeEoO])|',"$2$1",$y);
 $ans = "<$elt>$z</$elt>";
 if ($orig != $ans) {
  //echo "CHANGE: $orig  ==>  $ans\n";
 }
 return $ans;
}

function accent_new2old($x) {
 $x1 = preg_replace_callback('|<(key2)>(.*?)</key2>|',"accent_new2old_callback",$x);
 $x2 = preg_replace_callback('|<(s)>(.*?)</s>|',"accent_new2old_callback",$x1);
 return $x2;
}
function accent_new2old_callback($matches) {
 // assume $matches[0] = <$elt>$y</$elt>
 // return <$elt>$z</$elt>,
 // where $z converts accents in string $y
 $orig = $matches[0];
 $elt = $matches[1];
 $y = $matches[2];
 // Note '\\' since we want a literal backslash
 $z = preg_replace('|([aAiIuUfFeEoO])([/\\^])|',"$2$1",$y);
 $ans = "<$elt>$z</$elt>";
 if ($orig != $ans) {
  //echo "CHANGE: $orig  ==>  $ans\n"; // dbg
 }
 return $ans;
}

?>
