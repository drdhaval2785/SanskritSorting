<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hi" lang="hi">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
      <meta http-equiv="X-UA-Compatible" content="IE=8" />
      <meta http-equiv="content-language" content="hi" />
<body>
<?php
/* GRETIL UTF8 batch converter by Dr. Dhaval Patel
www.sanskritworld.in*/
/* Acknowledgements: The convert function has been used from the Dicrunch converter. (Markus "Ananda" Loponen). The html2txt function has been used from php.net site (admin at automapit dot com)*/ 
/* Known issues
Right now it deals the data in the bracket as foreign and doesn't convert it.
The GRETIL abbreviations are random. The code presumes that there is a Capital letter, an underscore and any amount of number and the last one can be a,b,c,d,e etc. 
The other patterns are not sorted out. Therefore the other patterns may be converted to devanagari. */
// set execution time to 1000 hour
ini_set('max_execution_time', 3600000);
// set memory limit to 100000 MB
ini_set("memory_limit","100000M");
// Your file goes here.
$file = "C:\\gretil1\\6427-dhatus.txt";

// Defining the functions used here.
function html2txt($document){ 
$search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript 
               '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags 
               '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly 
               '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA 
); 
$text = preg_replace($search, '', $document); 
return $text; 
}	 

function convert(&$text)
{
	$text = html2txt($text);
	$text = strtolower($text);
	$text = str_replace("&nbsp;","",$text);				

//$text = str_replace('-','',$text);
 //for arthashastra 
 $identifier=array('KAZ');

// Uncomment this section if you want to remove the following issues in GRETIL. 
/*$text= str_replace('.','',$text);
$text= str_replace('^','',$text);*/
$text= str_replace('ab/',' ',$text);	
$text= str_replace('cd/',' ',$text);
$text= str_replace('a/',' ',$text);	
$text= str_replace('b/',' ',$text);	
$text= str_replace('c/',' ',$text);	
$text= str_replace('d/',' ',$text);	
$text= str_replace('e/',' ',$text);	
$text= str_replace('f/',' ',$text);	
$text= str_replace('/','|',$text);	
$text= str_replace('samn','sann',$text);
$text= str_replace($identifier,'',$text);


	/* Main Converter Part */
$text = str_replace("kḷp","कॢप्",$text); // patch for ळ removal
$text = stripslashes($text);
global $ch;
global $type;
$text = str_replace($type,$ch['hk'],$text);
$text = str_replace("\n ", "\n", $text);
//$text = str_replace("-", "", $text);

// Uncomment this section if you want to remove spaces and do sandhi
global $sandhi;
if ($sandhi === 1)
{
$q= array("k ","h ","g ","G ","c ","j ","J ","T ","D ","N ","t ","d ","n ","p ","b ","m ","y ","r ","l ","v ","z ","S ","s ");
$p= array("k","h","g","G","c","j","J","T","D","N","t","d","n","p","b","m","y","r","l","v","z","S","s");
$text = str_replace($q,$p,$text);
}
$text = str_replace(" /'","/'",$text);

$v = "्"; // Virama

/* Main arrays */

$num['tra'] = array(
	60 => "0",
	61 => "1",
	62 => "2",
	63 => "3",
	64 => "4",
	65 => "5",
	66 => "6",
	67 => "7",
	68 => "8",
	69 => "9",
);

$main['tra'] = array(

	//20 => "t ", // t end
		
	40 => "'", // apostrophe (avagraha)
	41 => "`", // Latin apostrophe (’)
	42 => "#", // Abbreviation
	
	116 => "kha",
	115 => "ka",
	118 => "gha",
	117 => "ga",
	119 => "Ga",

	121 => "cha",
	120 => "ca",
	123 => "jha",
	122 => "ja",
	124 => "Ja",

	126 => "Tha",
	125 => "Ta",
	128 => "Dha",
	127 => "Da",
	129 => "Na",

	131 => "tha",
	130 => "ta",
	133 => "dha",
	132 => "da",
	134 => "na",

	136 => "pha",
	135 => "pa",
	138 => "bha",
	137 => "ba",
	139 => "ma",
	
	140 => "ya",
	141 => "Ya",
	142 => "ra",
	143 => "la",
	144 => "va",
	
	145 => "za",
	146 => "Sa",
	147 => "sa",
	
	149 => "M",
	150 => "H",
	151 => "~",
	152 => "||", // ||
	153 => "|", // |
	154 => "Q", // Nukta
	155 => "@", // Abbreviation
	//156 => ";", // Udatta
	//157 => ":", // Anudatta (svarita)
	259 => "La",

	
	201 => "Pha",
	200 => "Pa",
	
	148 => "ha",
);

$vow['tra'] = array(

	257 => " R",
	258 => " q",
	260 => " W",
	
	261 => " e",
	262 => " ai",
	263 => " o",
	264 => " au",
	
	251 => " a",
	252 => " A",
	253 => " i",
	254 => " I",
	255 => " u",
	256 => " U",
);


$yukta['tra'] = array(

	307 => "R", // joint
	308 => "q", // joint
	310 => "W", // joint
	
	311 => "e", // joint
	312 => "ai", // joint
	313 => "o", // joint
	314 => "au", // joint
	
	301 => "a", // joint
	302 => "A", // joint
	303 => "i", // joint
	304 => "I", // joint
	305 => "u", // joint
	306 => "U", // joint
);


$num['scr'] = array(
	60 => "०", // 0
	61 => "१", // 1
	62 => "२", // 2
	63 => "३", // 3
	64 => "४", // 4
	65 => "५", // 5
	66 => "६", // 6
	67 => "७", // 7
	68 => "८", // 8
	69 => "९", // 9
);

$main['scr'] = array(

	//20 => "ৎ", // t end
	
	40 => "ऽ", // apostrophe (avagraha)
	41 => "’", // Latin apostrophe (’)
	42 => "॰", // Abbreviation
	
	116 => "ख", // kha
	115 => "क", // ka
	118 => "घ", // gha
	117 => "ग", // ga
	119 => "ङ", // Ga
	
	121 => "छ", // cha
	120 => "च", // ca
	123 => "झ", // jha
	122 => "ज", // ja
	124 => "ञ", // Ja
	
	126 => "ठ", // Tha
	125 => "ट", // Ta
	128 => "ढ", // Dha
	127 => "ड", // Da
	129 => "ण", // Na
	
	131 => "थ", // tha
	130 => "त", // ta
	133 => "ध", // dha
	132 => "द", // da
	134 => "न", // na
	
	136 => "फ", // pha
	135 => "प", // pa
	138 => "भ", // bha
	137 => "ब", // ba
	139 => "म", // ma
	
	140 => "य", // ya
	141 => "य़", // Ya
	142 => "र", // ra
	143 => "ल", // la
	144 => "व", // va
	
	145 => "श", // za
	146 => "ष", // Sa
	147 => "स", // sa

	
	149 => "ं", // M
	150 => "ः", // H
	151 => "ँ", // ~
	152 => "॥", // ||
	153 => "।", // |
	154 => "़", // . Nukta
	155 => "॰", // Abbreviation
	//156 => "॑", // Udatta
	//157 => "॒", // Anudatta (svarita)
	259 => "ळ", // L

	
	201 => "ঢ়", // Pha
	200 => "ড়", // Pa

	
	148 => "ह", // ha
);

$vow['scr'] = array(
	
	257 => " ऋ", // R
	258 => " ॠ", // q
	260 => " ॡ", // W 
	
	261 => " ए", // e
	262 => " ऐ", // ai
	263 => " ओ", // o
	264 => " औ", // au
	
	251 => " अ", // a
	252 => " आ", // A
	253 => " इ", // i
	254 => " ई", // I
	255 => " उ", // u
	256 => " ऊ", // U
	
);

$yukta['scr'] = array(
	
	307 => "ृ", // R joint
	308 => "ॄ", // q joint
	310 => "ॣ", // W  joint
	
	311 => "े", // e joint
	312 => "ै", // ai joint
	313 => "ो", // o joint
	314 => "ौ", // au joint
	
	301 => "&#8205;", // a joint
	302 => "ा", // A joint
	303 => "ि", // i joint
	304 => "ी", // I joint
	305 => "ु", // u joint
	306 => "ू", // U joint
);

$yukta['scr'][301] = "";

$text = " " . $text;
$text = str_replace("-", "- ", $text); // Ensure full vowel is given after dash
	$text = str_replace("^", "", $text); // Remove external sandhi break
	$text = str_replace("%", "", $text); // Remove XHK capital letter sign

/* Create half-consonants */
	
	$half['tra'] = array();
	$half['scr'] = array();
	
	foreach ($main['tra'] as $key => $val) {
		$half['tra'][$key] = str_replace("a", "", $val);
	

}
	foreach ($main['scr'] as $key => $val) {
		$half['scr'][$key] = $val . $v;
	}


/* Crunch joint vowels */
	
	foreach ($yukta['tra'] as $key => $val) {
		foreach ($half['tra'] as $hkey => $hval) {
			$obj = str_replace("{$v}", "", $half['scr'][$hkey]);
			$text = str_replace(($hval . $val),  ($obj . $yukta['scr'][$key]), $text);
		}
	}

	$text = str_replace("_", "_ ", $text); // For ha_uk etc.


	$text = str_replace ($main['tra'], $main['scr'], $text);
	$text = str_replace ($vow['tra'], $vow['scr'], $text);
	$text = str_replace ($half['tra'], $half['scr'], $text);
	$text = str_replace ($num['tra'], $num['scr'], " " . $text . " ");

	$text = str_replace("{$v}{$half['scr'][154]}", "{$half['scr'][154]}", $text); // Fix nuktas


	/* Crunch remaining full vowels, e.g. ha_uk  and sei */

	foreach ($vow['tra'] as $key => $val) {
		$objscr = str_replace(" ", "", $val);
		$objtra = str_replace(" ", "", $vow['scr'][$key]);
		$text = str_replace("{$objscr}", "{$objtra}",  $text);
	}


	$tidys = array("_ ","- ", "\n ");
	$tidyr = array("", "-", "\n");

	$text = trim(str_replace($tidys, $tidyr, $text));


$text = str_replace("$","",$text);
$text = str_replace("&","।",$text);
$text = str_replace("/","।",$text);
$text = str_replace(" ऽ","ऽ",$text);
$text = str_replace("","",$text);
$text = str_replace("ओं","ॐ",$text);
$text = str_replace("औं","ॐ",$text);
$text = str_replace(". . .","।।।",$text);
$text = str_replace(". .","॥",$text);
$text = str_replace(" .."," ॥",$text);
$text = str_replace(" ."," ।",$text);
$text = str_replace(",","",$text);


return $text;
}


