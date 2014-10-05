<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <META HTTP-EQUIV="Content-Language" CONTENT="HI">
  <!--<meta name="language" content="hi"> -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </meta>
  </META>
</head>
    <body>
<?php
/* Code written by Dr. Dhaval Patel, www.sanskritworld.in.
 * Version 1.0, Date: 2nd October, 2013
 * email: drdhaval2785@gmail.com
 * This code is free to be used, modified or altered for any purpose.
 * Please make sure to keep these lines unaltered to credit the author of the code.
 */


/* Explanation about the data used:
 * This code is helpful for sorting data like "1234 ??? 11".
 * The number preceding the devanagari data is ignored in sorting.
 * The whole data is sorted primarily by devanagari data.
 * Thereafter the number following devanagari is sorted. Usually these suffixed numbers are used for showing homonyms of words.
*/

// set execution time to an hour
ini_set('max_execution_time', 360000);
// set memory limit to 1000 MB
ini_set("memory_limit","100000M");

                 /* defining the arrays used in this code */

$consonants = array("\u0915","\u0916","\u0917","\u0918","\u0919","\u091a","\u091b","\u091c","\u091d","\u091e","\u091f","\u0920","\u0921","\u0922","\u0923","\u0924","\u0925","\u0926","\u0927","\u0928","\u092a","\u092b","\u092c","\u092d","\u092e","\u092f","\u0930","\u0932","\u0935","\u0936","\u0937","\u0938","\u0939");    
// $consonantreplace would be used to place the halant characters before akArAnta.  
$consonantreplace = array("\u0915!","\u0916!","\u0917!","\u0918!","\u0919!","\u091a!","\u091b!","\u091c!","\u091d!","\u091e!","\u091f!","\u0920!","\u0921!","\u0922!","\u0923!","\u0924!","\u0925!","\u0926!","\u0927!","\u0928!","\u092a!","\u092b!","\u092c!","\u092d!","\u092e!","\u092f!","\u0930!","\u0932!","\u0935!","\u0936!","\u0937!","\u0938!","\u0939!");    
// $kavarga to $pavarga are used to convert non-genuine anusvara to their corresponding fifth letter.
$kavarga = array("\u0915","\u0916","\u0917","\u0918","\u0919",);
$cavarga = array("\u091a","\u091b","\u091c","\u091d","\u091e",);
$Tavarga = array("\u091f","\u0920","\u0921","\u0922","\u0923",);
$tavarga = array("\u0924","\u0925","\u0926","\u0927","\u0928",);
$pavarga = array("\u092a","\u092b","\u092c","\u092d","\u092e",);
// $khar and $shar are used for correct placement of visargas.
$khar = array("\u0916","\u092b","\u091b","\u0920","\u0925","\u091a","\u091f","\u0924","\u0915","\u092a","\u0936","\u0937","\u0938");
$shar = array("\u0936","\u0937","\u0938");
// $vowel is list of vowels in devanagari
$vowel = array("\u093e","\u093f","\u0940","\u0941","\u0942","\u0943","\u0944","\u0945","\u0946","\u0947","\u0948","\u0949","\u094a","\u094b","\u094c"," ",);
// $specialcharacters are the unicode codepoints of characters which you want to ignore during formatting. e.g. "°","?" etc. Put them here.
$specialcharacters = array("\u00b0","\u221a",);

// input the text file into an array.
// Make sure to hit an enter at the last of your file. Otherwise the last word may be missed in sorting. 
// In other words add "\r\n" at the end of your data.

$test = file("C:\gretil4\bigsmallcurly\saivrliu.txt");
// $count counts the number of members in the array $test
$count = count($test);
//print_r($test);
// Now starts the main coding part. We will run this as long as the whole array $test is exhausted

                /* Coding for sorting */
