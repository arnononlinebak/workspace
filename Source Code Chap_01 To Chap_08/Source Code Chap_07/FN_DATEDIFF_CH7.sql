/***************************************************
Source for Chapter 7 , Example (No run number)
Function DATEDIFF
You must copy this script run on MySQL Command Line Client
****************************************************/

use test;
SELECT DATEDIFF(NOW(), DATE_ADD(NOW(), INTERVAL '160' DAY)) AS 'DATE2 IS GREATER THAN DATE1';
SELECT DATEDIFF(DATE_ADD(NOW(), INTERVAL '160' DAY), NOW()) AS 'DATE1 IS GREATER THAN DATE2';

/***************************************************
End of file
****************************************************/