// defining certain arrays for removing the GRETIL abbreviations
$capital = 'AĀIĪUŪRṚEOKGṄCJÑṬḌṆTDNPBMYLVŚṢSH';
$small = 'abcdefghijklmnopqrstuv){}';
$ns = '0123456789_.,){}:\/-';
$numerals = '0123456789';



// specifying the arrays of different datatypes
$ch['unicode'] = array(

30 => "Ā", // _a
31 => "Ī", // _i
32 => "Ū", // _u
33 => "Ṛ", // .r
34 => "Ṝ", // _.r
35 => "Ṅ", // 'n
36 => "Ñ", // ~n
37 => "Ṭ", // .t
38 => "Ḍ", // .d
39 => "Ṇ", // .n
40 => "Ś", // 's
41 => "Ṣ", // .s
42 => "ṃ", // 'm (anusvara)
43 => "Ḥ", // .h (visarga)
44 => "Ḷ", // .l
45 => "Ḹ", // _.l

50 => "Ḏ", // _D
51 => "Ẏ", // .Y

1 => "ā", // _a
2 => "ī", // _i
3 => "ū", // _u
4 => "ṛ", // .r
5 => "ṝ", // _.r
6 => "ṅ", // 'n
7 => "ñ", // ~n
8 => "ṭ", // .t
9 => "ḍ", // .d 
10 => "ṇ", // .n
11 => "ś", // 's
12 => "ṣ", // .s
13 => "ṁ", // 'm (anusvara)
14 => "ḥ", // .h (visarga)
15 => "ḷ", // .l
16 => "ḹ", // _.l

20 => "ḏ", // _d
21 => "ẏ", // .y

60 => "ɱ", // \-/ (candrabindu)
61 => "̮", // _ (ha_uk)
62 => "^", // ^ (ext. sandhi)
63 => "'", // avagraha
64 => "ɱ", // \_/ (candra e)
65 => "/x", // \ (virama)
66 => "…", // abbreviation
67 => "’", // Latin apostrophe

);
$ch['balaram'] = array(

30 => "Ä", // _a
31 => "É", // _i
32 => "Ü", // _u
33 => "Å", // .r
34 => "È", // _.r
35 => "Ì", // 'n
36 => "Ï", // ~n
37 => "Ö", // .t
38 => "Ò", // .d
39 => "Ë", // .n
40 => "Ç", // 's
41 => "Ñ", // .s
42 => "À", // 'm (anusvara)
43 => "Ù", // .h (visarga)
44 => "ß", // .l
45 => "ß", // _.l

50 => ".Ò", // _d
51 => "Ý", // .y

1 => "ä", // _a
2 => "é", // _i
3 => "ü", // _u
4 => "å", // .r
5 => "è", // _.r
6 => "ì", // 'n
7 => "ï", // ~n
8 => "ö", // .t
9 => "ò", // .d 
10 => "ë", // .n
11 => "ç", // 's
12 => "ñ", // .s
13 => "à", // 'm (anusvara)
14 => "ù", // .h (visarga)
15 => "ÿ", // .l
16 => "û", // _.l

20 => ".ò", // _d
21 => "ý", // .y

60 => "~", // \-/ (candrabindu)
61 => "_", // _ (ha_uk)62 => "^", // ^ (ext. sandhi)63 => "'", // avagraha
64 => "~", // \_/ (candra e)
65 => "/x", // \ (virama)
66 => "…", // abbreviation
67 => "’", // Latin apostrophe


);