//echo json_encode("(");
$i=0;
while ($i<$count)
{ // reads the 'i'th member of the array. $test[0] would mean the first member of the array.
   $text = $test[$i];
                /* Finding out the $pre (numbers preceding devanagari, if any),
                 * $post (numbers suffixed to devanagari, if any),
                 * $original (the original devanagari data, to be called back after sorting)
                 * $c (the devanagari data for manipulation, for doing intermediate work of sorting),
                 */
$capital = 'AĀIĪUŪRṚEOKGṄCJÑṬḌṆTDNPBMYLVŚṢSHaāiīuūṛeoṁḥkgṅcjñṭḍṇtdnpbmyrlvśṣah';
$z = preg_split('/(['.$capital.']([^\r\n]*)[\r\n])/u', $text, -1,PREG_SPLIT_DELIM_CAPTURE );
//print_r($z);
$original[$i] = $z[0];
if (count($z)>1)
{$post[$i] = $z[1];}
else
{$post[$i] = "";}
$delimiters = "()+-=";
 	$a = preg_split('/([' . $delimiters . '])/m', $z[0], -1 ,PREG_SPLIT_DELIM_CAPTURE );
//print_r($a);
    $q=0;$c[$i] = "";
        while($q <count($a))
        {
            $c[$i] = $c[$i].$a[$q];
            $q=$q+2;
   	     }
        $c[$i] = str_replace('[','',$c[$i]);
        $c[$i] = str_replace(']','',$c[$i]);
        $c[$i] = str_replace('*','',$c[$i]);
	$c[$i] = $c[$i]."!";
	$c[$i] = str_replace(" ","!",$c[$i]);	
// Now our four parameters are defined for all four possibility. First number- last number, first number - last no number, first no number - last number, first no  number - last no number.

// Now we will sort our array according to the $c parameter, because we have removed the (,*,) and such other characters from the $c.
// Therefore it will sort properly. Original data may not sort properly.
// So now onwards we will work on the $c. Once we are good to sort it properly, we will store $c,$original,$pre and $post in an array and thereafter sort the array.
// Thereafter we will echo only the $original, so that the original data is displayed on browser.
//echo $c[$i]."</br>";
  // getting the Codepoint for the UTF 8 encoded text
$c[$i] = json_encode($c[$i]);
// removing the starting code point \ufeff . json_encode adds this \ufeef at the start of the string. Remove it. Otherwise sorting may go wrong.
$c[$i] = str_replace('\ufeff','',$c[$i]);

            /* Replacing nongenuine anusvaras. 
             * Here \u0902 represents the anusvar in unicode devanagari.
             * When it is followed by a kavarga letter, the fictitious anusvar is converted to (\u0919\u094d).
             *Similarly when followed by a cavarga, Tavarga, tavarga and pavarga letter, the fictitious anusvar is converted.
             */
$k=0;
While($k<5)
{ $u=0;
while ($u<16)
{
$c[$i]= str_replace("\u0902".$kavarga[$k],"\u0919\u094d".$kavarga[$k],$c[$i]);
$c[$i]= str_replace("\u0902".$cavarga[$k],"\u091e\u094d".$cavarga[$k],$c[$i]);
$c[$i]= str_replace("\u0902".$Tavarga[$k],"\u0923\u094d".$Tavarga[$k],$c[$i]);
$c[$i]= str_replace("\u0902".$tavarga[$k],"\u0928\u094d".$tavarga[$k],$c[$i]);
$c[$i]= str_replace("\u0902".$pavarga[$k],"\u092e\u094d".$pavarga[$k],$c[$i]);
$u++;
}
$k++;
}

                /* code for placing terminal halant before akArAnta */ 

// converting the terminal halant ($consontans + \u094d)  as ($consonantreplace + \u094d so as to place it before akArAnta consonant. 
$q= 0;
while($q<33)
{
$c[$i]= str_replace($consonants[$q].'\u094d"',$consonantreplace[$q].'\u094d"',$c[$i]);
$c[$i]= str_replace($consonants[$q].'\u094d\r\n"',$consonantreplace[$q].'\u094d\r\n"',$c[$i]);
$c[$i]= str_replace($consonants[$q].'\u094d\u200c\r\n"',$consonantreplace[$q].'\u094d\u200c\r\n"',$c[$i]);
$c[$i]= str_replace($consonants[$q].'\u094d\u200c"',$consonantreplace[$q].'\u094d\u200c"',$c[$i]);
$q++;
}

            /* The code for deciding the position of visarga 
             * This has been done with help of Siddhanta Kaumudi ( a textbook of sanskrit grammar)
             */

// visarjanIyasya saH (8.3.34) - visarga gets converted to 's' before $khar
$k=0;
while($k<13)
{
$c[$i]= str_replace("\u0903".$khar[$k],"\u0938\u094d".$khar[$k],$c[$i]);
$k++;
}
// sharpare visarjanIyaH (8.3.35) - visarga-$khar-$shar gets converted to 's'-$khar-$shar
$k=0;
while($k<13)
{
    $j=0;
    while($j<3)
    {
$c[$i]= str_replace("\u0938\u094d".$khar[$k]."\u094d".$shar[$j],"\u0903".$khar[$k]."\u094d".$shar[$j],$c[$i]);
    $j++;
    }
$k++;
}
// vA shari (8.3.36) - visarga-$shar = visarga-$shar. Dictionaries seem to take this as mandatory, even though it is optional
$k=0;
while($k<3)
{
$c[$i]= str_replace("\u0938\u094d".$shar[$k],"\u0903".$shar[$k],$c[$i]);
$k++;
}
// kharpare shari vA visargalopo vaktavyaH (8.3.36 vArtikA) e.g. rAmaH sthAtha = rAma sthAtA. (used in sentences and not in dictionaries. so not coded)
// kupvoH HkHpau ca (8.3.37) - jihvAmUlIya and upadhmAnIya are not used in most of the dictionaries. so this is skipped.
// so'padAdau (8.3.38), pAzakalpakakAmyeSviti vAcyam - These two rules specify that a visarga is converted to 's' when followed by 'pAza','kalpa','ka','kAmyac'. This has already been taken care of because we have already converted it to 's'.
// ananvayasyeti vAcyam - the rule so'padAdau will not apply if the word is an avyaya. e.g. prAtaHkalpam. avyaya list has to be furnished.
// kAmye roreveti vAcyam - this would entail the analysis of vibhaktis to identify whether this is 'ru' or not. We have not done it.
// iNaH SaH (8.3.39) - in the rule 8.3.38, the 's' would be converted to 'S' if it is preceded by 'i'/'u'. Not done because we didnt do 8.3.38. And anyhow it would be converted by 'idudupadhasya cApratyayasya'.
// namaspurasorgatyoH (8.3.41) - namas / puras would have 's' instead of visarga, if followed by 'pAza','kalpa','ka','kAmyac' and it has gati saJjJA. This has already been done. gati would be decided by sentence, therefore we dont need in dictionary.
// idudupadhasya cApratyayasya (8.3.41) 'i'/'u'-visarga-'ka'/'pa' = 'i'/'u'-'Sha'-'ka'/'pa'. Here apratyayasya - the examples are seen only in sentences. so no need to bother about it right now.
$k=0;
while ($k<2) // the logic behind using only 2 insted of 4 is, because 's' would be converted to 'o' before ga,gha,ba,bha. It would no longer remain visarga/'s'
{
$c[$i]= str_replace("\u093f\u0938\u094d".$kavarga[$k],"\u093f\u0937\u094d".$kavarga[$k],$c[$i]);
$c[$i]= str_replace("\u0941\u0938\u094d".$kavarga[$k],"\u0941\u0937\u094d".$kavarga[$k],$c[$i]);
$c[$i]= str_replace("\u093f\u0938\u094d".$pavarga[$k],"\u093f\u0937\u094d".$pavarga[$k],$c[$i]);
$c[$i]= str_replace("\u0941\u0938\u094d".$pavarga[$k],"\u0941\u0937\u094d".$pavarga[$k],$c[$i]);
// 'ekadezazAstanimittakasya na Satvam | kaskAdiSu bhrAtuSputrazabdasya pAThAt' - not applicable because it is seen in sentences
// 'muhusaH pratiSedhaH (vArtika) - muhuH doesn't get converted to muhuS.
$c[$i] = str_replace("\u092e\u0941\u0939\u0941\u0937\u094d".$kavarga[$k],"\u092e\u0941\u0939\u0941\u0903".$kavarga[$k],$c[$i]);
$c[$i] = str_replace("\u092e\u0941\u0939\u0941\u0937\u094d".$pavarga[$k],"\u092e\u0941\u0939\u0941\u0903".$pavarga[$k],$c[$i]);
// 'tiraso'nyatarasyAm' (8.3.42). tiras - gets converted to visarga optionally. In dictionary all optional ones have to appear at their respective places instead of visarga place. So nothing remains to be done.
// 'dvistrizcaturiti kRtvo'rthe (8.3.43) - not necessary as this would need sentence context. It is optional. so for our purpose, it will remain as 'dviSkaroti' etc.
// 'isusoH sAmarthye (8.3.44) - this is optional. so it would remain as sarpiSkaroti. no need to change
// 'nityam samAse'nuttarapadasy (8.3.45) - not necessary. We have already converted it to 'sarpiSkuNDikA'. 
// 'ataH kRkamikaMsakumbhapAtrakuzAkarNISvanavyayasya' (8.3.46) - This has already been done. To prevent conversion in case of avyaya (anavyayasya) we need to have list of avyayas.
// 'adhazzirasI pade' - adhaH + pada -> adhaspada, ziras + pada -> ziraspada
$c[$i] = str_replace("\u0905\u0927\u0903\u092a\u0926","\u0905\u0927\u0938\u094d\u092a\u0926",$c[$i]);
$k++;

}
// patching up for different z,S,s which might be necessary in some cases
/*$c[$i] = str_replace("\u0903\u0936","\u0936\u094d\u0936^",$c[$i]);
$c[$i] = str_replace("\u0903\u0937","\u0937\u094d\u0937^",$c[$i]);
$c[$i] = str_replace("\u0903\u0938","\u0938\u094d\u0938^",$c[$i]);*/


                /* coding for correct position of RU,lR lRU */ 

// patching up for RU, lR, lRU etc. (By default these rare vowel signs are sorted after the whole consonants. We want to position them at their proper place.
$c[$i] = str_replace("\u0960","\u090b^",$c[$i]);
$c[$i] = str_replace("\u0961","\u090c^",$c[$i]);
$c[$i] = str_replace("\u0962","\u0944^",$c[$i]);
$c[$i] = str_replace("\u0963","\u0944_",$c[$i]);

                /* Coding for special characters, which are to be ignored while sorting */

// This is very important section. There are certain characters which you would like to ignore while formatting. e.g. "°" (\u00b0), "?" (\u221a) etc.
// Put these in the $specialcharacters section at the starting of code.
// Here we replace $specialcharacters with "" (null). Therefore, they are removed from $c and sorting will be fine.
// Bear in mind that at the same time $original has all the characters intact. Therefore we could afford to delete them in $c.
// At the end we will be calling only $original. Therefore removal of these characters from $c will not affect the output.

$l=0;
while ($l<count($specialcharacters))
{$c[$i] = str_replace($specialcharacters[$l],"",$c[$i]);$l++;}
//echo $c[$i]."</br>";
$i++;
}
// creating a multidimentional array $araay which contains $c,$original, $pre and $post.
$i=0;
while ($i<count($test))
{
$array[$i] = array('$c' => $c[$i], '$original' => $original[$i], '$post' => $post[$i]);
$i++;
}


