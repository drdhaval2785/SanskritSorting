<?php
function slptoiast($text)
{
    // defining IAST letters.
    $iast = array("a","ā","i","ī","u","ū","ṛ","ṝ","ḷ","ḹ","e","ai","o","au","ṃ","ḥ","kh","ch","ṭh","th","ph","gh","jh","ḍh","dh","bh","ṅ","ñ","ṇ","k","c","ṭ","t","p","g","j","ḍ","d","b","n","m","y","r","l","v","s","h","ś","ṣ",);
    // defining SLP1 letters.
    $slp = array("a","A","i","I","u","U","f","F","x","X","e","E", "o","O", "M","H","K", "C",  "W", "T", "P","G", "J",  "Q", "D","B", "N","Y","R","k","c","w","t","p","g","j","q","d","b","n","m","y","r","l","v","s","h","S","z",);
    $text = str_replace($slp,$iast,$text);
    return $text;
}
function addaccent($text)
{
    $a=array("a\\","a/","a^","ā\\","ā/","ā^","i\\","i/","i^","ī\\","ī/","ī^","u\\","u/","u^","ū\\","ū/","ū^","ṛ\\","ṛ/","ṛ^","ṝ\\","ṝ/","ṝ^","ḷ\\","ḷ/","ḷ^","e\\","e/","e^","o\\","o/","o^",);
    $b=array("à","á","â","ā̀","ā́","ā̂","ì","í","î","ī̀","ī́","ī̂","ù","ú","û","ū̀","ū́","ū̂","ṛ̀","ṛ́","ṛ̂","ṝ̀","ṝ́","ṝ̂","ḷ̀","ḷ́","ḷ̂","è","é","ê","ò","ó","ô");
$text = str_replace($a,$b,$text);
return $text;
}

$in = file("mw.txt");
$savefile = fopen("mw-iast-accent.txt","r");
$in = array_map('trim',$in);
$out = array_map('slptoiast',$in);
$out = array_map('addaccent',$out);
$output = implode("\n",$out);
file_put_contents("mw-iast-accent.txt",$output);
fclose($savefile);
?>