$ch['csx'] = array(

30 => "â", // _a
31 => "ä", // _i
32 => "æ", // _u
33 => "è", // .r
34 => "é", // _.r
35 => "ð", // 'n
36 => "¥", // ~n
37 => "ò", // .t
38 => "ô", // .d
39 => "ö", // .n
40 => "ø", // 's
41 => "ú", // .s
42 => "ý", // 'm (anusvara)
43 => "ş", // .h (visarga)
44 => "ë", // .l
45 => "í", // _.l

50 => "ô", // _D
51 => "Ÿ", // .Y

1 => "à", // _a
2 => "ã", // _i
3 => "å", // _u
4 => "ç", // .r
5 => "é", // _.r
6 => "ï", // 'n
7 => "¤", // ~n
8 => "ñ", // .t
9 => "ó", // .d 
10 => "õ", // .n
11 => "÷", // 's
12 => "ù", // .s
13 => "ü", // 'm (anusvara)
14 => "þ", // .h (visarga)
15 => "í", // .l
16 => "û", // _.l

20 => "ó", // _d
21 => "ÿ", // .y

60 => "~", // \-/ (candrabindu)
61 => "_", // _ (ha_uk)
62 => "^", // ^ (ext. sandhi)
63 => "'", // avagraha
64 => "~", // \_/ (candra e)
65 => "/x", // \ (virama)
66 => "…", // abbreviation
67 => "’", // Latin apostrophe

);
$ch['itrans'] = array(

30 => "%A", // _a
31 => "%I", // _i
32 => "%U", // _u
33 => "%R^i", // .r
34 => "%R^I", // _.r
35 => "%~N", // 'n
36 => "%~n", // ~n
37 => "%T", // .t
38 => "%D", // .d
39 => "%N", // .n
40 => "%sh", // 's
41 => "%Sh", // .s
42 => "%M", // 'm (anusvara)
43 => "%H", // .h (visarga)
44 => "%L^i", // .l
45 => "%L^I", // _.l

50 => "%.D", // _D
51 => "%Y", // .Y

1 => "A", // _a
2 => "I", // _i
3 => "U", // _u
4 => "R^i", // .r
5 => "R^I", // _.r
6 => "~N", // 'n
7 => "~n", // ~n
8 => "T", // .t
9 => "D", // .d 
10 => "N", // .n
11 => "sh", // 's
12 => "Sh", // .s
13 => "M", // 'm (anusvara)
14 => "aH", // .h (visarga) (visarga)
15 => "L^i", // .l
16 => "L^I", // _.l

20 => ".D", // _d
21 => "Y", // .y

60 => ".N", // \-/ (candrabindu)
61 => "_", // _ (ha_uk)
62 => "^", // ^ (ext. sandhi)
63 => ".a", // avagraha
64 => ".c", // \_/ (candra e)
65 => ".h", // \ (virama)
66 => "@", // abbreviation
67 => "`", // Latin apostrophe

);


