SanskritSorting
===============

This is the code to properly sort the sanskrit dictionary lists or any other list according to sanskrit order.
There are two codes available - multi for regular sorting. reverse for reverse sorting.
Use the latest version of multi__.php and reverse__.php where __ denotes the highest number.
Currently they are multi12.php and reverse23.php.
1. Create a Directory in D: nameed !sorting. (D:\!sorting)
2. Create a subdirectory in it named input (D:\!sorting\input)
3. Put the morphologicends.txt from this repository there. (D:\!sorting\input\morphologicends.txt).
4. Create input.txt file and put the list you want to sort there. Put this file at D:\!sorting\input\input.txt.
5. Install xampp
6. In c:\xampp\htdocs create a subfolder sanskritsorting
7. Extract the downloaded code from this repository in C:\xampp\htdocs\sanskritsorting.
8. Go to commandline (usually for widows - it is press windows button, type cmd and click enter).
9. cd to the directory c:\xampp\htdocs\sanskritsorting\
10. enter php multi13.php (for normal sorting)
11. enter php reverse22.php (for reverse sorting)
12. It will give output at D:\!sorting.
13. There are 4 files discussed in output section of readme.
14. For explanation of steps 8 to 13, please Follow the video at https://www.youtube.com/watch?v=cpk7WwSRyKA.

Output:
A. For multi12.php (normal sorting) -
normalsorted1.txt - sorted list with headers
normalsorted2.html - HTML of sorted list with headers
normalsorted3.html - HTML with headers + bookmarks
normalsorted4.txt - pure and simple sorted list. no header / no bookmarks.

B. For reverse23.php (reverse sorting) -
reversesorted1.txt - sorted list with headers
reversesorted2.html - HTML of sorted list with headers
reversesorted3.html - HTML with headers + bookmarks
reversesorted4.txt - pure and simple sorted list. no header / no bookmarks.
reverse_pratyaya_stats.txt - statistics about the endings of words.

