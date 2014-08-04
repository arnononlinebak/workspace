/***************************************************
Source for Chapter 7 , Example (No run number)
Function LEFT, RIGHT, SUBSTRING AND LENGTH
You must copy this script run on MySQL Command Line Client
****************************************************/

use test;
SET @STRING1 = 'ABCDEFG';
SELECT LEFT(@STRING1,3) AS 'LEFT FN', RIGHT(@STRING1,3) AS 'RIGHT FN', SUBSTRING(@STRING1,3,2) AS 'SUBSTRING FN', LENGTH(@STRING1) AS 'LENGTH FN';


/***************************************************
End of file
****************************************************/