$ch['xsanskrit'] = array(

30 => "š", // _a
31 => "Ÿ", // _i
32 => "¶", // _u
33 => "", // .r
34 => "­", // _.r
35 => "¥", // 'n
36 => "Ñ", // ~n
37 => "µ", // .t
38 => "", // .d
39 => "¦", // .n
40 => "®", // 's
41 => "±", // .s
42 => "¤", // 'm (anusvara)
43 => "ž", // .h (visarga)
44 => "¢", // .l
45 => "¢", // _.l

50 => ".P", // _D
51 => ".Y", // .Y

1 => "€", // _a
2 => "…", // _i
3 => "™", // _u
4 => "", // .r
5 => "Ž", // _.r
6 => "‰", // 'n
7 => "ñ", // ~n
8 => "˜", // .t
9 => "", // .d 
10 => "Š", // .n
11 => "", // 's
12 => "", // .s
13 => "ˆ", // 'm (anusvara)
14 => "ƒ", // .h (visarga)
15 => "†", // .l
16 => "‡", // _.l

20 => ".p", // _d
21 => ".y", // .y


60 => "~", // \-/ (candrabindu)
61 => "_", // _ (ha_uk)
62 => "^", // ^ (ext. sandhi)
63 => "'", // avagraha
64 => "~", // \_/ (candra e)
65 => "/x", // \ (virama)
66 => "...", // abbreviation
67 => "’", // Latin apostrophe

);