// Obtain a list of columns
foreach ($array as $key => $row) {
    $c[$key]  = $row['$c'];
    $post[$key] = $row['$post'];
}

// Sort the data with $c as string ascending, $post as number by natural sorting.
// Add $array as the last parameter, to sort by the common key
array_multisort($c, SORT_ASC, $post, SORT_NATURAL, $array);
//Print_r($array);


$i=0;
while($i<count($test))
{               /* Coding for interchanging between panchama letter and anusvara (Optional) */
    
    
// If you want to keep anusvaras and don't want to convert the panchama letters back to anusvaras, uncomment this section.    
/*
$array[$i]['$original']= json_encode($array[$i]['$original']);
    $k=0;
While($k<5)
{
$array[$i]['$original']= str_replace("\u0919\u094d".$kavarga[$k],"\u0902".$kavarga[$k],$array[$i]['$original']);
$array[$i]['$original']= str_replace("\u091e\u094d".$cavarga[$k],"\u0902".$cavarga[$k],$array[$i]['$original']);
$array[$i]['$original']= str_replace("\u0923\u094d".$Tavarga[$k],"\u0902".$Tavarga[$k],$array[$i]['$original']);
$array[$i]['$original']= str_replace("\u0928\u094d".$tavarga[$k],"\u0902".$tavarga[$k],$array[$i]['$original']);
$array[$i]['$original']= str_replace("\u092e\u094d".$pavarga[$k],"\u0902".$pavarga[$k],$array[$i]['$original']);
$k++;
}
$array[$i]['$original'] = json_decode($array[$i]['$original']);
*/
  
    /* Changing $array[$i]['$post'] to "" where it was changed to 0 for proper sorting */
if ($array[$i]['$post']!==0)
{
$outputtext[$i] = ltrim(chop($array[$i]['$original']." ".$array[$i]['$post']));
}
else 
{
$outputtext[$i] = ltrim(chop($array[$i]['$original']));    
}

$i++; 
}


$outtext = implode ($outputtext,"\r\n");

            /* Coding for Output to the .txt file */

    
    // write the location and the file name in which you want the output, in $trial.

$trial= fopen("C:\devanagarisorted.txt",'w+');
fputs($trial,$outtext);
fclose ($trial);

    // If you want to echo the output to the browser, uncomment this section. 
    // If you dont want to have output in .txt file, also comment the code above.
 
$outtext = str_replace("\r\n","</br>",$outtext);
 echo $outtext."</br>";

?> 
        </body>