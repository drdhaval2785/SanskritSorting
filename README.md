SanskritSorting
===============

Motivation behind the code:
The available sorting order of Excel or other softwares don't offer proper sorting for Sanskrit texts.
To name a few- 
saMkalpa (संकल्प) should be sorted as saNkalpa(सङ्कल्प).
RR (ॠ) and lRR (लॄ) are not sorted properly. 
ळ and ळ्ह are not sorted properly.
In most of dictionary sorting - some hyphen, apostrophes etc need to be ignored while sorting.
To attend to most of these demands, we have developed this software.
This is code to properly sort the sanskrit dictionary lists or any other list according to sanskrit order.

There are two codes available - multi for regular sorting. reverse for reverse sorting.
Use the latest version of multi__.php and reverse__.php where __ denotes the highest number.
Currently they are multi12.php and reverse23.php.

Syntax for Commandline Interface. (This is a CLI tool now)
the syntax is 
```
php multi13.php outputfolder inputtext morphologicends
php reverse22.php outputfolder inputtext morphologicends
```

Actual examples are 
```
php multi13.php d:\sorting d:\sorting\input\input.txt d:\sorting\input\morphologicends.txt
php reverse22.php d:\sorting d:\sorting\input\input.txt d:\sorting\input\morphologicends.txt
```

Output:
A. For multi12.php (normal sorting) -
```
normalsorted1.txt - sorted list with headers
normalsorted2.html - HTML of sorted list with headers
normalsorted3.html - HTML with headers + bookmarks
normalsorted4.txt - pure and simple sorted list. no header / no bookmarks.
```

B. For reverse23.php (reverse sorting) -
```
reversesorted1.txt - sorted list with headers
reversesorted2.html - HTML of sorted list with headers
reversesorted3.html - HTML with headers + bookmarks
reversesorted4.txt - pure and simple sorted list. no header / no bookmarks.
reverse_pratyaya_stats.txt - statistics about the endings of words.
```