$ch['shakti'] = array(

30 => "", // _a
31 => "é", // _i 
32 => "¬", // _u // uncertain
33 => "ä", // .r
34 => ".¨", // _.r // missing
35 => "", // 'n // missing
36 => "", // ~n // missing
37 => "æ", // .t
38 => "¶", // .d // missing
39 => "º", // .n // missing
40 => "", // 's
41 => "ê", // .s
42 => "µ", // 'm (anusvara) // missing
43 => "ú", // .h (visarga) // missing
44 => ".l", // .l // missing
45 => "_.l", // _.l // missing

50 => ".¶", // _D // missing
51 => ".Y", // .Y // missing

1 => "", // _a
2 => "", // _i
3 => "", // _u
4 => "¨", // .r
5 => ".¨", // _.r
6 => "", // 'n
7 => "", // ~n
8 => " ", // .t // not working
9 => "¶", // .d 
10 => "º", // .n
11 => "½", // 's
12 => "§", // .s
13 => "µ", // 'm (anusvara)
14 => "ú", // .h (visarga)
15 => ".L", // .l // missing
16 => "_.L", // _.l // missing

20 => ".¶", // _d // missing
21 => ".y", // .y // missing


60 => "~", // \-/ (candrabindu)
61 => "_", // _ (ha_uk)
62 => "^", // ^ (ext. sandhi)
63 => "'", // avagraha
64 => "~", // \_/ (candra e)
65 => "/x", // \ (virama)
66 => "@", // abbreviation
67 => "Õ", // Latin apostrophe

);

$ch['velthuis'] = array(

30 => "%aa", // _a
31 => "%ii", // _i
32 => "%uu", // _u
33 => "%.r", // .r
34 => "%.R", // _.r
35 => "%\"n", // 'n
36 => "%~n", // ~n
37 => "%.t", // .t
38 => "%.d", // .d
39 => "%.n", // .n
40 => "%\"s", // 's
41 => "%.s", // .s
42 => "%.m", // 'm (anusvara)
43 => "%.h", // .h (visarga)
44 => "%.l", // .l
45 => "%.L", // _.l

50 => "%.d", // _D
51 => "%.y", // .Y

1 => "aa", // _a
2 => "ii", // _i
3 => "uu", // _u
4 => ".r", // .r
5 => ".R", // _.r
6 => "\"n", // 'n
7 => "~n", // ~n
8 => ".t", // .t
9 => ".d", // .d 
10 => ".n", // .n
11 => "\"s", // 's
12 => ".s", // .s
13 => ".m", // 'm (anusvara)
14 => ".h", // .h (visarga)
15 => ".l", // .l
16 => ".L", // _.l

20 => ".d", // _d
21 => ".y", // .y

60 => "k.N", // \-/ (candrabindu)
61 => "_", // _ (ha_uk)
62 => "^", // ^ (ext. sandhi)
63 => ".a", // avagraha
64 => "k.c", // \_/ (candra e)
65 => "/x", // \ (virama)
66 => "@", // abbreviation
67 => "`", // Latin apostrophe

);

$ch['hk'] = array(

30 => "%A", // _a
31 => "%I", // _i
32 => "%U", // _u
33 => "%R", // .r
34 => "%q", // _.r
35 => "%G", // 'n
36 => "%J", // ~n
37 => "%T", // .t
38 => "%D", // .d
39 => "%N", // .n
40 => "%z", // 's
41 => "%S", // .s
42 => "%M", // 'm (anusvara)
43 => "%H", // .h (visarga)
44 => "%L", // .l
45 => "%W", // _.l

50 => "%P", // _D
51 => "%Y", // .Y

1 => "A", // _a
2 => "I", // _i
3 => "U", // _u
4 => "R", // .r
5 => "q", // _.r
6 => "G", // 'n
7 => "J", // ~n
8 => "T", // .t
9 => "D", // .d 
10 => "N", // .n
11 => "z", // 's
12 => "S", // .s
13 => "M", // 'm (anusvara)
14 => "H", // .h (visarga)
15 => "L", // .l
16 => "W", // _.l

20 => "P", // _d
21 => "Y", // .y


60 => "~", // \-/ (candrabindu)
61 => "_", // _ (ha_uk)
62 => "^", // ^ (ext. sandhi)
63 => "'", // avagraha
64 => "~", // \_/ (candra e)
65 => "/x", // \ (virama)
66 => "@", // abbreviation
67 => "`", // Latin apostrophe

);

// Specify the input data type
$type = $ch['unicode'];

$b = file($file);
for($i=0; $i<count($b); $i++)
{
$c[$i] = preg_split('/(['.$numerals.']([^\r\n]*)[\r\n])/u',$b[$i],-1,PREG_SPLIT_DELIM_CAPTURE);
}
//print_r($c);
for ($i=0; $i<count($b); $i++)
{
$out[$i] = convert($c[$i][0])." ".$c[$i][1];
}
$output = implode("\r\n", $out);
file_put_contents("C:\\devanagarisorted.txt",$output);
?>

</body>
</html>